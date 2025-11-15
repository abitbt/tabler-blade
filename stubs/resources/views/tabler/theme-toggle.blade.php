{{--
    Theme Toggle Component

    Button to toggle between light and dark theme.

    @props
    - class (string) - Additional CSS classes

    Usage:
    <tabler:theme-toggle />
--}}
@blaze

<div {{ $attributes->class('nav-item') }}>
    <a href="#" class="nav-link hide-theme-dark px-0" title="Enable dark mode" data-bs-toggle="tooltip"
        data-bs-placement="bottom">
        <tabler:icon name="moon" />
    </a>
    <a href="#" class="nav-link hide-theme-light px-0" title="Enable light mode" data-bs-toggle="tooltip"
        data-bs-placement="bottom">
        <tabler:icon name="sun" />
    </a>
</div>
