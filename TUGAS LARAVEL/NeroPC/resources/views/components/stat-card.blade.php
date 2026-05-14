@props(['judul', 'nilai', 'ikon', 'warna'])

@php
$colorClasses = [
    'primary' => 'bg-blue-500',
    'success' => 'bg-green-500',
    'danger' => 'bg-red-500',
    'warning' => 'bg-yellow-500',
][$warna] ?? 'bg-gray-500';
@endphp

<div class="relative overflow-hidden rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 {{ $colorClasses }} text-white p-6 flex flex-col justify-between h-32">
    <div>
        <h3 class="text-sm font-semibold uppercase tracking-wider opacity-80">{{ $judul }}</h3>
        <p class="text-3xl font-bold mt-2">{{ $nilai }}</p>
    </div>
    <div class="absolute -bottom-4 -right-4 opacity-20">
        <i class="{{ $ikon }} text-7xl"></i>
    </div>
</div>
