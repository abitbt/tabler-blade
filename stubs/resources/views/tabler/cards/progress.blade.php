{{--
    Card Progress Component

    Display a progress bar at the bottom of a card.

    @prop int|float $value - Progress percentage (0-100)
    @prop string $color - Color variant: 'primary', 'success', etc. (default: 'primary')
    @prop string $size - Size: 'sm' (default), or omit for default

    @slot default - Optional label text inside progress bar

    Usage:
    <x-tabler::cards.card>
        <x-tabler::cards.body>Card content</x-tabler::cards.body>
        <x-tabler::cards.progress value="75" color="success" />
    </x-tabler::cards.card>
--}}

@props([
    'value' => 0,
    'color' => 'primary',
    'size' => 'sm',
])

@php
    $progressClasses = ['progress', 'card-progress'];

    if ($size) {
        $progressClasses[] = 'progress-' . $size;
    }

    $barClasses = ['progress-bar'];

    if ($color) {
        $barClasses[] = 'bg-' . $color;
    }
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $progressClasses)]) }}>
    <div class="{{ implode(' ', $barClasses) }}" style="width: {{ $value }}%" role="progressbar"
        aria-valuenow="{{ $value }}" aria-valuemin="0" aria-valuemax="100">
        @if ($slot->isNotEmpty())
            <span>{{ $slot }}</span>
        @endif
    </div>
</div>
