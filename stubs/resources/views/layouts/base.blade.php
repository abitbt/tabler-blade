{{--
    Base Layout

    The foundational HTML structure for all Tabler layouts.
    Other layouts (app, vertical) should extend this base.

    HTML Level Variables:
    - $htmlDir = 'rtl'           // RTL text direction
    - $htmlLang                  // Language code (default: app locale)
    - $bsThemeBase               // Theme base color
    - $bsThemeFont               // Theme font
    - $bsThemePrimary            // Primary color
    - $bsThemeRadius             // Border radius

    Body Level Variables:
    - $bodyClass                 // Custom body classes
    - $layoutBoxed = true        // Centered, max-width layout
    - $layoutFluid = true        // Full-width layout
--}}

@php
    // HTML attributes
    $htmlLang = $htmlLang ?? str_replace('_', '-', app()->getLocale());
    $htmlDir = $htmlDir ?? null;

    // Theme data attributes
    $themeBase = $bsThemeBase ?? config('tabler.layout.theme.base', 'gray');
    $themeFont = $bsThemeFont ?? config('tabler.layout.theme.font', 'sans-serif');
    $themePrimary = $bsThemePrimary ?? config('tabler.layout.theme.primary', 'blue');
    $themeRadius = $bsThemeRadius ?? config('tabler.layout.theme.radius', '1');

    // Build body classes
    $bodyClasses = collect([
        $bodyClass ?? null,
        $layoutBoxed ?? false ? 'layout-boxed' : null,
        $layoutFluid ?? false ? 'layout-fluid' : null,
    ])
        ->filter()
        ->implode(' ');
@endphp

<!DOCTYPE html>
<html lang="{{ $htmlLang }}" @if ($htmlDir) dir="{{ $htmlDir }}" @endif
    data-bs-theme-base="{{ $themeBase }}" data-bs-theme-font="{{ $themeFont }}"
    data-bs-theme-primary="{{ $themePrimary }}" data-bs-theme-radius="{{ $themeRadius }}">

    <head>
        @include('tabler::layouts.partials.head')
    </head>

    <body @if ($bodyClasses) class="{{ $bodyClasses }}" @endif>
        @yield('body')

        @stack('scripts')
    </body>

</html>
