# CLAUDE.md — Green Credit Platform

> File này đặt ở **root project** để Claude Code/Cursor/AI coding agent đọc và triển khai toàn bộ dự án **Green Credit Platform** bằng **Laravel + Livewire + Tailwind CSS + MySQL**.

## 1. Mục tiêu dự án

Xây dựng một hệ thống lớn dạng platform, không phải app tích điểm đơn giản.

**Tên dự án:** Green Credit Platform  
**Đề tài:** Xây dựng nền tảng Green Credit hỗ trợ quản lý, đánh giá và phân tích hành vi tiêu dùng xanh dựa trên QR Code bằng Laravel Livewire.

Green Credit cho phép:

- Cửa hàng tạo hóa đơn xanh và sinh QR Code.
- Người dùng quét QR để nhận Green Points.
- Người dùng theo dõi ví điểm, Green Score và lộ trình Net Zero cá nhân.
- Người dùng đổi Green Points lấy voucher/ưu đãi.
- Đối tác tạo voucher, chiến dịch, ưu đãi tài chính mô phỏng.
- Admin quản trị toàn bộ hệ thống, báo cáo và gian lận.

## 2. Tech stack bắt buộc

- PHP 8.2+
- Laravel 12 hoặc phiên bản Laravel stable hiện tại của project
- Livewire 3 hoặc Livewire stable tương thích project
- Blade + Tailwind CSS + Alpine.js
- MySQL 8+
- Chart.js cho dashboard
- Spatie Laravel Permission cho phân quyền
- Simple QR Code cho QR hóa đơn

Package đề xuất:

```bash
composer require livewire/livewire
composer require spatie/laravel-permission
composer require simplesoftwareio/simple-qrcode
composer require maatwebsite/excel
composer require barryvdh/laravel-dompdf
```

Nếu project chưa có auth:

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install
npm run dev
```

## 3. Nguyên tắc triển khai

1. Không chỉ tạo giao diện tĩnh. Phải có migration, model, service, Livewire component, seeder và test cơ bản.
2. Dùng Modular Monolith, không làm microservices.
3. Business logic nằm trong Service, không đặt trong Blade.
4. Green Points không được update trực tiếp; mọi thay đổi phải qua `GreenPointService` và ghi lịch sử `green_points`.
5. QR hóa đơn phải chống quét trùng, hết hạn và token giả.
6. Green Score tính bằng service riêng, lưu lịch sử.
7. Voucher redemption phải dùng database transaction.
8. Giao diện tiếng Việt, tên class/model/database bằng tiếng Anh.
9. Dữ liệu dashboard lấy từ database thật; seeder chỉ dùng để tạo dữ liệu demo.
10. Ưu tiên hoàn thành flow lõi: Store tạo QR → User quét QR → Cộng điểm → Cập nhật Green Score → Đổi voucher → Admin xem báo cáo.

## 4. Roles và portal

Dùng Spatie Permission. Tạo các role:

| Role | Mã | Portal |
|---|---|---|
| Super Admin | `super_admin` | Toàn quyền |
| Admin | `admin` | Admin Portal |
| Store Owner | `store_owner` | Store Portal |
| Store Staff | `store_staff` | Store Portal |
| Partner | `partner` | Partner Portal |
| User | `user` | User Portal |

Quyền tối thiểu:

- `manage users`
- `manage stores`
- `manage partners`
- `manage green action rules`
- `manage vouchers`
- `review fraud alerts`
- `create green invoices`
- `scan green invoices`
- `redeem vouchers`
- `view analytics`

## 5. Cấu trúc thư mục

```txt
app/
├── Livewire/
│   ├── Public/
│   ├── User/
│   ├── Store/
│   ├── Partner/
│   └── Admin/
├── Models/
├── Services/
├── Policies/
├── Enums/
└── Support/

