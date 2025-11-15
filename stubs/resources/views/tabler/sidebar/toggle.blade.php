{{--
    Sidebar Toggle Button

    Mobile menu toggle button (typically used in <tabler:header>).
    Toggles the mobile sidebar visibility using Bootstrap's collapse.

    @props
    - icon (string) - Icon name (default: 'menu-2')
    - class (string) - Additional CSS classes
--}}
@blaze

@props([
    'icon' => 'menu-2',
])

<button {{ $attributes->class('navbar-toggler') }} type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
    <tabler:icon :name="$icon" />
</button>
