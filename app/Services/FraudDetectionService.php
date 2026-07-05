<?php

namespace App\Services;

use App\Models\FraudAlert;
use App\Models\GreenInvoice;
use App\Models\GreenTransaction;
use App\Models\User;

class FraudDetectionService
{
    public function checkDuplicateScan(GreenInvoice $invoice): bool
    {
        return $invoice->status === 'used' || $invoice->used_by !== null;
    }

    public function checkTooManyScansPerDay(User $user): bool
    {
        return GreenTransaction::where('user_id', $user->id)->whereDate('created_at', today())->count() >= 10
            || GreenTransaction::where('user_id', $user->id)->where('created_at', '>=', now()->subMinutes(10))->count() >= 5;
    }

    public function checkExpiredInvoiceAttempt(GreenInvoice $invoice): bool
    {
        return (bool) ($invoice->expired_at?->isPast() || $invoice->status === 'expired');
    }

    public function checkSameStoreRepeated(User $user, GreenInvoice $invoice): bool
    {
        return GreenTransaction::where('user_id', $user->id)
            ->where('store_id', $invoice->store_id)
            ->where('created_at', '>=', now()->subHour())
            ->count() >= 5;
    }

    public function calculateRiskScore(User $user, GreenInvoice $invoice): int
    {
        return min(100,
            ($this->checkDuplicateScan($invoice) ? 80 : 0)
            + ($this->checkExpiredInvoiceAttempt($invoice) ? 70 : 0)
            + ($this->checkTooManyScansPerDay($user) ? 60 : 0)
            + ($this->checkSameStoreRepeated($user, $invoice) ? 40 : 0)
        );
    }

    public function inspectInvoiceScan(User $user, GreenInvoice $invoice): array
    {
        $messages = [];
        $risk = 0;
        $allowed = true;

        if ($this->checkDuplicateScan($invoice)) {
            $allowed = false;
            $risk += 80;
            $messages[] = 'Hoa don nay da duoc su dung.';
            $this->createAlert($user, $invoice, 'duplicate_scan', 'Nguoi dung quet lai hoa don da su dung.', $risk);
        }

        if ($this->checkExpiredInvoiceAttempt($invoice)) {
            $allowed = false;
            $risk += 70;
            $messages[] = 'Hoa don da het han.';
            $this->createAlert($user, $invoice, 'expired_invoice_attempt', 'Nguoi dung quet hoa don da het han.', $risk);
        }

        if ($this->checkTooManyScansPerDay($user)) {
            $allowed = false;
            $risk += 60;
            $messages[] = 'Ban da vuot qua so lan quet trong ngay.';
            $this->createAlert($user, $invoice, 'too_many_scans_per_day', 'Vuot qua 10 hoa don trong ngay.', $risk);
        }

        if ($this->checkSameStoreRepeated($user, $invoice)) {
            $risk += 40;
            $messages[] = 'Tan suat quet tai cung cua hang dang cao.';
            $this->createAlert($user, $invoice, 'same_store_repeated', 'Quet nhieu hoa don cung store trong thoi gian ngan.', $risk);
        }

        return ['allowed' => $allowed, 'risk_score' => $risk, 'messages' => $messages];
    }

    public function createAlert(?User $user, ?GreenInvoice $invoice, string $type, string $description, int $riskScore): FraudAlert
    {
        return FraudAlert::create([
            'user_id' => $user?->id,
            'green_invoice_id' => $invoice?->id,
            'store_id' => $invoice?->store_id,
            'alert_type' => $type,
            'description' => $description,
            'risk_score' => $riskScore,
            'status' => 'open',
        ]);
    }
}
