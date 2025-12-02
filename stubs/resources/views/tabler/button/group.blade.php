@blaze

@props([
    'vertical' => false, // Vertical button group
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()->add($vertical ? 'btn-group-vertical' : 'btn-group');

    $attributes = $attributes->class($classes);
@endphp

<div {{ $attributes }} role="group" data-tabler-button-group>
    {{ $slot }}
</div>
