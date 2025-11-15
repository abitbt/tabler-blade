{{--
    Header Navigation Container

    Horizontal navigation menu in the header (condensed version).

    @props
    - class (string) - Additional CSS classes

    Usage:
    <tabler:header.nav>
        <tabler:header.item href="/" current>Home</tabler:header.item>
        <tabler:header.item href="/about">About</tabler:header.item>
    </tabler:header.nav>
--}}
@blaze

<div class="navbar-collapse collapse" id="navbar-menu">
    <nav aria-label="Primary">
        <ul {{ $attributes->class('navbar-nav') }}>
            {{ $slot }}
        </ul>
    </nav>
</div>