resources/views/
├── livewire/
│   ├── public/
│   ├── user/
│   ├── store/
│   ├── partner/
│   └── admin/
├── components/
└── layouts/
```

Service cần tạo:

```txt
app/Services/GreenPointService.php
app/Services/GreenScoreService.php
app/Services/QrInvoiceService.php
app/Services/VoucherService.php
app/Services/FraudDetectionService.php
app/Services/NetZeroRecommendationService.php
app/Services/AnalyticsService.php
app/Services/ActivityLogService.php
```

## 6. Database tables

Tạo các bảng chính:

```txt
users
user_profiles
stores
store_branches
store_staff
green_action_rules
green_invoices
green_transactions
green_wallets
green_points
green_levels
green_score_histories
partners
campaigns
vouchers
voucher_redemptions
financial_offers
financial_applications
net_zero_goals
net_zero_progress
personal_recommendations
fraud_rules
fraud_alerts
notifications_custom
activity_logs
system_settings
```

## 7. Schema chi tiết

### 7.1. users

Dùng migration mặc định của Laravel, bổ sung nếu cần:

```php
$table->string('phone')->nullable();
$table->string('avatar')->nullable();
$table->string('status')->default('active'); // active, locked, inactive
$table->timestamp('last_login_at')->nullable();
```

### 7.2. user_profiles

```php
Schema::create('user_profiles', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->date('date_of_birth')->nullable();
    $table->string('gender')->nullable();
    $table->string('city')->nullable();
    $table->string('district')->nullable();
    $table->json('green_interests')->nullable();
    $table->json('green_goals')->nullable();
    $table->text('bio')->nullable();
    $table->timestamps();
});
```

### 7.3. stores

```php
Schema::create('stores', function (Blueprint $table) {
    $table->id();
    $table->foreignId('owner_id')->nullable()->constrained('users')->nullOnDelete();
    $table->string('name');
    $table->string('brand')->nullable();
    $table->string('type')->default('coffee');
    $table->string('tax_code')->nullable();
    $table->string('email')->nullable();
    $table->string('phone')->nullable();
    $table->string('website')->nullable();
    $table->text('description')->nullable();
    $table->string('status')->default('pending'); // pending, active, suspended, rejected
    $table->boolean('is_featured')->default(false);
    $table->timestamps();
});
```

### 7.4. store_branches

```php
Schema::create('store_branches', function (Blueprint $table) {
    $table->id();
    $table->foreignId('store_id')->constrained()->cascadeOnDelete();
    $table->string('name');
    $table->string('address');
    $table->string('city')->default('TP. Hồ Chí Minh');
    $table->string('district')->nullable();
    $table->string('ward')->nullable();
    $table->string('phone')->nullable();
    $table->decimal('latitude', 10, 7)->nullable();
    $table->decimal('longitude', 10, 7)->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### 7.5. store_staff

```php
Schema::create('store_staff', function (Blueprint $table) {
    $table->id();
    $table->foreignId('store_id')->constrained()->cascadeOnDelete();
    $table->foreignId('branch_id')->nullable()->constrained('store_branches')->nullOnDelete();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->string('position')->nullable();
    $table->boolean('can_create_invoice')->default(true);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
    $table->unique(['store_id', 'user_id']);
});
```

### 7.6. green_action_rules

Admin cấu hình điểm tại đây, không hard-code trong service.

```php
Schema::create('green_action_rules', function (Blueprint $table) {
    $table->id();
    $table->string('code')->unique();
    $table->string('name');
    $table->text('description')->nullable();
    $table->integer('points')->default(0);
    $table->decimal('plastic_saved_grams', 10, 2)->default(0);
    $table->decimal('co2_saved_kg', 10, 3)->default(0);
    $table->string('icon')->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

Seed mặc định:

```txt
NO_PLASTIC_CUP     Không dùng ly nhựa              10 điểm
NO_STRAW           Không dùng ống hút              5 điểm
PERSONAL_BOTTLE    Mang bình cá nhân               20 điểm
ECO_PACKAGING      Dùng bao bì thân thiện           10 điểm
CLOTH_BAG          Dùng túi vải                     15 điểm
RECYCLE            Tái chế rác thải                 15 điểm
GREEN_TRANSPORT    Di chuyển xanh                   20 điểm
```

### 7.7. green_invoices

```php
Schema::create('green_invoices', function (Blueprint $table) {
    $table->id();
    $table->foreignId('store_id')->constrained()->cascadeOnDelete();
    $table->foreignId('branch_id')->nullable()->constrained('store_branches')->nullOnDelete();
    $table->foreignId('staff_id')->nullable()->constrained('users')->nullOnDelete();
    $table->string('invoice_code')->unique();
    $table->string('qr_token')->unique();
    $table->decimal('amount', 12, 2)->default(0);
    $table->json('green_actions')->nullable();
    $table->integer('base_points')->default(0);
    $table->decimal('plastic_saved_grams', 10, 2)->default(0);
    $table->decimal('co2_saved_kg', 10, 3)->default(0);
    $table->string('status')->default('pending'); // pending, used, expired, cancelled, suspicious
    $table->timestamp('expired_at')->nullable();
    $table->timestamp('used_at')->nullable();
    $table->foreignId('used_by')->nullable()->constrained('users')->nullOnDelete();
    $table->timestamps();
    $table->index(['status', 'expired_at']);
});
```

### 7.8. green_transactions

```php
Schema::create('green_transactions', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->foreignId('store_id')->nullable()->constrained()->nullOnDelete();
    $table->foreignId('branch_id')->nullable()->constrained('store_branches')->nullOnDelete();
    $table->foreignId('green_invoice_id')->nullable()->constrained()->nullOnDelete();
    $table->string('transaction_code')->unique();
    $table->string('type')->default('invoice_scan');
    $table->integer('points_earned')->default(0);
    $table->decimal('plastic_saved_grams', 10, 2)->default(0);
    $table->decimal('co2_saved_kg', 10, 3)->default(0);
    $table->json('green_actions')->nullable();
    $table->string('status')->default('completed');
    $table->text('note')->nullable();
    $table->timestamps();
    $table->index(['user_id', 'created_at']);
});
```

### 7.9. green_wallets

```php
Schema::create('green_wallets', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
    $table->integer('total_earned')->default(0);
    $table->integer('total_redeemed')->default(0);
    $table->integer('total_adjusted')->default(0);
    $table->integer('current_balance')->default(0);
    $table->timestamps();
});
```

### 7.10. green_points

```php
Schema::create('green_points', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->string('type'); // earn, redeem, refund, adjustment, penalty
    $table->integer('points');
    $table->integer('balance_after')->default(0);
    $table->string('description')->nullable();
    $table->nullableMorphs('pointable');
    $table->timestamps();
    $table->index(['user_id', 'type', 'created_at']);
});
```

### 7.11. green_levels

```php
Schema::create('green_levels', function (Blueprint $table) {
    $table->id();
    $table->string('code')->unique();
    $table->string('name');
    $table->integer('min_score');
    $table->integer('max_score');
    $table->string('icon')->nullable();
    $table->text('benefits')->nullable();
    $table->timestamps();
});
```

Seed levels:

```txt
seed            Seed             0-199
leaf            Leaf             200-399
tree            Tree             400-699
forest          Forest           700-899
net_zero_hero   Net Zero Hero    900-1000
```

### 7.12. green_score_histories

```php
Schema::create('green_score_histories', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->integer('score')->default(0);
    $table->string('level_code')->nullable();
    $table->integer('behavior_score')->default(0);
    $table->integer('consistency_score')->default(0);
    $table->integer('diversity_score')->default(0);
    $table->integer('verification_score')->default(0);
    $table->integer('community_score')->default(0);
    $table->integer('fraud_penalty')->default(0);
    $table->string('reason')->nullable();
    $table->timestamp('calculated_at')->nullable();
    $table->timestamps();
    $table->index(['user_id', 'calculated_at']);
});
```

### 7.13. partners, campaigns, vouchers

```php
Schema::create('partners', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
    $table->string('name');
    $table->string('type')->default('voucher'); // voucher, finance, wallet, brand
    $table->string('email')->nullable();
    $table->string('phone')->nullable();
    $table->string('website')->nullable();
    $table->text('description')->nullable();
    $table->string('status')->default('pending');
    $table->timestamps();
});

