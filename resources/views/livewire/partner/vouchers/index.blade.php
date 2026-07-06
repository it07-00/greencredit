<div>
    <!-- Breadcrumb-section Start -->
    <section class="breadcrumb-section fix bg-cover" style="background-image: url('{{ asset('frontend/assets/img/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <ul class="breadcrumb-list wow fadeInUp" data-wow-delay=".5s">
                        <li>
                            <a href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li>
                            <i class="far fa-angle-right"></i>
                        </li>
                        <li>Voucher mô phỏng</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Voucher mô phỏng</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Start -->
    <section class="contact-section-6 section-padding bg-light">
        <div class="container">
            <!-- Partner info -->
            <div class="card border-0 shadow-sm p-4 rounded-4 mb-4" style="background: linear-gradient(135deg, #15803d 0%, #064e3b 100%); color: #fff; border-radius: 20px;">
                <div class="d-flex align-items-center">
                    <div>
                        <span class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold mb-3" style="font-size: 13px;">
                            <i class="far fa-building me-1"></i> Đối tác: {{ $partner->name }}
                        </span>
                        <h3 class="fw-bold mb-2 text-white" style="font-size: 24px;">Quản lý Voucher</h3>
                        <p class="mb-0 text-white-50">Tạo ưu đãi demo; không liên kết thương hiệu hay hệ thống thanh toán thật.</p>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4 rounded-4" style="border-radius: 15px;">
                    <i class="far fa-check-circle me-1"></i> {{ session('success') }}
                </div>
            @endif

            <div class="row g-4">
                <div class="col-lg-4">
                    <form wire:submit="save" class="card border-0 shadow-sm p-4 rounded-4 bg-white" style="border-radius: 20px;">
                        <h4 class="fw-bold text-dark mb-4">{{ $editingId ? 'Cập nhật voucher' : 'Tạo voucher mới' }}</h4>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Tên voucher</label>
                            <input wire:model="title" type="text" class="form-control rounded-3" placeholder="Ví dụ: Giảm 20k cafe">
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-semibold text-dark">Mã voucher</label>
                                <input wire:model="code" type="text" class="form-control rounded-3" placeholder="Ví dụ: ECO20">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-semibold text-dark">Danh mục</label>
                                <select wire:model="category" class="form-select rounded-3">
                                    <option value="cafe">Cà phê</option>
                                    <option value="milk_tea">Trà sữa</option>
                                    <option value="supermarket">Siêu thị</option>
                                    <option value="wallet">Ví mô phỏng</option>
                                    <option value="transport">Di chuyển</option>
                                    <option value="finance">Tài chính mô phỏng</option>
                                    <option value="other">Khác</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-semibold text-dark">Điểm cần đổi</label>
                                <input wire:model="required_points" type="number" class="form-control rounded-3">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-semibold text-dark">Score tối thiểu</label>
                                <input wire:model="min_green_score" type="number" class="form-control rounded-3">
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-semibold text-dark">Loại giảm</label>
                                <select wire:model="discount_type" class="form-select rounded-3">
                                    <option value="fixed">Số tiền</option>
                                    <option value="percent">Phần trạng</option>
                                    <option value="cashback">Hoàn điểm</option>
                                    <option value="other">Khác</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-semibold text-dark">Giá trị</label>
                                <input wire:model="discount_value" type="number" class="form-control rounded-3">
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-semibold text-dark">Số lượng</label>
                                <input wire:model="quantity" type="number" class="form-control rounded-3">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-semibold text-dark">Hết hạn</label>
                                <input wire:model="expired_at" type="date" class="form-control rounded-3">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Trạng thái</label>
                            <select wire:model="status" class="form-select rounded-3">
                                <option value="draft">Bản nháp</option>
                                <option value="active">Hoạt động</option>
                                <option value="inactive">Tạm dừng</option>
                                <option value="expired">Hết hạn</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Mô tả</label>
                            <textarea wire:model="description" class="form-control rounded-3" rows="3"></textarea>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger border-0 shadow-sm mb-4 rounded-4" style="border-radius: 12px;">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="d-flex gap-2">
                            <button type="submit" class="theme-btn px-4 py-2 border-0 w-100 text-center justify-content-center">Lưu voucher</button>
                            @if($editingId)
                                <button wire:click="cancel" type="button" class="btn btn-outline-secondary px-4 rounded-pill fw-bold">Hủy</button>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm p-4 rounded-4 bg-white" style="border-radius: 20px;">
                        <h4 class="fw-bold text-dark mb-4">Danh sách voucher của tôi</h4>
                        <div class="row g-3">
                            @forelse($vouchers as $voucher)
                                <div class="col-md-6">
                                    <div class="card border p-3 rounded-4 h-100 bg-light" style="border-radius: 15px;">
                                        <div class="d-flex justify-content-between align-items-start gap-2 mb-3">
                                            <span class="badge {{ $voucher->status === 'active' ? 'bg-success-subtle text-success border border-success-subtle' : 'bg-secondary-subtle text-secondary border border-secondary-subtle' }} px-2 py-1 rounded-pill">{{ $voucher->status === 'active' ? 'Hoạt động' : 'Tạm dừng' }}</span>
                                            <span class="text-muted small">Đã đổi: {{ $voucher->used_quantity }}/{{ $voucher->quantity ?? '∞' }}</span>
                                        </div>
                                        <h5 class="fw-bold text-dark mb-1">{{ $voucher->title }}</h5>
                                        <p class="text-muted small mb-3">{{ $voucher->description }}</p>
                                        <div class="mt-auto pt-3 border-top d-flex align-items-end justify-content-between">
                                            <div>
                                                <strong class="text-success" style="font-size: 16px;">{{ number_format($voucher->required_points) }} điểm</strong>
                                                <p class="text-muted small mb-0">Score tối thiểu: {{ $voucher->min_green_score }}</p>
                                            </div>
                                            <button wire:click="edit({{ $voucher->id }})" class="btn btn-sm btn-outline-success px-3 rounded-pill fw-bold">Sửa</button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full rounded-4 bg-light p-5 text-center text-muted" style="border-radius: 15px;">
                                    Chưa có voucher nào được tạo.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
