{{--
    Dropdown Component

    Main dropdown wrapper component that provides a toggleable menu.

    @slot default - Dropdown toggle and menu components

    Available CSS Classes (use via class="" attribute):

    Positioning:
    - dropup              - Open menu above toggle
    - dropend             - Open menu to right of toggle
    - dropstart           - Open menu to left of toggle

    Usage Examples:

    Basic dropdown:
    <x-tabler::dropdowns.dropdown>
        <x-tabler::dropdowns.toggle>Open dropdown</x-tabler::dropdowns.toggle>
        <x-tabler::dropdowns.menu>
            <x-tabler::dropdowns.item href="#">Action</x-tabler::dropdowns.item>
            <x-tabler::dropdowns.item href="#">Another action</x-tabler::dropdowns.item>
        </x-tabler::dropdowns.menu>
    </x-tabler::dropdowns.dropdown>

    Dropup (menu opens above):
    <x-tabler::dropdowns.dropdown class="dropup">
        ...
    </x-tabler::dropdowns.dropdown>

    With dividers and headers:
    <x-tabler::dropdowns.dropdown>
        <x-tabler::dropdowns.toggle>Open menu</x-tabler::dropdowns.toggle>
        <x-tabler::dropdowns.menu>
            <x-tabler::dropdowns.header>Section 1</x-tabler::dropdowns.header>
            <x-tabler::dropdowns.item href="#">Action 1</x-tabler::dropdowns.item>
            <x-tabler::dropdowns.divider />
            <x-tabler::dropdowns.header>Section 2</x-tabler::dropdowns.header>
            <x-tabler::dropdowns.item href="#">Action 2</x-tabler::dropdowns.item>
        </x-tabler::dropdowns.menu>
    </x-tabler::dropdowns.dropdown>
--}}

<div {{ $attributes->merge(['class' => 'dropdown']) }}>
    {{ $slot }}
</div>
