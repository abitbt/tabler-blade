@blaze

@props([
    'id' => null,
    'variant' => null, // 'flush'|'tabs'
    'inverted' => false,
    'exclusive' => true, // Only one item open at a time
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate unique ID if not provided
    $accordionId = $id ?? 'accordion-' . uniqid();

    // Build variant classes
    $variantClasses = collect(is_string($variant) ? explode(',', $variant) : (array) $variant)
        ->map(fn($v) => trim($v))
        ->filter()
        ->map(fn($v) => "accordion-{$v}")
        ->implode(' ');

    // Build classes
    $classes = Tabler::classes()
        ->add('accordion')
        ->add($variantClasses)
        ->add($inverted ? 'accordion-inverted' : '');
@endphp

<div {{ $attributes->class($classes) }} id="{{ $accordionId }}" data-accordion-id="{{ $accordionId }}"
    data-accordion-exclusive="{{ $exclusive ? 'true' : 'false' }}">
    {{ $slot }}
</div>
