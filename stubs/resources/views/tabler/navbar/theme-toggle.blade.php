@props([
    'darkHref' => '?theme=dark',
    'lightHref' => '?theme=light',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('nav-item');
@endphp

<div {{ $attributes->class($classes) }}>
    <a
        href="{{ $darkHref }}"
        class="nav-link px-0 hide-theme-dark"
        title="Enable dark mode"
        data-bs-toggle="tooltip"
        data-bs-placement="bottom"
    >
        <tabler:icon name="moon" />
    </a>

    <a
        href="{{ $lightHref }}"
        class="nav-link px-0 hide-theme-light"
        title="Enable light mode"
        data-bs-toggle="tooltip"
        data-bs-placement="bottom"
    >
        <tabler:icon name="sun" />
    </a>
</div>
