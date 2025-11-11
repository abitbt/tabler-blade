{{--
    Vertical Sidebar Component

    A vertical navigation sidebar that stays fixed on the left or right side of the page.
    Matches Tabler's sidebar design with support for multi-column and nested dropdowns.

    Configuration Variables:
    @var bool $dark - Enable dark theme (default: true, recommended for sidebars)
    @var string $position - Sidebar position: 'left', 'right' (default: 'left')
    @var bool $transparent - Transparent background (default: false)
    @var string $background - Background color name (e.g., 'primary', 'dark')
    @var string $breakpoint - Collapse breakpoint: sm, md, lg, xl (default: 'lg')
    @var bool $hideBrand - Hide logo/brand (default: false)
    @var string $customClass - Additional CSS classes

    Navigation Item Structure:
    $navItems = [
        // Simple link
        ['title' => 'Home', 'url' => url('/'), 'icon' => 'home', 'active' => true],

        // Dropdown with children
        [
            'title' => 'Interface',
            'icon' => 'package',
            'children' => [
                ['title' => 'Alerts', 'url' => url('/alerts')],
                ['title' => 'Buttons', 'url' => url('/buttons'), 'badge' => 'New'],
                ['divider' => true],
                // Third-level nested menu
                [
                    'title' => 'Authentication',
                    'children' => [
                        ['title' => 'Sign in', 'url' => url('/sign-in')],
                        ['title' => 'Sign up', 'url' => url('/sign-up')],
                    ]
                ],
            ],
            'columns' => 2, // Multi-column dropdown (optional)
        ],
    ];

    Usage Examples:

    Basic dark sidebar (left):
    @include('tabler::layouts.partials.sidebar')

    Light sidebar:
    @include('tabler::layouts.partials.sidebar', ['dark' => false])

    Right-side sidebar:
    @include('tabler::layouts.partials.sidebar', ['position' => 'right'])
--}}

@php
    $dark = $dark ?? true; // Dark by default for sidebars
    $position = $position ?? 'left';
    $transparent = $transparent ?? false;
    $background = $background ?? null;
    $breakpoint = $breakpoint ?? 'lg';
    $hideBrand = $hideBrand ?? false;
    $customClass = $customClass ?? '';

    // Build sidebar classes
    $sidebarClasses = ['navbar', 'navbar-vertical', "navbar-expand-{$breakpoint}"];

    if ($position === 'right') {
        $sidebarClasses[] = 'navbar-end';
    }

    if ($transparent) {
        $sidebarClasses[] = 'navbar-transparent';
    } elseif ($background) {
        $sidebarClasses[] = "bg-{$background}";
    }

    if ($customClass) {
        $sidebarClasses[] = $customClass;
    }

    // Get navigation items - prefer $sidebarItems, fallback to $navItems
    $menuItems = $sidebarItems ?? ($navItems ?? []);
@endphp

