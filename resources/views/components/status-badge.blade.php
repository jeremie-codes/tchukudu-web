@props([
    'status',
    'type' => null,
    'colors' => [
        'success' => 'bg-green-100 text-green-800',
        'error' => 'bg-red-100 text-red-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'info' => 'bg-blue-100 text-blue-800',
        'default' => 'bg-gray-100 text-gray-800',
    ]
])

@php
// Determine the type based on status if not explicitly set
if (!$type) {
    switch(strtolower($status)) {
        case 'active':
        case 'delivered':
        case 'completed':
        case 'success':
        case 'verified':
            $type = 'success';
            break;
        case 'pending':
        case 'processing':
        case 'waiting':
            $type = 'warning';
            break;
        case 'inactive':
        case 'failed':
        case 'error':
        case 'rejected':
            $type = 'error';
            break;
        default:
            $type = 'default';
    }
}

$colorClasses = $colors[$type] ?? $colors['default'];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium $colorClasses"]) }}>
    @if($type === 'success')
    <i class='bx bx-check-circle mr-1'></i>
    @elseif($type === 'error')
    <i class='bx bx-x-circle mr-1'></i>
    @elseif($type === 'warning')
    <i class='bx bx-error-circle mr-1'></i>
    @elseif($type === 'info')
    <i class='bx bx-info-circle mr-1'></i>
    @endif
    {{ $status }}
</span>