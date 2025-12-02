{{--
    Layout: Combo (Sidebar + Header)

    Official Tabler UI combo layout combining sidebar navigation with top header.

    Structure:
    - Left sidebar: Dark themed vertical navigation (same as vertical layout)
    - Top navbar: Condensed header with utilities (hidden on mobile with d-none d-lg-flex)
    - Page wrapper: Page header, main content, footer

    Body class: None
    Key classes:
    - Sidebar: navbar navbar-vertical navbar-expand-lg, data-bs-theme="dark"
    - Header: navbar navbar-expand-md d-none d-lg-flex d-print-none
--}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Tabler') }}</title>

        @tablerStyles
    </head>

    <body>
        <div class="page">
            {{-- Vertical Sidebar: Left navigation --}}
            <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
                <div class="container-fluid">
                    {{-- Mobile toggle button --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    {{-- Brand/Logo --}}
                    <div class="navbar-brand navbar-brand-autodark">
                        <a href="/">
                            <img src="{{ config('tabler.logo.full') ?? asset('logo.png') }}" width="110"
                                height="32" alt="{{ config('app.name') }}" class="navbar-brand-image">
                        </a>
                    </div>

                    {{-- Mobile-only utilities --}}
                    <div class="navbar-nav d-lg-none flex-row">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                                aria-label="Open user menu">
                                <span class="avatar avatar-sm"
                                    style="background-image: url(./static/avatars/000m.jpg)"></span>
                                <div class="d-none d-xl-block ps-2">
                                    <div>{{ auth()->user()->name ?? 'Guest User' }}</div>
                                    <div class="small text-secondary mt-1">
                                        {{ auth()->user()->email ?? 'guest@example.com' }}</div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <a href="#" class="dropdown-item">Status</a>
                                <a href="#" class="dropdown-item">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Settings</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- Sidebar Menu --}}
                    <div class="navbar-collapse collapse" id="sidebar-menu">
                        <ul class="navbar-nav pt-lg-3">
                            {{-- Home --}}
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <tabler:icon name="home" />
                                    </span>
                                    <span class="nav-link-title">Home</span>
                                </a>
                            </li>

                            {{-- Dropdown menu example --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                    data-bs-auto-close="false" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <tabler:icon name="package" />
                                    </span>
                                    <span class="nav-link-title">Interface</span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item" href="#">Alerts</a>
                                            <a class="dropdown-item" href="#">Buttons</a>
                                            <a class="dropdown-item" href="#">Cards</a>
                                            <a class="dropdown-item" href="#">Forms</a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            {{-- Regular menu items --}}
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <tabler:icon name="file-text" />
                                    </span>
                                    <span class="nav-link-title">Documentation</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>

            {{-- Top Navbar: Condensed header with utilities (hidden on mobile) --}}
            <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none" data-bs-theme="dark">
                <div class="container-xl">
                    {{-- Mobile toggle button --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    {{-- Right side utilities --}}
                    <div class="navbar-nav order-md-last flex-row">
                        {{-- Search form (example) --}}
                        <div class="d-none d-md-flex">
                            <form action="./" method="get" autocomplete="off" novalidate="">
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <tabler:icon name="search" />
                                    </span>
                                    <input type="text" value="" class="form-control" placeholder="Search…"
                                        aria-label="Search in website">
                                </div>
                            </form>
                        </div>

                        {{-- Theme toggle --}}
                        <div class="nav-item d-none d-md-flex me-3">
                            <tabler:theme-toggle />
                        </div>

                        {{-- Notifications --}}
                        <div class="nav-item dropdown d-none d-md-flex me-3">
                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                aria-label="Show notifications">
                                <tabler:icon name="bell" />
                                <span class="badge bg-red"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Last updates</h3>
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item">
                                            <div class="text-truncate">
                                                <strong>Example notification</strong>
                                            </div>
                                            <div class="text-secondary">Just now</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- User profile dropdown --}}
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                                aria-label="Open user menu">
                                <span class="avatar avatar-sm"
                                    style="background-image: url(./static/avatars/000m.jpg)"></span>
                                <div class="d-none d-xl-block ps-2">
                                    <div>{{ auth()->user()->name ?? 'Guest User' }}</div>
                                    <div class="small text-secondary mt-1">
                                        {{ auth()->user()->email ?? 'guest@example.com' }}</div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <a href="#" class="dropdown-item">Status</a>
                                <a href="#" class="dropdown-item">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Settings</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Page Wrapper: Header + Body + Footer --}}
            <div class="page-wrapper">
                {{-- Page Header: Title and actions --}}
                <div class="page-header d-print-none">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                {{-- Page pre-title --}}
                                <div class="page-pretitle">
                                    Overview
                                </div>
                                <h2 class="page-title">
                                    Combo Layout
                                </h2>
                            </div>
                            {{-- Page title actions --}}
                            <div class="d-print-none col-auto ms-auto">
                                <div class="btn-list">
                                    <a href="#" class="btn btn-primary d-none d-sm-inline-block">
                                        <tabler:icon name="plus" />
                                        Create new report
                                    </a>
                                    <a href="#" class="btn btn-primary d-sm-none btn-icon"
                                        aria-label="Create new report">
                                        <tabler:icon name="plus" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Page Body: Main content --}}
                <main id="content" class="page-body">
                    <div class="container-xl">
                        {{ $slot ?? '' }}

                        @if (!isset($slot))
                            <div class="row row-deck row-cards">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Combo Layout</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>This is the official Tabler combo layout combining sidebar and top
                                                header.</p>
                                            <p>Key features:</p>
                                            <ul>
                                                <li>Dark-themed sidebar with main navigation</li>
                                                <li>Condensed top navbar with utilities (search, notifications, profile)
                                                </li>
                                                <li>Top navbar hidden on mobile (d-none d-lg-flex)</li>
                                                <li>Responsive design with mobile toggle in sidebar</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </main>

                {{-- Footer --}}
                <footer class="footer footer-transparent d-print-none">
                    <div class="container-xl">
                        <div class="row align-items-center flex-row-reverse text-center">
                            <div class="col-lg-auto ms-lg-auto">
                                <ul class="list-inline list-inline-dots mb-0">
                                    <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank"
                                            class="link-secondary">Documentation</a></li>
                                    <li class="list-inline-item"><a href="#" class="link-secondary">License</a>
                                    </li>
                                    <li class="list-inline-item"><a href="https://github.com/tabler/tabler"
                                            target="_blank" class="link-secondary">Source code</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-auto mt-lg-0 mt-3">
                                <ul class="list-inline list-inline-dots mb-0">
                                    <li class="list-inline-item">
                                        Copyright &copy; {{ date('Y') }}
                                        <a href="." class="link-secondary">{{ config('app.name') }}</a>.
                                        All rights reserved.
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="link-secondary" rel="noopener">
                                            v1.0.0
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        @tablerScripts
    </body>

</html>
