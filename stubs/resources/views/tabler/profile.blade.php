{{--
    Profile Component

    User profile display with avatar (can be used in header or sidebar).
    Can be a simple display or a dropdown menu trigger.

    @props
    - avatar (string) - Path to user avatar image
    - name (string) - User name (optional, for dropdown)
    - dropdown (bool) - Enable dropdown menu (default: false)
    - class (string) - Additional CSS classes

    Usage:
    Simple avatar button:
    <tabler:profile avatar="/user.png" />

    With dropdown menu:
    <tabler:profile avatar="/user.png" name="John Doe" dropdown>
        <a href="/profile" class="dropdown-item">Profile</a>
        <a href="/settings" class="dropdown-item">Settings</a>
        <div class="dropdown-divider"></div>
        <a href="/logout" class="dropdown-item">Logout</a>
    </tabler:profile>
--}}
@blaze

@props([
    'avatar' => null,
    'name' => null,
    'dropdown' => false,
])

@if ($dropdown)
    <div {{ $attributes->class('nav-item dropdown') }}>
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            @if ($avatar)
                <span class="avatar avatar-sm" style="background-image: url({{ asset($avatar) }})"></span>
            @else
                <span class="avatar avatar-sm">{{ substr($name ?? 'U', 0, 2) }}</span>
            @endif
            @if ($name)
                <div class="d-none d-xl-block ps-2">
                    <div>{{ $name }}</div>
                </div>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            {{ $slot }}
        </div>
    </div>
@else
    <div {{ $attributes->class('nav-item') }}>
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0">
            @if ($avatar)
                <span class="avatar avatar-sm" style="background-image: url({{ asset($avatar) }})"></span>
            @else
                <span class="avatar avatar-sm">U</span>
            @endif
        </a>
    </div>
@endif
