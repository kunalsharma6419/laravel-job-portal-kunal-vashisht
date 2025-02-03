@props(['variant' => 'primary'])

<a {{ $attributes }} @class([
    'px-4 py-2 rounded text-sm font-medium',
    'bg-brand text-white' => $variant == 'primary',
    'bg-slate-100 text-slate-600' => $variant == 'secondary',
])>
    {{ $slot }}
</a>