Schema::create('campaigns', function (Blueprint $table) {
    $table->id();
    $table->foreignId('partner_id')->nullable()->constrained()->nullOnDelete();
    $table->string('title');
    $table->text('description')->nullable();
    $table->date('start_date')->nullable();
    $table->date('end_date')->nullable();
    $table->decimal('budget', 12, 2)->default(0);
    $table->string('status')->default('draft');
    $table->timestamps();
});

Schema::create('vouchers', function (Blueprint $table) {
    $table->id();
    $table->foreignId('partner_id')->nullable()->constrained()->nullOnDelete();
    $table->foreignId('store_id')->nullable()->constrained()->nullOnDelete();
    $table->foreignId('campaign_id')->nullable()->constrained()->nullOnDelete();
    $table->string('title');
    $table->string('code_prefix')->default('GREEN');
    $table->text('description')->nullable();
    $table->string('category')->default('coffee');
    $table->integer('required_points');
    $table->integer('required_score')->default(0);
    $table->decimal('discount_value', 12, 2)->default(0);
    $table->string('discount_type')->default('fixed');
    $table->integer('quantity')->default(0);
    $table->integer('redeemed_count')->default(0);
    $table->date('expired_at')->nullable();
    $table->boolean('is_active')->default(true);
    $table->string('image')->nullable();
    $table->timestamps();
    $table->index(['is_active', 'expired_at']);
});
```

### 7.14. voucher_redemptions

```php
Schema::create('voucher_redemptions', function (Blueprint $table) {
    $table->id();
    $table->foreignId('voucher_id')->constrained()->cascadeOnDelete();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->string('redeem_code')->unique();
    $table->integer('points_spent');
    $table->string('status')->default('issued'); // issued, used, expired, cancelled
    $table->timestamp('used_at')->nullable();
    $table->timestamp('expired_at')->nullable();
    $table->timestamps();
    $table->index(['user_id', 'status']);
});
```

### 7.15. Net Zero tables

```php
Schema::create('net_zero_goals', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->string('month'); // YYYY-MM
    $table->decimal('target_plastic_grams', 10, 2)->default(1000);
    $table->decimal('target_co2_kg', 10, 3)->default(5);
    $table->integer('target_green_actions')->default(20);
    $table->integer('target_points')->default(300);
    $table->timestamps();
    $table->unique(['user_id', 'month']);
});

