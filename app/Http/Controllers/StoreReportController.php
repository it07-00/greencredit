<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\StoreStaff;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class StoreReportController extends Controller
{
    public function exportPdf(Request $request)
    {
        $user = auth()->user();
        $store = $user->role === 'store_owner'
            ? Store::where('owner_id', $user->id)->first()
            : StoreStaff::where('user_id', $user->id)->first()?->store;

        abort_unless($store, 403);

        $invoices = $store->invoices()->latest()->get();

        $totalInvoices = $invoices->count();
        $totalPoints = $invoices->sum('base_points');
        $totalPlasticKg = $invoices->sum('plastic_saved_grams') / 1000;
        $totalCo2Kg = $invoices->sum('co2_saved_kg');

        $data = [
            'store' => $store,
            'user' => $user,
            'totalInvoices' => $totalInvoices,
            'totalPoints' => $totalPoints,
            'totalPlasticKg' => $totalPlasticKg,
            'totalCo2Kg' => $totalCo2Kg,
            'invoices' => $invoices,
            'date' => now()->format('d/m/Y H:i')
        ];

        $pdf = Pdf::loadView('reports.store_pdf', $data);

        return $pdf->stream('bao-cao-cua-hang-' . str($store->name)->slug() . '.pdf');
    }
}
