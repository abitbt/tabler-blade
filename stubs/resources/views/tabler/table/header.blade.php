@blaze

@props([
    'sticky' => false,
    'light' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add($sticky ? 'sticky-top' : '')
        ->add($light ? 'table-light' : '');
@endphp

<thead {{ $attributes->class($classes) }}>
    {{ $slot }}
</thead>
