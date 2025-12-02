@blaze

@props([])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()->add('accordion-content-wrapper');
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>
