{{--
    Badge Component

    Badges are small count and labeling components used to add extra information to interface elements.

    @prop string|null $color - Color variant: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'blue', 'azure', etc.
    @prop string|null $variant - Style variant: 'light' (subtle/pastel colors), 'outline' (border only)
    @prop string|null $size - Size: 'sm', 'lg' (default: 'md')
    @prop string|null $icon - Leading Tabler icon name (without 'tabler-' prefix)
    @prop string|null $iconEnd - Trailing Tabler icon name (without 'tabler-' prefix)
    @prop bool $iconOnly - Icon-only badge (no text)
    @prop string|null $href - URL to link to (renders as <a> instead of <span>)
    @prop bool $dot - Minimal dot indicator (notification dot)

    @slot default - Badge text/content

    Available CSS Classes (use via class="" attribute):

    Badge Styles:
    - badge              - Base badge class (applied automatically)
    - badge-pill         - Rounded pill shape
    - badge-outline      - Outline style with transparent background
    - badge-dot          - Minimal dot indicator (also available via dot prop)
    - badge-blink        - Blinking animation

    Badge Colors (solid):
    - bg-{color}         - Solid background: primary, secondary, success, danger, warning, info, blue, azure, indigo, purple, pink, red, orange, yellow, lime, green, teal, cyan, dark, light
    - text-{color}-fg    - Text color for solid badges (auto-applied when color prop is used)

    Badge Colors (light/subtle):
    - bg-{color}-lt      - Light/subtle background: bg-blue-lt, bg-red-lt, etc.
    - text-{color}       - Text color for light badges

    Badge Sizes:
    - badge-sm           - Small badge (also available via size="sm")
    - badge-lg           - Large badge (also available via size="lg")

    Badge Icons:
    - badge-icononly     - Icon-only badge (also available via iconOnly prop)

    Positioning (for notification badges):
    - badge-notification - Position badge in top-right corner of parent
    - position-relative  - Add to parent element for badge-notification positioning

    Text Utilities:
    - text-bg-secondary  - Bootstrap text + background combo
    - ms-2, me-2         - Margin spacing for inline badges

    Usage Examples:

    Basic badge:
    <x-tabler::badge>Default</x-tabler::badge>

    Colored badge:
    <x-tabler::badge color="primary">Primary</x-tabler::badge>

    Light/subtle badge:
    <x-tabler::badge color="blue" variant="light">Blue</x-tabler::badge>

    Outline badge:
    <x-tabler::badge color="danger" variant="outline">Danger</x-tabler::badge>

    Badge with icon:
    <x-tabler::badge icon="star" color="success">Featured</x-tabler::badge>

    Badge with trailing icon:
    <x-tabler::badge icon-end="arrow-right" color="info">Next</x-tabler::badge>

    Icon-only badge:
    <x-tabler::badge icon="star" iconOnly color="warning" />

    Pill badge:
    <x-tabler::badge color="primary" class="badge-pill">99+</x-tabler::badge>

    Badge in heading:
    <h2>Product Title <x-tabler::badge color="success">New</x-tabler::badge></h2>

    Badge in button (inline):
    <button class="btn">
        Notifications <x-tabler::badge color="red" class="ms-2">4</x-tabler::badge>
    </button>

    Notification badge (positioned):
    <button class="btn position-relative">
        Inbox <x-tabler::badge color="red" class="badge-notification badge-pill">9+</x-tabler::badge>
    </button>

    Notification dot:
    <button class="btn position-relative">
        Profile <x-tabler::badge color="red" dot class="badge-notification" />
    </button>

    Blinking notification:
    <button class="btn position-relative">
        Settings <x-tabler::badge color="red" dot class="badge-notification badge-blink" />
    </button>

    Link badge:
    <x-tabler::badge href="/profile" color="blue" variant="light">View Profile</x-tabler::badge>

    Small badge:
    <x-tabler::badge size="sm" color="primary">Small</x-tabler::badge>

    Large badge:
    <x-tabler::badge size="lg" color="success">Large</x-tabler::badge>

    Badge group:
    <div class="badges-list">
        <x-tabler::badge color="blue" variant="light">Design</x-tabler::badge>
        <x-tabler::badge color="green" variant="light">Development</x-tabler::badge>
        <x-tabler::badge color="purple" variant="light">Marketing</x-tabler::badge>
    </div>
--}}

@props([
    'color' => null,
    'variant' => null,
    'size' => null,
    'icon' => null,
    'iconEnd' => null,
    'iconOnly' => false,
    'href' => null,
    'dot' => false,
])

@php
    // Determine HTML element (<a> for links, <span> otherwise)
    $element = $href ? 'a' : 'span';

    // Build badge classes array
    $classes = ['badge'];

    // Color handling based on variant
    if ($color) {
        if ($variant === 'light') {
            // Light/subtle style: bg-{color}-lt
            $classes[] = 'bg-' . $color . '-lt';
        } elseif ($variant === 'outline') {
            // Outline style: badge-outline text-{color}
            $classes[] = 'badge-outline';
            $classes[] = 'text-' . $color;
        } else {
            // Solid style: bg-{color} text-{color}-fg
            // Note: Dot badges don't need text color class (no text content)
        $classes[] = 'bg-' . $color;
        if (!$dot) {
            $classes[] = 'text-' . $color . '-fg';
        }
    }
} elseif ($variant === 'outline') {
    // Outline without color
    $classes[] = 'badge-outline';
}

// Size modifiers
if ($size && $size !== 'md') {
    $classes[] = 'badge-' . $size;
}

// Dot indicator
if ($dot) {
    $classes[] = 'badge-dot';
}

// Icon-only badge style
if ($iconOnly) {
    $classes[] = 'badge-icononly';
}

// Build element-specific attributes
$elementAttributes = [];

if ($element === 'a') {
    $elementAttributes['href'] = $href;
}

// Accessibility: Auto-generate aria-label for icon-only badges
if ($iconOnly && !$attributes->has('aria-label')) {
    $iconName = $icon ?? ($iconEnd ?? 'badge');
    $elementAttributes['aria-label'] = ucfirst(str_replace('-', ' ', $iconName));
}

// Prepare icon component names (add 'tabler-' prefix)
$leadingIcon = $icon ? 'tabler-' . $icon : null;
$trailingIcon = $iconEnd ? 'tabler-' . $iconEnd : null;
@endphp

<{{ $element }} {{ $attributes->merge(['class' => implode(' ', $classes)]) }}
    @foreach ($elementAttributes as $attr => $value)
        @if (is_bool($value))
            {{ $attr }}
        @else
            {{ $attr }}="{{ $value }}"
        @endif @endforeach>
    {{-- Icon-only badge (no text) --}}
    @if ($iconOnly)
        @if ($leadingIcon || $trailingIcon)
            <x-dynamic-component :component="$leadingIcon ?: $trailingIcon" class="icon" />
        @endif
        {{-- Dot indicator (no text or icon) --}}
    @elseif($dot)
        {{-- Dot has no content, only visual indicator --}}
        @if ($slot->hasActualContent())
            <span class="visually-hidden">{{ $slot }}</span>
        @endif
    @else
        {{-- Regular badge with optional icons and text --}}
        @if ($leadingIcon)
            <x-dynamic-component :component="$leadingIcon" class="icon" />
        @endif

        {{ $slot }}

        @if ($trailingIcon)
            <x-dynamic-component :component="$trailingIcon" class="icon" />
        @endif
    @endif
    </{{ $element }}>
