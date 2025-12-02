{{--
    Sidebar Navigation Container

    Wrapper for navigation items in the sidebar.

    @props
    - class (string) - Additional CSS classes

    Usage:
    <tabler:sidebar.nav>
        <tabler:sidebar.item icon="home" href="/">Dashboard</tabler:sidebar.item>
    </tabler:sidebar.nav>
--}}
@blaze

<div class="navbar-collapse collapse" id="sidebar-menu">
    <ul {{ $attributes->class('navbar-nav pt-lg-3') }}>
        {{ $slot }}
    </ul>
</div>
