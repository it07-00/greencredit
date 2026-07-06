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
                        <li>Quản lý chi nhánh</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Quản lý chi nhánh</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Start -->
    <section class="contact-section-6 section-padding bg-light">
        <div class="container">
            <!-- Store info -->
            <div class="card border-0 shadow-sm p-4 rounded-4 mb-4" style="background: linear-gradient(135deg, #15803d 0%, #064e3b 100%); color: #fff; border-radius: 20px;">
                <div class="d-flex align-items-center">
                    <div>
                        <span class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold mb-3" style="font-size: 13px;">
                            <i class="far fa-store me-1"></i> Cửa hàng: {{ $store->name }}
                        </span>
                        <h3 class="fw-bold mb-2 text-white" style="font-size: 24px;">Chi nhánh cửa hàng</h3>
                        <p class="mb-0 text-white-50">Mọi chi nhánh dưới đây chỉ thuộc cửa hàng đang đăng nhập.</p>
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
                        <h4 class="fw-bold text-dark mb-4">{{ $editingId ? 'Cập nhật chi nhánh' : 'Thêm chi nhánh' }}</h4>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Tên chi nhánh</label>
                            <input wire:model="name" type="text" class="form-control rounded-3" placeholder="Ví dụ: Lá Xanh CN 1">
                            @error('name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Địa chỉ</label>
                            <input wire:model="address" type="text" class="form-control rounded-3" placeholder="Ví dụ: 123 Lê Lợi">
                            @error('address')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Thành phố</label>
                            <input wire:model="city" type="text" class="form-control rounded-3">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Quận/Huyện</label>
                            <input wire:model="district" type="text" class="form-control rounded-3" placeholder="Ví dụ: Quận 1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Điện thoại</label>
                            <input wire:model="phone" type="text" class="form-control rounded-3" placeholder="Ví dụ: 0900000001">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Người quản lý</label>
                            <input wire:model="manager_name" type="text" class="form-control rounded-3" placeholder="Ví dụ: Nguyễn Văn A">
                        </div>
                        <div class="mb-4 form-check">
                            <input wire:model="is_active" type="checkbox" class="form-check-input" id="isActiveCheck">
                            <label class="form-check-label fw-semibold text-dark" for="isActiveCheck">Đang hoạt động</label>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="theme-btn px-4 py-2 border-0 w-100 text-center justify-content-center">Lưu chi nhánh</button>
                            @if($editingId)
                                <button wire:click="cancel" type="button" class="btn btn-outline-secondary px-4 rounded-pill fw-bold">Hủy</button>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm p-4 rounded-4 bg-white" style="border-radius: 20px;">
                        <h4 class="fw-bold text-dark mb-4">Danh sách chi nhánh</h4>
                        <div class="row g-3">
                            @forelse($branches as $branch)
                                <div class="col-md-6">
                                    <div class="card border p-3 rounded-4 h-100 bg-light" style="border-radius: 15px;">
                                        <div class="d-flex justify-content-between align-items-start gap-2">
                                            <div>
                                                <h5 class="fw-bold text-dark mb-1">{{ $branch->name }}</h5>
                                                <p class="text-muted small mb-0"><i class="far fa-map-marker-alt text-success me-1"></i> {{ $branch->address }}, {{ $branch->district }}, {{ $branch->city }}</p>
                                            </div>
                                            <span class="badge {{ $branch->is_active ? 'bg-success-subtle text-success border border-success-subtle' : 'bg-secondary-subtle text-secondary border border-secondary-subtle' }} px-2 py-1 rounded-pill">{{ $branch->is_active ? 'Hoạt động' : 'Tạm dừng' }}</span>
                                        </div>
                                        <div class="mt-3 pt-3 border-top">
                                            <p class="text-dark small mb-0"><strong>Quản lý:</strong> {{ $branch->manager_name ?: 'Chưa thiết lập' }}</p>
                                            <p class="text-dark small mb-3"><strong>Điện thoại:</strong> {{ $branch->phone ?: 'Chưa thiết lập' }}</p>
                                            <div class="d-flex gap-2">
                                                <button wire:click="edit({{ $branch->id }})" class="btn btn-sm btn-outline-success px-3 rounded-pill fw-bold">Sửa</button>
                                                <button wire:click="toggle({{ $branch->id }})" class="btn btn-sm {{ $branch->is_active ? 'btn-outline-warning' : 'btn-warning text-white' }} px-3 rounded-pill fw-bold">{{ $branch->is_active ? 'Tạm dừng' : 'Kích hoạt' }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full rounded-4 bg-light p-5 text-center text-muted" style="border-radius: 15px;">
                                    Chưa có chi nhánh. Hãy tạo chi nhánh đầu tiên.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
