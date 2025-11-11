{{--
    Tabs Container Component

    Wrapper component for tabbed navigation and content.
    Use with <x-tabler::tabs.nav> and <x-tabler::tabs.content> for structure.

    @prop string|null $id - Optional container ID

    @slot default - The tabs navigation and content (nav + content components)

    Available CSS Classes (use via class="" attribute):

    Container Classes:
    - No specific container classes

    Usage Notes:
    - Tabs require Bootstrap 5 JavaScript to function
    - Use data-bs-toggle="tabs" on the nav element to enable tab switching
    - Each tab link must have data-bs-toggle="tab" and href="#pane-id"
    - Tab panes must have matching IDs
    - First tab should have "active" class on both link and pane

    Usage Examples:

    Basic tabs:
    <x-tabler::tabs.tabs>
        <x-tabler::tabs.nav>
            <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="home" active>
                <h4>Home content</h4>
            </x-tabler::tabs.pane>
            <x-tabler::tabs.pane id="profile">
                <h4>Profile content</h4>
            </x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::tabs.tabs>

    In a card:
    <x-tabler::cards.card>
        <x-tabler::cards.header>
            <x-tabler::tabs.nav inCard>
                <x-tabler::tabs.nav-item href="#tab1" active>Tab 1</x-tabler::tabs.nav-item>
                <x-tabler::tabs.nav-item href="#tab2">Tab 2</x-tabler::tabs.nav-item>
            </x-tabler::tabs.nav>
        </x-tabler::cards.header>
        <x-tabler::cards.body>
            <x-tabler::tabs.content>
                <x-tabler::tabs.pane id="tab1" active>Content 1</x-tabler::tabs.pane>
                <x-tabler::tabs.pane id="tab2">Content 2</x-tabler::tabs.pane>
            </x-tabler::tabs.content>
        </x-tabler::cards.body>
    </x-tabler::cards.card>
--}}

@props([
    'id' => null,
])

<div {{ $attributes->merge(['id' => $id]) }}>
    {{ $slot }}
</div>
