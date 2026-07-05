Bạn là senior full-stack Laravel engineer. Hãy code hoàn chỉnh một dự án web app tên **Green Credit Platform** bằng **Laravel + Livewire + Tailwind CSS + MySQL**.

Mục tiêu: Xây dựng một hệ thống lớn dạng platform để quản lý, tích điểm, chấm điểm và phân tích hành vi tiêu dùng xanh. Hệ thống có nhiều vai trò: người dùng, cửa hàng đối tác, nhân viên cửa hàng, đối tác voucher/tài chính, admin và super admin.

Yêu cầu chung:

1. Không chỉ tạo demo giao diện tĩnh. Phải tạo đầy đủ migration, model, relationship, service, policy/middleware, Livewire component, Blade view, route, seeder và dữ liệu mẫu.
2. Code phải chạy được sau khi cài đặt dependencies, migrate và seed.
3. Ưu tiên code sạch, dễ bảo trì, chia service rõ ràng.
4. Dùng Laravel + Livewire cho toàn bộ giao diện động.
5. Dùng Tailwind CSS cho UI.
6. Giao diện tiếng Việt.
7. Thiết kế theo phong cách hiện đại, xanh, sạch, nhiều card/dashboard, phù hợp đồ án cuối khóa.
8. Có phân quyền theo vai trò.
9. Có dashboard riêng cho từng nhóm người dùng.
10. Không bỏ qua phần nghiệp vụ quan trọng: QR hóa đơn xanh, ví điểm, Green Score, voucher, Net Zero Planner, báo cáo, phát hiện gian lận cơ bản.

STACK KỸ THUẬT:

* Laravel latest stable version phù hợp với repository hiện tại.
* PHP 8.2 hoặc cao hơn nếu môi trường hỗ trợ.
* Livewire.
* Tailwind CSS.
* MySQL hoặc SQLite cho local development.
* Laravel Breeze hoặc auth mặc định tương đương.
* Dùng Eloquent ORM.
* Dùng Laravel validation, policies/middleware, service classes.
* Có thể dùng package QR code nếu cần, ví dụ simplesoftwareio/simple-qrcode hoặc package tương đương.
* Có thể dùng Chart.js cho biểu đồ.
* Có thể dùng Alpine.js nếu cần tương tác nhỏ.
* Không dùng React/Vue nếu không thật sự cần.

TÊN DỰ ÁN:

Green Credit Platform – Hệ thống tích điểm, chấm điểm và phân tích hành vi tiêu dùng xanh dựa trên QR Code.

MÔ TẢ NGHIỆP VỤ:

Green Credit là nền tảng giúp người trẻ tích Green Points từ hành vi tiêu dùng bền vững như không dùng ly nhựa, không dùng ống hút, mang bình cá nhân, sử dụng bao bì sinh học, đi lại xanh, tái chế rác thải. Người dùng quét QR trên hóa đơn xanh do cửa hàng đối tác tạo để nhận điểm. Điểm được cộng vào Green Wallet, có thể dùng để đổi voucher, theo dõi Green Score và xây dựng lộ trình Net Zero cá nhân.

VAI TRÒ NGƯỜI DÙNG:

1. super_admin

   * Toàn quyền hệ thống.
   * Quản lý admin, users, stores, partners, point rules, vouchers, transactions, fraud alerts, settings.

2. admin

   * Quản lý người dùng, cửa hàng, voucher, báo cáo, cảnh báo gian lận.
   * Không được xóa super_admin.

3. user

   * Xem dashboard cá nhân.
   * Quét QR hóa đơn xanh.
   * Xem Green Wallet.
   * Đổi voucher.
   * Xem Green Score.
   * Xem lộ trình Net Zero.
   * Xem lịch sử điểm.

4. store_owner

   * Quản lý cửa hàng/chuỗi cửa hàng của mình.
   * Quản lý chi nhánh.
   * Quản lý nhân viên cửa hàng.
   * Xem báo cáo cửa hàng.
   * Tạo hóa đơn xanh hoặc cho nhân viên tạo.