Schema::create('net_zero_progress', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->string('month');
    $table->decimal('plastic_saved_grams', 10, 2)->default(0);
    $table->decimal('co2_saved_kg', 10, 3)->default(0);
    $table->integer('green_actions_count')->default(0);
    $table->integer('points_earned')->default(0);
    $table->timestamps();
    $table->unique(['user_id', 'month']);
});

Schema::create('personal_recommendations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->string('type')->default('rule_based');
    $table->string('title');
    $table->text('description');
    $table->string('action_code')->nullable();
    $table->integer('estimated_points')->default(0);
    $table->boolean('is_completed')->default(false);
    $table->timestamp('completed_at')->nullable();
    $table->timestamps();
});
```

### 7.16. fraud tables

```php
Schema::create('fraud_rules', function (Blueprint $table) {
    $table->id();
    $table->string('code')->unique();
    $table->string('name');
    $table->text('description')->nullable();
    $table->integer('risk_score')->default(10);
    $table->json('config')->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});

Schema::create('fraud_alerts', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
    $table->foreignId('green_invoice_id')->nullable()->constrained()->nullOnDelete();
    $table->string('alert_type');
    $table->text('description')->nullable();
    $table->integer('risk_score')->default(0);
    $table->string('status')->default('open'); // open, reviewed, dismissed, confirmed
    $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
    $table->timestamp('reviewed_at')->nullable();
    $table->timestamps();
    $table->index(['status', 'created_at']);
});
```

### 7.17. logs/settings

```php
Schema::create('activity_logs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
    $table->string('action');
    $table->string('module')->nullable();
    $table->text('description')->nullable();
    $table->json('properties')->nullable();
    $table->string('ip_address')->nullable();
    $table->string('user_agent')->nullable();
    $table->timestamps();
    $table->index(['user_id', 'created_at']);
});

Schema::create('system_settings', function (Blueprint $table) {
    $table->id();
    $table->string('key')->unique();
    $table->text('value')->nullable();
    $table->string('type')->default('string');
    $table->string('group')->default('general');
    $table->timestamps();
});
```

## 8. Model relationships cần có

### User

```php
public function profile() { return $this->hasOne(UserProfile::class); }
public function wallet() { return $this->hasOne(GreenWallet::class); }
public function points() { return $this->hasMany(GreenPoint::class); }
public function transactions() { return $this->hasMany(GreenTransaction::class); }
public function scoreHistories() { return $this->hasMany(GreenScoreHistory::class); }
public function voucherRedemptions() { return $this->hasMany(VoucherRedemption::class); }
public function recommendations() { return $this->hasMany(PersonalRecommendation::class); }
```

Accessor:

```php
public function getCurrentGreenScoreAttribute(): int
{
    return $this->scoreHistories()->latest('calculated_at')->value('score') ?? 0;
}
```

### Store

```php
public function owner() { return $this->belongsTo(User::class, 'owner_id'); }
public function branches() { return $this->hasMany(StoreBranch::class); }
public function staff() { return $this->hasMany(StoreStaff::class); }
public function invoices() { return $this->hasMany(GreenInvoice::class); }
public function vouchers() { return $this->hasMany(Voucher::class); }
```

### GreenInvoice

```php
public function store() { return $this->belongsTo(Store::class); }
public function branch() { return $this->belongsTo(StoreBranch::class, 'branch_id'); }
public function staff() { return $this->belongsTo(User::class, 'staff_id'); }
public function usedBy() { return $this->belongsTo(User::class, 'used_by'); }
public function transaction() { return $this->hasOne(GreenTransaction::class); }
```

### Voucher

```php
public function partner() { return $this->belongsTo(Partner::class); }
public function store() { return $this->belongsTo(Store::class); }
public function campaign() { return $this->belongsTo(Campaign::class); }
public function redemptions() { return $this->hasMany(VoucherRedemption::class); }
```

## 9. Service logic chi tiết

### 9.1. GreenPointService

File: `app/Services/GreenPointService.php`

Nhiệm vụ:

- Tạo ví nếu chưa có.
- Cộng điểm.
- Trừ điểm.
- Hoàn điểm.
- Điều chỉnh điểm.
- Ghi `green_points`.
- Cập nhật `green_wallets`.
- Luôn chạy trong DB transaction.

Methods:

```php
public function ensureWallet(User $user): GreenWallet;
public function balance(User $user): int;
public function earn(User $user, int $points, string $description, ?Model $pointable = null): GreenPoint;
public function redeem(User $user, int $points, string $description, ?Model $pointable = null): GreenPoint;
public function refund(User $user, int $points, string $description, ?Model $pointable = null): GreenPoint;
public function adjust(User $user, int $points, string $description, ?Model $pointable = null): GreenPoint;
```

Quy tắc:

- `earn`: điểm dương.
- `redeem`: lưu points âm.
- Không cho redeem nếu balance không đủ.
- `balance_after` phải chính xác.

### 9.2. GreenScoreService

File: `app/Services/GreenScoreService.php`

Công thức:

```txt
Green Score =
Behavior Score     tối đa 400
Consistency Score  tối đa 200
Diversity Score    tối đa 150
Verification Score tối đa 150
Community Score    tối đa 100
- Fraud Penalty    tối đa 300
```

Cách tính MVP:

```txt
Behavior Score:
min(total_points_90_days / 1000 * 400, 400)

