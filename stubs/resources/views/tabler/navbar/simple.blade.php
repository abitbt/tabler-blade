@props([
    // Brand
    'brand' => null,
    'brandUrl' => '/',
    'brandTitle' => null,
    'brandSmall' => false,

    // Layout
    'breakpoint' => 'md',
    'dark' => false,
    'transparent' => false,
    'background' => null,
    'sticky' => false,
    'vertical' => false,

    // Menu
    'menu' => [],

    // User
    'user' => null,
    'userMenu' => [],

    // Features
    'showSearch' => false,
    'searchAction' => '/',
    'showThemeToggle' => false,
    'showNotifications' => false,
    'notificationCount' => 0,
])

@php
    use Abitbt\TablerBlade\Tabler;
@endphp

<tabler:navbar
    :breakpoint="$breakpoint"
    :dark="$dark"
    :transparent="$transparent"
    :background="$background"
    :sticky="$sticky"
    :vertical="$vertical"
>
    <tabler:navbar.toggler />

    <tabler:navbar.brand :href="$brandUrl" :title="$brandTitle" :small="$brandSmall">
        @if($brand)
            {{ $brand }}
        @endif
    </tabler:navbar.brand>

    <tabler:navbar.side>
        @if($showThemeToggle)
            <tabler:navbar.theme-toggle />
        @endif

        @if($showNotifications)
            <tabler:navbar.notifications :count="$notificationCount">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Notifications</h3>
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="text-secondary">No new notifications</div>
                        </div>
                    </div>
                </div>
            </tabler:navbar.notifications>
        @endif

        @if($user)
            <tabler:navbar.user
                :name="$user['name'] ?? null"
                :subtitle="$user['subtitle'] ?? null"
            >
                @foreach($userMenu as $item)
                    @if(isset($item['divider']) && $item['divider'])
                        <tabler:navbar.dropdown-item divider />
                    @else
                        <tabler:navbar.dropdown-item
                            :href="$item['url'] ?? '#'"
                            :icon="$item['icon'] ?? null"
                        >
                            {{ $item['title'] }}
                        </tabler:navbar.dropdown-item>
                    @endif
                @endforeach
            </tabler:navbar.user>
        @endif
    </tabler:navbar.side>

    @if(count($menu) > 0)
        <tabler:navbar.nav>
            @if($showSearch)
                <tabler:navbar.search :action="$searchAction" class="ms-md-auto me-md-3" />
            @endif

            <tabler:navbar.menu>
                <tabler:navbar.menu-items :items="$menu" />
            </tabler:navbar.menu>
        </tabler:navbar.nav>
    @else
        {{ $slot }}
    @endif
</tabler:navbar>
