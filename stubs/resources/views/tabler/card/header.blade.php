@blaze

@props([
    'title' => null,
    'light' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('card-header')
        ->add($light ? 'card-header-light' : '');
@endphp

<div {{ $attributes->class($classes) }}>
    @if ($title)
        <h3 class="card-title">{{ $title }}</h3>
    @else
        {{ $slot }}
    @endif
</div>