5. store_staff

   * Tạo hóa đơn xanh.
   * Sinh QR hóa đơn.
   * Xem danh sách hóa đơn đã tạo.
   * Không được xem dữ liệu cửa hàng khác.

6. partner

   * Quản lý chiến dịch ưu đãi.
   * Tạo voucher.
   * Xem lượt đổi voucher.
   * Xem báo cáo hiệu quả chiến dịch.
   * Có thể tạo mô phỏng ưu đãi tài chính dựa trên Green Score.

MODULE CHÍNH:

1. Authentication & Authorization
2. User Profile
3. Role Management
4. Store Management
5. Branch Management
6. Store Staff Management
7. Green Action Rules
8. Green Invoice & QR System
9. QR Verification
10. Green Transaction
11. Green Points Ledger
12. Green Wallet
13. Green Score Engine
14. Green Level System
15. Voucher & Reward System
16. Voucher Redemption
17. Partner Campaigns
18. Financial Offer Simulation
19. Net Zero Planner
20. Personal Recommendation
21. Fraud Detection
22. Notifications
23. Activity Logs
24. Admin Reports
25. Store Reports
26. Partner Reports
27. User Dashboard
28. Public Landing Pages

DATABASE SCHEMA CẦN TẠO:

Tạo đầy đủ migrations cho các bảng sau:

1. users

* id
* name
* email
* password
* phone nullable
* avatar nullable
* role enum: super_admin, admin, user, store_owner, store_staff, partner
* status enum: active, inactive, banned
* email_verified_at nullable
* remember_token
* timestamps

2. user_profiles

* id
* user_id
* date_of_birth nullable
* gender nullable
* address nullable
* city nullable
* district nullable
* bio nullable
* green_interests json nullable
* onboarding_completed boolean default false
* timestamps

3. stores

* id
* owner_id references users
* name
* brand nullable
* type enum: cafe, milk_tea, restaurant, supermarket, convenience_store, other
* tax_code nullable
* email nullable
* phone nullable
* address nullable
* city nullable
* district nullable
* description nullable
* logo nullable
* status enum: pending, active, suspended, rejected
* is_active boolean default true
* timestamps

4. store_branches

* id
* store_id
* name
* address
* city nullable
* district nullable
* phone nullable
* manager_name nullable
* is_active boolean default true
* timestamps

5. store_staff

* id
* store_id
* branch_id nullable
* user_id
* position nullable
* is_active boolean default true
* timestamps

6. partners

* id
* user_id
* name
* type enum: voucher, financial, wallet, media, other
* contact_email nullable
* contact_phone nullable
* address nullable
* description nullable
* logo nullable
* status enum: pending, active, suspended, rejected
* timestamps

7. green_action_rules

* id
* code unique
* name
* description nullable
* points integer
* plastic_saved_grams decimal default 0
* co2_saved_kg decimal default 0
* category enum: plastic_reduction, transport, recycling, energy, food, other
* daily_limit nullable
* is_active boolean default true
* timestamps

Dữ liệu mẫu:

* NO_PLASTIC_CUP: Không dùng ly nhựa, 10 điểm
* NO_STRAW: Không dùng ống hút, 5 điểm
* PERSONAL_BOTTLE: Mang bình cá nhân, 20 điểm
* ECO_PACKAGING: Dùng bao bì sinh học, 10 điểm
* REUSABLE_BAG: Dùng túi tái sử dụng, 15 điểm
* GREEN_TRANSPORT: Di chuyển xanh, 20 điểm
* RECYCLE_WASTE: Tái chế rác thải, 15 điểm
* SAVE_ENERGY: Tiết kiệm năng lượng, 10 điểm

8. green_invoices

* id
* store_id
* branch_id nullable
* staff_id nullable references users
* invoice_code unique
* qr_token unique
* amount decimal
* payment_method nullable
* customer_note nullable
* eco_actions json
* base_points integer default 0
* plastic_saved_grams decimal default 0
* co2_saved_kg decimal default 0
* status enum: pending, used, expired, cancelled, suspicious
* expired_at nullable
* used_at nullable
* used_by nullable references users
* timestamps

