@php $stats = $this->getStats(); @endphp
<div style="width:100%;box-sizing:border-box;">
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;width:100%;">
        @foreach ($stats as $stat)
        <div style="background:#fff;border:1px solid #e5e7eb;border-radius:20px;padding:22px 20px;box-shadow:0 2px 10px rgba(0,0,0,.05);min-width:0;">
            <div style="display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:14px;">
                <p style="margin:0;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#6b7280;line-height:1.3;">{{ $stat['label'] }}</p>
                <div style="width:40px;height:40px;flex-shrink:0;border-radius:12px;display:flex;align-items:center;justify-content:center;background:{{ $stat['bg'] }};margin-left:8px;">
                    @if ($stat['type'] === 'beaker')
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="{{ $stat['stroke'] }}" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15M14.25 3.104c.251.023.501.05.75.082M19.8 15a2.25 2.25 0 0 1 .75 1.7v.9a2.25 2.25 0 0 1-2.25 2.25h-15A2.25 2.25 0 0 1 1.05 17.6v-.9a2.25 2.25 0 0 1 .75-1.7L5 14.5m14.8.5L14.25 10" /></svg>
                    @elseif ($stat['type'] === 'cloud')
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="{{ $stat['stroke'] }}" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15a4.5 4.5 0 0 0 4.5 4.5H18a3.75 3.75 0 0 0 1.332-7.257 3 3 0 0 0-3.758-3.848 5.25 5.25 0 0 0-10.233 2.33A4.502 4.502 0 0 0 2.25 15Z" /></svg>
                    @elseif ($stat['type'] === 'qr')
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="{{ $stat['stroke'] }}" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" /></svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="{{ $stat['stroke'] }}" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                    @endif
                </div>
            </div>
            <p style="margin:0;font-size:32px;font-weight:900;color:#111827;line-height:1;letter-spacing:-.5px;">{{ $stat['value'] }}</p>
            <p style="margin:6px 0 0;font-size:12px;color:#9ca3af;line-height:1.4;">{{ $stat['sub'] }}</p>
        </div>
        @endforeach
    </div>
</div>
