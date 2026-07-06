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
use Illuminate\Support\Facades\DB;
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
            ['Store Owner 1', 'storeowner1@greencredit.test', 'store_owner'],
            ['Store Owner 2', 'storeowner2@greencredit.test', 'store_owner'],
            ['Staff Green 1', 'staff1@greencredit.test', 'store_staff'],
            ['Staff Green 2', 'staff2@greencredit.test', 'store_staff'],
            ['Staff Green 3', 'staff3@greencredit.test', 'store_staff'],
            ['Staff Green 4', 'staff4@greencredit.test', 'store_staff'],
            ['Partner Demo 1', 'partner1@greencredit.test', 'partner'],
            ['Partner Demo 2', 'partner2@greencredit.test', 'partner'],
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
            $user->profile()->create(['city' => 'TP.HCM', 'district' => 'Quận 1', 'green_interests' => ['plastic', 'transport', 'recycling']]);
            app(GreenPointService::class)->ensureWallet($user);
        }

        $rules = [
            ['NO_PLASTIC_CUP', 'Không dùng ly nhựa', 10, 12, 0.04, 'plastic_reduction'],
            ['NO_STRAW', 'Không dùng ống hút', 5, 1, 0.01, 'plastic_reduction'],
            ['PERSONAL_BOTTLE', 'Mang bình cá nhân', 20, 15, 0.08, 'plastic_reduction'],
            ['ECO_PACKAGING', 'Dùng bao bì sinh học', 10, 8, 0.03, 'plastic_reduction'],
            ['REUSABLE_BAG', 'Dùng túi tái sử dụng', 15, 10, 0.05, 'plastic_reduction'],
            ['GREEN_TRANSPORT', 'Di chuyển xanh', 20, 0, 0.5, 'transport'],
            ['RECYCLE_WASTE', 'Tái chế rác thải', 15, 0, 0.1, 'recycling'],
            ['SAVE_ENERGY', 'Tiết kiệm năng lượng', 10, 0, 0.3, 'energy'],
        ];
        foreach ($rules as [$code, $name, $points, $plastic, $co2, $category]) {
            GreenActionRule::create(compact('code', 'name', 'points', 'category') + ['plastic_saved_grams' => $plastic, 'co2_saved_kg' => $co2, 'is_active' => true]);
        }

        foreach ([['seed', 'Seed', 0, 199], ['leaf', 'Leaf', 200, 399], ['tree', 'Tree', 400, 699], ['forest', 'Forest', 700, 899], ['net_zero_hero', 'Net Zero Hero', 900, 1000]] as $i => [$code, $name, $min, $max]) {
            GreenLevel::create(['code' => $code, 'name' => $name, 'min_score' => $min, 'max_score' => $max, 'sort_order' => $i + 1, 'description' => 'Cấp độ '.$name, 'benefits' => ['badge' => $name]]);
        }

        $stores = collect(['Lá Xanh Coffee', 'Eco Milk Tea', 'Green Mart', 'Organic Food Corner', 'The Green House'])->map(function ($name, $i) use ($users) {
            return Store::create([
                'owner_id' => $i < 3 ? $users['storeowner1@greencredit.test']->id : $users['storeowner2@greencredit.test']->id,
                'name' => $name,
                'brand' => $name,
                'type' => ['cafe', 'restaurant', 'supermarket', 'milk_tea', 'other'][$i],
                'email' => Str::slug($name).'@greencredit.test',
                'phone' => '09000000'.$i,
                'address' => ($i + 1).' Nguyễn Huệ',
                'city' => 'TP.HCM',
                'district' => 'Quận '.($i + 1),
                'status' => 'active',
                'is_active' => true,
            ]);
        });

        $branches = collect();
        foreach ($stores as $store) {
            for ($i = 1; $i <= 2; $i++) {
                $branches->push(StoreBranch::create(['store_id' => $store->id, 'name' => $store->name.' CN '.$i, 'address' => "{$i} Lê Lợi", 'city' => 'TP.HCM', 'district' => 'Quận '.$i, 'is_active' => true]));
            }
        }

        $staffEmails = ['staff1@greencredit.test', 'staff2@greencredit.test', 'staff3@greencredit.test', 'staff4@greencredit.test'];
        foreach ($staffEmails as $i => $email) {
            StoreStaff::create(['store_id' => $stores[$i % $stores->count()]->id, 'branch_id' => $branches[$i]->id, 'user_id' => $users[$email]->id, 'position' => 'Nhân viên xanh']);
        }

        $partners = collect([
            Partner::create(['user_id' => $users['partner1@greencredit.test']->id, 'name' => 'Eco Voucher Partner', 'type' => 'voucher', 'contact_email' => 'partner1@greencredit.test', 'status' => 'active']),
            Partner::create(['user_id' => $users['partner2@greencredit.test']->id, 'name' => 'Green Finance Partner', 'type' => 'financial', 'contact_email' => 'partner2@greencredit.test', 'status' => 'active']),
            Partner::create(['name' => 'Eco Wallet Simulation Partner', 'type' => 'wallet', 'contact_email' => 'wallet@greencredit.test', 'status' => 'active']),
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
            $status = $i <= 20 ? 'used' : ($i <= 25 ? 'pending' : 'expired');
            $invoice = GreenInvoice::create([
                'store_id' => $store->id,
                'branch_id' => $branch->id,
                'staff_id' => $users['staff1@greencredit.test']->id,
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
                    'description' => 'Quét hóa đơn demo',
                    'status' => 'approved',
                    'metadata' => ['actions' => $invoice->eco_actions],
                    'created_at' => now()->subDays(rand(0, 25)),
                ]);
                $pointService->earnPoints($user, $invoice->base_points, 'Nhận điểm demo', $tx);
            }
        }

        foreach ($regularUsers->take(5) as $user) {
            NetZeroGoal::create(['user_id' => $user->id, 'month' => now()->month, 'year' => now()->year, 'plastic_target_grams' => 700, 'co2_target_kg' => 8, 'points_target' => 300, 'action_target' => 20]);
            PersonalRecommendation::create(['user_id' => $user->id, 'title' => 'Mang bình cá nhân 3 lần tuần này', 'description' => 'Giảm nhựa và nhận thêm Green Points.', 'category' => 'plastic', 'estimated_points' => 60]);
            PersonalRecommendation::create(['user_id' => $user->id, 'title' => 'Đi bộ cho quãng đường dưới 2 km', 'description' => 'Giảm phát thải CO₂ và duy trì chuỗi ngày xanh.', 'category' => 'transport', 'estimated_points' => 40]);
            $scoreService->saveScoreHistory($user, 'seed');
        }

        $voucherTitles = [
            'Giảm 20% tại Lá Xanh Coffee',
            'Giảm 15% tại Eco Milk Tea',
            'Giảm 50.000đ tại Green Mart',
            'Hoàn 20.000đ Eco Wallet mô phỏng',
            'Ưu đãi tài chính Green Finance mô phỏng',
            'Tặng đồ uống xanh',
            'Ưu đãi túi tái sử dụng',
            'Giảm giá thực phẩm hữu cơ',
            'Voucher di chuyển xanh',
            'Quà tặng Net Zero Hero',
        ];

        for ($i = 1; $i <= 10; $i++) {
            $category = ['cafe', 'milk_tea', 'supermarket', 'wallet', 'finance'][($i - 1) % 5];
            $imageMap = [
                'cafe' => 'frontend/assets/img/vouchers/voucher_cafe.png',
                'milk_tea' => 'frontend/assets/img/vouchers/voucher_milktea.png',
                'supermarket' => 'frontend/assets/img/vouchers/voucher_supermarket.png',
                'wallet' => 'frontend/assets/img/vouchers/voucher_wallet.png',
                'finance' => 'frontend/assets/img/vouchers/voucher_finance.png',
            ];

            $title = $voucherTitles[$i - 1];
            $discountType = 'fixed';
            $discountValue = 10000;

            if (str_contains($title, '20%')) {
                $discountType = 'percent';
                $discountValue = 20;
            } elseif (str_contains($title, '15%')) {
                $discountType = 'percent';
                $discountValue = 15;
            } elseif (str_contains($title, '50.000')) {
                $discountType = 'fixed';
                $discountValue = 50000;
            } elseif (str_contains($title, '20.000')) {
                $discountType = 'fixed';
                $discountValue = 20000;
            }

            Voucher::create([
                'partner_id' => $partners->random()->id,
                'store_id' => ($i <= 3) ? $i : null,
                'title' => $title,
                'code' => 'GREEN'.$i,
                'description' => 'Ưu đãi giả lập dành cho người dùng có hành vi tiêu dùng xanh.',
                'category' => $category,
                'required_points' => 30 + $i * 20,
                'discount_type' => $discountType,
                'discount_value' => $discountValue,
                'quantity' => 100,
                'min_green_score' => $i > 6 ? 300 : 0,
                'started_at' => now()->subDays(3),
                'expired_at' => now()->addMonths(2),
                'status' => 'active',
                'terms' => 'Áp dụng một lần cho mỗi người dùng.',
                'image' => $imageMap[$category],
            ]);
        }

        $voucher = Voucher::first();
        foreach ($regularUsers->take(5) as $user) {
            VoucherRedemption::create(['user_id' => $user->id, 'voucher_id' => $voucher->id, 'redemption_code' => 'VC-'.Str::upper(Str::random(8)), 'points_used' => $voucher->required_points, 'status' => 'issued', 'expired_at' => now()->addDays(30)]);
            $voucher->increment('used_quantity');
        }

        foreach ([['TOO_MANY_SCANS', 'Quá nhiều lần quét', 60, '10'], ['DUPLICATE_SCAN', 'Quét trùng QR', 80, '1'], ['EXPIRED_INVOICE', 'Quét hóa đơn hết hạn', 70, 'expired']] as [$code, $name, $risk, $threshold]) {
            FraudRule::create(['code' => $code, 'name' => $name, 'risk_points' => $risk, 'threshold_value' => $threshold]);
        }
        foreach (['expired_invoice_attempt', 'duplicate_scan', 'too_many_scans_per_day', 'same_store_repeated', 'suspicious_pattern'] as $index => $type) {
            FraudAlert::create([
                'user_id' => $regularUsers[$index]->id,
                'green_invoice_id' => GreenInvoice::where('status', 'expired')->skip($index)->first()?->id,
                'store_id' => $stores[$index]->id,
                'alert_type' => $type,
                'description' => 'Cảnh báo gian lận giả lập phục vụ trình bày đồ án.',
                'risk_score' => 40 + $index * 10,
            ]);
        }

        Campaign::create(['partner_id' => $partners->first()->id, 'title' => 'Tuần lễ không ống hút', 'description' => 'Tặng điểm khi không dùng ống hút.', 'type' => 'challenge', 'started_at' => now(), 'ended_at' => now()->addMonth(), 'status' => 'active', 'budget' => 5000000]);
        for ($i = 1; $i <= 5; $i++) {
            FinancialOffer::create([
                'partner_id' => $partners[1]->id,
                'title' => "Gói tài chính xanh mô phỏng {$i}",
                'description' => 'Ưu đãi giả lập dựa trên Green Score, không kết nối ngân hàng thật.',
                'min_green_score' => 300 + $i * 80,
                'base_interest_rate' => 12,
                'discounted_interest_rate' => 11 - $i * 0.3,
                'max_amount' => 10000000 * $i,
                'required_points' => 50 * $i,
                'status' => 'active',
            ]);
        }
        SystemSetting::updateOrCreate(['key' => 'point_exchange_rate'], ['value' => '100 điểm = 1000 VND', 'type' => 'string', 'group' => 'wallet']);
        SystemSetting::updateOrCreate(['key' => 'sepay_bank_id'], ['value' => 'ACB', 'type' => 'string', 'group' => 'sepay']);
        SystemSetting::updateOrCreate(['key' => 'sepay_account_no'], ['value' => '20428571', 'type' => 'string', 'group' => 'sepay']);
        SystemSetting::updateOrCreate(['key' => 'sepay_account_name'], ['value' => 'TRUONG', 'type' => 'string', 'group' => 'sepay']);
        SystemSetting::updateOrCreate(['key' => 'site_phone'], ['value' => '028 1234 5678', 'type' => 'string', 'group' => 'contact']);
        SystemSetting::updateOrCreate(['key' => 'site_hotline'], ['value' => '1900 1000', 'type' => 'string', 'group' => 'contact']);
        SystemSetting::updateOrCreate(['key' => 'site_email'], ['value' => 'support@greencredit.vn', 'type' => 'string', 'group' => 'contact']);
        SystemSetting::updateOrCreate(['key' => 'site_email_hello'], ['value' => 'hello@greencredit.vn', 'type' => 'string', 'group' => 'contact']);
        SystemSetting::updateOrCreate(['key' => 'site_address'], ['value' => 'Khu Công nghệ cao, Quận 9, TP. HCM', 'type' => 'string', 'group' => 'contact']);
        foreach (range(1, 10) as $index) {
            ActivityLog::create([
                'user_id' => $users['superadmin@greencredit.test']->id,
                'action' => $index === 1 ? 'seed_database' : 'demo_activity',
                'description' => "Nhật ký hoạt động giả lập số {$index}.",
                'metadata' => ['simulation' => true],
            ]);
        }

        foreach ($regularUsers->take(5) as $index => $user) {
            DB::table('notifications')->insert([
                'user_id' => $user->id,
                'title' => 'Thử thách xanh mới',
                'message' => 'Bạn có một gợi ý hành động xanh mới trong Net Zero Planner.',
                'type' => $index % 2 === 0 ? 'success' : 'info',
                'data' => json_encode(['simulation' => true]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
