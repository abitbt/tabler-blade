{{--
    Dropdown Header Component

    Section header within a dropdown menu to group related items.

    @slot default - Header text

    Usage Examples:

    Basic header:
    <x-tabler::dropdowns.header>Account Settings</x-tabler::dropdowns.header>

    Complete menu with sections:
    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.header>Account</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="/profile">Profile</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="/settings">Settings</x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header>Actions</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="/logout">Logout</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
--}}

<span {{ $attributes->merge(['class' => 'dropdown-header']) }}>
    {{ $slot }}
</span>
