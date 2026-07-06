<?php

namespace App\Http\Controllers;

use App\Models\GreenInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SepayWebhookController extends Controller
{
    public function status()
    {
        return response()->json([
            'status' => 'ok',
            'message' => 'SePay webhook endpoint is ready. Send payment notifications using POST.',
            'method' => 'POST',
        ]);
    }

    public function handle(Request $request)
    {
        $data = $request->all();
        $headers = $request->headers->all();

        // Log đầy đủ để debug format SePay gửi
        Log::info('SePay Webhook Received: ', [
            'payload' => $data,
            'authorization' => $request->header('Authorization'),
            'content_type' => $request->header('Content-Type'),
        ]);

        // Xác thực API Key
        $authHeader = $request->header('Authorization');
        $expectedKey = env('SEPAY_API_KEY') ?: \App\Models\SystemSetting::get('sepay_api_key');
        if ($expectedKey && $authHeader !== 'Apikey ' . $expectedKey) {
            Log::warning('SePay Webhook unauthorized. Got: [' . $authHeader . '] Expected prefix: [Apikey ...]');
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
        }

        // SePay thực tế gửi field "content" (xem payload thực tế)
        // fallback sang các tên field cũ để tương thích test
        $content = $data['content']
            ?? $data['transaction_content']
            ?? $data['transactionContent']
            ?? $data['description']
            ?? $data['body']
            ?? '';

        Log::info('SePay content extracted: ' . $content);

        if (! $content) {
            Log::warning('SePay Webhook: no content field found in payload', $data);
            return response()->json(['status' => 'error', 'message' => 'No content found'], 400);
        }

        // Khớp cả 2 dạng: GCI-20260706-ABCDEF (có dấu gạch) hoặc GCI20260706ABCDEF (không có dấu gạch)
        preg_match('/GCI-?(\d{8})-?([A-Z0-9]{6})/i', strtoupper($content), $matches);

        if (empty($matches)) {
            Log::warning('SePay Webhook: no invoice code in content: ' . $content);
            return response()->json(['status' => 'error', 'message' => 'No invoice code matched'], 400);
        }

        // Chuẩn hóa về định dạng DB: GCI-YYYYMMDD-XXXXXX
        $invoiceCode = 'GCI-' . $matches[1] . '-' . $matches[2];

        $invoice = GreenInvoice::where('invoice_code', $invoiceCode)->first();

        if (! $invoice) {
            Log::warning('SePay Webhook: invoice not found: ' . $invoiceCode);
            return response()->json(['status' => 'error', 'message' => 'Invoice not found'], 404);
        }

        if ($invoice->status === 'unpaid') {
            $invoice->update(['status' => 'pending']);
            Log::info("Invoice {$invoice->invoice_code} marked as PAID via SePay.");
        }

        return response()->json(['status' => 'success', 'message' => 'OK']);
    }
}
