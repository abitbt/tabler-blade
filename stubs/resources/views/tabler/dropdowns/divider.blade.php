{{--
    Dropdown Divider Component

    Horizontal separator line to visually divide dropdown menu sections.

    Usage Examples:

    Basic divider:
    <x-tabler::dropdowns.divider />

    Menu with dividers:
    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">First action</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Second action</x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="#">Separated action</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
--}}

<div {{ $attributes->merge(['class' => 'dropdown-divider']) }}></div>
