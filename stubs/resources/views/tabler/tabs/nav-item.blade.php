{{--
    Tab Navigation Item Component

    Individual tab link within tabs navigation.

    @prop string $href - Target tab pane ID (e.g., "#home")
    @prop bool $active - Whether this tab is currently active
    @prop bool $disabled - Disable the tab link
    @prop string|null $icon - Tabler icon name (without 'tabler-' prefix)
    @prop bool $iconOnly - Show only icon without text

    @slot default - Tab label text

    Available CSS Classes (use via class="" attribute):

    Positioning:
    - ms-auto - Push tab to the right (useful for settings/action tabs)
    - me-auto - Push tab to the left

    Usage Examples:

    Basic tab item:
    <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>

    With icon:
    <x-tabler::tabs.nav-item href="#profile" icon="user">Profile</x-tabler::tabs.nav-item>

    Icon only:
    <x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly />

    Disabled tab:
    <x-tabler::tabs.nav-item href="#disabled" disabled>Disabled</x-tabler::tabs.nav-item>

    Right-aligned tab:
    <x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly class="ms-auto" />
--}}

@props([
    'href' => '#',
    'active' => false,
    'disabled' => false,
    'icon' => null,
    'iconOnly' => false,
])

@php
    // Build link classes
    $linkClasses = ['nav-link'];

    if ($active) {
        $linkClasses[] = 'active';
    }

    if ($disabled) {
        $linkClasses[] = 'disabled';
    }

    // Generate icon component name if icon is provided
    $iconComponent = $icon ? 'tabler-' . $icon : null;

    // Generate aria-label for icon-only tabs
    $ariaLabel = $iconOnly && $icon ? str_replace('-', ' ', $icon) : null;
@endphp

<li {{ $attributes->only('class')->class(['nav-item']) }} role="presentation">
    <a href="{{ $href }}" class="{{ implode(' ', $linkClasses) }}" data-bs-toggle="tab" role="tab"
        @if ($disabled) tabindex="-1"
            aria-disabled="true" @endif
        @if ($ariaLabel) aria-label="{{ ucfirst($ariaLabel) }}" @endif
        {{ $attributes->except('class') }}>
        @if ($icon)
            <x-dynamic-component :component="$iconComponent" class="icon {{ $iconOnly ? '' : 'me-2' }}" />
        @endif
        @unless ($iconOnly)
            {{ $slot }}
        @endunless
    </a>
</li>