9. green_invoice_items

* id
* green_invoice_id
* green_action_rule_id
* points
* plastic_saved_grams
* co2_saved_kg
* timestamps

10. green_transactions

* id
* user_id
* store_id nullable
* branch_id nullable
* green_invoice_id nullable
* transaction_code unique
* type enum: invoice_scan, manual_action, voucher_redeem, adjustment, refund, penalty
* points integer
* plastic_saved_grams decimal default 0
* co2_saved_kg decimal default 0
* description nullable
* status enum: pending, approved, rejected, cancelled, suspicious
* metadata json nullable
* timestamps

11. green_wallets

* id
* user_id unique
* total_earned integer default 0
* total_redeemed integer default 0
* total_penalty integer default 0
* current_balance integer default 0
* timestamps

12. green_points

* id
* user_id
* type enum: earn, redeem, refund, adjustment, penalty
* points integer
* balance_before integer default 0
* balance_after integer default 0
* description nullable
* reference_type nullable
* reference_id nullable
* created_by nullable references users
* timestamps

13. green_levels

* id
* code unique
* name
* min_score integer
* max_score integer
* description nullable
* benefits json nullable
* icon nullable
* sort_order integer default 0
* timestamps

Dữ liệu mẫu:

* seed: Seed, 0-199
* leaf: Leaf, 200-399
* tree: Tree, 400-699
* forest: Forest, 700-899
* net_zero_hero: Net Zero Hero, 900-1000

14. green_score_histories

* id
* user_id
* score integer
* level_code nullable
* behavior_score integer default 0
* consistency_score integer default 0
* diversity_score integer default 0
* verification_score integer default 0
* community_score integer default 0
* fraud_penalty integer default 0
* reason nullable
* calculated_at timestamp
* timestamps

15. vouchers

* id
* partner_id nullable
* store_id nullable
* title
* code unique
* description nullable
* category enum: cafe, milk_tea, supermarket, wallet, transport, finance, other
* required_points integer
* discount_type enum: percent, fixed, cashback, other
* discount_value decimal default 0
* quantity integer nullable
* used_quantity integer default 0
* min_green_score integer default 0
* started_at nullable
* expired_at nullable
* status enum: draft, active, inactive, expired
* terms nullable
* image nullable
* timestamps

16. voucher_redemptions

* id
* user_id
* voucher_id
* redemption_code unique
* points_used integer
* status enum: issued, used, expired, cancelled
* used_at nullable
* expired_at nullable
* timestamps

17. campaigns

* id
* partner_id nullable
* store_id nullable
* title
* description nullable
* type enum: voucher, challenge, finance, awareness, other
* started_at nullable
* ended_at nullable
* status enum: draft, active, ended, cancelled
* budget decimal nullable
* metadata json nullable
* timestamps

18. financial_offers

* id
* partner_id
* title
* description nullable
* min_green_score integer default 0
* base_interest_rate decimal nullable
* discounted_interest_rate decimal nullable
* max_amount decimal nullable
* required_points integer default 0
* status enum: draft, active, inactive
* timestamps

19. financial_applications

* id
* user_id
* financial_offer_id
* green_score_at_apply integer
* requested_amount decimal nullable
* status enum: pending, approved, rejected, cancelled
* partner_note nullable
* timestamps

20. net_zero_goals

* id
* user_id
* month integer
* year integer
* plastic_target_grams decimal default 0
* co2_target_kg decimal default 0
* points_target integer default 0
* action_target integer default 0
* status enum: active, completed, failed
* timestamps

21. net_zero_progress

* id
* user_id
* net_zero_goal_id nullable
* progress_date date
* plastic_saved_grams decimal default 0
* co2_saved_kg decimal default 0
* points_earned integer default 0
* actions_count integer default 0
* timestamps

22. personal_recommendations

