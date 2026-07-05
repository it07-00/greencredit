<?php

namespace App\Services;

use App\Models\ActivityLog;
use App\Models\GreenActionRule;
use App\Models\GreenInvoice;
use App\Models\GreenTransaction;
use App\Models\Store;
use App\Models\StoreBranch;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RuntimeException;

class QrInvoiceService
{
    public function __construct(
        private GreenPointService $points,
        private GreenScoreService $scores,
        private FraudDetectionService $fraud,
        private NetZeroRecommendationService $netZero,
    ) {}

    public function createInvoice(Store $store, ?StoreBranch $branch, User $staff, array $data): GreenInvoice
    {
        $calculated = $this->calculateInvoicePoints($data['actions'] ?? []);

        return DB::transaction(function () use ($store, $branch, $staff, $data, $calculated) {
            $invoice = GreenInvoice::create([
                'store_id' => $store->id,
                'branch_id' => $branch?->id,
                'staff_id' => $staff->id,
                'invoice_code' => $this->generateInvoiceCode(),
                'qr_token' => $this->generateQrToken(),
                'amount' => $data['amount'],
                'payment_method' => $data['payment_method'] ?? null,
                'customer_note' => $data['customer_note'] ?? null,
                'eco_actions' => $calculated['actions'],
                'base_points' => $calculated['points'],
                'plastic_saved_grams' => $calculated['plastic_saved_grams'],
                'co2_saved_kg' => $calculated['co2_saved_kg'],
                'status' => 'pending',
                'expired_at' => now()->addDays(7),
            ]);

            foreach ($calculated['rules'] as $rule) {
                $invoice->items()->create([
                    'green_action_rule_id' => $rule->id,
                    'points' => $rule->points,
                    'plastic_saved_grams' => $rule->plastic_saved_grams,
                    'co2_saved_kg' => $rule->co2_saved_kg,
                ]);
            }

            ActivityLog::create(['user_id' => $staff->id, 'action' => 'create_invoice', 'description' => "Tao hoa don {$invoice->invoice_code}"]);

            return $invoice;
        });
    }

    public function generateQrToken(): string
    {
        do {
            $token = Str::upper(Str::random(32));
        } while (GreenInvoice::where('qr_token', $token)->exists());

        return $token;
    }

    public function generateInvoiceCode(): string
    {
        return 'GCI-'.now()->format('Ymd').'-'.Str::upper(Str::random(6));
    }

    public function calculateInvoicePoints(array $actionCodes): array
    {
        $rules = GreenActionRule::whereIn('code', $actionCodes)->where('is_active', true)->get();

        return [
            'points' => (int) $rules->sum('points'),
            'plastic_saved_grams' => (float) $rules->sum('plastic_saved_grams'),
            'co2_saved_kg' => (float) $rules->sum('co2_saved_kg'),
            'actions' => $rules->map(fn ($rule) => ['code' => $rule->code, 'name' => $rule->name, 'points' => $rule->points])->values()->all(),
            'rules' => $rules,
        ];
    }

    public function verifyQrToken(string $token, User $user): GreenInvoice
    {
        $token = $this->parseToken($token);
        $invoice = GreenInvoice::where('qr_token', $token)->first();

        if (! $invoice) {
            $this->fraud->createAlert($user, null, 'invalid_qr', 'Nguoi dung nhap QR token khong ton tai.', 50);
            throw new RuntimeException('Ma QR khong hop le.');
        }

        return $invoice;
    }

    public function markInvoiceAsUsed(GreenInvoice $invoice, User $user): GreenTransaction
    {
        return $this->redeemInvoice($invoice->qr_token, $user);
    }

    public function redeemInvoice(string $token, User $user): GreenTransaction
    {
        $token = $this->parseToken($token);

        $preflight = GreenInvoice::where('qr_token', $token)->first();
        if (! $preflight) {
            $this->fraud->createAlert($user, null, 'invalid_qr', 'Nguoi dung nhap QR token khong ton tai.', 50);
            throw new RuntimeException('Ma QR khong hop le.');
        }
        if ($preflight->status === 'used' || $preflight->used_by) {
            $this->fraud->createAlert($user, $preflight, 'duplicate_scan', 'Nguoi dung quet lai hoa don da su dung.', 80);
            throw new RuntimeException('Hoa don nay da duoc su dung.');
        }
        if ($preflight->expired_at && $preflight->expired_at->isPast()) {
            $this->fraud->createAlert($user, $preflight, 'expired_invoice_attempt', 'Nguoi dung quet hoa don da het han.', 70);
            throw new RuntimeException('Hoa don da het han.');
        }

        return DB::transaction(function () use ($token, $user) {
            $invoice = GreenInvoice::where('qr_token', $token)->lockForUpdate()->first();

            $inspection = $this->fraud->inspectInvoiceScan($user, $invoice);
            if (! $inspection['allowed'] || $invoice->status !== 'pending') {
                throw new RuntimeException($inspection['messages'][0] ?? 'Hoa don khong the xac thuc.');
            }

            $transaction = GreenTransaction::create([
                'user_id' => $user->id,
                'store_id' => $invoice->store_id,
                'branch_id' => $invoice->branch_id,
                'green_invoice_id' => $invoice->id,
                'transaction_code' => 'GCT-'.now()->format('Ymd').'-'.Str::upper(Str::random(8)),
                'type' => 'invoice_scan',
                'points' => $invoice->base_points,
                'plastic_saved_grams' => $invoice->plastic_saved_grams,
                'co2_saved_kg' => $invoice->co2_saved_kg,
                'description' => "Quet hoa don {$invoice->invoice_code}",
                'status' => $inspection['risk_score'] >= 80 ? 'suspicious' : 'approved',
                'metadata' => ['actions' => $invoice->eco_actions],
            ]);

            $this->points->earnPoints($user, $invoice->base_points, 'Nhan diem tu hoa don xanh', $transaction);

            $invoice->update(['status' => 'used', 'used_at' => now(), 'used_by' => $user->id]);
            $this->netZero->updateProgressFromTransaction($transaction);
            $this->scores->saveScoreHistory($user, 'invoice_scan');

            ActivityLog::create(['user_id' => $user->id, 'action' => 'scan_invoice', 'description' => "Quet hoa don {$invoice->invoice_code}"]);

            return $transaction;
        });
    }

    public function expireOldInvoices(): int
    {
        return GreenInvoice::where('status', 'pending')->where('expired_at', '<', now())->update(['status' => 'expired']);
    }

    private function parseToken(string $token): string
    {
        $token = trim($token);
        $token = Str::after($token, 'GREEN-CREDIT:');
        if (str_contains($token, '/scan-qr/')) {
            $token = Str::afterLast($token, '/scan-qr/');
        }

        return trim($token);
    }
}
