{{--
    Tabler UI Layout

    Usage:
    @extends('tabler::layouts.app')

    @section('content')
        Your content here
    @endsection

    Optional sections:
    - @section('navbar') - Override entire navbar
    - @section('page-header') - Custom page header
    - @section('footer') - Custom footer

    Layout Variables:

    HTML Level:
    - $htmlDir = 'rtl'           // RTL text direction
    - $bsThemeBase               // Theme base color
    - $bsThemeFont               // Theme font
    - $bsThemePrimary            // Primary color
    - $bsThemeRadius             // Border radius

    Body Level:
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
--}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if (isset($htmlDir) && $htmlDir === 'rtl') dir="rtl" @endif
    data-bs-theme-base="{{ $bsThemeBase ?? 'gray' }}" data-bs-theme-font="{{ $bsThemeFont ?? 'sans-serif' }}"
    data-bs-theme-primary="{{ $bsThemePrimary ?? 'blue' }}" data-bs-theme-radius="{{ $bsThemeRadius ?? '1' }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? config('app.name') }}</title>
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        @stack('styles')
    </head>
    @php
        $bodyClasses = collect([
            $bodyClass ?? null,
            $layoutBoxed ?? false ? 'layout-boxed' : null,
            $layoutFluid ?? false ? 'layout-fluid' : null,
        ])
            ->filter()
            ->implode(' ');
    @endphp

    <body @if ($bodyClasses) class="{{ $bodyClasses }}" @endif>

        <div class="page">
            {{-- Navbar Section --}}
            @if (!($navbarHidden ?? false))
                @if (View::hasSection('navbar'))
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
                {{-- Page Header (optional) --}}
                @if (!($pageHeaderHidden ?? false))
                    @hasSection('page-header')
                        @yield('page-header')
                    @endif
                @endif

                {{-- Page Content --}}
                <main id="content" class="page-body">
                    <div class="container-xl">
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

        @stack('scripts')
    </body>

</html>
