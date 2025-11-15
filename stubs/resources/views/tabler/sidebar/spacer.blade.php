{{--
    Sidebar Spacer

    Flexible spacer to push content apart in the sidebar.
    Use between navigation sections to separate them vertically.

    Usage:
    <tabler:sidebar.nav>
        <tabler:sidebar.item href="/">Home</tabler:sidebar.item>
    </tabler:sidebar.nav>

    <tabler:sidebar.spacer />

    <tabler:sidebar.nav>
        <tabler:sidebar.item href="/settings">Settings</tabler:sidebar.item>
    </tabler:sidebar.nav>
--}}
@blaze

<div {{ $attributes->class('flex-grow-1') }}></div>
