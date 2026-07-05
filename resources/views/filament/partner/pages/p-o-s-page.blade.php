<div class="space-y-6" style="margin-top: 24px;">
    <!-- Header Section -->
    <x-filament::section>
        <x-slot name="heading">
            Hệ thống POS Bán hàng & Tích điểm
        </x-slot>

        <div>
            <p class="text-sm text-gray-600 dark:text-gray-400" style="margin-top: 12px; margin-bottom: 16px; line-height: 1.6;">
                Sử dụng màn hình thu ngân POS để ghi nhận các hành động xanh (không dùng túi nilon, ống hút nhựa, mang ly cá nhân...) khi khách hàng thanh toán và xuất hóa đơn chứa mã QR tích điểm Green Points.
            </p>
            <div style="margin-top: 16px;">
                <x-filament::button
                    href="/store/invoices/create"
                    tag="a"
                    target="_blank"
                    icon="heroicon-m-arrow-top-right-on-square"
                    color="success"
                    size="lg"
                >
                    Mở màn hình POS bán hàng (Tab mới)
                </x-filament::button>
            </div>
        </div>
    </x-filament::section>

    <!-- Grid of steps with clear margins -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-top: 24px;">
        <!-- Step 1 -->
        <x-filament::section>
            <x-slot name="heading">
                <div class="flex items-center gap-3">
                    <x-filament::icon icon="heroicon-o-shopping-bag" class="h-6 w-6 text-emerald-600 dark:text-emerald-400" />
                    <span>Bước 1: Lên đơn hàng</span>
                </div>
            </x-slot>
            <p class="text-sm text-gray-500 dark:text-gray-400" style="margin-top: 12px;">
                Thêm các sản phẩm hoặc dịch vụ của cửa hàng đối tác vào giỏ thanh toán trên màn hình POS.
            </p>
        </x-filament::section>

        <!-- Step 2 -->
        <x-filament::section>
            <x-slot name="heading">
                <div class="flex items-center gap-3">
                    <x-filament::icon icon="heroicon-o-sparkles" class="h-6 w-6 text-emerald-600 dark:text-emerald-400" />
                    <span>Bước 2: Hành động xanh</span>
                </div>
            </x-slot>
            <p class="text-sm text-gray-500 dark:text-gray-400" style="margin-top: 12px;">
                Tích chọn các hành động bảo vệ môi trường của khách hàng để hệ thống tự động quy đổi điểm thưởng.
            </p>
        </x-filament::section>

        <!-- Step 3 -->
        <x-filament::section>
            <x-slot name="heading">
                <div class="flex items-center gap-3">
                    <x-filament::icon icon="heroicon-o-printer" class="h-6 w-6 text-emerald-600 dark:text-emerald-400" />
                    <span>Bước 3: Xuất QR tích điểm</span>
                </div>
            </x-slot>
            <p class="text-sm text-gray-500 dark:text-gray-400" style="margin-top: 12px;">
                In hóa đơn chứa mã QR chứa token bảo mật để khách hàng quét nhận điểm vào ví Green Wallet.
            </p>
        </x-filament::section>
    </div>
</div>
