{{--
    Tab Pane Component

    Individual content pane for a tab. Must have matching ID with corresponding nav item's href.

    @prop string $id - Unique pane ID (matches href in nav-item without #)
    @prop bool $active - Whether this pane is currently active/visible
    @prop bool $fade - Enable fade transition (adds show class when active)

    @slot default - Tab pane content

    Available CSS Classes (use via class="" attribute):

    No specific additional classes - content styling should be applied to inner elements.

    Usage Examples:

    Basic tab pane:
    <x-tabler::tabs.pane id="home" active>
        <h4>Home tab</h4>
        <p>Welcome to the home tab content.</p>
    </x-tabler::tabs.pane>

    Inactive pane:
    <x-tabler::tabs.pane id="profile">
        <h4>Profile tab</h4>
        <p>Your profile information.</p>
    </x-tabler::tabs.pane>

    With fade transition:
    <x-tabler::tabs.pane id="settings" fade>
        <h4>Settings</h4>
    </x-tabler::tabs.pane>
--}}

@props([
    'id' => null,
    'active' => false,
    'fade' => true,
])

@php
    // Build pane classes
    $classes = ['tab-pane'];

    if ($fade) {
        $classes[] = 'fade';
    }

    if ($active) {
        $classes[] = 'active';
        if ($fade) {
            $classes[] = 'show';
        }
    }
@endphp

<div
    {{ $attributes->merge([
        'class' => implode(' ', $classes),
        'id' => $id,
        'role' => 'tabpanel',
    ]) }}>
    {{ $slot }}
</div>
