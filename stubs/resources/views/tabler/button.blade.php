{{--
    Tabler Button Component

    Versatile button component with support for different colors, variants, sizes, icons, and states.
    Use buttons to engage users and encourage them to take desired actions throughout your interface.

    @prop string $type - Button type attribute (default: 'button' for <button>, null for <a>)
    @prop string|null $href - URL for button as link (changes element to <a>)
    @prop string $color - Button color variant (default: null for default white button)
    @prop string|null $variant - Button style variant: null (solid), 'outline', 'ghost' (default: null)
    @prop string|null $size - Button size: 'sm', 'lg', 'xl' (default: null for medium)
    @prop string|null $shape - Button shape: 'square', 'pill' (default: null for default rounded)
    @prop string|null $icon - Icon name from blade-tabler-icons for start icon
    @prop string|null $iconEnd - Icon name from blade-tabler-icons for end icon
    @prop bool $iconOnly - Display only icon without text (default: false)
    @prop bool $loading - Show loading spinner state (default: false)
    @prop bool $disabled - Disable the button (default: false)
    @prop bool $fullWidth - Make button full width with w-100 class (default: false)

    Available CSS Classes (use via class="" attribute):

    Button Colors:
    - btn-primary          - Primary action button (blue)
    - btn-secondary        - Secondary button (gray)
    - btn-success          - Success/confirm button (green)
    - btn-warning          - Warning button (yellow)
    - btn-danger           - Danger/delete button (red)
    - btn-info             - Informational button (cyan)
    - btn-dark             - Dark button (dark gray)
    - btn-light            - Light button (light gray)
    - btn-{color}          - Any Tabler theme color (blue, azure, indigo, purple, pink, red, orange, yellow, lime, green, teal, cyan)

    Button Variants:
    - btn-outline          - Outline variant (transparent with border, use with color)
    - btn-outline-{color}  - Outline button with specific color
    - btn-ghost            - Ghost variant (transparent, no border)
    - btn-ghost-{color}    - Ghost button with specific color
    - btn-link             - Link-styled button

    Button Sizes:
    - btn-sm               - Small button
    - btn-lg               - Large button
    - btn-xl               - Extra large button

    Button Shapes:
    - btn-square           - Square corners (no border radius)
    - btn-pill             - Fully rounded pill shape

    Button States:
    - btn-loading          - Loading state with spinner (automatically added by loading prop)
    - disabled             - Disabled state (automatically added by disabled prop)
    - btn-icon             - Icon-only button (automatically added by iconOnly prop)

    Button Layout:
    - w-100                - Full width button
    - btn-list             - Container for multiple buttons with proper spacing

    Button Animations:
    - btn-animate-icon              - Basic icon animation on hover
    - btn-animate-icon-rotate       - Rotate icon on hover
    - btn-animate-icon-shake        - Shake icon on hover
    - btn-animate-icon-pulse        - Pulse icon on hover
    - btn-animate-icon-tada         - Tada animation on hover
    - btn-animate-icon-move-start   - Move icon to start on hover
    - btn-animate-icon-move-end     - Move icon to end on hover

    Usage Examples:

    Basic Button:
    <x-tabler::button>
        Click Me
    </x-tabler::button>

    Primary Button:
    <x-tabler::button color="primary">
        Save Changes
    </x-tabler::button>

    Button as Link:
    <x-tabler::button href="/dashboard">
        Dashboard
    </x-tabler::button>

    Outline Button:
    <x-tabler::button color="danger" variant="outline">
        Cancel
    </x-tabler::button>

    Ghost Button:
    <x-tabler::button color="success" variant="ghost">
        Subtle Action
    </x-tabler::button>

    Button with Icon:
    <x-tabler::button color="primary" icon="plus">
        Add Item
    </x-tabler::button>

    Button with End Icon:
    <x-tabler::button iconEnd="arrow-right">
        Next
    </x-tabler::button>

    Icon-Only Button:
    <x-tabler::button color="danger" icon="trash" iconOnly>
        Delete
    </x-tabler::button>

    Loading Button:
    <x-tabler::button color="primary" loading>
        Processing...
    </x-tabler::button>

    Disabled Button:
    <x-tabler::button color="secondary" disabled>
        Not Available
    </x-tabler::button>

    Different Sizes:
    <x-tabler::button size="sm">Small</x-tabler::button>
    <x-tabler::button>Medium</x-tabler::button>
    <x-tabler::button size="lg">Large</x-tabler::button>
    <x-tabler::button size="xl">Extra Large</x-tabler::button>

    Pill Button:
    <x-tabler::button color="primary" shape="pill">
        Pill Shape
    </x-tabler::button>

    Square Button:
    <x-tabler::button shape="square">
        Square Corners
    </x-tabler::button>

    Full Width Button:
    <x-tabler::button color="primary" fullWidth>
        Full Width
    </x-tabler::button>

    Button with Custom Classes:
    <x-tabler::button color="primary" class="btn-animate-icon">
        Hover Me
        <x-tabler-arrow-right class="icon-end" />
    </x-tabler::button>

    Social Media Button:
    <x-tabler::button color="facebook" icon="brand-facebook">
        Facebook
    </x-tabler::button>

    JavaScript Requirements:
    - No JavaScript required for basic buttons
    - Loading state uses CSS spinner animation
    - For dropdown buttons, use Bootstrap's data-bs-toggle="dropdown"
    - For modal triggers, use data-bs-toggle="modal" data-bs-target="#modalId"

    Accessibility:
    - Semantic <button> or <a> element based on href prop
    - type="button" added to <button> elements to prevent form submission
    - aria-label automatically added for icon-only buttons
    - disabled attribute properly applied
    - Proper focus states for keyboard navigation

    Livewire Compatibility:
    <x-tabler::button wire:click="save" color="primary">
        Save
    </x-tabler::button>

    <x-tabler::button wire:click="delete" wire:confirm="Are you sure?" color="danger">
        Delete
    </x-tabler::button>
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
    'fullWidth' => false,
])

