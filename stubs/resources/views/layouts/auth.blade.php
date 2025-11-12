{{--
    Auth Layout

    Centered authentication layout with optional logo.
    Used for login, register, forgot password, and other auth pages.

    @section content - Main content (typically a card with form)
    @section footer - Optional footer content below the main card
--}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>

    <body class="d-flex flex-column">

        <div class="page page-center">
            <div class="container-tight container py-4">
                <div class="mb-4 text-center">
                    <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                        @include('tabler::layouts.navbar.partials.logo')
                    </a>
                </div>

                @yield('content')

                @hasSection('footer')
                    @yield('footer')
                @endif
            </div>
        </div>

        @stack('scripts')
    </body>

</html>
