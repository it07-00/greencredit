<?php

namespace App\Http\Controllers;

use App\Models\GreenInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SepayWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $data = $request->all();
        Log::info('SePay Webhook Received: ', $data);

        $authHeader = $request->header('Authorization');
        $expectedKey = env('SEPAY_API_KEY') ?: \App\Models\SystemSetting::get('sepay_api_key');
        if ($expectedKey && $authHeader !== "Apikey " . $expectedKey) {
            Log::warning('SePay Webhook unauthorized request key: ' . $authHeader);
            return response()->json(['status' => 'error', 'message' => 'Unauthorized key'], 401);
        }

        $content = $data['transactionContent'] ?? $data['body'] ?? '';

        if (! $content) {
            return response()->json(['status' => 'error', 'message' => 'No content found'], 400);
        }

        preg_match('/GCI-\d{8}-[A-Z0-9]{6}/', strtoupper($content), $matches);
        $invoiceCode = $matches[0] ?? null;

        if (! $invoiceCode) {
            return response()->json(['status' => 'error', 'message' => 'No invoice code matched in content'], 400);
        }

        $invoice = GreenInvoice::where('invoice_code', $invoiceCode)->first();

        if (! $invoice) {
            return response()->json(['status' => 'error', 'message' => 'Invoice not found'], 404);
        }

        if ($invoice->status === 'unpaid') {
            $invoice->update(['status' => 'pending']);
            Log::info("Invoice {$invoice->invoice_code} marked as PAID via SePay.");
            return response()->json(['status' => 'success', 'message' => 'Invoice paid successfully']);
        }

        return response()->json(['status' => 'success', 'message' => 'Invoice already processed']);
    }
}