Consistency Score:
min(active_days_30 / 20 * 200, 200)

Diversity Score:
min(unique_action_codes_90_days / 6 * 150, 150)

Verification Score:
valid_invoice_transactions / total_transactions * 150

Community Score:
min(total_transactions / 30 * 100, 100)

Fraud Penalty:
min(sum_open_or_confirmed_risk_score_90_days, 300)
```

Methods:

```php
public function recalculate(User $user, string $reason = 'system'): GreenScoreHistory;
public function getLevelByScore(int $score): ?GreenLevel;
public function getCurrentScore(User $user): int;
public function getCurrentLevel(User $user): ?GreenLevel;
```

Luôn clamp score từ 0 đến 1000.

### 9.3. QrInvoiceService

File: `app/Services/QrInvoiceService.php`

Methods:

```php
public function createInvoice(Store $store, ?StoreBranch $branch, User $staff, array $data): GreenInvoice;
public function generateQrToken(): string;
public function calculateFromActions(array $actionCodes): array;
public function validateToken(string $token, User $user): GreenInvoice;
public function redeemInvoice(string $token, User $user): GreenTransaction;
```

`calculateFromActions()` trả về:

```php
[
    'points' => 45,
    'plastic_saved_grams' => 28.00,
    'co2_saved_kg' => 0.205,
    'actions' => [
        ['code' => 'NO_STRAW', 'name' => 'Không dùng ống hút'],
    ],
]
```

`redeemInvoice()` bắt buộc:

- Dùng DB transaction.
- Lock invoice bằng `lockForUpdate()`.
- Check status pending.
- Check chưa hết hạn.
- Check chưa used.
- Gọi FraudDetectionService.
- Tạo GreenTransaction.
- Gọi GreenPointService->earn.
- Cập nhật invoice `used`, `used_at`, `used_by`.
- Cập nhật Net Zero progress.
- Gọi GreenScoreService->recalculate.
- Ghi activity log.

### 9.4. VoucherService

Methods:

```php
public function canRedeem(User $user, Voucher $voucher): bool;
public function redeem(User $user, Voucher $voucher): VoucherRedemption;
public function generateRedeemCode(Voucher $voucher): string;
```

Validation:

- Voucher active.
- Chưa hết hạn.
- Còn số lượng.
- User đủ Green Points.
- User đủ `required_score`.
- Lock voucher row khi redeem.
- Tăng `redeemed_count`.
- Trừ điểm bằng `GreenPointService`.

### 9.5. FraudDetectionService

Methods:

```php
public function inspectInvoiceScan(User $user, GreenInvoice $invoice): array;
public function createAlert(?User $user, ?GreenInvoice $invoice, string $type, string $description, int $riskScore): FraudAlert;
```

Rules MVP:

- QR đã dùng: chặn.
- QR hết hạn: chặn.
- User quét hơn 10 hóa đơn/ngày: cảnh báo/chặn.
- User quét cùng store hơn 5 lần/giờ: cảnh báo.
- Token không tồn tại: cảnh báo `invalid_qr`.

Return format:

```php
[
    'allowed' => true,
    'risk_score' => 0,
    'messages' => [],
]
```

### 9.6. NetZeroRecommendationService

Rule-based, không cần AI thật.

Gợi ý:

- Nếu nhựa giảm dưới 50% mục tiêu tháng: “Mang bình cá nhân thêm 3 lần trong tuần này.”
- Nếu CO2 giảm thấp: “Đi bộ hoặc đi xe đạp cho quãng đường dưới 2km.”
- Nếu hành động xanh ít đa dạng: “Thử thêm hành động tái chế hoặc dùng túi vải.”
- Nếu gần lên cấp: “Bạn cần thêm X điểm để lên cấp tiếp theo.”

### 9.7. AnalyticsService

Methods:

```php
public function adminOverview(): array;
public function userDashboard(User $user): array;
public function storeDashboard(Store $store): array;
public function partnerDashboard(Partner $partner): array;
public function greenScoreTrend(User $user, int $months = 6): array;
public function transactionsTrend(?Store $store = null, int $days = 30): array;
```

## 10. Routes cần tạo

```php
Route::get('/', HomePage::class)->name('home');
Route::get('/features', FeaturesPage::class)->name('features');
Route::get('/green-score-info', GreenScoreInfoPage::class)->name('green-score.info');
Route::get('/partner-stores', PartnerStoresPage::class)->name('partner-stores');
Route::get('/about', AboutPage::class)->name('about');
Route::get('/contact', ContactPage::class)->name('contact');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', UserDashboard::class)->name('dashboard');
    Route::get('/onboarding', OnboardingPage::class)->name('onboarding');
    Route::get('/scan-qr/{token?}', ScanQrPage::class)->name('user.scan-qr');
    Route::get('/wallet', WalletPage::class)->name('user.wallet');
    Route::get('/vouchers', VoucherMarketplacePage::class)->name('user.vouchers');
    Route::get('/green-score', UserGreenScorePage::class)->name('user.green-score');
    Route::get('/net-zero-planner', NetZeroPlannerPage::class)->name('user.net-zero');
    Route::get('/transactions', UserTransactionsPage::class)->name('user.transactions');
});

