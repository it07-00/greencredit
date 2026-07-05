<?php

namespace Tests\Feature;

use App\Models\FraudAlert;
use App\Models\GreenActionRule;
use App\Models\GreenInvoice;
use App\Models\GreenLevel;
use App\Models\Store;
use App\Models\StoreBranch;
use App\Models\StoreStaff;
use App\Models\User;
use App\Models\Voucher;
use App\Services\GreenPointService;
use App\Services\GreenScoreService;
use App\Services\QrInvoiceService;
use App\Services\VoucherService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class GreenCreditFlowTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    private User $staff;

    private Store $store;

    private StoreBranch $branch;

    protected function setUp(): void
    {
        parent::setUp();

        GreenActionRule::create(['code' => 'NO_STRAW', 'name' => 'Khong dung ong hut', 'points' => 5, 'plastic_saved_grams' => 5, 'co2_saved_kg' => 0.01, 'category' => 'plastic_reduction']);
        GreenActionRule::create(['code' => 'PERSONAL_BOTTLE', 'name' => 'Mang binh ca nhan', 'points' => 20, 'plastic_saved_grams' => 40, 'co2_saved_kg' => 0.08, 'category' => 'plastic_reduction']);

        foreach ([['seed', 0, 199], ['leaf', 200, 399], ['tree', 400, 699], ['forest', 700, 899], ['net_zero_hero', 900, 1000]] as [$code, $min, $max]) {
            GreenLevel::create(['code' => $code, 'name' => ucfirst(str_replace('_', ' ', $code)), 'min_score' => $min, 'max_score' => $max]);
        }

        $this->user = User::create(['name' => 'User', 'email' => 'user@test.local', 'password' => Hash::make('password'), 'role' => 'user']);
        $owner = User::create(['name' => 'Owner', 'email' => 'owner@test.local', 'password' => Hash::make('password'), 'role' => 'store_owner']);
        $this->staff = User::create(['name' => 'Staff', 'email' => 'staff@test.local', 'password' => Hash::make('password'), 'role' => 'store_staff']);
        $this->store = Store::create(['owner_id' => $owner->id, 'name' => 'Test Store', 'type' => 'cafe', 'status' => 'active']);
        $this->branch = StoreBranch::create(['store_id' => $this->store->id, 'name' => 'CN 1', 'address' => '1 Test']);
        StoreStaff::create(['store_id' => $this->store->id, 'branch_id' => $this->branch->id, 'user_id' => $this->staff->id]);
    }

    public function test_user_has_wallet_after_created(): void
    {
        $fresh = User::create(['name' => 'Fresh', 'email' => 'fresh@test.local', 'password' => Hash::make('password'), 'role' => 'user']);

        $this->assertNotNull($fresh->wallet()->first());
    }

    public function test_store_staff_creates_green_invoice_successfully(): void
    {
        $invoice = app(QrInvoiceService::class)->createInvoice($this->store, $this->branch, $this->staff, [
            'amount' => 50000,
            'payment_method' => 'cash',
            'actions' => ['NO_STRAW', 'PERSONAL_BOTTLE'],
        ]);

        $this->assertSame('pending', $invoice->status);
        $this->assertSame(25, $invoice->base_points);
        $this->assertNotEmpty($invoice->qr_token);
    }

    public function test_pending_qr_scan_awards_points_and_updates_score(): void
    {
        $invoice = app(QrInvoiceService::class)->createInvoice($this->store, $this->branch, $this->staff, [
            'amount' => 50000,
            'actions' => ['NO_STRAW', 'PERSONAL_BOTTLE'],
        ]);

        $transaction = app(QrInvoiceService::class)->redeemInvoice($invoice->qr_token, $this->user);

        $invoice->refresh();
        $this->user->wallet->refresh();
        $this->assertSame('used', $invoice->status);
        $this->assertSame($this->user->id, $invoice->used_by);
        $this->assertSame(25, $transaction->points);
        $this->assertSame(25, $this->user->wallet->current_balance);
        $this->assertDatabaseHas('green_points', ['user_id' => $this->user->id, 'points' => 25]);
        $this->assertDatabaseHas('green_score_histories', ['user_id' => $this->user->id]);
    }

    public function test_used_qr_cannot_be_scanned_again(): void
    {
        $invoice = app(QrInvoiceService::class)->createInvoice($this->store, $this->branch, $this->staff, [
            'amount' => 50000,
            'actions' => ['NO_STRAW'],
        ]);
        app(QrInvoiceService::class)->redeemInvoice($invoice->qr_token, $this->user);

        $this->expectException(\RuntimeException::class);
        app(QrInvoiceService::class)->redeemInvoice($invoice->qr_token, $this->user);
    }

    public function test_active_voucher_redeems_when_user_has_points(): void
    {
        app(GreenPointService::class)->earnPoints($this->user, 200, 'Test points');
        app(GreenScoreService::class)->saveScoreHistory($this->user, 'test');
        $voucher = Voucher::create(['title' => 'Cafe xanh', 'code' => 'CAFE', 'category' => 'cafe', 'required_points' => 100, 'discount_type' => 'fixed', 'discount_value' => 10000, 'quantity' => 10, 'status' => 'active', 'expired_at' => now()->addDay()]);

        $redemption = app(VoucherService::class)->redeemVoucher($this->user, $voucher);

        $this->assertSame('issued', $redemption->status);
        $this->assertSame(100, $this->user->wallet()->first()->current_balance);
    }

    public function test_voucher_cannot_redeem_when_points_are_insufficient(): void
    {
        $voucher = Voucher::create(['title' => 'Cafe xanh', 'code' => 'CAFE', 'category' => 'cafe', 'required_points' => 100, 'discount_type' => 'fixed', 'discount_value' => 10000, 'quantity' => 10, 'status' => 'active', 'expired_at' => now()->addDay()]);

        $this->expectException(\RuntimeException::class);
        app(VoucherService::class)->redeemVoucher($this->user, $voucher);
    }

    public function test_fraud_alert_created_when_expired_invoice_is_scanned(): void
    {
        $invoice = app(QrInvoiceService::class)->createInvoice($this->store, $this->branch, $this->staff, [
            'amount' => 50000,
            'actions' => ['NO_STRAW'],
        ]);
        $invoice->update(['expired_at' => now()->subMinute()]);

        try {
            app(QrInvoiceService::class)->redeemInvoice($invoice->qr_token, $this->user);
        } catch (\RuntimeException) {
            //
        }

        $this->assertSame(1, FraudAlert::where('alert_type', 'expired_invoice_attempt')->count());
    }

    public function test_middleware_blocks_user_from_admin_route(): void
    {
        $this->actingAs($this->user)->get('/admin')->assertForbidden();
    }

    public function test_admin_can_access_filament_panel(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.local',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 'active',
        ]);

        $this->actingAs($admin)->get('/admin')->assertOk();
    }

    public function test_store_staff_cannot_view_invoice_from_other_store(): void
    {
        $otherStore = Store::create(['name' => 'Other', 'type' => 'cafe', 'status' => 'active']);
        $otherBranch = StoreBranch::create(['store_id' => $otherStore->id, 'name' => 'Other branch', 'address' => '2 Test']);
        $invoice = GreenInvoice::create([
            'store_id' => $otherStore->id,
            'branch_id' => $otherBranch->id,
            'invoice_code' => 'GCI-OTHER',
            'qr_token' => 'TOKEN-OTHER',
            'amount' => 10000,
            'eco_actions' => [],
            'status' => 'pending',
        ]);

        $this->actingAs($this->staff)->get(route('store.invoices.show', $invoice))->assertForbidden();
    }

    public function test_store_staff_cannot_manage_store_staff(): void
    {
        $this->actingAs($this->staff)->get(route('store.staff'))->assertForbidden();
    }

    public function test_green_score_is_between_zero_and_one_thousand(): void
    {
        app(GreenPointService::class)->earnPoints($this->user, 5000, 'Lots of points');
        $history = app(GreenScoreService::class)->saveScoreHistory($this->user, 'test');

        $this->assertGreaterThanOrEqual(0, $history->score);
        $this->assertLessThanOrEqual(1000, $history->score);
    }
}