* id
* user_id
* title
* description
* category enum: plastic, transport, recycling, energy, food, score, voucher, other
* estimated_points integer default 0
* status enum: new, applied, dismissed, completed
* metadata json nullable
* timestamps

23. fraud_rules

* id
* code unique
* name
* description nullable
* risk_points integer default 0
* threshold_value nullable
* is_active boolean default true
* timestamps

24. fraud_alerts

* id
* user_id nullable
* green_invoice_id nullable
* store_id nullable
* alert_type enum: duplicate_scan, too_many_scans_per_day, expired_invoice_attempt, invalid_qr, same_store_repeated, suspicious_pattern
* description
* risk_score integer default 0
* status enum: open, reviewing, resolved, dismissed
* resolved_by nullable references users
* resolved_at nullable
* timestamps

25. notifications

* id
* user_id
* title
* message
* type enum: info, success, warning, danger
* read_at nullable
* data json nullable
* timestamps

26. activity_logs

* id
* user_id nullable
* action
* description nullable
* subject_type nullable
* subject_id nullable
* ip_address nullable
* user_agent nullable
* metadata json nullable
* timestamps

27. system_settings

* id
* key unique
* value text nullable
* type enum: string, number, boolean, json
* group nullable
* timestamps

MODEL RELATIONSHIPS:

Tạo đầy đủ relationship giữa các model:

* User hasOne UserProfile
* User hasOne GreenWallet
* User hasMany GreenTransactions
* User hasMany GreenPoints
* User hasMany VoucherRedemptions
* User hasMany GreenScoreHistories
* User hasMany NetZeroGoals
* Store belongsTo owner User
* Store hasMany StoreBranches
* Store hasMany GreenInvoices
* Store hasMany Vouchers
* StoreBranch belongsTo Store
* GreenInvoice belongsTo Store, Branch, Staff, UsedBy
* GreenInvoice hasMany GreenInvoiceItems
* GreenTransaction belongsTo User, Store, Branch, GreenInvoice
* Voucher belongsTo Partner, Store
* Voucher hasMany VoucherRedemptions
* Partner belongsTo User
* Partner hasMany Vouchers, Campaigns, FinancialOffers

SERVICE CLASSES CẦN TẠO:

1. app/Services/QrInvoiceService.php
   Nhiệm vụ:

* createInvoice()
* generateQrToken()
* generateInvoiceCode()
* calculateInvoicePoints()
* verifyQrToken()
* markInvoiceAsUsed()
* expireOldInvoices()

Luồng verify QR:

* Kiểm tra token tồn tại.
* Kiểm tra invoice chưa dùng.
* Kiểm tra chưa hết hạn.
* Kiểm tra status pending.
* Kiểm tra user chưa vượt giới hạn quét/ngày.
* Nếu hợp lệ, tạo green transaction, cộng điểm, cập nhật wallet, cập nhật Green Score.
* Nếu không hợp lệ, tạo fraud alert nếu cần.

2. app/Services/GreenPointService.php
   Nhiệm vụ:

* ensureWallet(User $user)
* earnPoints(User $user, int $points, string $description, $reference = null)
* redeemPoints(User $user, int $points, string $description, $reference = null)
* refundPoints()
* penaltyPoints()
* updateWalletBalance()
* getBalance()

Mọi thay đổi điểm phải ghi vào green_points ledger.

3. app/Services/GreenScoreService.php
   Nhiệm vụ:

* calculateScore(User $user)
* calculateBehaviorScore()
* calculateConsistencyScore()
* calculateDiversityScore()
* calculateVerificationScore()
* calculateCommunityScore()
* calculateFraudPenalty()
* getLevelByScore()
* saveScoreHistory()

Công thức:
Green Score = behavior_score * 0.4 + consistency_score * 0.2 + diversity_score * 0.15 + verification_score * 0.15 + community_score * 0.1 - fraud_penalty

Giới hạn score từ 0 đến 1000.

4. app/Services/VoucherService.php
   Nhiệm vụ:

* canRedeem()
* redeemVoucher()
* generateRedemptionCode()
* markAsUsed()
* expireOldRedemptions()

