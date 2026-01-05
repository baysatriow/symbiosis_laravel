@props(['label', 'value', 'icon', 'trend' => null, 'trendUp' => true, 'iconColor' => 'emerald'])

@php
    $colors = [
        'emerald' => 'bg-emerald-50 text-emerald-600',
        'blue' => 'bg-blue-50 text-blue-600',
        'orange' => 'bg-orange-50 text-orange-600',
        'purple' => 'bg-purple-50 text-purple-600',
        'red' => 'bg-red-50 text-red-600',
        'amber' => 'bg-amber-50 text-amber-600',
    ];
    $colorClass = $colors[$iconColor] ?? $colors['emerald'];
@endphp

<div {{ $attributes->merge(['class' => 'bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between card-hover']) }}>
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center space-x-3">
            <div class="{{ $colorClass }} w-12 h-12 rounded-xl flex items-center justify-center">
                <i class="{{ $icon }} text-xl"></i>
            </div>
            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">{{ $label }}</span>
        </div>
    </div>
    
    <div>
        <h3 class="text-3xl font-bold text-gray-900 leading-none">{{ $value }}</h3>
        @if($trend)
            <div class="mt-2 flex items-center text-sm {{ $trendUp ? 'text-green-500' : 'text-red-500' }}">
                @if($trendUp)
                    <i class="fas fa-arrow-up mr-1 text-xs"></i>
                @else
                    <i class="fas fa-arrow-down mr-1 text-xs"></i>
                @endif
                <span class="font-medium">{{ $trend }}</span>
            </div>
        @endif
    </div>
</div>
