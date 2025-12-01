@blaze

@props([
    'url' => null,
    'active' => false,
    'disabled' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('breadcrumb-item')
        ->add($active ? 'active' : '')
        ->add($disabled ? 'disabled' : '');
@endphp

<li {{ $attributes->class($classes) }} @if ($active) aria-current="page" @endif>
    @if ($url && !$active)
        <a href="{{ $url }}">{{ $slot }}</a>
    @else
        {{ $slot }}
    @endif
</li>
