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
                        <li>{{ $title }}</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">{{ $title }}</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Start -->
    <section class="contact-section-6 section-padding bg-light">
        <div class="container">
            <!-- Description Card -->
            <div class="card border-0 shadow-sm p-4 rounded-4 mb-4" style="background: linear-gradient(135deg, #15803d 0%, #064e3b 100%); color: #fff; border-radius: 20px;">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div>
                        <span class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold mb-3" style="font-size: 13px;">
                            <i class="far fa-info-circle me-1"></i> Thông tin
                        </span>
                        <h3 class="fw-bold mb-2 text-white" style="font-size: 24px;">{{ $title }}</h3>
                        <p class="mb-0 text-white-50">{{ $description }}</p>
                    </div>
                    @if(isset($actionUrl))
                        <div>
                            <a href="{{ $actionUrl }}" class="btn btn-light text-success fw-bold px-4 py-2.5 rounded-pill shadow-sm" style="border-radius: 30px;">
                                <i class="far fa-file-pdf me-1"></i> {{ $actionText ?? 'Xuất báo cáo' }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="row g-4 mb-4">
                @foreach ($cards as $card)
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">{{ $card[0] }}</span>
                                <div class="p-2 rounded-3 text-success d-flex align-items-center justify-content-center" style="background: #ecfdf5; width: 38px; height: 38px;">
                                    <i class="far fa-chart-line fs-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bold text-dark mb-1" style="font-size: 28px; font-weight: 800;">{{ $card[1] }}</h2>
                            @if(isset($card[2]))
                                <p class="text-success small mb-0 fw-semibold">{{ $card[2] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Table Section -->
            <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 20px;">
                <h4 class="fw-bold text-dark mb-4">{{ $tableTitle ?? 'Dữ liệu gần đây' }}</h4>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="px-3 py-3 text-secondary">Nội dung</th>
                                <th class="px-3 py-3 text-secondary">Trạng thái</th>
                                <th class="px-3 py-3 text-secondary">Cập nhật</th>
                                @if(collect($rows)->contains(fn($r) => isset($r[3])))
                                    <th class="px-3 py-3 text-secondary text-end">Thao tác</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($rows as $row)
                            <tr>
                                <td class="px-3 py-3 font-medium text-dark">
                                    @if(isset($row[3]))
                                        <a href="{{ $row[3] }}" class="text-success hover-underline fw-bold">{{ $row[0] }}</a>
                                    @else
                                        {{ $row[0] }}
                                    @endif
                                </td>
                                <td class="px-3 py-3">
                                    @if($row[1] === 'Đã quét' || $row[1] === 'Hoạt động')
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-pill">{{ $row[1] }}</span>
                                    @elseif($row[1] === 'Chờ quét' || $row[1] === 'Chờ duyệt')
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2.5 py-1 rounded-pill">{{ $row[1] }}</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2.5 py-1 rounded-pill">{{ $row[1] }}</span>
                                    @endif
                                </td>
                                <td class="px-3 py-3 text-muted">{{ $row[2] }}</td>
                                @if(isset($row[3]))
                                    <td class="px-3 py-3 text-end">
                                        <a href="{{ $row[3] }}" class="btn btn-sm btn-success px-3 rounded-pill fw-bold">Chi tiết</a>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center text-muted">Chưa có dữ liệu.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