<aside class="{{ implode(' ', $sidebarClasses) }}"@if ($dark) data-bs-theme="dark" @endif>
    <div class="container-fluid">
        <!-- BEGIN NAVBAR TOGGLER (Mobile) -->
        @include('tabler::layouts.navbar.partials.toggler', ['target' => 'sidebar-menu'])
        <!-- END NAVBAR TOGGLER -->

        @unless ($hideBrand)
            <!-- BEGIN NAVBAR LOGO -->
            @include('tabler::layouts.navbar.partials.logo', ['breakpoint' => $breakpoint])
            <!-- END NAVBAR LOGO -->
        @endunless

        <!-- BEGIN MOBILE USER MENU (Visible on mobile only) -->
        <div class="navbar-nav d-{{ $breakpoint }}-none flex-row">
            @stack('sidebar-mobile-utilities-start')

            @auth
                @include('tabler::layouts.navbar.partials.user-menu', ['dark' => $dark])
            @endauth

            @stack('sidebar-mobile-utilities-end')
        </div>
        <!-- END MOBILE USER MENU -->

        <!-- BEGIN SIDEBAR MENU -->
        <div class="navbar-collapse collapse" id="sidebar-menu">
            @if (!empty($menuItems))
                <ul class="navbar-nav pt-{{ $breakpoint }}-3">
                    @foreach ($menuItems as $index => $item)
                        @if (isset($item['children']) && is_array($item['children']))
                            {{-- Dropdown Menu Item --}}
                            <li class="nav-item dropdown{{ $item['active'] ?? false ? ' active' : '' }}">
                                <a class="nav-link dropdown-toggle" href="#navbar-{{ $index }}"
                                    data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                                    aria-haspopup="true"
                                    aria-expanded="{{ $item['active'] ?? false ? 'true' : 'false' }}">
                                    @if (isset($item['icon']))
                                        <span class="nav-link-icon d-md-none d-{{ $breakpoint }}-inline-block">
                                            <x-dynamic-component :component="'tabler-' . $item['icon']" class="icon" />
                                        </span>
                                    @endif
                                    <span class="nav-link-title">{{ $item['title'] }}</span>
                                    @if (isset($item['badge']))
                                        <span
                                            class="badge badge-sm bg-red text-red-fg ms-auto">{{ $item['badge'] }}</span>
                                    @endif
                                </a>
                                <div class="dropdown-menu{{ $item['active'] ?? false ? ' show' : '' }}">
                                    @if (isset($item['columns']) && $item['columns'] > 1)
                                        {{-- Multi-column dropdown --}}
                                        <div class="dropdown-menu-columns">
                                            @php
                                                $perColumn = ceil(count($item['children']) / $item['columns']);
                                                $columnIndex = 0;
                                            @endphp
                                            <div class="dropdown-menu-column">
                                                @foreach ($item['children'] as $childIndex => $child)
                                                    @if ($childIndex > 0 && $childIndex % $perColumn == 0)
                                            </div>
                                            <div class="dropdown-menu-column">
                                    @endif

                                    @if (isset($child['divider']) && $child['divider'])
                                        <div class="dropdown-divider"></div>
                                    @elseif(isset($child['children']) && is_array($child['children']))
                                        {{-- Third-level nested menu (dropend) --}}
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle"
                                                href="#sidebar-{{ $index }}-{{ $childIndex }}"
                                                data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                                                aria-haspopup="true" aria-expanded="false">
                                                @if (isset($child['icon']))
                                                    <x-dynamic-component :component="'tabler-' . $child['icon']"
                                                        class="icon dropdown-item-icon" />
                                                @endif
                                                {{ $child['title'] }}
                                            </a>
                                            <div class="dropdown-menu">
                                                @foreach ($child['children'] as $grandchild)
                                                    <a href="{{ $grandchild['url'] }}"
                                                        class="dropdown-item{{ $grandchild['active'] ?? false ? ' active' : '' }}">
                                                        {{ $grandchild['title'] }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        {{-- Regular dropdown item --}}
                                        <a class="dropdown-item{{ $child['active'] ?? false ? ' active' : '' }}"
                                            href="{{ $child['url'] }}"{{ $child['active'] ?? false ? ' aria-current="page"' : '' }}>
                                            @if (isset($child['icon']))
                                                <x-dynamic-component :component="'tabler-' . $child['icon']"
                                                    class="icon dropdown-item-icon" />
                                            @endif
                                            {{ $child['title'] }}
                                            @if (isset($child['badge']))
                                                <span
                                                    class="badge badge-sm bg-green-lt text-uppercase ms-auto">{{ $child['badge'] }}</span>
                                            @endif
                                        </a>
                                    @endif
                        @endforeach
        </div>
    </div>
@else
    {{-- Single column dropdown --}}
    @foreach ($item['children'] as $childIndex => $child)
        @if (isset($child['divider']) && $child['divider'])
            <div class="dropdown-divider"></div>
        @elseif(isset($child['children']) && is_array($child['children']))
            {{-- Third-level nested menu (dropend) --}}
            <div class="dropend">
                <a class="dropdown-item dropdown-toggle" href="#sidebar-{{ $index }}-{{ $childIndex }}"
                    data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    @if (isset($child['icon']))
                        <x-dynamic-component :component="'tabler-' . $child['icon']" class="icon dropdown-item-icon" />
                    @endif
                    {{ $child['title'] }}
                </a>
                <div class="dropdown-menu">
                    @foreach ($child['children'] as $grandchild)
                        <a href="{{ $grandchild['url'] }}"
                            class="dropdown-item{{ $grandchild['active'] ?? false ? ' active' : '' }}">
                            {{ $grandchild['title'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        @else
            {{-- Regular dropdown item --}}
            <a class="dropdown-item{{ $child['active'] ?? false ? ' active' : '' }}"
                href="{{ $child['url'] }}"{{ $child['active'] ?? false ? ' aria-current="page"' : '' }}>
                @if (isset($child['icon']))
                    <x-dynamic-component :component="'tabler-' . $child['icon']" class="icon dropdown-item-icon" />
                @endif
                {{ $child['title'] }}
                @if (isset($child['badge']))
                    <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">{{ $child['badge'] }}</span>
                @endif
            </a>
        @endif
    @endforeach
    @endif
    </div>
    </li>
@else
    {{-- Regular Menu Item --}}
    <li class="nav-item{{ $item['active'] ?? false ? ' active' : '' }}">
        <a class="nav-link" href="{{ $item['url'] }}"{{ $item['active'] ?? false ? ' aria-current="page"' : '' }}>
            @if (isset($item['icon']))
                <span class="nav-link-icon d-md-none d-{{ $breakpoint }}-inline-block">
                    <x-dynamic-component :component="'tabler-' . $item['icon']" class="icon" />
                </span>
            @endif
            <span class="nav-link-title">{{ $item['title'] }}</span>
            @if (isset($item['badge']))
                <span class="badge badge-sm bg-red text-red-fg ms-auto">{{ $item['badge'] }}</span>
            @endif
        </a>
    </li>
    @endif
    @endforeach
    </ul>
@else
    {{-- Allow custom menu via yield --}}
    @hasSection('sidebar-menu')
        <ul class="navbar-nav pt-{{ $breakpoint }}-3">
            @yield('sidebar-menu')
        </ul>
    @else
        {{-- Default empty menu with helpful comment --}}
        <ul class="navbar-nav pt-{{ $breakpoint }}-3">
            {{--
                            Define navigation items by passing $sidebarItems or $navItems array,
                            or use @section('sidebar-menu') to define custom menu items.

                            Example in your view:
                            @php
                                $navItems = [
                                    ['title' => 'Dashboard', 'url' => url('/dashboard'), 'icon' => 'home', 'active' => true],
                                    ['title' => 'Users', 'url' => url('/users'), 'icon' => 'users'],
                                ];
                            @endphp
                        --}}
        </ul>
    @endif
    @endif
    </div>
    <!-- END SIDEBAR MENU -->
    </div>
</aside>
