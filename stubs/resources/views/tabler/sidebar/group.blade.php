{{--
    Sidebar Navigation Group

    Collapsible group of navigation items with a heading.

    @props
    - heading (string) - Group heading text
    - icon (string) - Optional icon for heading
    - expanded (bool) - Start expanded (default: false)
    - class (string) - Additional CSS classes

    Usage:
    <tabler:sidebar.group heading="Settings">
        <tabler:sidebar.dropdown-item href="/settings">General</tabler:sidebar.dropdown-item>
        <tabler:sidebar.dropdown-item href="/security">Security</tabler:sidebar.dropdown-item>
    </tabler:sidebar.group>
--}}
@blaze

@props([
    'heading' => '',
    'icon' => null,
    'expanded' => false,
])

@php
    $groupId = 'sidebar-group-' . md5($heading);
@endphp

<li {{ $attributes->class('nav-item dropdown') }}>
    <a class="nav-link dropdown-toggle" href="#{{ $groupId }}" data-bs-toggle="dropdown" data-bs-auto-close="false"
        role="button" aria-haspopup="true" aria-expanded="{{ $expanded ? 'true' : 'false' }}">
        @if ($icon)
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <tabler:icon :name="$icon" />
            </span>
        @endif
        <span class="nav-link-title">{{ $heading }}</span>
    </a>

    <div class="dropdown-menu{{ $expanded ? ' show' : '' }}">
        <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
                {{ $slot }}
            </div>
        </div>
    </div>
</li>
