@extends('layouts.app')

@php
// Dữ liệu bài viết tĩnh — sau này thay bằng DB
$posts = [
    1 => [
        'id' => 1,
        'tag' => 'Sống xanh',
        'title' => 'Bắt đầu sống xanh từ những thay đổi nhỏ mỗi ngày',
        'excerpt' => 'Khám phá những bước đi đơn giản nhất để hình thành lối sống bảo vệ môi trường từ thói quen sinh hoạt hàng ngày.',
        'date' => '12 Tháng 5, 2026',
        'comments' => 12,
        'read_time' => '5',
        'image' => 'frontend/assets/img/news/1.png',
        'author' => 'Ban biên tập Green Credit',
        'author_avatar' => null,
        'content' => '
            <p>Trong cuộc sống hiện đại, nhiều người nghĩ rằng việc bảo vệ môi trường đòi hỏi những thay đổi lớn lao, tốn kém. Nhưng thực tế, <strong>những hành động nhỏ hằng ngày</strong> mới là nền tảng tạo nên sự thay đổi bền vững nhất.</p>

            <h2>🌿 1. Mang bình nước cá nhân</h2>
            <p>Trung bình mỗi người Việt Nam sử dụng <strong>khoảng 150 ly nhựa một lần/năm</strong>. Chỉ cần mang theo bình nước cá nhân và từ chối ly nhựa khi mua đồ uống, bạn đã góp phần giảm đáng kể lượng rác thải nhựa ra môi trường — đồng thời nhận thêm <strong>20 Green Points</strong> mỗi lần tại các cửa hàng đối tác Green Credit!</p>

            <blockquote style="border-left:4px solid #15803d;background:#f0fdf4;padding:16px 20px;border-radius:0 12px 12px 0;margin:24px 0;font-style:italic;color:#166534;">
                "Mỗi chiếc ly nhựa bạn từ chối hôm nay, là món quà bạn tặng cho thế hệ mai sau."
            </blockquote>

            <h2>♻️ 2. Phân loại rác tại nguồn</h2>
            <p>Phân loại rác thải sinh hoạt thành 3 nhóm cơ bản: <strong>rác hữu cơ, rác tái chế và rác còn lại</strong> giúp nâng cao hiệu quả tái chế lên đến 60%. Đây là thói quen đơn giản nhưng tác động cực kỳ lớn đến tổng lượng rác thải chôn lấp.</p>

            <div style="background:#f0fdf4;border-radius:16px;padding:20px 24px;margin:24px 0;border:1px solid #bbf7d0;">
                <strong style="color:#15803d;font-size:15px;">💡 Mẹo thực hành:</strong>
                <ul style="margin-top:12px;padding-left:20px;color:#374151;line-height:2;">
                    <li>Đặt 3 thùng rác nhỏ khác màu trong nhà bếp</li>
                    <li>Vỏ chai nhựa, hộp giấy → rác tái chế (xanh lá)</li>
                    <li>Thức ăn thừa, vỏ trái cây → rác hữu cơ (nâu)</li>
                    <li>Băng vệ sinh, bỉm, khẩu trang → rác còn lại (đen)</li>
                </ul>
            </div>

            <h2>🚲 3. Di chuyển xanh</h2>
            <p>Thay thế những chuyến đi ngắn dưới 3km bằng xe đạp hoặc đi bộ không chỉ giảm phát thải CO2 mà còn cải thiện sức khỏe của bạn. Với Green Credit, mỗi lần di chuyển xanh được ghi nhận sẽ tích thêm <strong>20 Green Points</strong> vào ví của bạn.</p>

            <h2>🛍️ 4. Mang túi vải khi đi mua sắm</h2>
            <p>Một chiếc túi vải có thể thay thế cho <strong>hàng trăm túi nilon</strong> trong vòng đời sử dụng của nó. Thói quen mang túi vải là một trong những hành động xanh được ghi nhận nhiều nhất trên nền tảng Green Credit, với 15 điểm mỗi lần sử dụng.</p>

            <h2>🌱 Kết luận</h2>
            <p>Hành trình sống xanh không cần bắt đầu từ những quyết định lớn. Hãy chọn <strong>một thói quen nhỏ</strong>, duy trì đều đặn trong 30 ngày, sau đó thêm dần các hành động mới. Green Credit sẽ đồng hành và ghi nhận từng bước tiến của bạn.</p>
        ',
        'related' => [2, 3],
    ],
    2 => [
        'id' => 2,
        'tag' => 'Green Score',
        'title' => 'Cách Green Score ghi nhận hành vi tiêu dùng bền vững',
        'excerpt' => 'Tìm hiểu chi tiết các khía cạnh đánh giá điểm Green Score và cách hệ thống tự động cập nhật tiến trình của bạn dựa trên hành vi thực tế.',
        'date' => '15 Tháng 5, 2026',
        'comments' => 8,
        'read_time' => '7',
        'image' => 'frontend/assets/img/news/2.png',
        'author' => 'Đội phân tích dữ liệu',
        'author_avatar' => null,
        'content' => '
            <p>Green Score là <strong>chỉ số hành vi sống xanh cá nhân hóa</strong> — trái tim của hệ thống đánh giá Green Credit. Không chỉ đơn giản là tổng số điểm tích lũy, Green Score phản ánh chất lượng và chiều sâu của hành trình sống xanh của bạn.</p>

            <h2>📊 5 Khía cạnh cấu thành Green Score</h2>

            <div style="background:#f0fdf4;border-radius:16px;padding:24px;margin:24px 0;border:1px solid #bbf7d0;">
                <div style="margin-bottom:16px;padding-bottom:16px;border-bottom:1px solid #dcfce7;">
                    <strong style="color:#15803d;">🌿 1. Behavior Score (tối đa 400 điểm)</strong>
                    <p style="margin-top:8px;color:#374151;font-size:14px;">Đo lường tổng lượng Green Points tích lũy trong 90 ngày gần nhất. Càng tích cực hành động xanh, điểm hành vi càng cao.</p>
                </div>
                <div style="margin-bottom:16px;padding-bottom:16px;border-bottom:1px solid #dcfce7;">
                    <strong style="color:#15803d;">📅 2. Consistency Score (tối đa 200 điểm)</strong>
                    <p style="margin-top:8px;color:#374151;font-size:14px;">Đánh giá số ngày hoạt động trong 30 ngày qua. Tính nhất quán — duy trì thói quen đều đặn — được thưởng điểm cao hơn việc làm nhiều trong một thời gian ngắn.</p>
                </div>
                <div style="margin-bottom:16px;padding-bottom:16px;border-bottom:1px solid #dcfce7;">
                    <strong style="color:#15803d;">🎯 3. Diversity Score (tối đa 150 điểm)</strong>
                    <p style="margin-top:8px;color:#374151;font-size:14px;">Khuyến khích bạn đa dạng hóa các hành động xanh — không chỉ mang bình nước mà còn tái chế, di chuyển xanh, dùng túi vải...</p>
                </div>
                <div style="margin-bottom:16px;padding-bottom:16px;border-bottom:1px solid #dcfce7;">
                    <strong style="color:#15803d;">✅ 4. Verification Score (tối đa 150 điểm)</strong>
                    <p style="margin-top:8px;color:#374151;font-size:14px;">Tỷ lệ hóa đơn hợp lệ trên tổng giao dịch. Đây là thước đo tính trung thực và đáng tin cậy của dữ liệu xanh bạn cung cấp.</p>
                </div>
                <div>
                    <strong style="color:#15803d;">👥 5. Community Score (tối đa 100 điểm)</strong>
                    <p style="margin-top:8px;color:#374151;font-size:14px;">Số lượng giao dịch tích lũy phản ánh mức độ tham gia vào cộng đồng Green Credit và lan truyền lối sống xanh.</p>
                </div>
            </div>

            <h2>⚠️ Fraud Penalty</h2>
            <p>Hệ thống phát hiện gian lận của Green Credit sẽ trừ điểm (tối đa 300 điểm) nếu phát hiện hành vi quét QR trùng lặp, sử dụng token giả hoặc lạm dụng hệ thống. Điều này đảm bảo tính công bằng cho toàn bộ cộng đồng.</p>
        ',
        'related' => [1, 3],
    ],
    3 => [
        'id' => 3,
        'tag' => 'Net Zero',
        'title' => 'Vai trò của dữ liệu xanh trong hành trình hướng tới Net Zero',
        'excerpt' => 'Hiểu rõ tầm quan trọng của việc thu thập và phân tích dữ liệu tiêu dùng xanh trong nỗ lực cắt giảm carbon quốc gia.',
        'date' => '18 Tháng 5, 2026',
        'comments' => 15,
        'read_time' => '8',
        'image' => 'frontend/assets/img/news/3.png',
        'author' => 'Nhóm nghiên cứu môi trường',
        'author_avatar' => null,
        'content' => '
            <p>Việt Nam đã cam kết đạt mục tiêu <strong>phát thải ròng bằng không (Net Zero) vào năm 2050</strong>. Để hiện thực hóa cam kết này, vai trò của dữ liệu hành vi tiêu dùng ở cấp độ cá nhân trở nên vô cùng quan trọng.</p>

            <h2>🌍 Tại sao dữ liệu xanh quan trọng?</h2>
            <p>Trong khi các chính sách vĩ mô tập trung vào ngành công nghiệp nặng và năng lượng tái tạo, thì <strong>hành vi tiêu dùng hàng ngày của 100 triệu người</strong> lại chiếm tới 60% tổng lượng phát thải CO2 của Việt Nam. Không có dữ liệu, không thể có giải pháp.</p>

            <blockquote style="border-left:4px solid #15803d;background:#f0fdf4;padding:16px 20px;border-radius:0 12px 12px 0;margin:24px 0;font-style:italic;color:#166534;">
                "You cannot manage what you cannot measure." — Peter Drucker
            </blockquote>

            <h2>📱 Green Credit — Hạ tầng dữ liệu xanh quốc gia</h2>
            <p>Mỗi lần người dùng quét QR hóa đơn xanh, hệ thống không chỉ tích điểm mà còn ghi nhận:</p>
            <ul style="padding-left:20px;line-height:2.2;color:#374151;">
                <li><strong>Lượng nhựa tiết kiệm</strong> (gram) từng hành động</li>
                <li><strong>CO2 giảm thiểu</strong> (kg) theo từng loại hành vi</li>
                <li><strong>Xu hướng tiêu dùng</strong> theo vùng địa lý và độ tuổi</li>
                <li><strong>Tiến trình cộng đồng</strong> hướng tới mục tiêu Net Zero</li>
            </ul>

            <h2>🗺️ Net Zero Planner cá nhân</h2>
            <p>Green Credit cung cấp công cụ <strong>Net Zero Planner</strong> giúp mỗi người dùng thiết lập mục tiêu giảm thiểu phát thải hàng tháng và theo dõi tiến trình thực tế của mình — biến cam kết toàn cầu thành hành động cá nhân cụ thể.</p>
        ',
        'related' => [1, 2],
    ],
    4 => [
        'id' => 4,
        'tag' => 'Voucher',
        'title' => '5 voucher xanh hấp dẫn nhất tháng 6 bạn không nên bỏ lỡ',
        'excerpt' => 'Tổng hợp những voucher ưu đãi tốt nhất từ các đối tác liên kết của Green Credit trong tháng này.',
        'date' => '20 Tháng 5, 2026',
        'comments' => 6,
        'read_time' => '4',
        'image' => 'frontend/assets/img/news/1.png',
        'author' => 'Team Marketing',
        'author_avatar' => null,
        'content' => '<p>Nội dung bài viết đang được cập nhật...</p>',
        'related' => [1, 2],
    ],
    5 => [
        'id' => 5,
        'tag' => 'Cộng đồng',
        'title' => 'Thử thách 30 ngày sống xanh: Kết quả bất ngờ từ cộng đồng',
        'excerpt' => 'Hơn 5,000 thành viên cùng tham gia thử thách 30 ngày không dùng túi nhựa.',
        'date' => '22 Tháng 5, 2026',
        'comments' => 24,
        'read_time' => '6',
        'image' => 'frontend/assets/img/news/2.png',
        'author' => 'Cộng đồng Green Credit',
        'author_avatar' => null,
        'content' => '<p>Nội dung bài viết đang được cập nhật...</p>',
        'related' => [1, 3],
    ],
];

