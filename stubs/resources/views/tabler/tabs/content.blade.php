{{--
    Tabs Content Container Component

    Container for all tab panes. Wraps individual pane components.

    @slot default - Tab pane components

    Available CSS Classes (use via class="" attribute):

    No specific classes - this is a structural wrapper.

    Usage Examples:

    Basic tab content:
    <x-tabler::tabs.content>
        <x-tabler::tabs.pane id="home" active>
            <h4>Home content</h4>
        </x-tabler::tabs.pane>
        <x-tabler::tabs.pane id="profile">
            <h4>Profile content</h4>
        </x-tabler::tabs.pane>
    </x-tabler::tabs.content>
--}}

<div {{ $attributes->merge(['class' => 'tab-content']) }}>
    {{ $slot }}
</div>
