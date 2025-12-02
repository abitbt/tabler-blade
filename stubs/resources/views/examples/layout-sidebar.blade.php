{{--
    Example: Sidebar Layout

    A full-featured sidebar layout example showing how to use
    the new Flux-like component syntax.
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
        {{-- Sidebar: Collapsible with state persistence --}}
        <tabler:sidebar sticky collapsible dark>
            <tabler:sidebar.header>
                <tabler:sidebar.brand logo="/logo.png" name="Acme Inc." />
                <tabler:sidebar.collapse />
            </tabler:sidebar.header>

            <tabler:sidebar.nav>
                <tabler:sidebar.item icon="home" href="/" current>Dashboard</tabler:sidebar.item>
                <tabler:sidebar.item icon="inbox" href="/inbox" badge="12">Inbox</tabler:sidebar.item>
                <tabler:sidebar.item icon="users" href="/users">Users</tabler:sidebar.item>

                <tabler:sidebar.group heading="Settings" icon="settings">
                    <tabler:sidebar.dropdown-item href="/settings/general">General</tabler:sidebar.dropdown-item>
                    <tabler:sidebar.dropdown-item href="/settings/security">Security</tabler:sidebar.dropdown-item>
                    <tabler:sidebar.dropdown-item href="/settings/billing">Billing</tabler:sidebar.dropdown-item>
                </tabler:sidebar.group>
            </tabler:sidebar.nav>

            <tabler:sidebar.spacer />

            <tabler:sidebar.nav>
                <tabler:sidebar.item icon="help-circle" href="/help">Help</tabler:sidebar.item>
            </tabler:sidebar.nav>

            <tabler:sidebar.profile avatar="/user.png" name="John Doe" email="john@example.com" />
        </tabler:sidebar>

        {{-- Mobile header (hidden on desktop) --}}
        <tabler:header class="lg:hidden">
            <tabler:sidebar.toggle />
            <tabler:spacer />
            <tabler:profile avatar="/user.png" />
        </tabler:header>

        {{-- Main content area --}}
        <tabler:main container="container-xl">
            {{ $slot ?? '' }}

            @if (!isset($slot))
                <h1 class="mb-4">Welcome to Dashboard</h1>
                <p>This is an example sidebar layout using Flux-like components.</p>
            @endif
        </tabler:main>

        @tablerScripts
        @tablerSidebarScripts
    </body>

</html>
