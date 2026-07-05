<?php

namespace App\Livewire\User;

use App\Services\GreenPointService;
use Livewire\Component;

class GreenWallet extends Component
{
    public string $type = '';

    public function render(GreenPointService $points)
    {
        $user = auth()->user();
        $wallet = $points->ensureWallet($user);
        $ledger = $user->greenPoints()->when($this->type, fn ($q) => $q->where('type', $this->type))->latest()->paginate(12);

        return view('livewire.user.green-wallet', compact('wallet', 'ledger'));
    }
}
