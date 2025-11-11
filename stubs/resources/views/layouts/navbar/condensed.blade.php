{{--
    Condensed Navbar Layout (Single-row)

    A single-row horizontal navbar layout where all navigation elements are inline.
    More compact than the default two-row layout - ideal for simpler applications.

    Configuration Variables:
    @var bool $dark - Enable dark theme (default: false)
    @var bool $sticky - Make navbar sticky on scroll (default: false)
    @var bool $transparent - Transparent background (default: false)
    @var bool $overlap - Navbar overlaps content (default: false)
    @var string $breakpoint - Responsive breakpoint: sm, md, lg, xl (default: 'md')
    @var bool $hideBrand - Hide logo/brand (default: false)
    @var bool $hideSearch - Hide search bar (default: false)
    @var string $background - Background color name (e.g., 'primary', 'dark')
    @var string $customClass - Additional CSS classes
    @var bool $fluidSearch - Allow search to grow and fill space (default: false)

    Usage Examples:

    Basic condensed navbar:
    @include('tabler::layouts.navbar.condensed')

    Dark condensed navbar:
    @include('tabler::layouts.navbar.condensed', ['dark' => true])

    Sticky with custom background:
    @include('tabler::layouts.navbar.condensed', ['sticky' => true, 'background' => 'dark'])

    Overlap transparent navbar:
    @include('tabler::layouts.navbar.condensed', ['transparent' => true, 'overlap' => true])
--}}

@php
    $dark = $dark ?? config('tabler.navbar.dark', false);
    $sticky = $sticky ?? config('tabler.navbar.sticky', false);
    $transparent = $transparent ?? config('tabler.navbar.transparent', false);
    $overlap = $overlap ?? config('tabler.navbar.overlap', false);
    $breakpoint = $breakpoint ?? config('tabler.navbar.breakpoint', 'md');
    $hideBrand = $hideBrand ?? config('tabler.navbar.hide_brand', false);
    $hideSearch = $hideSearch ?? config('tabler.navbar.hide_search', false);
    $background = $background ?? null;
    $customClass = $customClass ?? '';
    $fluidSearch = $fluidSearch ?? false;

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

    // Search classes
    $searchClasses = [
        'ms-md-auto',
        'ps-md-4',
        'py-2',
        'py-md-0',
        'me-md-4',
        'order-first',
        'order-md-last',
        'flex-grow-1',
    ];
    if (!$fluidSearch) {
        $searchClasses[] = 'flex-md-grow-0';
    }
@endphp

<!-- BEGIN CONDENSED NAVBAR (SINGLE ROW) -->
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
            'placement' => 'condensed',
        ])
        <!-- END NAVBAR UTILITIES (RIGHT SIDE) -->

        <!-- BEGIN COLLAPSIBLE NAVBAR CONTENT -->
        <div class="navbar-collapse collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <!-- BEGIN NAVBAR MENU -->
                <nav aria-label="Primary">
                    @include('tabler::layouts.navbar.partials.menu')
                </nav>
                <!-- END NAVBAR MENU -->

                @unless ($hideSearch)
                    <!-- BEGIN NAVBAR SEARCH -->
                    @include('tabler::layouts.navbar.partials.search', [
                        'class' => implode(' ', $searchClasses),
                    ])
                    <!-- END NAVBAR SEARCH -->
                @endunless
            </div>
        </div>
        <!-- END COLLAPSIBLE NAVBAR CONTENT -->
    </div>
</header>
<!-- END CONDENSED NAVBAR (SINGLE ROW) -->
