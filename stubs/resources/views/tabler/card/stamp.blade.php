@blaze

@props([
    'icon' => null,
    'color' => 'primary',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $iconClasses = Tabler::classes()
        ->add('card-stamp-icon')
        ->add("bg-{$color}");
@endphp

<div {{ $attributes->class('card-stamp') }}>
    <div class="{{ $iconClasses }}">
        @if ($icon)
            <tabler:icon :name="$icon" />
        @else
            {{ $slot }}
        @endif
    </div>
</div>
