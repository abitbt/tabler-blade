@blaze

@props([
    'value' => 0,
    'color' => null,
    'striped' => false,
    'animated' => false,
    'showValue' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $percentage = min(max((float) $value, 0), 100);

    $classes = Tabler::classes()
        ->add('progress-bar')
        ->add($color ? 'bg-' . $color : '')
        ->add($striped ? 'progress-bar-striped' : '')
        ->add($animated && $striped ? 'progress-bar-animated' : '');
@endphp

<div {{ $attributes->class($classes) }} style="width: {{ $percentage }}%" role="progressbar"
    aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $percentage }}% Complete">
    @if ($showValue)
        {{ $percentage }}%
    @elseif($slot->isNotEmpty())
        {{ $slot }}
    @else
        <span class="visually-hidden">{{ $percentage }}% Complete</span>
    @endif
</div>
