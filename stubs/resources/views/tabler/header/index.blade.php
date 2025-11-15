{{--
    Tabler Header Component

    Horizontal navigation bar / top header.

    @props
    - container (bool|string) - Constrain to container width: true, false, or container class name
    - dark (bool) - Enable dark theme
    - sticky (bool) - Make header sticky on scroll
    - transparent (bool) - Transparent background
    - class (string) - Additional CSS classes

    Usage:
    <tabler:header container dark sticky>
        <tabler:header.brand logo="/logo.png" name="My App" />

        <tabler:header.nav>
            <tabler:header.item href="/" current>Home</tabler:header.item>
            <tabler:header.item href="/about">About</tabler:header.item>
        </tabler:header.nav>

        <tabler:spacer />

        <tabler:header.utilities>
            <tabler:theme-toggle />
            <tabler:profile avatar="/user.png" />
        </tabler:header.utilities>
    </tabler:header>
--}}
@blaze

@props([
    'container' => false,
    'dark' => false,
    'sticky' => false,
    'transparent' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('navbar')
        ->add('navbar-expand-md')
        ->add('d-print-none')
        ->add($sticky ? 'sticky-top' : '')
        ->add($transparent ? 'navbar-transparent' : '');

    // Determine container class
    $containerClass = match ($container) {
        true => 'container-xl',
        false => null,
        default => is_string($container) ? $container : 'container-xl',
    };
@endphp

<header {{ $attributes->class($classes) }} @if ($dark) data-bs-theme="dark" @endif>
    @if ($containerClass)
        <div class="{{ $containerClass }}">
            {{ $slot }}
        </div>
    @else
        {{ $slot }}
    @endif
</header>
