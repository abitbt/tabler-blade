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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon dropdown-item-icon">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
                Profile
            </a>
        @endif

        {{-- Settings Link --}}
        @if (Route::has('settings'))
            <a class="dropdown-item" href="{{ route('settings') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon dropdown-item-icon">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                </svg>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon dropdown-item-icon">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                    <path d="M9 12h12l-3 -3" />
                    <path d="M18 15l3 -3" />
                </svg>
                Sign out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endif
    </div>
</div>
