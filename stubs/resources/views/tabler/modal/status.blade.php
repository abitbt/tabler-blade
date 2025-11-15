@blaze

@props([
    'color' => 'primary',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('modal-status')
        ->add("bg-{$color}");
@endphp

<div {{ $attributes->class($classes) }}></div>
