{{--
    Tabler Sidebar Component

    A collapsible sidebar navigation component with state persistence.

    @props
    - sticky (bool) - Make sidebar sticky when scrolling
    - collapsible (bool|string) - Enable collapse: true, false, or 'mobile' for mobile-only
    - dark (bool) - Enable dark theme (default: true)
    - position (string) - Sidebar position: 'left' or 'right' (default: 'left')
    - breakpoint (string) - Responsive breakpoint (default: '1024px')
    - persist (bool) - Save collapsed state to localStorage (default: true)
    - class (string) - Additional CSS classes

    Usage:
    <tabler:sidebar sticky collapsible dark>
        <tabler:sidebar.header>
            <tabler:sidebar.brand logo="/logo.png" name="My App" />
            <tabler:sidebar.collapse />
        </tabler:sidebar.header>

        <tabler:sidebar.nav>
            <tabler:sidebar.item icon="home" href="/" current>Dashboard</tabler:sidebar.item>
        </tabler:sidebar.nav>
    </tabler:sidebar>
--}}
@blaze

@props([
    'sticky' => false,
    'collapsible' => false,
    'dark' => true,
    'position' => 'left',
    'breakpoint' => config('tabler.sidebar.breakpoint', '1024px'),
    'persist' => config('tabler.sidebar.persist_state', true),
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Build sidebar classes
    $classes = Tabler::classes()
        ->add('navbar')
        ->add('navbar-vertical')
        ->add('navbar-expand-lg')
        ->add($sticky ? 'sticky-top' : '')
        ->add($position === 'right' ? 'navbar-end' : '');

    // Determine if collapsible on current viewport
    $isCollapsible = $collapsible === true || $collapsible === 'mobile';
    $collapsibleMobileOnly = $collapsible === 'mobile';
@endphp

<aside {{ $attributes->class($classes) }} @if ($dark) data-bs-theme="dark" @endif
    @if ($isCollapsible) x-data="tablerSidebar({{ $persist ? 'true' : 'false' }})"
        :class="{ 'navbar-collapsed': collapsed }"
        x-init="$watch('collapsed', value => $el.dispatchEvent(new CustomEvent('sidebar-toggle', { detail: { collapsed: value } })))" @endif
    data-sidebar-breakpoint="{{ $breakpoint }}" data-tabler-sidebar>
    <div class="container-fluid">
        {{-- Mobile toggle button --}}
        @if ($isCollapsible)
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle sidebar navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        @endif

        {{ $slot }}
    </div>
</aside>

{{-- Mobile backdrop --}}
@if ($isCollapsible)
    <div class="navbar-backdrop" x-show="!collapsed" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="toggle()" style="display: none;"></div>
@endif
