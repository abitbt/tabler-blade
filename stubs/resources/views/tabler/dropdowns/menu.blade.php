{{--
    Dropdown Menu Component

    Container for dropdown menu items.

    @prop bool $arrow - Show arrow pointing to toggle button (default: false)
    @prop bool $dark - Dark theme variant (default: false)
    @slot default - Menu items, headers, and dividers

    Available CSS Classes (use via class="" attribute):

    Positioning:
    - dropdown-menu-end     - Align menu to right
    - dropdown-menu-start   - Align menu to left (default)

    Card Style:
    - dropdown-menu-card    - Card-style menu with padding

    Arrow:
    - dropdown-menu-arrow   - Show arrow pointing to toggle

    Theme:
    - bg-dark text-white    - Dark theme menu

    Width:
    - dropdown-menu-columns - Multi-column layout

    Usage Examples:

    Basic menu:
    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">Action</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>

    Menu with arrow:
    <x-tabler::dropdowns.menu arrow>
        <x-tabler::dropdowns.item href="#">Action</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>

    Right-aligned menu:
    <x-tabler::dropdowns.menu class="dropdown-menu-end">
        <x-tabler::dropdowns.item href="#">Action</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>

    Dark theme menu:
    <x-tabler::dropdowns.menu dark>
        <x-tabler::dropdowns.item href="#">Action</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>

    Card-style menu with custom content:
    <x-tabler::dropdowns.menu class="dropdown-menu-card" style="max-width: 20rem;">
        <div class="card">
            <div class="card-body">
                Custom content here
            </div>
        </div>
    </x-tabler::dropdowns.menu>
--}}

@props([
    'arrow' => false,
    'dark' => false,
])

@php
    $classes = ['dropdown-menu'];

    if ($arrow) {
        $classes[] = 'dropdown-menu-arrow';
    }

    if ($dark) {
        $classes[] = 'bg-dark';
        $classes[] = 'text-white';
    }
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
    {{ $slot }}
</div>