Điều kiện đổi:

* Voucher active.
* Chưa hết hạn.
* Còn số lượng.
* User đủ điểm.
* User đạt min_green_score nếu voucher yêu cầu.
* Trừ điểm khi đổi thành công.
* Tạo voucher redemption.

5. app/Services/FraudDetectionService.php
   Nhiệm vụ:

* checkDuplicateScan()
* checkTooManyScansPerDay()
* checkExpiredInvoiceAttempt()
* checkSameStoreRepeated()
* createAlert()
* calculateRiskScore()

Rule cơ bản:

* Một QR chỉ được quét một lần.
* Một user không được quét quá 10 hóa đơn/ngày.
* Một user không được quét quá 5 hóa đơn trong 10 phút.
* Hóa đơn hết hạn bị quét thì tạo cảnh báo.
* Quét nhiều lần ở cùng một cửa hàng trong thời gian ngắn thì cảnh báo suspicious.

6. app/Services/NetZeroRecommendationService.php
   Nhiệm vụ:

* generateMonthlyGoal()
* updateProgressFromTransaction()
* generateRecommendations()
* applyRecommendation()
* completeRecommendation()

Gợi ý rule-based:

* Nếu ít hành động giảm nhựa, gợi ý mang bình cá nhân.
* Nếu CO2 giảm thấp, gợi ý đi bộ/xe đạp.
* Nếu Green Score gần lên cấp, gợi ý hành động có điểm phù hợp.
* Nếu lâu không có giao dịch, gợi ý quay lại tích điểm.

LIVEWIRE COMPONENTS CẦN TẠO:

PUBLIC:

* LandingPage
* PublicStores
* PublicVouchers
* AboutPage
* ContactPage

AUTH/USER:

* User/Dashboard
* User/Onboarding
* User/ScanQr
* User/GreenWallet
* User/VoucherMarketplace
* User/VoucherDetail
* User/MyVouchers
* User/GreenScore
* User/NetZeroPlanner
* User/TransactionHistory
* User/Profile

STORE:

* Store/Dashboard
* Store/Branches/Index
* Store/Branches/Form
* Store/Staff/Index
* Store/Invoices/Index
* Store/Invoices/Create
* Store/Invoices/Show
* Store/Reports

PARTNER:

* Partner/Dashboard
* Partner/Vouchers/Index
* Partner/Vouchers/Form
* Partner/Campaigns/Index
* Partner/FinancialOffers/Index
* Partner/Reports

ADMIN:

* Admin/Dashboard
* Admin/Users/Index
* Admin/Users/Form
* Admin/Stores/Index
* Admin/Stores/Show
* Admin/Partners/Index
* Admin/GreenActionRules/Index
* Admin/GreenActionRules/Form
* Admin/Vouchers/Index
* Admin/Transactions/Index
* Admin/FraudAlerts/Index
* Admin/Reports/Index
* Admin/Settings/Index
* Admin/ActivityLogs/Index

ROUTES:

Tạo route rõ ràng:

Public:

* /
* /stores
* /vouchers
* /green-score
* /about
* /contact

Authenticated user:

* /dashboard
* /onboarding
* /scan-qr
* /wallet
* /vouchers/marketplace
* /my-vouchers
* /green-score/dashboard
* /net-zero-planner
* /transactions
* /profile

Store:

* /store/dashboard
* /store/branches
* /store/staff
* /store/invoices
* /store/invoices/create
* /store/invoices/{invoice}
* /store/reports

Partner:

* /partner/dashboard
* /partner/vouchers
* /partner/campaigns
* /partner/financial-offers
* /partner/reports

Admin:

* /admin/dashboard
* /admin/users
* /admin/stores
* /admin/partners
* /admin/green-action-rules
* /admin/vouchers
* /admin/transactions
* /admin/fraud-alerts
* /admin/reports
* /admin/settings
* /admin/activity-logs

AUTHORIZATION:

Tạo middleware hoặc policy để:

