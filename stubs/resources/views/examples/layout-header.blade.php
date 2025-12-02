{{--
    Example: Header Layout

    A horizontal navigation header layout example.
--}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen">
        {{-- Horizontal navigation header --}}
        <tabler:header container dark sticky>
            <tabler:header.brand logo="/logo.png" name="Acme Inc." />

            <tabler:header.nav>
                <tabler:header.item href="/" current>Home</tabler:header.item>
                <tabler:header.item href="/features" icon="star">Features</tabler:header.item>
                <tabler:header.item href="/pricing">Pricing</tabler:header.item>
                <tabler:header.item href="/about">About</tabler:header.item>
                <tabler:header.item href="/contact">Contact</tabler:header.item>
            </tabler:header.nav>

            <tabler:spacer />

            <tabler:header.search placeholder="Search..." />

            <tabler:header.utilities>
                <tabler:theme-toggle />

                <tabler:profile avatar="/user.png" name="John Doe" dropdown>
                    <a href="/profile" class="dropdown-item">Profile</a>
                    <a href="/settings" class="dropdown-item">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a href="/logout" class="dropdown-item">Logout</a>
                </tabler:profile>
            </tabler:header.utilities>
        </tabler:header>

        {{-- Main content area --}}
        <tabler:main container>
            {{ $slot ?? '' }}

            @if (!isset($slot))
                <div class="py-5">
                    <h1 class="mb-4">Welcome</h1>
                    <p>This is an example header layout using Flux-like components.</p>
                </div>
            @endif
        </tabler:main>

        @tablerScripts
    </body>

</html>
