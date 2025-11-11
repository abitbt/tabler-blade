{{--
    Avatar List Component

    Display multiple avatars in a stacked or inline list.

    @prop bool $stacked - Stack avatars with overlap
    @prop string|null $size - Avatar size for all items: 'sm', 'md', 'lg', 'xl', 'xxl'

    @slot default - Avatar components

    Available CSS Classes (use via class="" attribute):

    Layout:
    - avatar-list        - Base avatar list class (applied automatically)
    - avatar-list-stacked - Stacked/overlapped avatars (also via stacked prop)

    Usage Examples:

    Basic avatar list:
    <x-tabler::avatar-list>
        <x-tabler::avatar src="/img/user1.jpg" />
        <x-tabler::avatar src="/img/user2.jpg" />
        <x-tabler::avatar src="/img/user3.jpg" />
    </x-tabler::avatar-list>

    Stacked avatar list:
    <x-tabler::avatar-list stacked>
        <x-tabler::avatar src="/img/user1.jpg" />
        <x-tabler::avatar src="/img/user2.jpg" />
        <x-tabler::avatar src="/img/user3.jpg" />
        <x-tabler::avatar initials="+5" />
    </x-tabler::avatar-list>

    Small stacked avatars:
    <x-tabler::avatar-list stacked size="sm">
        <x-tabler::avatar src="/img/user1.jpg" size="sm" />
        <x-tabler::avatar src="/img/user2.jpg" size="sm" />
        <x-tabler::avatar src="/img/user3.jpg" size="sm" />
    </x-tabler::avatar-list>
--}}

@props([
    'stacked' => false,
    'size' => null,
])

@php
    // Build avatar-list classes
    $classes = ['avatar-list'];

    // Stacked variant
    if ($stacked) {
        $classes[] = 'avatar-list-stacked';
    }
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
    {{ $slot }}
</div>