* user chỉ vào user pages.
* store_owner/store_staff chỉ vào store pages.
* partner chỉ vào partner pages.
* admin/super_admin vào admin pages.
* super_admin có toàn quyền.
* store_staff chỉ thấy hóa đơn và chi nhánh thuộc store của mình.
* partner chỉ thấy voucher/campaign/financial offer của partner đó.

UI DESIGN SYSTEM:

Toàn bộ giao diện dùng tiếng Việt.

Màu sắc:

* primary green: #15803D
* dark green: #064E3B
* light green: #DCFCE7
* background: #F8FAFC hoặc #F7FFF9
* warning: #F59E0B
* danger: #DC2626
* success: #16A34A

Style:

* Navbar xanh/trắng.
* Card bo góc xl/2xl.
* Shadow nhẹ.
* Button primary màu xanh.
* Button outline xanh.
* Dashboard dùng grid card.
* Có icon đơn giản bằng Heroicons hoặc SVG inline.
* Responsive cho desktop/tablet/mobile.
* Mỗi dashboard có sidebar hoặc top nav rõ ràng.

PUBLIC LANDING PAGE:

Trang chủ phải có:

* Navbar: Green Credit, Trang chủ, Tính năng, Cửa hàng đối tác, Green Score, Về chúng tôi, Liên hệ, Bắt đầu ngay.
* Hero: “Sống xanh, tích điểm thông minh”.
* CTA: “Khám phá ngay”, “Bắt đầu miễn phí”.
* Dashboard preview.
* Stats: 25.000+ người dùng, 350+ cửa hàng đối tác, 1,2 triệu điểm xanh, 18 tấn nhựa giảm thiểu.
* Tính năng nổi bật: Quét QR hóa đơn xanh, Green Wallet, Green Score, Đổi voucher, Net Zero Planner, Phân tích dữ liệu.
* Cách hoạt động 4 bước.
* Green Score tier section.
* Partner section.
* Footer.

USER DASHBOARD:

Hiển thị:

* Green Points hiện tại.
* Green Score hiện tại.
* Cấp độ hiện tại.
* Tổng nhựa đã giảm.
* Tổng CO2 đã giảm.
* Chuỗi ngày xanh.
* Lịch sử giao dịch gần nhất.
* Voucher gợi ý.
* Gợi ý hành động xanh.
* Biểu đồ điểm theo thời gian.

SCAN QR PAGE:

Chức năng:

* Cho nhập qr_token thủ công hoặc scan giả lập bằng form.
* Khi submit:

  * Gọi QrInvoiceService::verifyQrToken().
  * Nếu thành công, hiển thị modal/card:
    “Xác thực thành công”
    “+xxx Green Points”
    “Bạn đã giảm x kg CO2, y gram nhựa”
  * Nếu lỗi, hiển thị thông báo rõ.
* Có phần mô tả 4 bước:

  1. Mua hàng tại cửa hàng đối tác
  2. Nhận hóa đơn xanh
  3. Quét QR xác thực
  4. Nhận Green Points vào ví

STORE INVOICE CREATE PAGE:

Form:

* Chọn chi nhánh.
* Nhập số tiền hóa đơn.
* Chọn phương thức thanh toán.
* Tick các hành động xanh từ green_action_rules.
* Tính điểm dự kiến realtime bằng Livewire.
* Tạo hóa đơn.
* Sinh invoice_code và qr_token.
* Hiển thị QR code.
* Có nút tải/in hóa đơn demo.

GREEN WALLET PAGE:

Hiển thị:

* Số dư Green Points.
* Tổng đã kiếm.
* Tổng đã đổi.
* Tổng điểm phạt.
* Lịch sử ledger green_points.
* Bộ lọc theo type: earn, redeem, refund, adjustment, penalty.
* Card quy đổi mô phỏng: 100 points = 1.000 VND.
* Button chuyển tới voucher marketplace.

VOUCHER MARKETPLACE:

Hiển thị:

