{{--
    Horizontal Navbar Layout (Two-row)

    A two-row horizontal navbar layout - the primary navigation pattern in Tabler.
    Top row: Logo + utilities (theme, notifications, user menu)
    Bottom row: Main navigation menu + search

    Configuration Variables:
    @var bool $dark - Enable dark theme (default: from config)
    @var bool $sticky - Make navbar sticky on scroll (default: from config)
    @var bool $transparent - Transparent background (default: from config)
    @var bool $overlap - Navbar overlaps content (default: from config)
    @var string $breakpoint - Responsive breakpoint: sm, md, lg, xl (default: from config)
    @var bool $hideBrand - Hide logo/brand (default: from config)
    @var bool $hideSearch - Hide search bar (default: from config)
    @var bool $hideMenu - Hide navigation menu (default: false)
    @var string $background - Background color name (e.g., 'primary', 'dark')
    @var string $customClass - Additional CSS classes

    Usage Examples:

    Basic navbar (light theme):
    @include('tabler::layouts.navbar.horizontal')

    Dark navbar:
    @include('tabler::layouts.navbar.horizontal', ['dark' => true])

    Sticky dark navbar:
    @include('tabler::layouts.navbar.horizontal', ['dark' => true, 'sticky' => true])

    Overlap transparent navbar:
    @include('tabler::layouts.navbar.horizontal', ['transparent' => true, 'overlap' => true])

    Custom background color:
    @include('tabler::layouts.navbar.horizontal', ['background' => 'primary'])
--}}

@php
    $dark = $dark ?? config('tabler.navbar.dark', false);
    $sticky = $sticky ?? config('tabler.navbar.sticky', false);
    $transparent = $transparent ?? config('tabler.navbar.transparent', false);
    $overlap = $overlap ?? config('tabler.navbar.overlap', false);
    $breakpoint = $breakpoint ?? config('tabler.navbar.breakpoint', 'md');
    $hideBrand = $hideBrand ?? config('tabler.navbar.hide_brand', false);
    $hideSearch = $hideSearch ?? config('tabler.navbar.hide_search', false);
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
        @include('tabler::layouts.navbar.partials.utilities', [
            'dark' => $dark,
            'placement' => 'default',
        ])
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
