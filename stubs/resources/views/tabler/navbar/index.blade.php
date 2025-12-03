@props([
    // Layout
    'breakpoint' => 'md',
    'condensed' => false,
    'sticky' => false,
    'overlap' => false,
    'vertical' => false,
    'verticalRight' => false,

    // Appearance
    'dark' => false,
    'transparent' => false,
    'background' => null,

    // Container
    'containerFluid' => false,

    // Features
    'collapsible' => true,
    'collapseId' => 'navbar-menu',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('navbar')
        ->add("navbar-expand-{$breakpoint}")
        ->add('d-print-none')
        ->add($vertical ? 'navbar-vertical' : '')
        ->add($verticalRight ? 'navbar-right' : '')
        ->add($transparent ? 'navbar-transparent' : '')
        ->add($background ? "bg-{$background}" : '')
        ->add($overlap ? 'navbar-overlap' : '');

    $containerClass = $containerFluid ? 'container-fluid' : 'container-xl';

    $wrapperClasses = $sticky ? 'sticky-top' : '';
@endphp

@if($sticky)
<div class="{{ $wrapperClasses }}">
@endif

<header {{ $attributes->class($classes)->merge([
    'data-bs-theme' => $dark ? 'dark' : null,
]) }}>
    <div class="{{ $containerClass }}">
        {{ $slot }}
    </div>
</header>

@if($sticky)
</div>
@endif
