{{--
    Navbar Utilities

    Right-side utilities section for navbars (theme toggle, notifications, user menu, etc.)

    @var bool $dark - Dark theme mode
    @var string $placement - Layout placement: 'condensed', 'default' (affects ordering)
    @var bool $showThemeToggle - Show theme toggle (default: true)
--}}

@php
    $dark = $dark ?? false;
    $placement = $placement ?? 'default';
    $showThemeToggle = $showThemeToggle ?? true;
@endphp

<div class="navbar-nav {{ $placement === 'condensed' ? 'order-md-last ms-auto' : 'order-md-last' }} flex-row">
    @stack('navbar-utilities-start')

    {{-- Notifications (customizable via stack) --}}
    @stack('navbar-notifications')

    {{-- Theme Toggle --}}
    @if ($showThemeToggle)
        @hasSection('navbar-theme-toggle')
            @yield('navbar-theme-toggle')
        @else
            @include('tabler::layouts.navbar.partials.theme-toggle')
        @endif
    @endif

    @stack('navbar-utilities-before-user')

    {{-- User Menu --}}
    @hasSection('navbar-user-menu')
        @yield('navbar-user-menu')
    @else
        @auth
            @include('tabler::layouts.navbar.partials.user-menu', ['dark' => $dark])
        @else
            @if (Route::has('login'))
                <div class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">
                        <span class="nav-link-title">Sign in</span>
                    </a>
                </div>
            @endif
        @endauth
    @endif

    @stack('navbar-utilities-end')
</div>
