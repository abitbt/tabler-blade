@blaze

@props([
    'position' => 'bottom-end',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $positionClasses = match ($position) {
        'top-start' => 'top-0 start-0',
        'top-center' => 'top-0 start-50 translate-middle-x',
        'top-end' => 'top-0 end-0',
        'middle-start' => 'top-50 start-0 translate-middle-y',
        'middle-center' => 'top-50 start-50 translate-middle',
        'middle-end' => 'top-50 end-0 translate-middle-y',
        'bottom-start' => 'bottom-0 start-0',
        'bottom-center' => 'bottom-0 start-50 translate-middle-x',
        'bottom-end' => 'bottom-0 end-0',
        default => 'bottom-0 end-0',
    };

    $classes = Tabler::classes()->add('toast-container')->add('position-fixed')->add($positionClasses)->add('p-3');
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>