Route::middleware(['auth', 'role:store_owner|store_staff|super_admin'])
    ->prefix('store')->name('store.')->group(function () {
        Route::get('/dashboard', StoreDashboard::class)->name('dashboard');
        Route::get('/branches', StoreBranchesPage::class)->name('branches');
        Route::get('/staff', StoreStaffPage::class)->name('staff');
        Route::get('/invoices', StoreInvoicesPage::class)->name('invoices');
        Route::get('/invoices/create', CreateGreenInvoicePage::class)->name('invoices.create');
        Route::get('/reports', StoreReportsPage::class)->name('reports');
    });

Route::middleware(['auth', 'role:partner|super_admin'])
    ->prefix('partner')->name('partner.')->group(function () {
        Route::get('/dashboard', PartnerDashboard::class)->name('dashboard');
        Route::get('/campaigns', PartnerCampaignsPage::class)->name('campaigns');
        Route::get('/vouchers', PartnerVouchersPage::class)->name('vouchers');
        Route::get('/financial-offers', PartnerFinancialOffersPage::class)->name('financial-offers');
        Route::get('/reports', PartnerReportsPage::class)->name('reports');
    });

Route::middleware(['auth', 'role:admin|super_admin'])
    ->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
        Route::get('/users', AdminUsersPage::class)->name('users');
        Route::get('/stores', AdminStoresPage::class)->name('stores');
        Route::get('/partners', AdminPartnersPage::class)->name('partners');
        Route::get('/green-action-rules', AdminGreenActionRulesPage::class)->name('green-action-rules');
        Route::get('/vouchers', AdminVouchersPage::class)->name('vouchers');
        Route::get('/transactions', AdminTransactionsPage::class)->name('transactions');
        Route::get('/fraud-alerts', AdminFraudAlertsPage::class)->name('fraud-alerts');
        Route::get('/reports', AdminReportsPage::class)->name('reports');
        Route::get('/settings', AdminSettingsPage::class)->name('settings');
    });
```

## 11. Livewire components cần tạo

```txt
Public/HomePage
Public/FeaturesPage
Public/GreenScoreInfoPage
Public/PartnerStoresPage
Public/AboutPage
Public/ContactPage

User/UserDashboard
User/OnboardingPage
User/ScanQrPage
User/WalletPage
User/VoucherMarketplacePage
User/UserGreenScorePage
User/NetZeroPlannerPage
User/UserTransactionsPage

Store/StoreDashboard
Store/StoreBranchesPage
Store/StoreStaffPage
Store/StoreInvoicesPage
Store/CreateGreenInvoicePage
Store/StoreReportsPage

Partner/PartnerDashboard
Partner/PartnerCampaignsPage
Partner/PartnerVouchersPage
Partner/PartnerFinancialOffersPage
Partner/PartnerReportsPage

