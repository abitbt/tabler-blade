{{--
    Tabler Badge Component

    Badges are small count and labeling components used to add extra information to interface elements.
    They can draw users' attention to new elements, notify about unread messages, or provide any kind of additional info.

    @prop string|null $color - Badge color (used with bg-{color} and text-{color}-fg classes) (default: null for default gray)
    @prop string|null $href - URL for badge as link (changes element to <a>)
    @prop string|null $icon - Icon name from blade-tabler-icons for start icon
    @prop string|null $iconEnd - Icon name from blade-tabler-icons for end icon
    @prop bool $iconOnly - Display only icon without text (default: false)
    @prop bool $light - Use light variant with -lt suffix (default: false)

    Available CSS Classes (use via class="" attribute):

    Badge Colors:
    - bg-primary           - Primary color badge (blue)
    - bg-secondary         - Secondary badge (gray)
    - bg-success           - Success badge (green)
    - bg-warning           - Warning badge (yellow)
    - bg-danger            - Danger badge (red)
    - bg-info              - Info badge (cyan)
    - bg-dark              - Dark badge
    - bg-light             - Light badge
    - bg-{color}           - Any Tabler theme color (blue, azure, indigo, purple, pink, red, orange, yellow, lime, green, teal, cyan)

    Light Badge Colors:
    - bg-{color}-lt        - Light version of badge with -lt suffix (e.g., bg-blue-lt, bg-success-lt)

    Badge Text Colors:
    - text-{color}-fg      - Text color for badge foreground
    - text-{color}-lt-fg   - Text color for light badge foreground

    Badge Variants:
    - badge-outline        - Transparent background with colored border
    - badge-pill           - Fully rounded pill shape
    - badge-dot            - Small dot badge (no text, minimal size)

    Badge Sizes:
    - badge-sm             - Small badge
    - badge-lg             - Large badge

    Badge Positioning:
    - badge-notification   - Position badge in top-right corner (absolute positioning)
    - badge-blink          - Animated blinking badge (for notifications)

    Badge Layout:
    - badge-icononly       - Icon-only badge with adjusted padding
    - ms-2, me-2           - Margin spacing when badge is next to text/buttons

    Usage Examples:

    Basic Badge:
    <x-tabler::badge>
        New
    </x-tabler::badge>

    Colored Badge:
    <x-tabler::badge color="primary">
        Primary
    </x-tabler::badge>

    Light Badge:
    <x-tabler::badge color="success" light>
        Success
    </x-tabler::badge>

    Outline Badge:
    <x-tabler::badge class="badge-outline text-danger">
        Outlined
    </x-tabler::badge>

    Pill Badge:
    <x-tabler::badge color="info" class="badge-pill">
        Pill Shape
    </x-tabler::badge>

    Badge with Icon:
    <x-tabler::badge color="warning" icon="alert-triangle">
        Warning
    </x-tabler::badge>

    Badge with End Icon:
    <x-tabler::badge color="primary" iconEnd="arrow-right">
        Next
    </x-tabler::badge>

    Icon-Only Badge:
    <x-tabler::badge color="success" icon="check" iconOnly>
        Success
    </x-tabler::badge>

    Badge as Link:
    <x-tabler::badge href="/profile" color="blue" light>
        Profile
    </x-tabler::badge>

    Badge on Button:
    <button class="btn">
        Notifications
        <x-tabler::badge color="red" class="ms-2">4</x-tabler::badge>
    </button>

    Notification Badge:
    <button class="btn position-relative">
        Inbox
        <x-tabler::badge color="red" class="badge-notification badge-pill">9+</x-tabler::badge>
    </button>

    Dot Notification Badge:
    <button class="btn position-relative">
        Profile
        <x-tabler::badge color="red" class="badge-notification badge-dot"></x-tabler::badge>
    </button>

    Blinking Notification Badge:
    <button class="btn position-relative">
        Settings
        <x-tabler::badge color="red" class="badge-notification badge-dot badge-blink"></x-tabler::badge>
    </button>

    Badge Sizes:
    <x-tabler::badge color="primary" class="badge-sm">Small</x-tabler::badge>
    <x-tabler::badge color="primary">Default</x-tabler::badge>
    <x-tabler::badge color="primary" class="badge-lg">Large</x-tabler::badge>

    Badge in Heading:
    <h3>
        Example heading
        <x-tabler::badge>New</x-tabler::badge>
    </h3>

    JavaScript Requirements:
    - No JavaScript required for basic badges
    - badge-blink uses CSS animation
    - badge-notification uses CSS positioning

    Accessibility:
    - Semantic <span> or <a> element based on href prop
    - When used as notification badge, consider adding visually-hidden text for context
    - Icon-only badges should have meaningful surrounding context

    Livewire Compatibility:
    <x-tabler::badge wire:poll.5s="checkNotifications" color="red" class="badge-notification">
        {{ $count }}
    </x-tabler::badge>

    <button wire:click="toggleNotifications" class="btn position-relative">
        Notifications
        <x-tabler::badge color="red" class="badge-notification badge-dot"></x-tabler::badge>
    </button>
--}}

@props([
    'color' => null,
    'href' => null,
    'icon' => null,
    'iconEnd' => null,
    'iconOnly' => false,
    'light' => false,
])

@php
    // Determine if badge should be rendered as link
    $isLink = $href !== null;
    $element = $isLink ? 'a' : 'span';

    // Build base badge classes
    $classes = ['badge'];

    // Add color classes
    if ($color) {
        $lightSuffix = $light ? '-lt' : '';
        $classes[] = "bg-{$color}{$lightSuffix}";
        $classes[] = "text-{$color}{$lightSuffix}-fg";
    }

    // Add icon-only class
    if ($iconOnly) {
        $classes[] = 'badge-icononly';
    }
@endphp

<{{ $element }}
    @if ($isLink)
        href="{{ $href }}"
    @endif
    {{ $attributes->class($classes) }}>
    @if ($icon)
        <x-dynamic-component :component="'tabler-' . $icon" />
    @endif

    @unless ($iconOnly)
        {{ $slot }}
    @endunless

    @if ($iconEnd)
        <x-dynamic-component :component="'tabler-' . $iconEnd" />
    @endif
</{{ $element }}>
