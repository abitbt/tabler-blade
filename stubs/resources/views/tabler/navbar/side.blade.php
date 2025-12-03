@props([
    'order' => 'md-last',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('navbar-nav')
        ->add('flex-row')
        ->add($order ? "order-{$order}" : '')
        ->add('ms-auto');
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>
