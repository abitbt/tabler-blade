@props([
    'count' => 0,
    'showBadge' => true,
    'label' => 'Show notifications',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('nav-item')
        ->add('dropdown')
        ->add('d-none')
        ->add('d-md-flex');

    $menuClasses = Tabler::classes()
        ->add('dropdown-menu')
        ->add('dropdown-menu-arrow')
        ->add('dropdown-menu-end')
        ->add('dropdown-menu-card');
@endphp

<div {{ $attributes->except('class')->class($classes) }}>
    <a
        href="#"
        class="nav-link px-0"
        data-bs-toggle="dropdown"
        tabindex="-1"
        aria-label="{{ $label }}"
        data-bs-auto-close="outside"
        aria-expanded="false"
    >
        <tabler:icon name="bell" />
        @if($showBadge && $count > 0)
            <span class="badge bg-red"></span>
        @endif
    </a>

    <div class="{{ $menuClasses }}">
        {{ $slot }}
    </div>
</div>