Admin/AdminDashboard
Admin/AdminUsersPage
Admin/AdminStoresPage
Admin/AdminPartnersPage
Admin/AdminGreenActionRulesPage
Admin/AdminVouchersPage
Admin/AdminTransactionsPage
Admin/AdminFraudAlertsPage
Admin/AdminReportsPage
Admin/AdminSettingsPage
```

## 12. UI/UX yêu cầu

Phong cách giao diện:

- Nền trắng/xanh nhạt.
- Card bo góc 2xl/3xl.
- Shadow nhẹ.
- Màu chính xanh lá.
- Nhiều KPI card, chart, stepper, dashboard.
- Copy tiếng Việt.

Tailwind màu đề xuất:

```js
colors: {
  greenCredit: {
    50: '#F0FDF4',
    100: '#DCFCE7',
    200: '#BBF7D0',
    300: '#86EFAC',
    400: '#4ADE80',
    500: '#22C55E',
    600: '#16A34A',
    700: '#15803D',
    800: '#166534',
    900: '#14532D',
  }
}
```

Component Blade dùng lại:

```txt
components/public-layout.blade.php
components/dashboard-layout.blade.php
components/stat-card.blade.php
components/feature-card.blade.php
components/green-button.blade.php
components/form-input.blade.php
components/status-badge.blade.php
components/modal.blade.php
components/table.blade.php
components/empty-state.blade.php
```

## 13. Trang cần code chi tiết

### 13.1. Trang chủ `/`

Sections:

- Navbar.
- Hero: “Sống xanh, tích điểm thông minh”.
- Dashboard preview.
- Metrics: users, stores, points, plastic saved.
- Tính năng nổi bật.
- Cách Green Credit hoạt động.
- Green Score tiers.
- Báo cáo tiêu dùng xanh preview.
- Dành cho cửa hàng và đối tác.
- CTA cuối trang.
- Footer.

### 13.2. Onboarding `/onboarding`

- Stepper 4 bước:
  1. Tạo tài khoản/hồ sơ
  2. Chọn mục tiêu xanh
  3. Liên kết ví mô phỏng
  4. Hoàn tất hồ sơ
- Form profile.
- Select green goals.
- Tạo wallet nếu chưa có.
- Tạo net zero goal tháng hiện tại.

### 13.3. Scan QR `/scan-qr/{token?}`

- Input QR token.
- Chấp nhận token raw, `GREEN-CREDIT:{token}`, hoặc URL có token.
- Submit gọi `QrInvoiceService->redeemInvoice()`.
- Success card hiển thị điểm, CO2, nhựa, hành động xanh.
- Error card hiển thị lỗi tiếng Việt.

### 13.4. Wallet/Vouchers `/wallet`, `/vouchers`

- Balance.
- Green Score.
- Recent point history.
- Voucher marketplace.
- Filter/search voucher.
- Redeem modal.
- Suggested offers.
- Redemption history.

### 13.5. Green Score `/green-score`

- Circular gauge.
- Current level.
- Score trend chart.
- CO2 chart.
- Plastic chart.
- Action ratio donut.
- Top habits.
- Net Zero roadmap.
- Monthly goals.
- Recommendations.
- Leaderboard.
- Milestones.

### 13.6. Store portal

- Dashboard KPI.
- Branch CRUD.
- Staff CRUD.
- Invoice list.
- Create invoice + QR.
- Reports.

### 13.7. Admin portal

- Admin dashboard.
- Users management.
- Stores management.
- Partners management.
- Green action rules CRUD.
- Vouchers management.
- Transactions table.
- Fraud alerts review.
- Reports.
- Settings.

### 13.8. Partner portal

- Partner dashboard.
- Campaign CRUD.
- Voucher CRUD.
- Financial offers simulation.
- Reports.

## 14. QR Code rule

QR có thể chứa:

```txt
GREEN-CREDIT:{qr_token}
```

Hoặc URL:

```txt
/scan-qr/{qr_token}
```

Khi parse token, support cả hai.

Hiển thị QR bằng:

```php
{!! QrCode::size(220)->generate(route('user.scan-qr', ['token' => $invoice->qr_token])) !!}
```

## 15. Seeder demo

Tạo seeders:

```txt
RolePermissionSeeder
GreenLevelSeeder
GreenActionRuleSeeder
DemoUserSeeder
DemoStoreSeeder
DemoPartnerSeeder
DemoVoucherSeeder
DemoTransactionSeeder
DatabaseSeeder
```

Tài khoản demo:

```txt
superadmin@greencredit.test / password / super_admin
admin@greencredit.test      / password / admin
storeowner@greencredit.test / password / store_owner
staff@greencredit.test      / password / store_staff
partner@greencredit.test    / password / partner
user@greencredit.test       / password / user
```

Demo stores:

```txt
Lá Xanh Coffee
The Green House
EcoShop
Leafy Cafe
Organic Food Store
Xanh Market
```

Tạo dữ liệu demo:

- 100 users.
- 10 stores.
- 20 branches.
- 300 green invoices.
- 200 transactions.
- 20 vouchers.
- 30 redemptions.
- 10 fraud alerts.
- Score history cho user demo.

## 16. Validation và lỗi tiếng Việt

Thông báo lỗi:

```txt
Mã QR không hợp lệ.
Hóa đơn này đã được sử dụng.
Hóa đơn đã hết hạn.
Bạn đã vượt quá số lần quét trong ngày.
Số dư Green Points không đủ.
Voucher đã hết hạn hoặc hết lượt đổi.
Bạn không có quyền thực hiện thao tác này.
```

## 17. Security rules

- User chỉ xem dữ liệu của chính mình.
- Store staff chỉ xem store/branch được gán.
- Partner chỉ xem voucher/campaign của mình.
- Admin xem toàn hệ thống.
- Không cho user tự cộng điểm.
- Không cho scan invoice đã used.
- Không cho redeem voucher làm âm ví.
- Giao dịch điểm/voucher/invoice dùng DB transaction.
- Ghi activity log cho thao tác quan trọng.

## 18. Activity logs

Ghi log cho:

- login
- create invoice
- scan invoice
- redeem voucher
- admin update green action rule
- review fraud alert
- create campaign
- create voucher

## 19. Tests bắt buộc

Tạo tests:

```txt
tests/Feature/QrInvoiceScanTest.php
tests/Feature/VoucherRedemptionTest.php
tests/Feature/GreenPointServiceTest.php
tests/Feature/GreenScoreServiceTest.php
tests/Feature/RoleAccessTest.php
tests/Feature/FraudDetectionTest.php
```

Test cases:

- Scan invoice pending thành công.
- Scan invoice used bị lỗi.
- Scan invoice expired bị lỗi.
- Scan token không tồn tại bị lỗi.
- Balance tăng sau scan.
- Green Score được cập nhật.
- Redeem voucher đủ điểm thành công.
- Redeem thiếu điểm bị lỗi.
- Role user không vào được admin.
- Store staff không xem store khác.

## 20. Command checklist

Tạo model + migration:

```bash
php artisan make:model UserProfile -m
php artisan make:model Store -m
php artisan make:model StoreBranch -m
php artisan make:model StoreStaff -m
php artisan make:model GreenActionRule -m
php artisan make:model GreenInvoice -m
php artisan make:model GreenTransaction -m
php artisan make:model GreenWallet -m
php artisan make:model GreenPoint -m
php artisan make:model GreenLevel -m
php artisan make:model GreenScoreHistory -m
php artisan make:model Partner -m
php artisan make:model Campaign -m
php artisan make:model Voucher -m
php artisan make:model VoucherRedemption -m
php artisan make:model FinancialOffer -m
php artisan make:model FinancialApplication -m
php artisan make:model NetZeroGoal -m
php artisan make:model NetZeroProgress -m
php artisan make:model PersonalRecommendation -m
php artisan make:model FraudRule -m
php artisan make:model FraudAlert -m
php artisan make:model ActivityLog -m
```

Tạo Livewire:

```bash
php artisan make:livewire Public/HomePage
php artisan make:livewire User/UserDashboard
php artisan make:livewire User/ScanQrPage
php artisan make:livewire User/WalletPage
php artisan make:livewire User/UserGreenScorePage
php artisan make:livewire Store/StoreDashboard
php artisan make:livewire Store/CreateGreenInvoicePage
php artisan make:livewire Admin/AdminDashboard
php artisan make:livewire Partner/PartnerDashboard
```

Sau khi code:

```bash
php artisan migrate:fresh --seed
php artisan test
npm run build
```

## 21. Definition of Done

Dự án hoàn chỉnh khi:

- [ ] Chạy được `php artisan migrate:fresh --seed`.
- [ ] Đăng nhập được tài khoản demo.
- [ ] Role redirect đúng portal.
- [ ] Store tạo được hóa đơn QR.
- [ ] User quét QR nhận Green Points.
- [ ] QR đã dùng không scan lại được.
- [ ] Wallet balance đúng.
- [ ] User đổi voucher được.
- [ ] Green Score cập nhật.
- [ ] Admin xem được dashboard/fraud alerts.
- [ ] Partner tạo được voucher/campaign.
- [ ] Dashboard có chart từ database.
- [ ] Có test quan trọng pass.
- [ ] UI theo style Green Credit xanh/trắng, card bo góc, hiện đại.

## 22. Không làm thật trong MVP

Không tích hợp thật:

- Ngân hàng thật.
- Ví điện tử thật.
- AI thật.
- Blockchain thật.
- Mobile app native.
- Microservices.

Có thể mô phỏng:

- Liên kết ví.
- Đối tác tài chính giảm lãi suất.
- AI recommendation bằng rule-based.
- QR camera nếu còn thời gian.

## 23. README cần tạo kèm

Tạo `README.md` gồm:

- Giới thiệu dự án.
- Tech stack.
- Cách cài đặt.
- Cấu hình `.env`.
- Lệnh migrate seed.
- Tài khoản demo.
- Các module chính.
- Luồng hoạt động.
- Screenshot/mockup.
- Hướng phát triển.

## 24. Lưu ý cuối cho AI coding agent

Nếu project đã tồn tại, hãy kiểm tra cấu trúc trước khi ghi đè.  
Nếu thiếu package, cài package.  
Nếu Laravel/Livewire version khác, điều chỉnh syntax cho tương thích.  
Sau mỗi phase, chạy test hoặc ít nhất kiểm tra syntax.  
Không bỏ qua flow lõi: **Store tạo QR → User quét QR → Cộng điểm → Cập nhật Green Score → Đổi voucher → Admin báo cáo.**
