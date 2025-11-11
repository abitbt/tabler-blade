{{--
    Card Status Component

    A colored status indicator bar on the card edge.

    @prop string $position - Position: 'top', 'start', 'bottom' (default: 'top')
    @prop string $color - Color variant: 'primary', 'success', 'danger', etc. (default: 'primary')

    Usage:
    <x-tabler::cards.card>
        <x-tabler::cards.status color="success" />
        <x-tabler::cards.body>Card with status indicator</x-tabler::cards.body>
    </x-tabler::cards.card>
--}}

@props([
    'position' => 'top',
    'color' => 'primary',
])

@php
    $statusClasses = ['card-status-' . $position, 'bg-' . $color];
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $statusClasses)]) }}></div>
