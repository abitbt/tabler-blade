@props([
    'href' => '#',
    'icon' => null,
    'active' => false,
    'divider' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('dropdown-item')
        ->add($active ? 'active' : '');
@endphp

@if($divider)
    <div class="dropdown-divider"></div>
@else
    <a href="{{ $href }}" {{ $attributes->class($classes) }}>
        @if($icon)
            <tabler:icon :name="$icon" class="dropdown-item-icon" />
        @endif
        {{ $slot }}
    </a>
@endif
