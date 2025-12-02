@blaze

@props([
    'value' => 0,
    'text' => null,
    'showValue' => false,
    'color' => 'primary-lt',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $percentage = min(max((float) $value, 0), 100);

    $classes = Tabler::classes()->add('progressbg');
@endphp

<div {{ $attributes->class($classes) }}>
    <tabler:progress :value="$percentage" :color="$color" class="progressbg-progress" />

    @if ($text)
        <div class="progressbg-text">{{ $text }}</div>
    @endif

    @if ($showValue)
        <div class="progressbg-value">{{ $percentage }}%</div>
    @endif
</div>
