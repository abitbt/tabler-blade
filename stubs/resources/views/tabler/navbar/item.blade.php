@php
    $iconLeading ??= $attributes->pluck('icon:leading');
    $iconTrailing ??= $attributes->pluck('icon:trailing');
@endphp

@props([
    'href' => '#',
    'active' => false,
    'disabled' => false,
    'dropdown' => false,
    'dropdownTarget' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $itemClasses = Tabler::classes()
        ->add('nav-item')
        ->add($active ? 'active' : '')
        ->add($dropdown ? 'dropdown' : '');

    $linkClasses = Tabler::classes()
        ->add('nav-link')
        ->add($dropdown ? 'dropdown-toggle' : '')
        ->add($disabled ? 'disabled' : '');
@endphp

<li {{ $attributes->only('id')->class($itemClasses) }}>
    <a
        href="{{ $href }}"
        {{ $attributes->except(['id', 'icon:leading', 'icon:trailing'])->class($linkClasses) }}
        @if($dropdown && $dropdownTarget)
            data-bs-toggle="dropdown"
            data-bs-auto-close="outside"
            role="button"
            aria-haspopup="true"
            aria-expanded="false"
        @endif
        @if($active) aria-current="page" @endif
    >
        @if($iconLeading && $iconLeading->isNotEmpty())
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                {{ $iconLeading }}
            </span>
        @endif

        <span class="nav-link-title">
            {{ $slot }}
        </span>

        @if($iconTrailing && $iconTrailing->isNotEmpty())
            {{ $iconTrailing }}
        @endif
    </a>
</li>
