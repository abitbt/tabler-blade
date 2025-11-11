{{--
    Navbar Menu (Main Navigation)

    The primary navigation menu with links to main sections of your application.
    Customize this file to add your application's navigation items.

    @var string $class - Additional CSS classes
--}}

@php
    $class = $class ?? '';

    /*
     * Example navigation structure - customize with your application's navigation items
 *
 * Simple link:
 * [
 *     'title' => 'Home',
 *     'url' => route('home'),
 *     'icon' => 'home',
 *     'active' => request()->routeIs('home'),
 *     'badge' => 'New',
 * ]
 *
 * Dropdown menu:
 * [
 *     'title' => 'Components',
 *     'icon' => 'layout',
 *     'children' => [
 *         ['title' => 'Alerts', 'url' => route('components.alerts')],
 *         ['title' => 'Buttons', 'url' => route('components.buttons')],
 *         ['divider' => true],
 *         ['title' => 'Cards', 'url' => route('components.cards')],
 *     ]
 * ]
 *
 * Multi-column dropdown menu:
 * [
 *     'title' => 'Components',
 *     'icon' => 'layout',
 *     'columns' => 2,  // Split children into 2 columns
 *     'children' => [
 *         ['title' => 'Alerts', 'url' => route('components.alerts')],
 *         ['title' => 'Badges', 'url' => route('components.badges')],
 *         ['title' => 'Buttons', 'url' => route('components.buttons')],
 *         ['title' => 'Cards', 'url' => route('components.cards')],
     *     ]
     * ]
     */

    // Default empty navigation - replace with your items
    $navItems = $navItems ?? [];
@endphp

<ul class="navbar-nav{{ $class ? ' ' . $class : '' }}">
    @forelse($navItems as $index => $item)
        @if (isset($item['children']) && is_array($item['children']))
            {{-- Dropdown Menu Item --}}
            <li class="nav-item dropdown{{ $item['active'] ?? false ? ' active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#navbar-dropdown-{{ $index }}" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" role="button" aria-haspopup="true" aria-expanded="false">
                    @if (isset($item['icon']))
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <x-dynamic-component :component="'tabler-' . $item['icon']" class="icon" />
                        </span>
                    @endif
                    <span class="nav-link-title">{{ $item['title'] }}</span>
                    @if (isset($item['badge']))
                        <span class="badge badge-sm bg-red text-red-fg">{{ $item['badge'] }}</span>
                    @endif
                </a>
                <div class="dropdown-menu{{ isset($item['right']) && $item['right'] ? ' dropdown-menu-end' : '' }}">
                    @php
                        $hasColumns = isset($item['columns']) && $item['columns'] > 1;
                        $perColumn = $hasColumns ? ceil(count($item['children']) / $item['columns']) : 0;
                    @endphp

                    @if ($hasColumns)
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                    @endif

                    @foreach ($item['children'] as $childIndex => $child)
                        @php
                            // Start new column if needed (but not on first item)
                            $shouldStartNewColumn = $hasColumns && $childIndex > 0 && $childIndex % $perColumn === 0;
                        @endphp

                        @if ($shouldStartNewColumn)
                </div>
                <div class="dropdown-menu-column">
        @endif

        @if (isset($child['divider']) && $child['divider'])
            <div class="dropdown-divider"></div>
        @else
            <a class="dropdown-item{{ $child['active'] ?? false ? ' active' : '' }}"
                href="{{ $child['url'] }}"{{ $child['active'] ?? false ? ' aria-current="page"' : '' }}>
                @if (isset($child['icon']))
                    <x-dynamic-component :component="'tabler-' . $child['icon']" class="icon dropdown-item-icon" />
                @endif
                {{ $child['title'] }}
            </a>
        @endif
    @endforeach

    @if ($hasColumns)
        </div>
        </div>
    @endif
    </div>
    </li>
@else
    {{-- Regular Menu Item --}}
    <li class="nav-item{{ $item['active'] ?? false ? ' active' : '' }}">
        <a class="nav-link" href="{{ $item['url'] }}"{{ $item['active'] ?? false ? ' aria-current="page"' : '' }}>
            @if (isset($item['icon']))
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <x-dynamic-component :component="'tabler-' . $item['icon']" class="icon" />
                </span>
            @endif
            <span class="nav-link-title">{{ $item['title'] }}</span>
            @if (isset($item['badge']))
                <span class="badge badge-sm bg-red text-red-fg">{{ $item['badge'] }}</span>
            @endif
        </a>
    </li>
    @endif
@empty
    {{-- No navigation items defined --}}
    @endforelse
</ul>
