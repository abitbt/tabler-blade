@blaze

@props([
    'color' => 'gray',
    'animated' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('status-dot')
        ->add($animated ? 'status-dot-animated' : '')
        ->add("status-{$color}");
@endphp

<span {{ $attributes->class($classes) }}></span>
