@blaze

@props([
    'simple' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('timeline')
        ->add($simple ? 'timeline-simple' : '');
@endphp

<ul {{ $attributes->class($classes) }}>
    {{ $slot }}
</ul>
