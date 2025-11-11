{{--
    Default Navbar Layout (Two-row)

    A two-row horizontal navbar layout - the primary navigation pattern in Tabler.
    Top row: Logo + utilities (theme, notifications, user menu)
    Bottom row: Main navigation menu + search

    Configuration Variables:
    @var bool $dark - Enable dark theme (default: false)
    @var bool $sticky - Make navbar sticky on scroll (default: false)
    @var bool $transparent - Transparent background (default: false)
    @var bool $overlap - Navbar overlaps content (default: false)
    @var string $breakpoint - Responsive breakpoint: sm, md, lg, xl (default: 'md')
    @var bool $hideBrand - Hide logo/brand (default: false)
    @var bool $hideSearch - Hide search bar (default: false)
    @var bool $hideMenu - Hide navigation menu (default: false)
    @var string $background - Background color name (e.g., 'primary', 'dark')
    @var string $customClass - Additional CSS classes

    Usage Examples:

    Basic navbar (light theme):
    @include('tabler::layouts.navbar.default')

    Dark navbar:
    @include('tabler::layouts.navbar.default', ['dark' => true])

    Sticky dark navbar:
    @include('tabler::layouts.navbar.default', ['dark' => true, 'sticky' => true])

    Overlap transparent navbar:
    @include('tabler::layouts.navbar.default', ['transparent' => true, 'overlap' => true])

    Custom background color:
    @include('tabler::layouts.navbar.default', ['background' => 'primary'])
--}}

@php
    $dark = $dark ?? false;
    $sticky = $sticky ?? false;
    $transparent = $transparent ?? false;
    $overlap = $overlap ?? false;
    $breakpoint = $breakpoint ?? 'md';
    $hideBrand = $hideBrand ?? false;
    $hideSearch = $hideSearch ?? false;
    $hideMenu = $hideMenu ?? false;
    $background = $background ?? null;
    $customClass = $customClass ?? '';

    // Build navbar classes
    $navbarClasses = ['navbar', "navbar-expand-{$breakpoint}", 'd-print-none'];

    if ($transparent) {
        $navbarClasses[] = 'navbar-transparent';
    } elseif ($background) {
        $navbarClasses[] = "bg-{$background}";
    }

    if ($sticky) {
        $navbarClasses[] = 'sticky-top';
    }

    if ($overlap) {
        $navbarClasses[] = 'navbar-overlap';
    }

    if ($customClass) {
        $navbarClasses[] = $customClass;
    }
@endphp

@if ($sticky)
    <div class="sticky-top">
@endif

<!-- BEGIN NAVBAR (TOP ROW) -->
<header class="{{ implode(' ', $navbarClasses) }}"@if ($dark) data-bs-theme="dark" @endif>
    <div class="container-xl">
        <!-- BEGIN NAVBAR TOGGLER -->
        @include('tabler::layouts.navbar.partials.toggler', ['target' => 'navbar-menu'])
        <!-- END NAVBAR TOGGLER -->

        @unless ($hideBrand)
            <!-- BEGIN NAVBAR LOGO -->
            @include('tabler::layouts.navbar.partials.logo', [
                'class' => 'd-none-navbar-horizontal pe-0 pe-md-3',
            ])
            <!-- END NAVBAR LOGO -->
        @endunless

        <!-- BEGIN NAVBAR UTILITIES (RIGHT SIDE) -->
        <div class="navbar-nav order-md-last flex-row">
            @stack('navbar-utilities-start')

            <!-- Theme Toggle -->
            <div class="d-none d-md-flex me-3">
                <div class="nav-item">
                    <a href="#" class="nav-link hide-theme-dark px-0" title="Enable dark mode"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-theme-toggle="dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon">
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                    </a>
                    <a href="#" class="nav-link hide-theme-light px-0" title="Enable light mode"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-theme-toggle="light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon">
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path
                                d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                    </a>
                </div>
            </div>

            @stack('navbar-utilities-before-user')

            <!-- User Menu -->
            @auth
                @include('tabler::layouts.navbar.partials.user-menu', ['dark' => $dark])
            @else
                @if (Route::has('login'))
                    <div class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            <span class="nav-link-title">Sign in</span>
                        </a>
                    </div>
                @endif
            @endauth

            @stack('navbar-utilities-end')
        </div>
        <!-- END NAVBAR UTILITIES (RIGHT SIDE) -->
    </div>
</header>
<!-- END NAVBAR (TOP ROW) -->

@unless ($hideMenu)
    <!-- BEGIN NAVBAR MENU (BOTTOM ROW) -->
    <div class="navbar-expand-{{ $breakpoint }}">
        <div class="navbar-collapse collapse" id="navbar-menu">
            <div class="navbar">
                <div class="container-xl">
                    <div class="row flex-column flex-md-row flex-fill align-items-center">
                        <div class="col">
                            <!-- BEGIN NAVBAR MENU -->
                            <nav aria-label="Primary">
                                @include('tabler::layouts.navbar.partials.menu')
                            </nav>
                            <!-- END NAVBAR MENU -->
                        </div>

                        @unless ($hideSearch)
                            <div class="col-2 d-none d-xxl-block">
                                <!-- BEGIN NAVBAR SEARCH -->
                                @include('tabler::layouts.navbar.partials.search', [
                                    'class' => 'my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last',
                                ])
                                <!-- END NAVBAR SEARCH -->
                            </div>
                        @endunless

                        <div class="col col-md-auto">
                            @stack('navbar-menu-actions')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END NAVBAR MENU (BOTTOM ROW) -->
@endunless

@if ($sticky)
    </div>
@endif
