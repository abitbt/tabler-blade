{{--
    Tabler UI Horizontal Layout

    Usage:
    @extends('tabler::layouts.app')

    @section('content')
        Your content here
    @endsection

    Optional sections:
    - @section('navbar') - Override entire navbar
    - @section('page-header') - Custom page header
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

    Navbar:
    - $navbarDark = true         // Dark navbar theme
    - $navbarSticky = true       // Sticky navbar
    - $navbarOverlap = true      // Overlapping navbar
    - $navbarHidden = true       // Hide navbar
    - $navItems = []             // Navigation items

    Page Header:
    - $pageHeaderHidden = true   // Hide page header section

    Footer:
    - $footerHidden = true       // Hide footer section

    Container:
    - $container                 // Container class (default: from config)
--}}

@extends('tabler::layouts.base')

@section('body')

    <div class="page">
        {{-- Navbar Section --}}
        @if (!($navbarHidden ?? false))
            @hasSection('navbar')
                @yield('navbar')
            @else
                @include('tabler::layouts.navbar.condensed', [
                    'dark' => $navbarDark ?? false,
                    'sticky' => $navbarSticky ?? false,
                    'overlap' => $navbarOverlap ?? false,
                    'navItems' => $navItems ?? [],
                ])
            @endif
        @endif

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
            @if (!($pageHeaderHidden ?? false))
                @hasSection('page-header')
                    @yield('page-header')
                @endif
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
            @if (!($footerHidden ?? false))
                @hasSection('footer')
                    @yield('footer')
                @endif
            @endif
        </div>
    </div>
@endsection
