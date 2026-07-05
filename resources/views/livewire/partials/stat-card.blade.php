<div class="gc-card rounded-[1.75rem] p-6">
    <p class="text-xs font-black uppercase tracking-[.18em] text-emerald-700">{{ $label }}</p>
    <p class="mt-3 text-4xl font-black text-[#0b3b2d]">{{ $value }}</p>
    @isset($hint)<p class="mt-2 text-sm text-slate-500">{{ $hint }}</p>@endisset
</div>