* Danh sách voucher active.
* Filter category.
* Search title.
* Sort theo điểm cần đổi.
* Mỗi voucher card gồm:

  * title
  * description
  * required_points
  * discount_value
  * min_green_score
  * expired_at
  * remaining quantity
  * nút “Đổi ngay”
* Khi đổi:

  * kiểm tra điều kiện.
  * trừ điểm.
  * tạo voucher_redemption.
  * hiển thị redemption code.

GREEN SCORE PAGE:

Hiển thị:

* Gauge hoặc card lớn score hiện tại.
* Level hiện tại.
* Còn bao nhiêu điểm để lên cấp.
* Lịch sử điểm theo tháng.
* Breakdown behavior/consistency/diversity/verification/community/fraud.
* Tier cards: Seed, Leaf, Tree, Forest, Net Zero Hero.
* Top thói quen xanh.
* Milestone timeline.
* Leaderboard demo.

NET ZERO PLANNER:

Hiển thị:

* Mục tiêu tháng hiện tại.
* Progress bar: nhựa, CO2, điểm, số hành động.
* Recommendations.
* Button “Áp dụng”.
* Sau khi áp dụng chuyển status recommendation sang applied.
* Có section “Lộ trình Net Zero cá nhân” theo tháng:

  * Nhận thức
  * Tiết giảm
  * Tối ưu
  * Bù đắp
  * Net Zero

ADMIN DASHBOARD:

Hiển thị:

* Tổng users.
* Tổng stores.
* Tổng partners.
* Tổng invoices.
* Tổng transactions.
* Tổng points issued.
* Tổng vouchers redeemed.
* Tổng fraud alerts open.
* Biểu đồ giao dịch theo tháng.
* Top cửa hàng xanh.
* Top users xanh.
* Hành động xanh phổ biến.
* Cảnh báo gian lận mới nhất.

ADMIN CRUD:

Tạo CRUD Livewire cho:

* Users
* Stores
* Partners
* Green Action Rules
* Vouchers
* Fraud Alerts
* Settings

STORE DASHBOARD:

Hiển thị:

* Tổng hóa đơn xanh.
* Tổng điểm đã phát hành.
* Tổng khách hàng xanh.
* Tổng nhựa/CO2 giảm từ cửa hàng.
* Hóa đơn gần đây.
* Top chi nhánh.
* Biểu đồ hóa đơn theo ngày/tháng.

PARTNER DASHBOARD:

Hiển thị:

* Tổng voucher đã tạo.
* Tổng voucher đã đổi.
* Campaign đang chạy.
* Top voucher hiệu quả.
* Financial offers.
* Báo cáo người dùng theo Green Score segment.

SEEDERS:

Tạo DatabaseSeeder đầy đủ:

* 1 super admin:
  email: [superadmin@greencredit.test](mailto:superadmin@greencredit.test)
  password: password
* 1 admin:
  email: [admin@greencredit.test](mailto:admin@greencredit.test)
  password: password
* 5 users:
  [user1@greencredit.test](mailto:user1@greencredit.test) đến [user5@greencredit.test](mailto:user5@greencredit.test)
  password: password
* 2 store owners.
* 4 store staff.
* 2 partners.
* 5 stores.
* 10 branches.
* Green action rules.
* Green levels.
* 30 green invoices, một số pending, một số used, một số expired.
* Green wallets cho users.
* Green transactions mẫu.
* Green score histories mẫu.
* 10 vouchers.
* 5 voucher redemptions.
* Net zero goals/progress.
* Personal recommendations.
* Fraud rules.
* Fraud alerts mẫu.
* Activity logs mẫu.

QUY TẮC CODE:

* Không viết toàn bộ logic trong Livewire component.
* Logic nghiệp vụ đặt trong Service class.
* Dùng database transaction khi:

  * quét QR thành công.
  * cộng/trừ điểm.
  * đổi voucher.
  * cập nhật wallet.
