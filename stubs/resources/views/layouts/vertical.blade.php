{{--
    Tabler UI Vertical Sidebar Layout

    Usage:
    @extends('tabler::layouts.vertical')

    @section('content')
        Your content here
    @endsection

    Optional sections:
    - @section('topbar') - Override topbar
    - @section('page-header') - Custom page header (use page-header component)
    - @section('footer') - Custom footer
    - @section('breadcrumbs') - Breadcrumbs navigation

    Layout Variables:

    HTML Level (inherited from base):
    - $htmlDir = 'rtl'           // RTL text direction
    - $htmlLang                  // Language code (default: app locale)
    - $bsThemeBase               // Theme base color
    - $bsThemeFont               // Theme font
    - $bsThemePrimary            // Primary color
    - $bsThemeRadius             // Border radius

    Body Level (inherited from base):
    - $bodyClass                 // Custom body classes
    - $layoutBoxed = true        // Centered, max-width layout
    - $layoutFluid = true        // Full-width layout

    Sidebar:
    - $sidebarDark = true        // Dark sidebar theme (default: from config)
    - $sidebarPosition = 'left'  // Sidebar position: 'left' or 'right'
    - $sidebarTransparent = true // Transparent sidebar background
    - $sidebarBackground = 'primary' // Custom background color
    - $sidebarBreakpoint = 'lg'  // Collapse breakpoint (default: from config)
    - $hideSidebarBrand = true   // Hide logo/brand
    - $sidebarCustomClass        // Additional CSS classes
    - $navItems = []             // Navigation items
    - $sidebarItems = []         // Alternative sidebar items

    Topbar:
    - $hideTopbar = false        // Show top navbar (default: hidden)

    Page Header:
    (use @section('page-header') with page-header component)

    Footer:
    (use @section('footer'))

    Container:
    - $container                 // Container class (default: from config)
--}}

@extends('tabler::layouts.base')

@section('body')

    <div class="page">
        {{-- BEGIN SIDEBAR --}}
        @include('tabler::layouts.partials.sidebar', [
            'dark' => $sidebarDark ?? config('tabler.sidebar.dark', true),
            'position' => $sidebarPosition ?? config('tabler.sidebar.position', 'left'),
            'transparent' => $sidebarTransparent ?? config('tabler.sidebar.transparent', false),
            'background' => $sidebarBackground ?? config('tabler.sidebar.background'),
            'breakpoint' => $sidebarBreakpoint ?? config('tabler.sidebar.breakpoint', 'lg'),
            'hideBrand' => $hideSidebarBrand ?? config('tabler.sidebar.hide_brand', false),
            'customClass' => $sidebarCustomClass ?? '',
            'navItems' => $navItems ?? [],
            'sidebarItems' => $sidebarItems ?? null,
        ])
        {{-- END SIDEBAR --}}

        {{-- Optional Top Navbar (hidden by default in vertical layout) --}}
        @unless ($hideTopbar ?? true)
            @hasSection('topbar')
                @yield('topbar')
            @endif
        @endunless

        <div class="page-wrapper">
            {{-- Breadcrumbs (optional) --}}
            @hasSection('breadcrumbs')
                <div class="page-header-breadcrumb">
                    <div class="{{ $container ?? config('tabler.layout.container', 'container-xl') }}">
                        @yield('breadcrumbs')
                    </div>
                </div>
            @endif

            {{-- Page Header (optional) --}}
            @hasSection('page-header')
                @yield('page-header')
            @endif

            {{-- Flash Messages --}}
            @if (config('tabler.flash_messages.enabled', true))
                <div class="{{ $container ?? config('tabler.layout.container', 'container-xl') }}">
                    @include('tabler::layouts.partials.alerts')
                </div>
            @endif

            {{-- Page Content --}}
            <main id="content" class="page-body">
                <div class="{{ $container ?? config('tabler.layout.container', 'container-xl') }}">
                    @yield('content')
                </div>
            </main>

            {{-- Footer (optional) --}}
            @hasSection('footer')
                @yield('footer')
            @endif
        </div>
    </div>
@endsection
