{{--
    Sidebar Navigation Item

    Individual navigation link in the sidebar.

    @props
    - icon (string) - Tabler icon name
    - href (string) - Link URL
    - current (bool) - Mark as current/active page
    - badge (string) - Optional badge text
    - badge-color (string) - Badge color (default: 'red')
    - class (string) - Additional CSS classes

    Usage:
    <tabler:sidebar.item icon="home" href="/" current>Dashboard</tabler:sidebar.item>
    <tabler:sidebar.item icon="users" href="/users" badge="12">Users</tabler:sidebar.item>
--}}
@blaze

@props([
    'icon' => null,
    'href' => '#',
    'current' => false,
    'badge' => null,
    'badgeColor' => 'red',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('nav-item')
        ->add($current ? 'active' : '');
@endphp

<li {{ $attributes->class($classes) }}>
    <a class="nav-link" href="{{ $href }}" @if ($current) aria-current="page" @endif>
        @if ($icon)
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <tabler:icon :name="$icon" />
            </span>
        @endif
        <span class="nav-link-title">{{ $slot }}</span>
        @if ($badge)
            <span class="badge badge-sm bg-{{ $badgeColor }} text-{{ $badgeColor }}-fg ms-auto">
                {{ $badge }}
            </span>
        @endif
    </a>
</li>
