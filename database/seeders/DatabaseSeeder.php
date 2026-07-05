<?php

namespace Database\Seeders;

use App\Models\ActivityLog;
use App\Models\Campaign;
use App\Models\FinancialOffer;
use App\Models\FraudAlert;
use App\Models\FraudRule;
use App\Models\GreenActionRule;
use App\Models\GreenInvoice;
use App\Models\GreenLevel;
use App\Models\GreenTransaction;
use App\Models\NetZeroGoal;
use App\Models\Partner;
use App\Models\PersonalRecommendation;
use App\Models\Store;
use App\Models\StoreBranch;
use App\Models\StoreStaff;
use App\Models\SystemSetting;
use App\Models\User;
use App\Models\Voucher;
use App\Models\VoucherRedemption;
use App\Services\GreenPointService;
use App\Services\GreenScoreService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make('password');
        $users = collect();

        $demoUsers = [
            ['Super Admin', 'superadmin@greencredit.test', 'super_admin'],
            ['Admin Green', 'admin@greencredit.test', 'admin'],
            ['Store Owner', 'storeowner@greencredit.test', 'store_owner'],
            ['Store Owner 2', 'storeowner2@greencredit.test', 'store_owner'],
            ['Staff Green', 'staff@greencredit.test', 'store_staff'],
            ['Staff Green 2', 'staff2@greencredit.test', 'store_staff'],
            ['Staff Green 3', 'staff3@greencredit.test', 'store_staff'],
            ['Staff Green 4', 'staff4@greencredit.test', 'store_staff'],
            ['Partner Demo', 'partner@greencredit.test', 'partner'],
            ['Partner Finance', 'partner2@greencredit.test', 'partner'],
            ['User Demo', 'user@greencredit.test', 'user'],
        ];

        foreach ($demoUsers as [$name, $email, $role]) {
            $users[$email] = User::create(compact('name', 'email', 'role') + ['password' => $password, 'status' => 'active', 'email_verified_at' => now()]);
        }

        for ($i = 1; $i <= 5; $i++) {
            $users["user{$i}@greencredit.test"] = User::create([
                'name' => "Green User {$i}",
                'email' => "user{$i}@greencredit.test",
                'password' => $password,
                'role' => 'user',
                'status' => 'active',
                'email_verified_at' => now(),
            ]);
        }

        foreach ($users as $user) {
            $user->profile()->create(['city' => 'TP.HCM', 'district' => 'Quan 1', 'green_interests' => ['plastic', 'transport', 'recycling']]);
            app(GreenPointService::class)->ensureWallet($user);
        }

        $rules = [
            ['NO_PLASTIC_CUP', 'Khong dung ly nhua', 10, 20, 0.04, 'plastic_reduction'],
            ['NO_STRAW', 'Khong dung ong hut', 5, 5, 0.01, 'plastic_reduction'],
            ['PERSONAL_BOTTLE', 'Mang binh ca nhan', 20, 40, 0.08, 'plastic_reduction'],
            ['ECO_PACKAGING', 'Dung bao bi sinh hoc', 10, 15, 0.03, 'plastic_reduction'],
            ['REUSABLE_BAG', 'Dung tui tai su dung', 15, 25, 0.05, 'plastic_reduction'],
            ['GREEN_TRANSPORT', 'Di chuyen xanh', 20, 0, 0.8, 'transport'],
            ['RECYCLE_WASTE', 'Tai che rac thai', 15, 60, 0.1, 'recycling'],
            ['SAVE_ENERGY', 'Tiet kiem nang luong', 10, 0, 0.3, 'energy'],
        ];
        foreach ($rules as [$code, $name, $points, $plastic, $co2, $category]) {
            GreenActionRule::create(compact('code', 'name', 'points', 'category') + ['plastic_saved_grams' => $plastic, 'co2_saved_kg' => $co2, 'is_active' => true]);
        }

        foreach ([['seed', 'Seed', 0, 199], ['leaf', 'Leaf', 200, 399], ['tree', 'Tree', 400, 699], ['forest', 'Forest', 700, 899], ['net_zero_hero', 'Net Zero Hero', 900, 1000]] as $i => [$code, $name, $min, $max]) {
            GreenLevel::create(['code' => $code, 'name' => $name, 'min_score' => $min, 'max_score' => $max, 'sort_order' => $i + 1, 'description' => 'Cap do '.$name, 'benefits' => ['badge' => $name]]);
        }

        $stores = collect(['La Xanh Coffee', 'The Green House', 'EcoShop', 'Leafy Cafe', 'Organic Food Store'])->map(function ($name, $i) use ($users) {
            return Store::create([
                'owner_id' => $i < 3 ? $users['storeowner@greencredit.test']->id : $users['storeowner2@greencredit.test']->id,
                'name' => $name,
                'brand' => $name,
                'type' => ['cafe', 'restaurant', 'supermarket', 'milk_tea', 'other'][$i],
                'email' => Str::slug($name).'@greencredit.test',
                'phone' => '09000000'.$i,
                'address' => ($i + 1).' Nguyen Hue',
                'city' => 'TP.HCM',
                'district' => 'Quan '.($i + 1),
                'status' => 'active',
                'is_active' => true,
            ]);
        });

        $branches = collect();
        foreach ($stores as $store) {
            for ($i = 1; $i <= 2; $i++) {
                $branches->push(StoreBranch::create(['store_id' => $store->id, 'name' => $store->name.' CN '.$i, 'address' => "{$i} Le Loi", 'city' => 'TP.HCM', 'district' => 'Quan '.$i, 'is_active' => true]));
            }
        }

        $staffEmails = ['staff@greencredit.test', 'staff2@greencredit.test', 'staff3@greencredit.test', 'staff4@greencredit.test'];
        foreach ($staffEmails as $i => $email) {
            StoreStaff::create(['store_id' => $stores[$i % $stores->count()]->id, 'branch_id' => $branches[$i]->id, 'user_id' => $users[$email]->id, 'position' => 'Nhan vien xanh']);
        }

        $partners = collect([
            Partner::create(['user_id' => $users['partner@greencredit.test']->id, 'name' => 'Eco Rewards', 'type' => 'voucher', 'contact_email' => 'partner@greencredit.test', 'status' => 'active']),
            Partner::create(['user_id' => $users['partner2@greencredit.test']->id, 'name' => 'Green Finance', 'type' => 'financial', 'contact_email' => 'partner2@greencredit.test', 'status' => 'active']),
        ]);

        $pointService = app(GreenPointService::class);
        $scoreService = app(GreenScoreService::class);
        $actionCodes = GreenActionRule::pluck('code')->all();
        $regularUsers = $users->filter(fn ($u) => $u->role === 'user')->values();

        for ($i = 1; $i <= 30; $i++) {
            $store = $stores->random();
            $branch = $store->branches->random();
            $selected = collect($actionCodes)->random(rand(1, 3))->all();
            $rulesForInvoice = GreenActionRule::whereIn('code', $selected)->get();
            $status = $i <= 12 ? 'used' : ($i <= 22 ? 'pending' : 'expired');
            $invoice = GreenInvoice::create([
                'store_id' => $store->id,
                'branch_id' => $branch->id,
                'staff_id' => $users['staff@greencredit.test']->id,
                'invoice_code' => 'GCI-'.now()->format('Ymd').'-'.Str::upper(Str::random(6)),
                'qr_token' => Str::upper(Str::random(32)),
                'amount' => rand(35000, 250000),
                'payment_method' => ['cash', 'card', 'wallet'][array_rand(['cash', 'card', 'wallet'])],
                'eco_actions' => $rulesForInvoice->map(fn ($r) => ['code' => $r->code, 'name' => $r->name, 'points' => $r->points])->values()->all(),
                'base_points' => $rulesForInvoice->sum('points'),
                'plastic_saved_grams' => $rulesForInvoice->sum('plastic_saved_grams'),
                'co2_saved_kg' => $rulesForInvoice->sum('co2_saved_kg'),
                'status' => $status,
                'expired_at' => $status === 'expired' ? now()->subDay() : now()->addDays(7),
            ]);
            foreach ($rulesForInvoice as $rule) {
                $invoice->items()->create(['green_action_rule_id' => $rule->id, 'points' => $rule->points, 'plastic_saved_grams' => $rule->plastic_saved_grams, 'co2_saved_kg' => $rule->co2_saved_kg]);
            }
            if ($status === 'used') {
                $user = $regularUsers->random();
                $invoice->update(['used_by' => $user->id, 'used_at' => now()->subDays(rand(0, 20))]);
                $tx = GreenTransaction::create([
                    'user_id' => $user->id,
                    'store_id' => $store->id,
                    'branch_id' => $branch->id,
                    'green_invoice_id' => $invoice->id,
                    'transaction_code' => 'GCT-'.Str::upper(Str::random(10)),
                    'type' => 'invoice_scan',
                    'points' => $invoice->base_points,
                    'plastic_saved_grams' => $invoice->plastic_saved_grams,
                    'co2_saved_kg' => $invoice->co2_saved_kg,
                    'description' => 'Quet hoa don demo',
                    'status' => 'approved',
                    'metadata' => ['actions' => $invoice->eco_actions],
                    'created_at' => now()->subDays(rand(0, 25)),
                ]);
                $pointService->earnPoints($user, $invoice->base_points, 'Nhan diem demo', $tx);
            }
        }

        foreach ($regularUsers as $user) {
            NetZeroGoal::create(['user_id' => $user->id, 'month' => now()->month, 'year' => now()->year, 'plastic_target_grams' => 700, 'co2_target_kg' => 8, 'points_target' => 300, 'action_target' => 20]);
            PersonalRecommendation::create(['user_id' => $user->id, 'title' => 'Mang binh ca nhan 3 lan tuan nay', 'description' => 'Giam nhua va nhan them Green Points.', 'category' => 'plastic', 'estimated_points' => 60]);
            $scoreService->saveScoreHistory($user, 'seed');
        }

        for ($i = 1; $i <= 10; $i++) {
            Voucher::create([
                'partner_id' => $partners->random()->id,
                'store_id' => $i <= 4 ? $stores->random()->id : null,
                'title' => 'Voucher xanh '.$i,
                'code' => 'GREEN'.$i,
                'description' => 'Uu dai danh cho nguoi dung co hanh vi tieu dung xanh.',
                'category' => ['cafe', 'milk_tea', 'supermarket', 'wallet', 'finance'][($i - 1) % 5],
                'required_points' => 30 + $i * 20,
                'discount_type' => $i % 2 ? 'fixed' : 'percent',
                'discount_value' => $i % 2 ? 10000 + $i * 1000 : 5 + $i,
                'quantity' => 100,
                'min_green_score' => $i > 6 ? 300 : 0,
                'started_at' => now()->subDays(3),
                'expired_at' => now()->addMonths(2),
                'status' => 'active',
                'terms' => 'Ap dung mot lan cho moi nguoi dung.',
            ]);
        }

        $voucher = Voucher::first();
        foreach ($regularUsers->take(5) as $user) {
            VoucherRedemption::create(['user_id' => $user->id, 'voucher_id' => $voucher->id, 'redemption_code' => 'VC-'.Str::upper(Str::random(8)), 'points_used' => $voucher->required_points, 'status' => 'issued', 'expired_at' => now()->addDays(30)]);
            $voucher->increment('used_quantity');
        }

        foreach ([['TOO_MANY_SCANS', 'Qua nhieu lan quet', 60, '10'], ['DUPLICATE_SCAN', 'Quet trung QR', 80, '1'], ['EXPIRED_INVOICE', 'Quet hoa don het han', 70, 'expired']] as [$code, $name, $risk, $threshold]) {
            FraudRule::create(['code' => $code, 'name' => $name, 'risk_points' => $risk, 'threshold_value' => $threshold]);
        }
        FraudAlert::create(['user_id' => $users['user@greencredit.test']->id, 'green_invoice_id' => GreenInvoice::where('status', 'expired')->first()?->id, 'store_id' => $stores->first()->id, 'alert_type' => 'expired_invoice_attempt', 'description' => 'Demo canh bao quet hoa don het han.', 'risk_score' => 70]);

        Campaign::create(['partner_id' => $partners->first()->id, 'title' => 'Tuan le khong ong hut', 'description' => 'Tang diem khi khong dung ong hut.', 'type' => 'challenge', 'started_at' => now(), 'ended_at' => now()->addMonth(), 'status' => 'active', 'budget' => 5000000]);
        FinancialOffer::create(['partner_id' => $partners->last()->id, 'title' => 'Vay xanh lai suat uu dai', 'description' => 'Mo phong giam lai suat theo Green Score.', 'min_green_score' => 500, 'base_interest_rate' => 12, 'discounted_interest_rate' => 9.5, 'max_amount' => 50000000, 'required_points' => 200, 'status' => 'active']);
        SystemSetting::create(['key' => 'point_exchange_rate', 'value' => '100 diem = 1000 VND', 'type' => 'string', 'group' => 'wallet']);
        ActivityLog::create(['user_id' => $users['superadmin@greencredit.test']->id, 'action' => 'seed_database', 'description' => 'Tao du lieu demo Green Credit Platform.']);
    }
}
