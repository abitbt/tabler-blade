@blaze

@props([
    'href' => '#',
    'icon' => null, // Leading icon name
    'active' => false, // Active state
    'disabled' => false, // Disabled state
    'badge' => null, // Badge text
    'badgeColor' => 'primary', // Badge color
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('dropdown-item')
        ->add($active ? 'active' : '')
        ->add($disabled ? 'disabled' : '');

    $attributes = $attributes->class($classes);

    // Prevent navigation if disabled
    if ($disabled) {
        $attributes = $attributes->merge([
            'tabindex' => '-1',
            'aria-disabled' => 'true',
        ]);
    }
@endphp

<a href="{{ $href }}" {{ $attributes }}>
    @if ($icon)
        <tabler:icon :name="$icon" class="dropdown-item-icon" />
    @endif

    {{ $slot }}

    @if ($badge)
        <span class="badge bg-{{ $badgeColor }} ms-auto">{{ $badge }}</span>
    @endif
</a>
