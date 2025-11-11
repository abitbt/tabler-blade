{{--
    Dropdown Toggle Component

    Button or link that triggers the dropdown menu.

    @prop string|null $href - URL for link (null = button element)
    @prop string $color - Button color: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', etc.
    @prop string|null $icon - Icon component name (e.g., 'chevron-down')
    @slot default - Toggle button content

    Available CSS Classes (use via class="" attribute):

    Button Variants:
    - btn                 - Base button (default)
    - btn-primary         - Primary button
    - btn-ghost-{color}   - Ghost variant
    - btn-outline-{color} - Outline variant
    - btn-icon            - Icon-only button

    Button Sizes:
    - btn-sm              - Small button
    - btn-lg              - Large button

    Usage Examples:

    Basic dropdown toggle:
    <x-tabler::dropdowns.toggle>Open dropdown</x-tabler::dropdowns.toggle>

    Primary button toggle:
    <x-tabler::dropdowns.toggle color="primary">Actions</x-tabler::dropdowns.toggle>

    Toggle with icon:
    <x-tabler::dropdowns.toggle icon="chevron-down">Menu</x-tabler::dropdowns.toggle>

    Link toggle (no button styling):
    <x-tabler::dropdowns.toggle href="#" class="nav-link">Profile</x-tabler::dropdowns.toggle>

    Small button toggle:
    <x-tabler::dropdowns.toggle class="btn-sm">Options</x-tabler::dropdowns.toggle>

    Icon-only toggle:
    <x-tabler::dropdowns.toggle icon="dots-vertical" class="btn-icon" />
--}}

@props([
    'href' => null,
    'color' => null,
    'icon' => null,
])

@php
    $classes = ['dropdown-toggle'];
    $userClasses = $attributes->get('class', '');

    // Determine if we should add 'btn' class
    // Don't add 'btn' if user is using non-button styles like 'nav-link'
$nonButtonPatterns = ['nav-link', 'link'];
$shouldAddBtn = true;

foreach ($nonButtonPatterns as $pattern) {
    if (str_contains($userClasses, $pattern)) {
        $shouldAddBtn = false;
        break;
    }
}

// Add btn class unless user is using non-button styles
if ($shouldAddBtn) {
    $classes[] = 'btn';
}

// Add color class if specified
if ($color) {
    $classes[] = 'btn-' . $color;
    }
@endphp

@php
    // Icon classes - only add margin if there's content before the icon
$iconClasses = 'icon';
if (!$slot->isEmpty()) {
    $iconClasses .= ' ms-1';
    }
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => implode(' ', $classes)]) }} data-bs-toggle="dropdown"
        aria-expanded="false">
        {{ $slot }}
        @if ($icon)
            <x-dynamic-component :component="'tabler-' . $icon" class="{{ $iconClasses }}" />
        @endif
    </a>
@else
    <button type="button" {{ $attributes->merge(['class' => implode(' ', $classes)]) }} data-bs-toggle="dropdown"
        aria-expanded="false">
        {{ $slot }}
        @if ($icon)
            <x-dynamic-component :component="'tabler-' . $icon" class="{{ $iconClasses }}" />
        @endif
    </button>
@endif
