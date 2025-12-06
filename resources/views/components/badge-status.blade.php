@props(['status'])

@php
    $colors = [
        'draft' => 'bg-gray-200 text-gray-700',
        'dikirim' => 'bg-blue-200 text-blue-700',
        'selesai' => 'bg-green-200 text-green-700',
        'batal' => 'bg-red-200 text-red-700',
    ];
@endphp

<span class="px-3 py-1 text-xs rounded-full {{ $colors[$status] ?? 'bg-gray-100' }}">
    {{ ucfirst($status) }}
</span>