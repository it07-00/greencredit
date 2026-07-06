<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Báo cáo hiệu quả sinh thái - Green Credit</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 13px;
            color: #333333;
            line-height: 1.5;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #15803d;
            padding-bottom: 10px;
        }
        .header h1 {
            color: #15803d;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0 0 0;
            color: #666;
            font-size: 12px;
        }
        .meta-table {
            width: 100%;
            margin-bottom: 25px;
            border-collapse: collapse;
        }
        .meta-table td {
            padding: 4px 0;
        }
        .meta-label {
            font-weight: bold;
            color: #555;
            width: 150px;
        }
        .stats-grid {
            margin-bottom: 30px;
        }
        .stats-card {
            display: inline-block;
            width: 45%;
            margin-right: 4%;
            margin-bottom: 15px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px;
            box-sizing: border-box;
        }
        .stats-card:nth-child(even) {
            margin-right: 0;
        }
        .stats-title {
            font-size: 11px;
            color: #64748b;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .stats-value {
            font-size: 18px;
            color: #0f172a;
            font-weight: bold;
        }
        .section-title {
            color: #15803d;
            font-size: 16px;
            border-left: 4px solid #15803d;
            padding-left: 8px;
            margin-bottom: 15px;
            margin-top: 20px;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .data-table th {
            background-color: #15803d;
            color: #ffffff;
            font-weight: bold;
            text-align: left;
            padding: 8px;
            font-size: 12px;
        }
        .data-table td {
            padding: 8px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 12px;
        }
        .data-table tr:nth-child(even) {
            background-color: #f8fafc;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
            padding-top: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>BÁO CÁO HIỆU QUẢ SINH THÁI</h1>
        <p>Hệ sinh thái tín dụng xanh Green Credit</p>
    </div>

    <table class="meta-table">
        <tr>
            <td class="meta-label">Cửa hàng:</td>
            <td>{{ $store->name }}</td>
            <td class="meta-label">Ngày xuất báo cáo:</td>
            <td>{{ $date }}</td>
        </tr>
        <tr>
            <td class="meta-label">Người xuất:</td>
            <td>{{ $user->name }} ({{ $user->role === 'store_owner' ? 'Chủ cửa hàng' : 'Nhân viên' }})</td>
            <td class="meta-label">Email liên hệ:</td>
            <td>{{ $user->email }}</td>
        </tr>
    </table>

    <div class="section-title">Chỉ số sinh thái tổng quan</div>
    <div class="stats-grid">
        <div class="stats-card">
            <div class="stats-title">Tổng số hóa đơn xanh</div>
            <div class="stats-value">{{ $totalInvoices }} hóa đơn</div>
        </div>
        <div class="stats-card">
            <div class="stats-title">Tổng điểm tích lũy phát hành</div>
            <div class="stats-value">{{ number_format($totalPoints) }} điểm</div>
        </div>
        <div class="stats-card">
            <div class="stats-title">Tổng lượng nhựa giảm thiểu</div>
            <div class="stats-value">{{ number_format($totalPlasticKg, 2) }} kg</div>
        </div>
        <div class="stats-card">
            <div class="stats-title">Tổng lượng CO₂ giảm phát</div>
            <div class="stats-value">{{ number_format($totalCo2Kg, 2) }} kg CO₂</div>
        </div>
    </div>

    <div class="section-title">Danh sách hóa đơn gần đây</div>
    <table class="data-table">
        <thead>
            <tr>
                <th>Mã hóa đơn</th>
                <th>Trạng thái</th>
                <th>Điểm tích lũy</th>
                <th>Chỉ số sinh thái</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        <tbody>
            @forelse($invoices->take(15) as $i)
                <tr>
                    <td>{{ $i->invoice_code }}</td>
                    <td>{{ $i->status === 'used' ? 'Đã quét' : 'Chờ quét' }}</td>
                    <td>{{ number_format($i->base_points) }} điểm</td>
                    <td>{{ number_format($i->plastic_saved_grams) }}g nhựa / {{ number_format($i->co2_saved_kg, 2) }}kg CO₂</td>
                    <td>{{ $i->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #666;">Chưa có hóa đơn phát sinh.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Cảm ơn bạn đã đồng hành cùng Green Credit xây dựng lối sống xanh bền vững.</p>
        <p>Báo cáo này được tạo tự động bởi hệ thống Green Credit POS.</p>
    </div>
</body>
</html>
