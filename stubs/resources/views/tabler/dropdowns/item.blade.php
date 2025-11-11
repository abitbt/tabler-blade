{{--
    Dropdown Item Component

    Individual menu item within a dropdown.

    @prop string|null $href - Link URL (default: '#')
    @prop string|null $icon - Icon component name (e.g., 'settings', 'user')
    @prop bool $active - Active state (default: false)
    @prop bool $disabled - Disabled state (default: false)
    @slot default - Item content

    Available CSS Classes (use via class="" attribute):

    States:
    - active              - Active/selected state
    - disabled            - Disabled state (not clickable)

    Usage Examples:

    Basic item:
    <x-tabler::dropdowns.item href="/profile">Profile</x-tabler::dropdowns.item>

    Item with icon:
    <x-tabler::dropdowns.item href="/settings" icon="settings">Settings</x-tabler::dropdowns.item>

    Active item:
    <x-tabler::dropdowns.item href="/dashboard" active>Dashboard</x-tabler::dropdowns.item>

    Disabled item:
    <x-tabler::dropdowns.item href="#" disabled>Coming Soon</x-tabler::dropdowns.item>

    Item with badge:
    <x-tabler::dropdowns.item href="/messages">
        Messages
        <span class="badge bg-primary ms-auto">3</span>
    </x-tabler::dropdowns.item>

    Item with checkbox:
    <x-tabler::dropdowns.item href="#" class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input m-0 me-2">
            Option 1
        </label>
    </x-tabler::dropdowns.item>
--}}

@props([
    'href' => '#',
    'icon' => null,
    'active' => false,
    'disabled' => false,
])

@php
    $classes = ['dropdown-item'];

    if ($active) {
        $classes[] = 'active';
    }

    if ($disabled) {
        $classes[] = 'disabled';
    }
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => implode(' ', $classes)]) }}
    @if ($disabled) tabindex="-1" aria-disabled="true" @endif>
    @if ($icon)
        <x-dynamic-component :component="'tabler-' . $icon" class="icon dropdown-item-icon" />
    @endif
    {{ $slot }}
</a>
