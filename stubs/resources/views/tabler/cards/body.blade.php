{{--
    Card Body Component

    The main content area of a card.

    @prop bool $scrollable - Enable scrollable content (with max-height)

    @slot default - Card body content

    Usage:
    <x-tabler::cards.body>
        Main card content goes here
    </x-tabler::cards.body>

    Scrollable body:
    <x-tabler::cards.body scrollable>
        Long content that will scroll
    </x-tabler::cards.body>
--}}

@props([
    'scrollable' => false,
])

@php
    $bodyClasses = ['card-body'];

    if ($scrollable) {
        $bodyClasses[] = 'card-body-scrollable';
    }
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $bodyClasses)]) }}>
    {{ $slot }}
</div>
