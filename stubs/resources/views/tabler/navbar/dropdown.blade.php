@props([
    'title' => null,
    'icon' => null,
    'end' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $menuClasses = Tabler::classes()
        ->add('dropdown-menu')
        ->add($end ? 'dropdown-menu-end' : '');
@endphp

<li class="nav-item dropdown">
    <a
        class="nav-link dropdown-toggle"
        href="#"
        data-bs-toggle="dropdown"
        data-bs-auto-close="outside"
        role="button"
        aria-haspopup="true"
        aria-expanded="false"
    >
        @if($icon)
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <tabler:icon :name="$icon" />
            </span>
        @endif
        <span class="nav-link-title">{{ $title }}</span>
    </a>

    <div {{ $attributes->class($menuClasses) }}>
        {{ $slot }}
    </div>
</li>
