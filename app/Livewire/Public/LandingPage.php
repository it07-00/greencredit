<?php

namespace App\Livewire\Public;

use App\Models\GreenInvoice;
use App\Models\GreenTransaction;
use App\Models\Store;
use App\Models\User;
use App\Models\Voucher;
use Livewire\Component;

class LandingPage extends Component
{
    public function render()
    {
        return view('livewire.public.landing-page', [
            'stats' => [
                'users' => max(25000, User::count()),
                'stores' => max(350, Store::count()),
                'points' => max(1200000, GreenTransaction::sum('points')),
                'plastic' => max(18000, (int) GreenInvoice::sum('plastic_saved_grams')),
            ],
            'vouchers' => Voucher::where('status', 'active')->limit(3)->get(),
        ]);
    }
}
