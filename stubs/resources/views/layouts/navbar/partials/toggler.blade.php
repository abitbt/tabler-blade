{{--
    Navbar Toggler (Mobile Menu Button)

    The hamburger menu button that appears on mobile devices to toggle the navbar menu.

    @var string $target - ID of the element to toggle (default: 'navbar-menu')
    @var string $ariaLabel - Accessible label for screen readers
--}}

@php
    $target = $target ?? 'navbar-menu';
    $ariaLabel = $ariaLabel ?? 'Toggle primary navigation';
@endphp

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $target }}"
    aria-controls="{{ $target }}" aria-expanded="false" aria-label="{{ $ariaLabel }}">
    <span class="navbar-toggler-icon"></span>
</button>
