@props([
    'name' => null,
    'subtitle' => null,
    'avatar' => null,
    'hideInfo' => false,
    'menuEnd' => true,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $menuClasses = Tabler::classes()
        ->add('dropdown-menu')
        ->add($menuEnd ? 'dropdown-menu-end' : '')
        ->add('dropdown-menu-arrow');
@endphp

<div class="nav-item dropdown">
    <a
        href="#"
        class="nav-link d-flex lh-1 p-0 px-2"
        data-bs-toggle="dropdown"
        aria-label="Open user menu"
    >
        @if($avatar)
            {{ $avatar }}
        @else
            <span class="avatar avatar-sm" style="background-image: url(https://ui-avatars.com/api/?name={{ urlencode($name ?? 'User') }}&background=random)"></span>
        @endif

        @unless($hideInfo || (!$name && !$subtitle))
            <div class="d-none d-xl-block ps-2">
                @if($name)
                    <div>{{ $name }}</div>
                @endif
                @if($subtitle)
                    <div class="mt-1 small text-secondary">{{ $subtitle }}</div>
                @endif
            </div>
        @endunless
    </a>

    <div {{ $attributes->class($menuClasses) }}>
        {{ $slot }}
    </div>
</div>
