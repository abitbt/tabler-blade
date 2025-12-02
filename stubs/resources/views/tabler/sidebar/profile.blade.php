{{--
    Sidebar Profile Component

    User profile display in sidebar (typically at bottom).

    @props
    - avatar (string) - Path to user avatar image
    - name (string) - User name
    - email (string) - User email (optional)
    - href (string) - Profile link URL (optional)
    - class (string) - Additional CSS classes

    Usage:
    <tabler:sidebar.profile avatar="/user.png" name="John Doe" email="john@example.com" />
--}}
@blaze

@props([
    'avatar' => null,
    'name' => '',
    'email' => null,
    'href' => null,
])

@php
    $tag = $href ? 'a' : 'div';
@endphp

<{{ $tag }} {{ $attributes->class('navbar-user d-flex align-items-center p-3') }}
    @if ($href) href="{{ $href }}" @endif>
    @if ($avatar)
        <span class="avatar avatar-sm me-2" style="background-image: url({{ asset($avatar) }})"></span>
    @else
        <span class="avatar avatar-sm me-2">{{ substr($name, 0, 2) }}</span>
    @endif

    <div class="flex-grow-1">
        <div class="fw-semibold">{{ $name }}</div>
        @if ($email)
            <div class="text-muted small">{{ $email }}</div>
        @endif
    </div>

    @if ($href)
        <span class="ms-auto">
            <tabler:icon name="chevron-right" class="icon-sm" />
        </span>
    @endif
    </{{ $tag }}>
