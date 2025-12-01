@blaze

@props([
    'vertical' => false,
    'counter' => false,
    'color' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('steps')
        ->add($vertical ? 'steps-vertical' : '')
        ->add($counter ? 'steps-counter' : '')
        ->add($color ? "steps-{$color}" : '');
@endphp

<div {{ $attributes->class($classes) }} role="list">
    {{ $slot }}
</div>
