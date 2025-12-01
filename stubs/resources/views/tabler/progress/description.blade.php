@blaze

@props([
    'label' => 'Label',
    'description' => null,
    'value' => 0,
    'color' => 'blue',
    'size' => 'sm',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $percentage = min(max((float) $value, 0), 100);
@endphp

<div {{ $attributes }}>
    <div class="d-flex align-items-center lh-1 mb-1">
        <div class="fs-5 fw-bold m-0">{{ $label }}</div>
        @if ($description)
            <div class="fs-6 text-secondary ms-2">{{ $description }}</div>
        @endif
        <span class="fs-6 fw-bold ms-auto">{{ $percentage }}%</span>
    </div>
    <tabler:progress :value="$percentage" :color="$color" :size="$size" />
</div>
