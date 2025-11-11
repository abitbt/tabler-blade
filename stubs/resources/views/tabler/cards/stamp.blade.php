{{--
    Card Stamp Component

    Decorative icon stamp positioned in the card corner.

    @prop string|null $icon - Tabler icon name (without 'tabler-' prefix)
    @prop string $color - Background color: 'primary', 'success', etc. (default: 'primary')
    @prop bool $large - Use larger stamp size

    @slot default - Custom stamp content (alternative to icon prop)

    Usage:
    <x-tabler::cards.card>
        <x-tabler::cards.stamp icon="star" color="warning" />
        <x-tabler::cards.body>Card content</x-tabler::cards.body>
    </x-tabler::cards.card>
--}}

@props([
    'icon' => null,
    'color' => 'primary',
    'large' => false,
])

@php
    $stampClasses = ['card-stamp'];

    if ($large) {
        $stampClasses[] = 'card-stamp-lg';
    }

    $iconComponent = $icon ? 'tabler-' . $icon : null;
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $stampClasses)]) }}>
    <div class="card-stamp-icon bg-{{ $color }}">
        @if ($iconComponent)
            <x-dynamic-component :component="$iconComponent" />
        @else
            {{ $slot }}
        @endif
    </div>
</div>
