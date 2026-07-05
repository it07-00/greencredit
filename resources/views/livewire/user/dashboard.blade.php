<div>
    @php
        $user    = auth()->user();
        $balance = $wallet->current_balance ?? 0;
        $plastic = $plastic ?? 0;
        $co2     = $co2 ?? 0;
        $levelLabel = $level['label'] ?? 'Mầm Xanh';
        $levelColor = $level['color'] ?? '#6b7280';
        $levelNext  = $level['next'] ?? 200;
        $progressPct = $levelNext ? min(100, round(($score / $levelNext) * 100)) : 100;
    @endphp

    <!-- Hero Banner -->
    <section style="background: linear-gradient(135deg, #064e3b 0%, #065f46 40%, #047857 70%, #059669 100%); position: relative; overflow: hidden;">
        <div style="position:absolute;inset:0;opacity:.08;background-image:radial-gradient(circle at 20% 50%, #fff 1px, transparent 1px),radial-gradient(circle at 80% 20%, #fff 1px, transparent 1px);background-size:40px 40px;"></div>
        <div class="mx-auto max-w-7xl px-4 py-10" style="position:relative;z-index:1;">
            <div style="display:grid;grid-template-columns:1fr auto;align-items:center;gap:24px;">
                <div>
                    <p style="color:#a7f3d0;font-size:14px;font-weight:600;letter-spacing:.05em;text-transform:uppercase;margin-bottom:6px;">Xin chào trở lại 👋</p>
                    <h1 style="color:#fff;font-size:clamp(24px,4vw,36px);font-weight:900;margin-bottom:4px;">{{ $user->name }}</h1>
                    <p style="color:#6ee7b7;font-size:14px;">{{ $user->email }}</p>
                    <div style="display:flex;align-items:center;gap:12px;margin-top:16px;flex-wrap:wrap;">
                        <span style="background:rgba(255,255,255,.12);backdrop-filter:blur(4px);border:1px solid rgba(255,255,255,.2);border-radius:999px;padding:6px 16px;color:#fff;font-size:13px;font-weight:700;">
                            🌿 {{ $levelLabel }}
                        </span>
                        <span style="background:rgba(255,255,255,.12);backdrop-filter:blur(4px);border:1px solid rgba(255,255,255,.2);border-radius:999px;padding:6px 16px;color:#fff;font-size:13px;font-weight:700;">
                            🔥 {{ $streakDays }} ngày liên tiếp
                        </span>
                        <a href="{{ route('user.scan-qr') }}" style="background:#10b981;border-radius:999px;padding:8px 20px;color:#fff;font-size:13px;font-weight:800;text-decoration:none;display:inline-flex;align-items:center;gap:6px;box-shadow:0 4px 12px rgba(16,185,129,.4);">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z" /></svg>
                            Quét QR tích điểm
                        </a>
                    </div>
                </div>
                <!-- Points Big Number -->
                <div style="text-align:center;background:rgba(255,255,255,.1);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,.2);border-radius:24px;padding:24px 32px;min-width:180px;">
                    <p style="color:#a7f3d0;font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;margin-bottom:4px;">Green Points</p>
                    <p style="color:#fff;font-size:52px;font-weight:900;line-height:1;">{{ number_format($balance) }}</p>
                    <p style="color:#6ee7b7;font-size:12px;margin-top:4px;">Điểm khả dụng</p>
                    <a href="{{ route('user.wallet') }}" style="display:inline-block;margin-top:10px;color:#34d399;font-size:12px;font-weight:700;text-decoration:none;border-bottom:1px solid rgba(52,211,153,.4);">Xem ví →</a>
                </div>
            </div>

            <!-- Green Level Progress Bar -->
            <div style="margin-top:24px;background:rgba(255,255,255,.08);border-radius:12px;padding:12px 20px;display:flex;align-items:center;gap:16px;">
                <div style="flex:1;">
                    <div style="display:flex;justify-content:space-between;margin-bottom:6px;">
                        <span style="color:#a7f3d0;font-size:12px;font-weight:700;">Cấp độ: <span style="color:#fff;">{{ $levelLabel }}</span></span>
                        <span style="color:#6ee7b7;font-size:12px;">{{ $score }}{{ $levelNext ? ' / ' . $levelNext . ' điểm' : ' (Cấp tối đa)' }}</span>
                    </div>
                    <div style="background:rgba(255,255,255,.15);border-radius:999px;height:8px;overflow:hidden;">
                        <div style="background:linear-gradient(90deg,#34d399,#10b981);height:100%;border-radius:999px;width:{{ $progressPct }}%;transition:width .8s ease;"></div>
                    </div>
                </div>
                @if ($levelNext)
                    <div style="text-align:center;min-width:60px;">
                        <p style="color:#6ee7b7;font-size:10px;">Còn lại</p>
                        <p style="color:#fff;font-size:18px;font-weight:900;">{{ number_format($levelNext - $score) }}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Stat Cards -->
    <section class="mx-auto max-w-7xl px-4 py-8">
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-bottom:32px;">
            <!-- Green Score -->
            <div style="background:#fff;border:1px solid #e2e8f0;border-radius:20px;padding:20px;box-shadow:0 4px 20px rgba(0,0,0,.05);">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
                    <span style="font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.05em;">Green Score</span>
                    <div style="width:36px;height:36px;background:#f0fdf4;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#16a34a" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                    </div>
                </div>
                <p style="font-size:36px;font-weight:900;color:#0f172a;line-height:1;">{{ number_format($score) }}</p>
                <p style="font-size:12px;color:#16a34a;font-weight:700;margin-top:4px;">{{ $levelLabel }}</p>
            </div>

            <!-- Plastic Saved -->
            <div style="background:#fff;border:1px solid #e2e8f0;border-radius:20px;padding:20px;box-shadow:0 4px 20px rgba(0,0,0,.05);">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
                    <span style="font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.05em;">Nhựa đã giảm</span>
                    <div style="width:36px;height:36px;background:#eff6ff;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#0284c7" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15M14.25 3.104c.251.023.501.05.75.082M19.8 15a2.25 2.25 0 0 1 .75 1.7v.9a2.25 2.25 0 0 1-2.25 2.25h-15A2.25 2.25 0 0 1 1.05 17.6v-.9a2.25 2.25 0 0 1 .75-1.7L5 14.5m14.8.5L14.25 10" /></svg>
                    </div>
                </div>
                <p style="font-size:36px;font-weight:900;color:#0f172a;line-height:1;">{{ number_format($plastic / 1000, 2) }}</p>
                <p style="font-size:12px;color:#0284c7;font-weight:700;margin-top:4px;">kg nhựa tránh được</p>
            </div>

            <!-- CO2 Saved -->
            <div style="background:#fff;border:1px solid #e2e8f0;border-radius:20px;padding:20px;box-shadow:0 4px 20px rgba(0,0,0,.05);">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
                    <span style="font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.05em;">CO₂ đã giảm</span>
                    <div style="width:36px;height:36px;background:#f0fdf4;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#15803d" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15a4.5 4.5 0 0 0 4.5 4.5H18a3.75 3.75 0 0 0 1.332-7.257 3 3 0 0 0-3.758-3.848 5.25 5.25 0 0 0-10.233 2.33A4.502 4.502 0 0 0 2.25 15Z" /></svg>
                    </div>
                </div>
                <p style="font-size:36px;font-weight:900;color:#0f172a;line-height:1;">{{ number_format($co2, 2) }}</p>
                <p style="font-size:12px;color:#15803d;font-weight:700;margin-top:4px;">kg CO₂ tránh phát thải</p>
            </div>

            <!-- Streak -->
            <div style="background:#fff;border:1px solid #e2e8f0;border-radius:20px;padding:20px;box-shadow:0 4px 20px rgba(0,0,0,.05);">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
                    <span style="font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.05em;">Chuỗi xanh</span>
                    <div style="width:36px;height:36px;background:#fff7ed;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;">🔥</div>
                </div>
                <p style="font-size:36px;font-weight:900;color:#0f172a;line-height:1;">{{ $streakDays }}</p>
                <p style="font-size:12px;color:#ea580c;font-weight:700;margin-top:4px;">ngày hành động liên tiếp</p>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div style="display:grid;grid-template-columns:1fr 380px;gap:24px;align-items:start;" class="lg-grid">

            <!-- Left: Chart + Transactions -->
            <div style="display:flex;flex-direction:column;gap:20px;">

                <!-- Points Chart -->
                <div style="background:#fff;border:1px solid #e2e8f0;border-radius:20px;padding:24px;box-shadow:0 4px 20px rgba(0,0,0,.05);">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
                        <div>
                            <h2 style="font-size:16px;font-weight:800;color:#0f172a;margin:0;">Green Points theo tháng</h2>
                            <p style="font-size:12px;color:#64748b;margin-top:2px;">6 tháng gần nhất</p>
                        </div>
                        <a href="{{ route('user.transactions') }}" style="font-size:12px;color:#059669;font-weight:700;text-decoration:none;">Xem tất cả →</a>
                    </div>
                    <canvas id="userPointsChart" height="100"></canvas>
                </div>

                <!-- Recent Transactions -->
                <div style="background:#fff;border:1px solid #e2e8f0;border-radius:20px;padding:24px;box-shadow:0 4px 20px rgba(0,0,0,.05);">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
                        <h2 style="font-size:16px;font-weight:800;color:#0f172a;margin:0;">Lịch sử giao dịch</h2>
                        <a href="{{ route('user.transactions') }}" style="font-size:12px;color:#059669;font-weight:700;text-decoration:none;">Xem tất cả →</a>
                    </div>
                    <div style="display:flex;flex-direction:column;gap:8px;">
                        @forelse ($transactions as $tx)
                            <div style="display:flex;align-items:center;gap:12px;padding:12px;border-radius:12px;background:#f8fafc;transition:background .15s;" onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='#f8fafc'">
                                <div style="width:40px;height:40px;background:{{ $tx->points > 0 ? '#f0fdf4' : '#fef2f2' }};border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    @if ($tx->points > 0)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#16a34a" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#dc2626" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                    @endif
                                </div>
                                <div style="flex:1;min-width:0;">
                                    <p style="font-size:13px;font-weight:600;color:#0f172a;margin:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $tx->description }}</p>
                                    <p style="font-size:11px;color:#94a3b8;margin-top:2px;">{{ $tx->created_at->diffForHumans() }}</p>
                                </div>
                                <div style="text-align:right;flex-shrink:0;">
                                    <span style="font-size:15px;font-weight:800;color:{{ $tx->points > 0 ? '#16a34a' : '#dc2626' }};">{{ $tx->points > 0 ? '+' : '' }}{{ number_format($tx->points) }}</span>
                                    <p style="font-size:10px;color:#94a3b8;margin-top:1px;">điểm</p>
                                </div>
                            </div>
                        @empty
                            <div style="text-align:center;padding:40px 20px;">
                                <div style="font-size:40px;margin-bottom:12px;">🌱</div>
                                <p style="color:#64748b;font-size:14px;">Chưa có giao dịch nào.<br>Hãy quét QR hóa đơn xanh đầu tiên!</p>
                                <a href="{{ route('user.scan-qr') }}" style="display:inline-block;margin-top:16px;background:#059669;color:#fff;border-radius:12px;padding:10px 20px;font-size:13px;font-weight:700;text-decoration:none;">Quét QR ngay</a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Right: Quick Actions + Vouchers + Green Tips -->
            <div style="display:flex;flex-direction:column;gap:20px;">

                <!-- Quick Actions -->
                <div style="background:linear-gradient(135deg,#064e3b,#065f46);border-radius:20px;padding:24px;">
                    <h2 style="font-size:16px;font-weight:800;color:#fff;margin:0 0 16px;">Thao tác nhanh</h2>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
                        <a href="{{ route('user.scan-qr') }}" style="background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18);border-radius:14px;padding:14px 10px;text-align:center;text-decoration:none;transition:background .2s;" onmouseover="this.style.background='rgba(255,255,255,.2)'" onmouseout="this.style.background='rgba(255,255,255,.12)'">
                            <div style="font-size:22px;margin-bottom:6px;">📱</div>
                            <p style="color:#fff;font-size:11px;font-weight:700;margin:0;">Quét QR</p>
                        </a>
                        <a href="{{ route('user.wallet') }}" style="background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18);border-radius:14px;padding:14px 10px;text-align:center;text-decoration:none;transition:background .2s;" onmouseover="this.style.background='rgba(255,255,255,.2)'" onmouseout="this.style.background='rgba(255,255,255,.12)'">
                            <div style="font-size:22px;margin-bottom:6px;">💳</div>
                            <p style="color:#fff;font-size:11px;font-weight:700;margin:0;">Green Wallet</p>
                        </a>
                        <a href="{{ route('user.vouchers') }}" style="background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18);border-radius:14px;padding:14px 10px;text-align:center;text-decoration:none;transition:background .2s;" onmouseover="this.style.background='rgba(255,255,255,.2)'" onmouseout="this.style.background='rgba(255,255,255,.12)'">
                            <div style="font-size:22px;margin-bottom:6px;">🎁</div>
                            <p style="color:#fff;font-size:11px;font-weight:700;margin:0;">Đổi Voucher</p>
                        </a>
                        <a href="{{ route('user.green-score') }}" style="background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18);border-radius:14px;padding:14px 10px;text-align:center;text-decoration:none;transition:background .2s;" onmouseover="this.style.background='rgba(255,255,255,.2)'" onmouseout="this.style.background='rgba(255,255,255,.12)'">
                            <div style="font-size:22px;margin-bottom:6px;">⭐</div>
                            <p style="color:#fff;font-size:11px;font-weight:700;margin:0;">Green Score</p>
                        </a>
                    </div>
                </div>

                <!-- Available Vouchers -->
                @if ($vouchers->count() > 0)
                <div style="background:#fff;border:1px solid #e2e8f0;border-radius:20px;padding:24px;box-shadow:0 4px 20px rgba(0,0,0,.05);">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;">
                        <h2 style="font-size:16px;font-weight:800;color:#0f172a;margin:0;">Voucher gợi ý</h2>
                        <a href="{{ route('user.vouchers') }}" style="font-size:12px;color:#059669;font-weight:700;text-decoration:none;">Xem tất cả →</a>
                    </div>
                    <div style="display:flex;flex-direction:column;gap:10px;">
                        @foreach ($vouchers->take(3) as $v)
                            <div style="display:flex;align-items:center;gap:12px;padding:12px;border:1px dashed #d1fae5;border-radius:12px;background:#f0fdf4;">
                                <div style="width:44px;height:44px;background:#059669;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <span style="color:#fff;font-weight:900;font-size:12px;">-{{ $v->discount_percent ?? '?' }}%</span>
                                </div>
                                <div style="flex:1;min-width:0;">
                                    <p style="font-size:13px;font-weight:700;color:#0f172a;margin:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $v->name }}</p>
                                    <p style="font-size:11px;color:#059669;margin-top:2px;font-weight:600;">{{ number_format($v->points_required) }} điểm</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Green Tips -->
                <div style="background:#fefce8;border:1px solid #fef08a;border-radius:20px;padding:20px;">
                    <h2 style="font-size:15px;font-weight:800;color:#713f12;margin:0 0 12px;">💡 Gợi ý hành động hôm nay</h2>
                    @foreach ([['🥤','Không dùng ống hút nhựa tại quán','Tiết kiệm ~3g nhựa'],['🎒','Mang túi vải khi đi chợ/siêu thị','Thay thế 2 túi nilon/lần'],['🚲','Đi xe đạp hoặc đi bộ gần nhà','Giảm ~0.2kg CO₂']] as $tip)
                        <div style="display:flex;gap:10px;margin-bottom:10px;align-items:flex-start;">
                            <span style="font-size:18px;flex-shrink:0;">{{ $tip[0] }}</span>
                            <div>
                                <p style="font-size:12px;font-weight:700;color:#78350f;margin:0;">{{ $tip[1] }}</p>
                                <p style="font-size:11px;color:#92400e;margin-top:2px;">{{ $tip[2] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('userPointsChart');
        if (!ctx) return;
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! $chartLabels !!},
                datasets: [{
                    label: 'Green Points',
                    data: {!! $chartData !!},
                    borderColor: '#059669',
                    backgroundColor: 'rgba(5,150,105,0.1)',
                    borderWidth: 2.5,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#059669',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { color: '#94a3b8', font: { size: 11 } } },
                    x: { grid: { display: false }, ticks: { color: '#94a3b8', font: { size: 11 } } }
                }
            }
        });
    });
    </script>

    <style>
        @media (max-width: 1023px) {
            .lg-grid { grid-template-columns: 1fr !important; }
        }
    </style>
</div>