$post = $posts[$id] ?? $posts[1];
$relatedPosts = collect($post['related'])->map(fn($rid) => $posts[$rid] ?? null)->filter()->values();
@endphp

@section('title', $post['title'] . ' | Green Credit')
@section('meta_description', $post['excerpt'])

@push('styles')
<style>
    .gc-detail-hero {
        background: linear-gradient(135deg, #14532d 0%, #166534 60%, #15803d 100%);
        padding: 72px 0 48px;
        position: relative;
        overflow: hidden;
    }
    .gc-detail-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .gc-breadcrumb a { color: #86efac; text-decoration: none; }
    .gc-breadcrumb a:hover { color: #fff; }
    .gc-breadcrumb span { color: rgba(255,255,255,0.4); margin: 0 8px; }

    /* Article */
    .gc-article-body {
        background: #fff;
        border-radius: 24px;
        padding: 40px 48px;
        box-shadow: 0 4px 32px rgba(0,0,0,0.07);
        border: 1px solid #f0fdf4;
    }
    @media(max-width: 768px) {
        .gc-article-body { padding: 24px 20px; }
    }
    .gc-article-body h2 {
        font-size: 22px;
        font-weight: 800;
        color: #111827;
        margin: 32px 0 16px;
        line-height: 1.4;
    }
    .gc-article-body h2:first-child { margin-top: 0; }
    .gc-article-body p {
        color: #374151;
        font-size: 16px;
        line-height: 1.9;
        margin-bottom: 20px;
    }
    .gc-article-body ul {
        color: #374151;
        font-size: 15px;
        line-height: 2;
        margin-bottom: 20px;
    }
    .gc-article-body blockquote {
        border-left: 4px solid #15803d;
        background: #f0fdf4;
        padding: 16px 24px;
        border-radius: 0 12px 12px 0;
        margin: 28px 0;
        font-style: italic;
        color: #166534;
        font-size: 16px;
        line-height: 1.7;
    }

    /* Meta bar */
    .gc-post-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px 0;
        border-top: 1px solid #f0fdf4;
        border-bottom: 1px solid #f0fdf4;
        margin-bottom: 32px;
        font-size: 14px;
        color: #6b7280;
    }
    .gc-post-meta span { display: flex; align-items: center; gap: 6px; }
    .gc-post-meta i { color: #15803d; }

    /* Author box */
    .gc-author-box {
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        border-radius: 16px;
        padding: 24px;
        display: flex;
        gap: 20px;
        align-items: center;
        border: 1px solid #bbf7d0;
        margin-top: 40px;
    }
    .gc-author-avatar {
        width: 64px; height: 64px;
        border-radius: 50%;
        background: linear-gradient(135deg, #14532d, #15803d);
        display: flex; align-items: center; justify-content: center;
        color: #fff; font-size: 24px; font-weight: 800;
        flex-shrink: 0;
    }

    /* Share buttons */
    .gc-share-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
        border: none;
        cursor: pointer;
    }
    .gc-share-fb { background: #1877f2; color: #fff; }
    .gc-share-tw { background: #1da1f2; color: #fff; }
    .gc-share-link { background: #f3f4f6; color: #374151; }
    .gc-share-btn:hover { opacity: 0.88; transform: translateY(-1px); }

    /* Comments */
    .gc-comment {
        display: flex;
        gap: 16px;
        padding: 20px 0;
        border-bottom: 1px solid #f3f4f6;
    }
    .gc-comment-avatar {
        width: 44px; height: 44px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 16px; font-weight: 700; color: #fff;
        flex-shrink: 0;
    }
    .gc-comment-content { flex: 1; }
    .gc-comment-name { font-weight: 700; color: #111827; font-size: 14px; }
    .gc-comment-date { font-size: 12px; color: #9ca3af; margin-bottom: 8px; }
    .gc-comment-text { font-size: 14px; color: #4b5563; line-height: 1.7; }

    /* Related */
    .gc-related-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #f0fdf4;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        transition: all 0.3s;
        text-decoration: none;
        display: block;
    }
    .gc-related-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(21,128,61,0.12);
        border-color: #bbf7d0;
    }
    .gc-related-img { width: 100%; height: 160px; object-fit: cover; }
    .gc-related-body { padding: 16px; }
    .gc-related-tag {
        font-size: 11px; font-weight: 700;
        color: #15803d; background: #dcfce7;
        padding: 3px 10px; border-radius: 100px;
        display: inline-block; margin-bottom: 8px;
    }
    .gc-related-title {
        font-size: 14px; font-weight: 700;
        color: #1f2937; line-height: 1.5;
    }

    /* Sidebar */
    .gc-sidebar-widget {
        background: #fff; border-radius: 16px; padding: 24px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.06);
        border: 1px solid #f0fdf4; margin-bottom: 24px;
    }
    .gc-sidebar-widget h5 {
        font-size: 16px; font-weight: 700; color: #111827;
        margin-bottom: 20px; padding-bottom: 12px;
        border-bottom: 2px solid #dcfce7;
    }
    .gc-tag-cloud { display: flex; flex-wrap: wrap; gap: 8px; }
    .gc-tag-item {
        display: inline-block; padding: 6px 14px;
        background: #f0fdf4; border: 1px solid #bbf7d0;
        border-radius: 100px; font-size: 13px; color: #15803d;
        font-weight: 500; text-decoration: none; transition: all 0.2s;
    }
    .gc-tag-item:hover { background: #15803d; color: #fff; border-color: #15803d; }
    .gc-progress-bar {
        background: #e5e7eb; border-radius: 100px; height: 8px; overflow: hidden;
    }
    .gc-progress-fill {
        height: 100%; border-radius: 100px;
        background: linear-gradient(90deg, #15803d, #4ade80);
        transition: width 1s ease;
    }
</style>
@endpush

@section('content')

{{-- Hero --}}
<section class="gc-detail-hero">
    <div class="container">
        <div class="gc-breadcrumb mb-4" style="font-size:13px;">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span>/</span>
            <a href="{{ route('news.index') }}">Tin tức</a>
            <span>/</span>
            <span style="color:rgba(255,255,255,0.7);">{{ Str::limit($post['title'], 40) }}</span>
        </div>

        <div style="max-width:800px;">
            <span style="display:inline-block;background:rgba(255,255,255,0.15);color:#bbf7d0;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;padding:5px 14px;border-radius:100px;margin-bottom:16px;">
                🏷️ {{ $post['tag'] }}
            </span>
            <h1 style="color:#fff;font-size:clamp(24px,3.5vw,40px);font-weight:800;line-height:1.3;margin-bottom:20px;">
                {{ $post['title'] }}
            </h1>
            <div style="display:flex;flex-wrap:wrap;gap:20px;font-size:13px;color:#bbf7d0;">
                <span><i class="far fa-calendar me-1"></i>{{ $post['date'] }}</span>
                <span><i class="far fa-user me-1"></i>{{ $post['author'] }}</span>
                <span><i class="far fa-clock me-1"></i>{{ $post['read_time'] }} phút đọc</span>
                <span><i class="far fa-comments me-1"></i>{{ $post['comments'] }} bình luận</span>
            </div>
        </div>
    </div>
</section>

<section class="section-padding fix" style="background:#f8fafb;">
    <div class="container">
        <div class="row g-4">

            {{-- Main Article --}}
            <div class="col-lg-8">

                {{-- Featured Image --}}
                <div style="border-radius:20px;overflow:hidden;margin-bottom:8px;box-shadow:0 8px 32px rgba(0,0,0,0.1);">
                    <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}"
                        style="width:100%;height:auto;max-height:420px;object-fit:cover;display:block;">
                </div>

                {{-- Article Body --}}
                <div class="gc-article-body wow fadeInUp">

                    {{-- Meta --}}
                    <div class="gc-post-meta">
                        <span><i class="far fa-calendar"></i>{{ $post['date'] }}</span>
                        <span><i class="far fa-user"></i>{{ $post['author'] }}</span>
                        <span><i class="far fa-clock"></i>{{ $post['read_time'] }} phút đọc</span>
                        <span><i class="far fa-comments"></i>{{ $post['comments'] }} bình luận</span>
                    </div>

                    {{-- Content --}}
                    <div class="gc-article-content">
                        {!! $post['content'] !!}
                    </div>

                    {{-- Tags --}}
                    <div style="margin-top:32px;padding-top:24px;border-top:1px solid #f3f4f6;">
                        <strong style="font-size:14px;color:#374151;margin-right:12px;">🏷️ Chủ đề:</strong>
                        <span style="display:inline-block;background:#dcfce7;color:#15803d;font-size:13px;font-weight:600;padding:5px 14px;border-radius:100px;margin:4px;">{{ $post['tag'] }}</span>
                        <span style="display:inline-block;background:#f0fdf4;color:#15803d;font-size:13px;font-weight:600;padding:5px 14px;border-radius:100px;margin:4px;">Sống bền vững</span>
                        <span style="display:inline-block;background:#f0fdf4;color:#15803d;font-size:13px;font-weight:600;padding:5px 14px;border-radius:100px;margin:4px;">Green Credit</span>
                    </div>

                    {{-- Share --}}
                    <div style="margin-top:24px;padding-top:24px;border-top:1px solid #f3f4f6;">
                        <strong style="font-size:14px;color:#374151;margin-right:12px;">📤 Chia sẻ:</strong>
                        <a href="#" class="gc-share-btn gc-share-fb me-2">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="#" class="gc-share-btn gc-share-tw me-2">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <button onclick="navigator.clipboard.writeText(window.location.href);this.textContent='✓ Đã sao chép!';setTimeout(()=>this.textContent='🔗 Sao chép link',2000)"
                            class="gc-share-btn gc-share-link">
                            🔗 Sao chép link
                        </button>
                    </div>

                    {{-- Author Box --}}
                    <div class="gc-author-box">
                        <div class="gc-author-avatar">
                            {{ strtoupper(substr($post['author'], 0, 1)) }}
                        </div>
                        <div>
                            <div style="font-size:12px;color:#6b7280;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:4px;">Tác giả</div>
                            <div style="font-size:17px;font-weight:800;color:#14532d;margin-bottom:6px;">{{ $post['author'] }}</div>
                            <div style="font-size:14px;color:#4b5563;line-height:1.6;">Chuyên gia nội dung tại Green Credit Platform, đồng hành cùng cộng đồng sống xanh Việt Nam.</div>
                        </div>
                    </div>
                </div>

                {{-- Comments Section --}}
                <div class="gc-article-body mt-4 wow fadeInUp" data-wow-delay=".2s">
                    <h4 style="font-size:20px;font-weight:800;color:#111827;margin-bottom:24px;">
                        💬 {{ $post['comments'] }} Bình luận
                    </h4>

                    @php
                    $comments = [
                        ['name' => 'Nguyễn Minh Anh', 'color' => '#15803d', 'date' => '13 Tháng 5, 2026', 'text' => 'Bài viết rất hữu ích! Mình đã bắt đầu mang bình nước từ tháng trước và thấy khác biệt rõ rệt. Green Credit giúp mình có động lực hơn rất nhiều.'],
                        ['name' => 'Trần Quốc Bảo', 'color' => '#0066cc', 'date' => '14 Tháng 5, 2026', 'text' => 'Mình là chủ quán cà phê, đang cân nhắc tham gia Green Credit. Bài viết này đã giúp mình hiểu rõ hơn về lợi ích cho cả khách hàng lẫn cửa hàng.'],
                        ['name' => 'Lê Thu Hương', 'color' => '#a50064', 'date' => '15 Tháng 5, 2026', 'text' => 'Cảm ơn ban biên tập! Mong Green Credit sớm có thêm nhiều đối tác liên kết ở khu vực Hà Nội.'],
                    ];
                    @endphp

                    @foreach($comments as $comment)
                    <div class="gc-comment">
                        <div class="gc-comment-avatar" style="background:{{ $comment['color'] }};">
                            {{ strtoupper(substr($comment['name'], 0, 1)) }}
                        </div>
                        <div class="gc-comment-content">
                            <div class="gc-comment-name">{{ $comment['name'] }}</div>
                            <div class="gc-comment-date"><i class="far fa-calendar me-1" style="color:#15803d;"></i>{{ $comment['date'] }}</div>
                            <div class="gc-comment-text">{{ $comment['text'] }}</div>
                        </div>
                    </div>
                    @endforeach

                    {{-- Comment form --}}
                    <div style="margin-top:32px;padding-top:28px;border-top:1px solid #f3f4f6;">
                        <h5 style="font-size:17px;font-weight:700;color:#111827;margin-bottom:20px;">✍️ Để lại bình luận</h5>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Họ và tên *"
                                        style="border-radius:12px;border-color:#e5e7eb;padding:12px 16px;">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email *"
                                        style="border-radius:12px;border-color:#e5e7eb;padding:12px 16px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="4" placeholder="Bình luận của bạn..."
                                        style="border-radius:12px;border-color:#e5e7eb;padding:12px 16px;resize:none;"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="theme-btn">
                                        Gửi bình luận <i class="far fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Related Posts --}}
                @if($relatedPosts->count())
                <div class="mt-4">
                    <h4 style="font-size:20px;font-weight:800;color:#111827;margin-bottom:20px;">📚 Bài viết liên quan</h4>
                    <div class="row g-3">
                        @foreach($relatedPosts as $related)
                        <div class="col-md-6">
                            <a href="{{ route('news.show', $related['id']) }}" class="gc-related-card">
                                <img src="{{ asset($related['image']) }}" class="gc-related-img" alt="{{ $related['title'] }}">
                                <div class="gc-related-body">
                                    <span class="gc-related-tag">{{ $related['tag'] }}</span>
                                    <div class="gc-related-title">{{ $related['title'] }}</div>
                                    <div style="font-size:12px;color:#9ca3af;margin-top:8px;">
                                        <i class="far fa-calendar me-1" style="color:#15803d;"></i>{{ $related['date'] }}
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Navigation --}}
                <div style="display:flex;gap:12px;margin-top:32px;flex-wrap:wrap;">
                    <a href="{{ route('news.index') }}"
                        style="display:inline-flex;align-items:center;gap:8px;padding:12px 24px;background:#fff;border:1.5px solid #e5e7eb;border-radius:12px;color:#374151;font-size:14px;font-weight:600;text-decoration:none;transition:all .2s;"
                        onmouseover="this.style.borderColor='#15803d';this.style.color='#15803d'"
                        onmouseout="this.style.borderColor='#e5e7eb';this.style.color='#374151'">
                        <i class="far fa-arrow-left"></i> Về danh sách tin tức
                    </a>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">

                {{-- Progress to Net Zero --}}
                <div class="gc-sidebar-widget wow fadeInUp"
                    style="background:linear-gradient(135deg,#14532d,#15803d);border:none;">
                    <h5 style="color:#fff;border-bottom-color:rgba(255,255,255,0.2);">🌍 Tiến trình Net Zero</h5>
                    <p style="color:#bbf7d0;font-size:13px;margin-bottom:16px;">Cộng đồng Green Credit đang tiến đến mục tiêu:</p>
                    @php
                    $metrics = [
                        ['label' => 'Nhựa tiết kiệm', 'value' => '18.4 tấn', 'pct' => 73],
                        ['label' => 'CO2 giảm thiểu', 'value' => '12.1 tấn', 'pct' => 60],
                        ['label' => 'Hành động xanh', 'value' => '95,200', 'pct' => 85],
                    ];
                    @endphp
                    @foreach($metrics as $m)
                    <div style="margin-bottom:16px;">
                        <div style="display:flex;justify-content:space-between;margin-bottom:6px;">
                            <span style="color:#fff;font-size:13px;font-weight:600;">{{ $m['label'] }}</span>
                            <span style="color:#4ade80;font-size:13px;font-weight:700;">{{ $m['value'] }}</span>
                        </div>
                        <div class="gc-progress-bar" style="background:rgba(255,255,255,0.2);">
                            <div class="gc-progress-fill" style="width:{{ $m['pct'] }}%;"></div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Recent articles --}}
                <div class="gc-sidebar-widget wow fadeInUp" data-wow-delay=".2s">
                    <h5>📰 Bài viết khác</h5>
                    @foreach(array_values($posts) as $p)
                    @if($p['id'] !== $post['id'])
                    <a href="{{ route('news.show', $p['id']) }}"
                        style="display:flex;gap:14px;padding:12px 0;border-bottom:1px solid #f3f4f6;text-decoration:none;transition:all .2s;"
                        onmouseover="this.querySelector('.sp-title').style.color='#15803d'"
                        onmouseout="this.querySelector('.sp-title').style.color='#1f2937'">
                        <img src="{{ asset($p['image']) }}"
                            style="width:72px;height:58px;border-radius:10px;object-fit:cover;flex-shrink:0;" alt="">
                        <div>
                            <div class="sp-title" style="font-size:13px;font-weight:600;color:#1f2937;line-height:1.5;margin-bottom:4px;transition:color .2s;">{{ $p['title'] }}</div>
                            <div style="font-size:12px;color:#9ca3af;"><i class="far fa-calendar me-1" style="color:#15803d;"></i>{{ $p['date'] }}</div>
                        </div>
                    </a>
                    @endif
                    @endforeach
                </div>

                {{-- Tags --}}
                <div class="gc-sidebar-widget wow fadeInUp" data-wow-delay=".4s">
                    <h5>🏷️ Chủ đề</h5>
                    <div class="gc-tag-cloud">
                        @foreach(['Sống xanh','Green Score','Net Zero','QR Code','Voucher','Cộng đồng','Nhựa','CO2','Tái chế'] as $tag)
                        <a href="{{ route('news.index') }}" class="gc-tag-item">{{ $tag }}</a>
                        @endforeach
                    </div>
                </div>

                {{-- CTA --}}
                <div class="wow fadeInUp" data-wow-delay=".6s"
                    style="background:linear-gradient(135deg,#f0fdf4,#dcfce7);border-radius:20px;padding:28px;text-align:center;border:1px solid #bbf7d0;">
                    <div style="font-size:40px;margin-bottom:12px;">🌱</div>
                    <h5 style="color:#14532d;font-size:17px;font-weight:800;margin-bottom:8px;">Bắt đầu hành trình xanh</h5>
                    <p style="color:#4b5563;font-size:13px;margin-bottom:20px;line-height:1.6;">Tạo tài khoản miễn phí và nhận ngay 50 Green Points chào mừng!</p>
                    <a href="{{ route('register') }}" class="theme-btn" style="font-size:13px;padding:11px 22px;">
                        Đăng ký ngay <i class="far fa-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
