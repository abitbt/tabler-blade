{{--
    Sidebar Collapse Button

    Button to collapse/expand the sidebar.
    Uses Alpine.js to toggle the collapsed state.

    @props
    - class (string) - Additional CSS classes
--}}
@blaze

@props([])

<button {{ $attributes->class('navbar-toggler collapsed') }} type="button" @click="toggle()" aria-label="Toggle sidebar"
    x-cloak>
    <span class="navbar-toggler-icon"></span>
</button>
