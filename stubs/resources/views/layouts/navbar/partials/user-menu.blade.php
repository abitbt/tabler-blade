{{--
    Navbar User Menu

    User dropdown menu with avatar and profile links.
    Displayed when user is authenticated.

    @var bool $dark - Dark theme mode (affects dropdown theme)
    @var bool $hideUsername - Hide username and job title
--}}

@php
    $dark = $dark ?? false;
    $hideUsername = $hideUsername ?? false;
    $user = auth()->user();
@endphp

<div class="nav-item dropdown">
    <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown" aria-label="Open user menu">
        <!-- User Avatar -->
        <span class="avatar avatar-sm"
            style="background-image: url({{ $user->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'User') }})"></span>

        @unless ($hideUsername)
            <div class="d-none d-xl-block ps-2">
                <div>{{ $user->name ?? 'User' }}</div>
                @if (isset($user->job_title) || isset($user->email))
                    <div class="small text-secondary mt-1">{{ $user->job_title ?? $user->email }}</div>
                @endif
            </div>
        @endunless
    </a>

    <div
        class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"@if ($dark) data-bs-theme="light" @endif>
        {{-- Profile Link --}}
        @if (Route::has('profile.show'))
            <a class="dropdown-item" href="{{ route('profile.show') }}">
                <x-tabler-user class="icon dropdown-item-icon" />
                Profile
            </a>
        @endif

        {{-- Settings Link --}}
        @if (Route::has('settings'))
            <a class="dropdown-item" href="{{ route('settings') }}">
                <x-tabler-settings class="icon dropdown-item-icon" />
                Settings
            </a>
        @endif

        @stack('user-menu-items')

        @if (Route::has('profile.show') || Route::has('settings') || Route::has('logout'))
            <div class="dropdown-divider"></div>
        @endif

        {{-- Logout Link --}}
        @if (Route::has('logout'))
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <x-tabler-logout class="icon dropdown-item-icon" />
                Sign out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endif
    </div>
</div>
