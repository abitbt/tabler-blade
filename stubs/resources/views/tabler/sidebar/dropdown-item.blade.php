{{--
    Sidebar Dropdown Item

    Item for use inside <tabler:sidebar.group> dropdowns.

    @props
    - href (string) - Link URL
    - current (bool) - Mark as current/active page
    - icon (string) - Optional icon
    - class (string) - Additional CSS classes

    Usage:
    <tabler:sidebar.group heading="Settings">
        <tabler:sidebar.dropdown-item href="/settings">General</tabler:sidebar.dropdown-item>
        <tabler:sidebar.dropdown-item href="/security" current>Security</tabler:sidebar.dropdown-item>
    </tabler:sidebar.group>
--}}
@blaze

@props([
    'href' => '#',
    'current' => false,
    'icon' => null,
])

<a {{ $attributes->class(['dropdown-item', 'active' => $current]) }} href="{{ $href }}"
    @if ($current) aria-current="page" @endif>
    @if ($icon)
        <tabler:icon :name="$icon" class="dropdown-item-icon" />
    @endif
    {{ $slot }}
</a>
