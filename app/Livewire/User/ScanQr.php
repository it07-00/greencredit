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
        return view('livewire.user.scan-qr');
    }
}
