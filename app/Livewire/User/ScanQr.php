<?php

namespace App\Livewire\User;

use App\Services\QrInvoiceService;
use Livewire\Component;
use Throwable;

class ScanQr extends Component
{
    public string $token = '';

    public ?array $success = null;

    public ?string $error = null;

    public function mount(?string $token = null): void
    {
        $this->token = $token ?? '';
        if ($this->token) {
            $this->scan(app(QrInvoiceService::class));
        }
    }

    public function scan(QrInvoiceService $service): void
    {
        $this->validate(['token' => ['required', 'string']]);
        $this->success = null;
        $this->error = null;

        try {
            $transaction = $service->redeemInvoice($this->token, auth()->user());
            $this->success = [
                'points' => $transaction->points,
                'plastic' => $transaction->plastic_saved_grams,
                'co2' => $transaction->co2_saved_kg,
                'code' => $transaction->transaction_code,
            ];
            $this->token = '';
        } catch (Throwable $e) {
            $this->error = $e->getMessage();
        }
    }

    public function render()
    {
        $dbRules = \App\Models\GreenActionRule::where('is_active', true)
            ->whereIn('code', ['NO_STRAW', 'NO_PLASTIC_CUP', 'REUSABLE_BAG', 'PERSONAL_BOTTLE'])
            ->get()
            ->keyBy('code');

        $displayActions = [];
        $mappings = [
            'NO_STRAW' => ['icon' => 'far fa-cup-straw text-danger', 'name' => 'Hạn chế ống hút nhựa'],
            'NO_PLASTIC_CUP' => ['icon' => 'far fa-ban text-danger', 'name' => 'Hạn chế cốc nhựa'],
            'REUSABLE_BAG' => ['icon' => 'far fa-shopping-bag text-success', 'name' => 'Sử dụng túi vải cá nhân'],
            'PERSONAL_BOTTLE' => ['icon' => 'far fa-tint text-success', 'name' => 'Mang bình nước cá nhân'],
        ];

        foreach ($mappings as $code => $map) {
            $points = isset($dbRules[$code]) ? $dbRules[$code]->points : 10;
            $displayActions[] = [
                'icon' => $map['icon'],
                'name' => $map['name'],
                'points' => $points,
            ];
        }

        return view('livewire.user.scan-qr', [
            'displayActions' => $displayActions,
        ]);
    }
}
