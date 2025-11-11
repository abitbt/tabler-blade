{{--
    Theme Toggle Component

    Toggle between light and dark theme modes.

    @var string $class - Additional CSS classes for wrapper
    @var bool $showOnMobile - Show on mobile screens (default: false)
--}}

@php
    $class = $class ?? '';
    $showOnMobile = $showOnMobile ?? false;

    $wrapperClasses = [$showOnMobile ? 'd-flex' : 'd-none d-md-flex', 'me-3'];
    if ($class) {
        $wrapperClasses[] = $class;
    }
@endphp

<div class="{{ implode(' ', $wrapperClasses) }}">
    <div class="nav-item">
        <a href="#" class="nav-link hide-theme-dark px-0" title="Enable dark mode" data-bs-toggle="tooltip"
            data-bs-placement="bottom" data-bs-theme-toggle="dark">
            <x-tabler-moon class="icon" />
        </a>
        <a href="#" class="nav-link hide-theme-light px-0" title="Enable light mode" data-bs-toggle="tooltip"
            data-bs-placement="bottom" data-bs-theme-toggle="light">
            <x-tabler-sun class="icon" />
        </a>
    </div>
</div>
