{{--
    Button Component

    A versatile button with smart defaults and complex rendering logic.

    @prop string $type - Button type: 'button', 'submit', 'reset' (default: 'button')
    @prop string|null $href - URL to link to (renders as <a> instead of <button>)
    @prop string|null $color - Color variant: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', etc.
    @prop string|null $variant - Style variant: 'outline', 'ghost'
    @prop string|null $size - Size: 'sm', 'lg'
    @prop string|null $shape - Shape: 'square', 'pill'
    @prop string|null $icon - Leading Tabler icon name (without 'tabler-' prefix)
    @prop string|null $iconEnd - Trailing Tabler icon name (without 'tabler-' prefix)
    @prop bool $iconOnly - Icon-only button (no text)
    @prop bool $loading - Show loading state
    @prop bool $disabled - Disable button
    @prop string|null $animate - Icon animation: 'rotate', 'shake', 'pulse', 'tada', 'move-start'
    @prop bool $fullWidth - Make button full width

    @slot default - Button text/content

    Available CSS Classes (use via class="" attribute):

    Button Styles:
    - btn-link           - Text button style (no background)
    - btn-action         - Minimal action button (for icons)
    - btn-floating       - Floating action button

    Button Lists:
    - btn-list           - Wrap buttons in a list container

    Icon Sizes (for icon-only buttons):
    - btn-icon-sm        - Small icon button
    - btn-icon-lg        - Large icon button

    IMPORTANT: btn-action vs btn-icon
    - Use iconOnly prop for regular icon-only buttons (adds btn-icon class)
    - Use class="btn-action" for minimal action buttons (no iconOnly prop needed)
    - Don't combine iconOnly prop with btn-action class (they conflict)

    Additional Sizes:
    - w-100              - Full width (also available via fullWidth prop)
    - w-auto             - Auto width

    Shadow:
    - shadow-sm          - Small shadow
    - shadow             - Default shadow
    - shadow-lg          - Large shadow

    Spacing (in button groups):
    - me-2, ms-2         - Margin end/start
    - mb-2, mt-2         - Margin bottom/top

    Usage Examples:

    Basic button:
    <x-tabler::button color="primary">Click Me</x-tabler::button>

    Button with icon:
    <x-tabler::button icon="plus" color="success">Add New</x-tabler::button>

    Icon-only button:
    <x-tabler::button icon="search" iconOnly aria-label="Search" />

    Link button (renders as <a>):
    <x-tabler::button href="/dashboard" color="primary">Dashboard</x-tabler::button>

    Outline variant:
    <x-tabler::button color="danger" variant="outline">Delete</x-tabler::button>

    Loading state:
    <x-tabler::button loading color="primary">Processing...</x-tabler::button>

    Text button (via class):
    <x-tabler::button class="btn-link">Text button</x-tabler::button>

    Action button (minimal style):
    <x-tabler::button class="btn-action" icon="dots-vertical" iconOnly />

    Button with shadow:
    <x-tabler::button color="primary" class="shadow-lg">Elevated</x-tabler::button>

    Button group example:
    <div class="btn-list">
        <x-tabler::button color="primary">Save</x-tabler::button>
        <x-tabler::button variant="outline">Cancel</x-tabler::button>
    </div>
--}}

@props([
    'type' => 'button',
    'href' => null,
    'color' => null,
    'variant' => null,
    'size' => null,
    'shape' => null,
    'icon' => null,
    'iconEnd' => null,
    'iconOnly' => false,
    'loading' => false,
    'disabled' => false,
    'animate' => null,
    'fullWidth' => false,
])

@php
    // Determine HTML element (<a> for links, <button> otherwise)
    $element = $href ? 'a' : 'button';

    // Build button classes array
    $classes = ['btn'];

    // Color variants with outline/ghost modifiers
    if ($color) {
        if ($variant === 'outline') {
            $classes[] = 'btn-outline-' . $color;
        } elseif ($variant === 'ghost') {
            $classes[] = 'btn-ghost-' . $color;
        } else {
            $classes[] = 'btn-' . $color;
        }
    } elseif ($variant === 'outline') {
        $classes[] = 'btn-outline';
    } elseif ($variant === 'ghost') {
        $classes[] = 'btn-ghost';
    }

    // Size modifiers
    if ($size && $size !== 'md') {
        if ($iconOnly && !str_contains($attributes->get('class', ''), 'btn-action')) {
            // For icon-only buttons, use btn-icon-{size} instead of btn-{size}
            $classes[] = 'btn-icon-' . $size;
        } else {
            // For regular buttons
            $classes[] = 'btn-' . $size;
        }
    }

    // Shape modifiers
    if ($shape) {
        $classes[] = 'btn-' . $shape;
    }

    // Icon-only button style
    // Don't add btn-icon if btn-action is already present (they conflict)
if ($iconOnly && !str_contains($attributes->get('class', ''), 'btn-action')) {
    $classes[] = 'btn-icon';
}

// Loading state
if ($loading) {
    $classes[] = 'btn-loading';
}

// Disabled state (for links, add 'disabled' class)
if ($disabled && $href) {
    $classes[] = 'disabled';
}

// Icon animations
if ($animate) {
    $classes[] = 'btn-animate-icon';
    if ($animate !== true) {
        $classes[] = 'btn-animate-icon-' . $animate;
    }
}

// Layout modifiers
if ($fullWidth) {
    $classes[] = 'w-100';
}

// Build element-specific attributes
$elementAttributes = [];

if ($element === 'a') {
    $elementAttributes['href'] = $href;
    $elementAttributes['role'] = 'button';
    if ($disabled) {
        $elementAttributes['aria-disabled'] = 'true';
        $elementAttributes['tabindex'] = '-1';
    }
} else {
    $elementAttributes['type'] = $type;
    if ($disabled) {
        $elementAttributes['disabled'] = 'disabled';
    }
}

// Accessibility: Auto-generate aria-label for icon-only buttons
if ($iconOnly && !$attributes->has('aria-label')) {
    $iconName = $icon ?? ($iconEnd ?? 'button');
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
    {{-- Leading icon or icon-only --}}
    @if ($iconOnly)
        @if ($leadingIcon || $trailingIcon)
            <x-dynamic-component :component="$leadingIcon ?: $trailingIcon" class="icon" />
        @endif
    @else
        {{-- Leading icon for regular buttons --}}
        @if ($leadingIcon)
            <x-dynamic-component :component="$leadingIcon" class="icon" />
        @endif

        {{-- Button text/content --}}
        {{ $slot }}

        {{-- Trailing icon --}}
        @if ($trailingIcon)
            <x-dynamic-component :component="$trailingIcon" class="icon-end" />
        @endif
    @endif
    </{{ $element }}>
