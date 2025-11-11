{{--
    Card Component

    A versatile card container with minimal abstraction over Tabler CSS.

    @prop string|null $padding - Card padding size: 'sm', 'md', 'lg'
    @prop bool $active - Mark card as active (highlighted state)
    @prop bool $inactive - Mark card as inactive (dimmed state)
    @prop bool $link - Make entire card clickable (renders as <a>)

    @slot default - Card content (typically card-header, card-body, card-footer)

    Available CSS Classes (use via class="" attribute):

    Visual Effects:
    - card-stacked       - Add stacked card effect
    - card-borderless    - Remove card border

    Link Effects (requires link prop):
    - card-link-rotate   - Rotate icon on hover
    - card-link-pop      - Pop effect on hover

    Rotation:
    - card-rotate-start  - Rotate effect at start
    - card-rotate-end    - Rotate effect at end

    Background Colors:
    - bg-primary, bg-secondary, bg-success, bg-danger, bg-warning, bg-info
    - bg-primary-lt (light variants available for all colors)
    - bg-blue, bg-azure, bg-indigo, bg-purple, bg-pink, bg-red, bg-orange, bg-yellow, bg-lime, bg-green, bg-teal, bg-cyan
    - bg-white, bg-light, bg-dark, bg-muted

    Text Colors:
    - text-primary, text-secondary, text-success, text-danger, text-warning, text-info
    - text-blue, text-azure, text-indigo, text-purple, text-pink, text-red, text-orange, text-yellow, text-lime, text-green, text-teal, text-cyan
    - text-white, text-muted, text-body
    - text-primary-fg (foreground - optimal contrast with bg-primary)

    Usage Examples:

    Basic card:
    <x-tabler::cards.card>
        <x-tabler::cards.header>
            <x-slot:title>Card Title</x-slot>
        </x-tabler::cards.header>
        <x-tabler::cards.body>Content here</x-tabler::cards.body>
    </x-tabler::cards.card>

    Active card with padding:
    <x-tabler::cards.card padding="sm" active>
        <x-tabler::cards.body>Active card</x-tabler::cards.body>
    </x-tabler::cards.card>

    Colored card:
    <x-tabler::cards.card class="bg-primary-lt text-primary">
        <x-tabler::cards.body>Primary colored card</x-tabler::cards.body>
    </x-tabler::cards.card>

    Stacked borderless card:
    <x-tabler::cards.card class="card-stacked card-borderless">
        <x-tabler::cards.body>Floating card effect</x-tabler::cards.body>
    </x-tabler::cards.card>

    Clickable card with rotation:
    <x-tabler::cards.card link href="/details" class="card-link-rotate">
        <x-tabler::cards.body>Click me!</x-tabler::cards.body>
    </x-tabler::cards.card>
--}}

@props([
    'padding' => null,
    'active' => false,
    'inactive' => false,
    'link' => false,
])

@php
    // Build card classes array
    $cardClasses = ['card'];

    // Padding variations (card-sm, card-md, card-lg)
    if ($padding) {
        $cardClasses[] = 'card-' . $padding;
    }

    // State modifiers
    if ($active) {
        $cardClasses[] = 'card-active';
    }

    if ($inactive) {
        $cardClasses[] = 'card-inactive';
    }

    // Link functionality
    if ($link) {
        $cardClasses[] = 'card-link';
    }
@endphp

@if ($link)
    <a {{ $attributes->merge(['class' => implode(' ', $cardClasses)]) }}>
        {{ $slot }}
    </a>
@else
    <div {{ $attributes->merge(['class' => implode(' ', $cardClasses)]) }}>
        {{ $slot }}
    </div>
@endif
