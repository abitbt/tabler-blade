{{--
    Card Footer Component

    Footer section for cards, typically containing actions or metadata.

    @prop bool $transparent - Remove background color
    @prop bool $borderless - Remove top border

    @slot default - Footer content

    Usage:
    <x-tabler::cards.footer>
        <x-tabler::button size="sm">Save</x-tabler::button>
        <x-tabler::button size="sm" variant="ghost">Cancel</x-tabler::button>
    </x-tabler::cards.footer>

    Transparent footer:
    <x-tabler::cards.footer transparent>
        Footer text
    </x-tabler::cards.footer>
--}}

@props([
    'transparent' => false,
    'borderless' => false,
])

@php
    $footerClasses = ['card-footer'];

    if ($transparent) {
        $footerClasses[] = 'card-footer-transparent';
    }

    if ($borderless) {
        $footerClasses[] = 'card-footer-borderless';
    }
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $footerClasses)]) }}>
    {{ $slot }}
</div>
