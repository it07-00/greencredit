# Green Credit Platform

Green Credit Platform là đồ án mô phỏng nền tảng tích điểm, chấm điểm và phân tích hành vi tiêu dùng xanh dựa trên QR Code. Cửa hàng tạo hóa đơn xanh, người dùng quét QR để nhận Green Points, theo dõi Green Wallet, Green Score, Net Zero Planner và đổi voucher.

> Do phạm vi đồ án, các cửa hàng, voucher, ví điện tử và đối tác tài chính trong hệ thống được xây dựng bằng dữ liệu giả lập để minh họa đầy đủ luồng nghiệp vụ. Hệ thống chưa tích hợp API thật từ ngân hàng, ví điện tử hoặc thương hiệu thương mại.

## Stack

- Laravel 13, PHP 8.3
- Livewire 4, Filament 5, Blade, Tailwind CSS
- SQLite local mac dinh, co the doi sang MySQL trong `.env`
- Eloquent ORM, Service classes, Middleware role
- Vite, Tailwind CSS 4 và Chart.js cho giao diện dashboard

## Tinh nang chinh

- Auth co ban: dang ky, dang nhap, dang xuat.
- Phan quyen: `super_admin`, `admin`, `user`, `store_owner`, `store_staff`, `partner`.
- Store portal: dashboard, branch/staff list, tao hoa don xanh, sinh QR token, xem hoa don.
- User portal: dashboard, scan QR, Green Wallet, voucher marketplace, My Vouchers, Green Score, Net Zero Planner, transaction history, profile.
- Partner portal: dashboard, vouchers, campaigns, financial offers, reports.
- Admin portal Filament tại `/admin`: dashboard thống kê; CRUD users, stores, partners, green action rules, vouchers, fraud alerts, settings; giao dịch và activity logs ở chế độ chỉ đọc.
- Service nghiep vu: QR invoice, point ledger, score engine, voucher redemption, fraud detection, net-zero recommendations, analytics.
- Seeder demo day du: users, stores, branches, staff, invoices, transactions, wallets, score histories, vouchers, fraud alerts.

## Cai dat

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm run build
php artisan serve
```

Neu dung Laragon/Windows trong repo nay:

```powershell
& 'C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe' 'C:\laragon\bin\composer\composer.phar' install --no-interaction --prefer-dist
npm.cmd install
& 'C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe' artisan migrate:fresh --seed
npm.cmd run build
& 'C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe' artisan serve
```

## Tai khoan demo

Tat ca dung mat khau: `password`

- `superadmin@greencredit.test` / super_admin
- `admin@greencredit.test` / admin
- `storeowner1@greencredit.test` / store_owner
- `storeowner2@greencredit.test` / store_owner
- `staff1@greencredit.test` / store_staff
- `staff2@greencredit.test` / store_staff
- `partner1@greencredit.test` / partner voucher
- `partner2@greencredit.test` / partner tài chính
- `user1@greencredit.test` den `user5@greencredit.test` / user

## Luong nghiep vu chinh

1. Đăng nhập `staff1@greencredit.test`.
2. Vao `/store/invoices/create`, chon chi nhanh, nhap so tien, tick hanh dong xanh.
3. Tao hoa don va copy `qr_token`.
4. Dang nhap `user@greencredit.test`.
5. Vao `/scan-qr`, nhap token va xac thuc.
6. Kiem tra `/wallet`, `/green-score/dashboard`, `/transactions`.
7. Vao `/vouchers/marketplace` de doi voucher.
8. Đăng nhập admin và mở Filament tại `/admin`, sau đó quản lý tài nguyên trong thanh điều hướng.

## Cau truc thu muc

- `app/Models`: cac model va relationship chinh.
- `app/Services`: business logic QR, diem, score, voucher, fraud, net-zero, analytics.
- `app/Livewire`: page components theo Public/User/Store/Partner.
- `app/Filament`: panel quản trị, Resources, Schemas, Tables và Widgets.
- `resources/views/livewire`: Blade views cho Livewire.
- `database/migrations`: schema Green Credit.
- `database/seeders/DatabaseSeeder.php`: du lieu demo.
- `tests/Feature/GreenCreditFlowTest.php`: test flow loi.

## Test

```bash
php artisan test
```

Hien co test cho wallet auto-create, store staff tao invoice, scan QR thanh cong, scan QR used/expired, voucher redemption, middleware role, store staff khong xem invoice cua store khac va Green Score nam trong 0-1000.

## Phan mo phong

- QR hiển thị bằng token để dễ trình bày, không dùng camera scanner thật.
- Lá Xanh Coffee, Eco Milk Tea, Green Mart, Organic Food Corner và The Green House đều là thương hiệu giả lập.
- Eco Voucher Partner, Green Finance Partner và Eco Wallet Simulation Partner đều là đối tác giả lập.
- Financial offers chỉ mô phỏng ưu đãi theo Green Score, không kết nối ngân hàng hoặc xét duyệt khoản vay thật.
- Recommendations dùng luật nghiệp vụ, không sử dụng AI thật.

## Khả năng tích hợp trong tương lai

- API hóa đơn/POS từ cửa hàng thật.
- QR scanner bằng camera và chữ ký số chống giả mạo.
- API voucher từ thương hiệu đối tác.
- Ví điện tử hoặc ngân hàng sau khi đáp ứng yêu cầu pháp lý và bảo mật.
- Hệ thống gợi ý thông minh dựa trên dữ liệu hành vi đã được người dùng đồng ý.

## Screenshot placeholders

- `docs/screenshots/landing.png`
- `docs/screenshots/user-dashboard.png`
- `docs/screenshots/store-create-invoice.png`
- `docs/screenshots/admin-dashboard.png`

## Ghi chu do an

Du an tap trung vao flow loi: Store tao QR -> User quet QR -> cong diem -> cap nhat Green Score -> doi voucher -> Admin xem bao cao/canh bao. Cac CRUD phu duoc trien khai o dang dashboard/bang quan tri co du lieu that de de mo rong tiep.