* Validate input bằng Laravel validation.
* Handle exception rõ ràng.
* Hiển thị thông báo session flash hoặc Livewire alert.
* Đặt tên biến dễ hiểu.
* Không hard-code điểm trong component, lấy từ green_action_rules.
* Không để người dùng đổi voucher khi không đủ điểm.
* Không để quét QR đã dùng.
* Không để nhân viên cửa hàng thấy invoice của cửa hàng khác.
* Không để partner sửa voucher của partner khác.
* Không để admin thường xóa super_admin.

TESTING:

Tạo Feature/Pest hoặc PHPUnit tests cho:

1. User có wallet sau khi tạo.
2. Store staff tạo green invoice thành công.
3. QR pending quét thành công thì:

   * invoice chuyển used
   * user nhận points
   * wallet tăng balance
   * transaction được tạo
   * score history được cập nhật
4. QR đã dùng không thể quét lại.
5. Voucher active đổi thành công khi đủ điểm.
6. Không đổi voucher khi thiếu điểm.
7. Fraud alert được tạo khi quét invoice expired.
8. Middleware chặn user vào admin route.
9. Store staff không xem được invoice của store khác.
10. Green Score nằm trong khoảng 0-1000.

PHASE TRIỂN KHAI:

Hãy triển khai theo thứ tự, nhưng vẫn phải hoàn thiện toàn bộ:

Phase 1:

* Cài auth.
* Tạo migration/model/relationship.
* Tạo seeders.
* Tạo roles đơn giản bằng users.role.
* Tạo layout, navbar, sidebar, footer.

Phase 2:

* User dashboard.
* Store dashboard.
* Admin dashboard.
* Partner dashboard.

Phase 3:

* Green Action Rules.
* Store tạo green invoice.
* QR token.
* QR verification.
* User scan QR.
* Green transaction.
* Green wallet.
* Green points ledger.

Phase 4:

* Green Score service.
* Green levels.
* Green Score dashboard.
* Net Zero Planner.
* Recommendations.

Phase 5:

* Voucher marketplace.
* Voucher redemption.
* Partner vouchers/campaigns.
* Financial offer simulation.

Phase 6:

* Fraud detection.
* Fraud alerts admin.
* Reports.
* Charts.
* Activity logs.
* Notifications.

Phase 7:

* Polish UI.
* Responsive design.
* Empty states.
* Error states.
* Loading states.
* Tests.
* README hướng dẫn chạy project.

DELIVERABLES:

Sau khi code xong, cung cấp:

1. Danh sách file đã tạo/sửa.
2. Lệnh cài đặt và chạy:

   * composer install
   * npm install
   * cp .env.example .env
   * php artisan key:generate
   * php artisan migrate:fresh --seed
   * npm run dev
   * php artisan serve
3. Tài khoản demo.
4. Những chức năng đã hoàn thành.
5. Những phần mô phỏng.
6. Cách test luồng chính:

   * đăng nhập store staff
   * tạo hóa đơn xanh
   * lấy qr_token
   * đăng nhập user
   * quét QR
   * kiểm tra ví điểm
   * đổi voucher
   * xem Green Score
   * xem admin dashboard

README.md:

Tạo README.md tiếng Việt với:

* Giới thiệu dự án.
* Stack sử dụng.
* Tính năng chính.
* Phân quyền.
* Cài đặt.
* Tài khoản demo.
* Luồng nghiệp vụ chính.
* Cấu trúc thư mục.
* Screenshot placeholders.
* Ghi chú đồ án.

YÊU CẦU CUỐI CÙNG:

Hãy inspect repository hiện tại trước. Nếu chưa có Laravel project, hãy tạo mới hoặc hướng dẫn rõ cần tạo mới. Nếu đã có Laravel project, hãy tích hợp vào project hiện tại mà không phá code cũ.

Không hỏi lại nếu thông tin đã đủ. Hãy tự đưa ra lựa chọn hợp lý và code hoàn chỉnh nhất có thể.

Bắt đầu bằng việc kiểm tra cấu trúc project, sau đó lập kế hoạch ngắn, rồi triển khai từng phase. Sau mỗi phase, chạy lint/test/migrate nếu môi trường cho phép và sửa lỗi phát sinh.