@php
    // Determine if button should be rendered as link
    $isLink = $href !== null;
    $element = $isLink ? 'a' : 'button';

    // Build base button classes
    $classes = ['btn'];

    // Add color classes based on variant
    if ($color) {
        if ($variant === 'outline') {
            $classes[] = "btn-outline-{$color}";
        } elseif ($variant === 'ghost') {
            $classes[] = "btn-ghost-{$color}";
        } else {
            $classes[] = "btn-{$color}";
        }
    } elseif ($variant === 'outline') {
        $classes[] = 'btn-outline';
    } elseif ($variant === 'ghost') {
        $classes[] = 'btn-ghost';
    }

    // Add size class
    if ($size) {
        $classes[] = "btn-{$size}";
    }

    // Add shape class
    if ($shape) {
        $classes[] = "btn-{$shape}";
    }

    // Add state classes
    if ($loading) {
        $classes[] = 'btn-loading';
    }

    if ($iconOnly) {
        $classes[] = 'btn-icon';
    }

    if ($fullWidth) {
        $classes[] = 'w-100';
    }

    // For icon-only buttons, use slot content or default text for aria-label
    $ariaLabel =
        $iconOnly && !$attributes->has('aria-label') ? ($slot->isEmpty() ? 'Button' : strip_tags($slot)) : null;
@endphp

<{{ $element }}
    @if ($isLink) href="{{ $href }}"
    @else
        type="{{ $type }}" @endif
    {{ $attributes->class($classes)->merge([
        'disabled' => $disabled || $loading,
    ]) }}
    @if ($ariaLabel) aria-label="{{ $ariaLabel }}" @endif>
    @if ($loading)
        <span class="spinner-border spinner-border-sm{{ !$iconOnly ? ' me-2' : '' }}" role="status"
            aria-hidden="true"></span>
    @endif

    @if ($icon && !$loading)
        <x-dynamic-component :component="'tabler-' . $icon" />
    @endif

    @unless ($iconOnly)
        {{ $slot }}
    @endunless

    @if ($iconEnd && !$loading)
        <x-dynamic-component :component="'tabler-' . $iconEnd" class="icon-end" />
    @endif
    </{{ $element }}>
