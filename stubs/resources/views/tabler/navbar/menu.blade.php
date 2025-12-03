@props([
    'label' => 'Primary navigation',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('navbar-nav');
@endphp

<nav aria-label="{{ $label }}">
    <ul {{ $attributes->class($classes) }}>
        {{ $slot }}
    </ul>
</nav>
