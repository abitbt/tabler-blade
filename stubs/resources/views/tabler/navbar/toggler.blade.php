@props([
    'target' => 'navbar-menu',
    'label' => 'Toggle navigation',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('navbar-toggler');
@endphp

<button
    {{ $attributes->class($classes) }}
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#{{ $target }}"
    aria-controls="{{ $target }}"
    aria-expanded="false"
    aria-label="{{ $label }}"
>
    <span class="navbar-toggler-icon"></span>
</button>
