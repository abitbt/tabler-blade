@blaze

@props([
    'color' => 'primary',
    'position' => 'top',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add(
            match ($position) {
                'top' => 'card-status-top',
                'bottom' => 'card-status-bottom',
                'start', 'left' => 'card-status-start',
                default => 'card-status-top',
            },
        )
        ->add("bg-{$color}");
@endphp

<div {{ $attributes->class($classes) }}></div>
