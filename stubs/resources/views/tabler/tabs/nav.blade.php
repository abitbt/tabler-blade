{{--
    Tabs Navigation Component

    Navigation container for tabs. Contains individual tab nav items.

    @prop bool $inCard - Whether tabs are inside a card header (adds card-header-tabs class)
    @prop bool $pills - Use pills style instead of tabs (alternative nav style)
    @prop bool $fill - Make tabs fill full width (nav-fill class)
    @prop bool $justified - Make tabs equal width (nav-justified class)

    @slot default - Tab navigation items

    Available CSS Classes (use via class="" attribute):

    Nav Classes:
    - nav-fill          - Tabs fill full width proportionally
    - nav-justified     - Tabs have equal width
    - nav-pills         - Pill-style navigation (alternative to tabs)

    Card Integration:
    - card-header-tabs  - Applied automatically when inCard=true
    - card-header-pills - Applied automatically when inCard=true and pills=true

    Usage Examples:

    Basic navigation:
    <x-tabler::tabs.nav>
        <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>

    In card header:
    <x-tabler::tabs.nav inCard>
        <x-tabler::tabs.nav-item href="#tab1" active>Tab 1</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#tab2">Tab 2</x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>

    Full-width tabs:
    <x-tabler::tabs.nav fill>
        <x-tabler::tabs.nav-item href="#tab1" active>Tab 1</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#tab2">Tab 2</x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>

    Pills style:
    <x-tabler::tabs.nav pills>
        <x-tabler::tabs.nav-item href="#tab1" active>Tab 1</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#tab2">Tab 2</x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>
--}}

@props([
    'inCard' => false,
    'pills' => false,
    'fill' => false,
    'justified' => false,
])

@php
    // Build classes array
    $classes = ['nav'];

    // Style: tabs or pills
    if ($pills) {
        $classes[] = 'nav-pills';
        if ($inCard) {
            $classes[] = 'card-header-pills';
        }
    } else {
        $classes[] = 'nav-tabs';
        if ($inCard) {
            $classes[] = 'card-header-tabs';
        }
    }

    // Layout modifiers
    if ($fill) {
        $classes[] = 'nav-fill';
    }
    if ($justified) {
        $classes[] = 'nav-justified';
    }
@endphp

<ul {{ $attributes->merge(['class' => implode(' ', $classes)]) }} data-bs-toggle="tabs" role="tablist">
    {{ $slot }}
</ul>
