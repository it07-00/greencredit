@extends('layouts.app')

@section('title', 'Tin tức sống xanh | Green Credit')
@section('meta_description', 'Cập nhật những kiến thức, xu hướng và cảm hứng sống xanh mới nhất từ Green Credit.')

@push('styles')
<style>
    .gc-news-hero {
        background: linear-gradient(135deg, #14532d 0%, #166534 50%, #15803d 100%);
        padding: 80px 0 60px;
        position: relative;
        overflow: hidden;
    }
    .gc-news-hero::before {
        content: '';
        position: absolute;
        width: 400px; height: 400px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
        top: -100px; right: -80px;
    }
    .gc-news-hero::after {
        content: '';
        position: absolute;
        width: 250px; height: 250px;
        background: rgba(255,255,255,0.03);
        border-radius: 50%;
        bottom: -60px; left: 5%;
    }
    .gc-breadcrumb a { color: #86efac; text-decoration: none; }
    .gc-breadcrumb a:hover { color: #fff; }
    .gc-breadcrumb span { color: rgba(255,255,255,0.5); margin: 0 8px; }

    /* Card */
    .gc-news-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(0,0,0,0.07);
        border: 1px solid #f0fdf4;
        transition: transform 0.3s, box-shadow 0.3s;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .gc-news-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 48px rgba(21,128,61,0.14);
        border-color: #bbf7d0;
    }
    .gc-news-card .gc-card-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        display: block;
        background: #f0fdf4;
    }
    .gc-news-card .gc-card-body {
        padding: 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .gc-tag {
        display: inline-block;
        background: #dcfce7;
        color: #15803d;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        padding: 4px 12px;
        border-radius: 100px;
        margin-bottom: 12px;
    }
    .gc-news-card h3 {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
        line-height: 1.5;
        margin-bottom: 12px;
    }
    .gc-news-card h3 a {
        color: inherit;
        text-decoration: none;
        transition: color 0.2s;
    }
    .gc-news-card h3 a:hover { color: #15803d; }
    .gc-news-card p {
        color: #6b7280;
        font-size: 14px;
        line-height: 1.7;
        flex: 1;
        margin-bottom: 20px;
    }
    .gc-meta {
        display: flex;
        align-items: center;
        gap: 16px;
        font-size: 13px;
        color: #9ca3af;
        padding-top: 16px;
        border-top: 1px solid #f3f4f6;
        margin-bottom: 16px;
    }
    .gc-meta i { color: #15803d; margin-right: 5px; }
    .gc-read-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #15803d;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: gap 0.2s;
    }
    .gc-read-more:hover { color: #166534; gap: 12px; }

    /* Featured card */
    .gc-news-featured {
        background: #fff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 8px 40px rgba(0,0,0,0.1);
        border: 1px solid #f0fdf4;
        transition: transform 0.3s, box-shadow 0.3s;
        display: flex;
        flex-direction: column;
    }
    .gc-news-featured:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 60px rgba(21,128,61,0.15);
    }
    .gc-news-featured .gc-featured-img {
        width: 100%;
        height: 340px;
        object-fit: cover;
    }
    .gc-news-featured .gc-tag { background: #15803d; color: #fff; }

    /* Sidebar */
    .gc-sidebar-widget {
        background: #fff;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.06);
        border: 1px solid #f0fdf4;
        margin-bottom: 24px;
    }
    .gc-sidebar-widget h5 {
        font-size: 16px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid #dcfce7;
    }
    .gc-sidebar-post {
        display: flex;
        gap: 14px;
        padding: 12px 0;
        border-bottom: 1px solid #f3f4f6;
        text-decoration: none;
        transition: all 0.2s;
    }
    .gc-sidebar-post:last-child { border-bottom: none; }
    .gc-sidebar-post:hover .gc-sidebar-post-title { color: #15803d; }
    .gc-sidebar-post-img {
        width: 72px;
        height: 60px;
        border-radius: 10px;
        object-fit: cover;
        flex-shrink: 0;
    }
    .gc-sidebar-post-title {
        font-size: 13px;
        font-weight: 600;
        color: #1f2937;
        line-height: 1.5;
        margin-bottom: 4px;
        transition: color 0.2s;
    }
    .gc-sidebar-post-date { font-size: 12px; color: #9ca3af; }

    .gc-tag-cloud { display: flex; flex-wrap: wrap; gap: 8px; }
    .gc-tag-item {
        display: inline-block;
        padding: 6px 16px;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 100px;
        font-size: 13px;
        color: #15803d;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s;
    }
    .gc-tag-item:hover {
        background: #15803d;
        color: #fff;
        border-color: #15803d;
    }

    /* Search */
    .gc-search-box {
        position: relative;
    }
    .gc-search-box input {
        width: 100%;
        padding: 12px 48px 12px 16px;
        border: 1.5px solid #e5e7eb;
        border-radius: 12px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
    }
    .gc-search-box input:focus { border-color: #15803d; }
    .gc-search-box button {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #15803d;
        cursor: pointer;
        font-size: 16px;
    }

    /* Pagination */
    .gc-pagination { display: flex; gap: 8px; justify-content: center; margin-top: 48px; }
    .gc-page-btn {
        width: 40px; height: 40px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 14px; font-weight: 600;
        border: 1.5px solid #e5e7eb;
        color: #6b7280;
        text-decoration: none;
        transition: all 0.2s;
        background: #fff;
    }
    .gc-page-btn:hover, .gc-page-btn.active {
        background: #15803d;
        border-color: #15803d;
        color: #fff;
    }
</style>
@endpush

@section('content')

{{-- Hero breadcrumb --}}
<section class="gc-news-hero">
    <div class="container">
        <div class="gc-breadcrumb mb-3" style="font-size:13px;">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span>/</span>
            <span style="color:#fff;">Tin tức sống xanh</span>
        </div>
        <h1 style="color:#fff;font-size:clamp(28px,4vw,44px);font-weight:800;margin-bottom:12px;line-height:1.2;">
            🌿 Tin tức &amp; Kiến thức xanh
        </h1>
        <p style="color:#bbf7d0;font-size:16px;max-width:560px;line-height:1.7;margin:0;">
            Cập nhật xu hướng, mẹo hay và cảm hứng sống xanh mỗi ngày từ cộng đồng Green Credit.
        </p>
    </div>
</section>

<section class="section-padding fix" style="background:#f8fafb;">
    <div class="container">
        <div class="row g-4">

            {{-- Main content --}}
            <div class="col-lg-8">

                {{-- Featured Post --}}
                @php
                $posts = [
                    [
                        'id' => 1,
                        'tag' => 'Sống xanh',
                        'title' => 'Bắt đầu sống xanh từ những thay đổi nhỏ mỗi ngày',
                        'excerpt' => 'Khám phá những bước đi đơn giản nhất để hình thành lối sống bảo vệ môi trường từ thói quen sinh hoạt hàng ngày. Mỗi hành động nhỏ đều tạo nên tác động lớn cho hành tinh.',
                        'date' => '12 Tháng 5, 2026',
                        'comments' => 12,
                        'read_time' => '5',
                        'image' => 'frontend/assets/img/news/1.png',
                        'author' => 'Ban biên tập Green Credit',
                    ],
                    [
                        'id' => 2,
                        'tag' => 'Green Score',
                        'title' => 'Cách Green Score ghi nhận hành vi tiêu dùng bền vững',
                        'excerpt' => 'Tìm hiểu chi tiết các khía cạnh đánh giá điểm Green Score và cách hệ thống tự động cập nhật tiến trình của bạn dựa trên hành vi thực tế.',
                        'date' => '15 Tháng 5, 2026',
                        'comments' => 8,
                        'read_time' => '7',
                        'image' => 'frontend/assets/img/news/2.png',
                        'author' => 'Đội phân tích dữ liệu',
                    ],
                    [
                        'id' => 3,
                        'tag' => 'Net Zero',
                        'title' => 'Vai trò của dữ liệu xanh trong hành trình hướng tới Net Zero',
                        'excerpt' => 'Hiểu rõ tầm quan trọng của việc thu thập và phân tích dữ liệu tiêu dùng xanh trong nỗ lực cắt giảm carbon quốc gia và toàn cầu.',
                        'date' => '18 Tháng 5, 2026',
                        'comments' => 15,
                        'read_time' => '8',
                        'image' => 'frontend/assets/img/news/3.png',
                        'author' => 'Nhóm nghiên cứu môi trường',
                    ],
                    [
                        'id' => 4,
                        'tag' => 'Voucher',
                        'title' => '5 voucher xanh hấp dẫn nhất tháng 6 bạn không nên bỏ lỡ',
                        'excerpt' => 'Tổng hợp những voucher ưu đãi tốt nhất từ các đối tác liên kết của Green Credit trong tháng này. Đổi ngay trước khi hết hạn!',
                        'date' => '20 Tháng 5, 2026',
                        'comments' => 6,
                        'read_time' => '4',
                        'image' => 'frontend/assets/img/news/1.png',
                        'author' => 'Team Marketing',
                    ],
                    [
                        'id' => 5,
                        'tag' => 'Cộng đồng',
                        'title' => 'Thử thách 30 ngày sống xanh: Kết quả bất ngờ từ cộng đồng',
                        'excerpt' => 'Hơn 5,000 thành viên cùng tham gia thử thách 30 ngày không dùng túi nhựa, kết quả đã tiết kiệm được 2.4 tấn rác thải nhựa.',
                        'date' => '22 Tháng 5, 2026',
                        'comments' => 24,
                        'read_time' => '6',
                        'image' => 'frontend/assets/img/news/2.png',
                        'author' => 'Cộng đồng Green Credit',
                    ],
                ];
                @endphp

                {{-- Featured first post --}}
                <div class="gc-news-featured mb-4 wow fadeInUp">
                    <img src="{{ asset($posts[0]['image']) }}" alt="{{ $posts[0]['title'] }}" class="gc-featured-img">
                    <div class="gc-card-body" style="padding:28px;">
                        <span class="gc-tag">⭐ Nổi bật · {{ $posts[0]['tag'] }}</span>
                        <h2 style="font-size:clamp(20px,2.5vw,26px);font-weight:800;color:#111827;margin-bottom:14px;line-height:1.4;">
                            <a href="{{ route('news.show', $posts[0]['id']) }}" style="color:inherit;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#15803d'" onmouseout="this.style.color='inherit'">
                                {{ $posts[0]['title'] }}
                            </a>
                        </h2>
                        <p style="color:#6b7280;font-size:15px;line-height:1.8;margin-bottom:20px;">{{ $posts[0]['excerpt'] }}</p>
                        <div class="gc-meta">
                            <span><i class="far fa-calendar"></i>{{ $posts[0]['date'] }}</span>
                            <span><i class="far fa-comments"></i>{{ $posts[0]['comments'] }} bình luận</span>
                            <span><i class="far fa-clock"></i>{{ $posts[0]['read_time'] }} phút đọc</span>
                        </div>
                        <a href="{{ route('news.show', $posts[0]['id']) }}" class="gc-read-more">
                            Đọc đầy đủ <i class="far fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                {{-- Grid posts --}}
                <div class="row g-4">
                    @foreach(array_slice($posts, 1) as $post)
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->index * 0.1 }}s">
                        <div class="gc-news-card">
                            <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" class="gc-card-img">
                            <div class="gc-card-body">
                                <span class="gc-tag">{{ $post['tag'] }}</span>
                                <h3>
                                    <a href="{{ route('news.show', $post['id']) }}">{{ $post['title'] }}</a>
                                </h3>
                                <p>{{ $post['excerpt'] }}</p>
                                <div class="gc-meta">
                                    <span><i class="far fa-calendar"></i>{{ $post['date'] }}</span>
                                    <span><i class="far fa-clock"></i>{{ $post['read_time'] }} phút</span>
                                </div>
                                <a href="{{ route('news.show', $post['id']) }}" class="gc-read-more">
                                    Xem Chi Tiết <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="gc-pagination">
                    <a href="#" class="gc-page-btn active">1</a>
                    <a href="#" class="gc-page-btn">2</a>
                    <a href="#" class="gc-page-btn">3</a>
                    <a href="#" class="gc-page-btn"><i class="fas fa-chevron-right" style="font-size:12px;"></i></a>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">

                {{-- Search --}}
                <div class="gc-sidebar-widget wow fadeInUp">
                    <h5>🔍 Tìm kiếm</h5>
                    <div class="gc-search-box">
                        <input type="text" placeholder="Tìm bài viết...">
                        <button type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>

                {{-- Recent Posts --}}
                <div class="gc-sidebar-widget wow fadeInUp" data-wow-delay=".2s">
                    <h5>📰 Bài viết mới nhất</h5>
                    @foreach($posts as $post)
                    <a href="{{ route('news.show', $post['id']) }}" class="gc-sidebar-post">
                        <img src="{{ asset($post['image']) }}" class="gc-sidebar-post-img" alt="{{ $post['title'] }}">
                        <div>
                            <div class="gc-sidebar-post-title">{{ $post['title'] }}</div>
                            <div class="gc-sidebar-post-date"><i class="far fa-calendar me-1" style="color:#15803d;"></i>{{ $post['date'] }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>

                {{-- Tags --}}
                <div class="gc-sidebar-widget wow fadeInUp" data-wow-delay=".4s">
                    <h5>🏷️ Chủ đề</h5>
                    <div class="gc-tag-cloud">
                        <a href="#" class="gc-tag-item">Sống xanh</a>
                        <a href="#" class="gc-tag-item">Green Score</a>
                        <a href="#" class="gc-tag-item">Net Zero</a>
                        <a href="#" class="gc-tag-item">QR Code</a>
                        <a href="#" class="gc-tag-item">Voucher</a>
                        <a href="#" class="gc-tag-item">Cộng đồng</a>
                        <a href="#" class="gc-tag-item">Nhựa</a>
                        <a href="#" class="gc-tag-item">CO2</a>
                        <a href="#" class="gc-tag-item">Tái chế</a>
                        <a href="#" class="gc-tag-item">Tiêu dùng xanh</a>
                    </div>
                </div>

                {{-- Green Score CTA --}}
                <div class="wow fadeInUp" data-wow-delay=".6s"
                    style="background:linear-gradient(135deg,#14532d,#15803d);border-radius:20px;padding:28px;text-align:center;">
                    <div style="font-size:40px;margin-bottom:12px;">🌱</div>
                    <h5 style="color:#fff;font-size:18px;font-weight:700;margin-bottom:8px;">Green Score của bạn</h5>
                    <p style="color:#bbf7d0;font-size:14px;margin-bottom:20px;">Kiểm tra mức độ sống xanh và nhận gợi ý cá nhân hóa.</p>
                    <a href="{{ route('green-score.public') }}" class="theme-btn" style="background:#fff;color:#15803d;font-size:13px;padding:10px 20px;">
                        Kiểm tra ngay <i class="far fa-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
