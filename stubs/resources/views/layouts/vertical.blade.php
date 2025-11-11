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

    Sidebar:
    - $sidebarDark = true        // Dark sidebar theme (default: true)
    - $sidebarPosition = 'left'  // Sidebar position: 'left' or 'right'
    - $sidebarTransparent = true // Transparent sidebar background
    - $sidebarBackground = 'primary' // Custom background color
    - $sidebarBreakpoint = 'lg'  // Collapse breakpoint
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
            {{-- BEGIN SIDEBAR --}}
            @include('tabler::layouts.partials.sidebar', [
                'dark' => $sidebarDark ?? true,
                'position' => $sidebarPosition ?? 'left',
                'transparent' => $sidebarTransparent ?? false,
                'background' => $sidebarBackground ?? null,
                'breakpoint' => $sidebarBreakpoint ?? 'lg',
                'hideBrand' => $hideSidebarBrand ?? false,
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
                {{-- Page Header (optional) --}}
                @hasSection('page-header')
                    @yield('page-header')
                @endif

                {{-- Page Content --}}
                <main id="content" class="page-body">
                    <div class="container-xl">
                        @yield('content')
                    </div>
                </main>

                {{-- Footer (optional) --}}
                @hasSection('footer')
                    @yield('footer')
                @endif
            </div>
        </div>

        @stack('scripts')
    </body>

</html>
