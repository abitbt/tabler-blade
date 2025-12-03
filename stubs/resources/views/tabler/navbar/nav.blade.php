@props([
    'collapseId' => 'navbar-menu',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('collapse')
        ->add('navbar-collapse');
@endphp

<div {{ $attributes->class($classes) }} id="{{ $collapseId }}">
    {{ $slot }}
</div>
