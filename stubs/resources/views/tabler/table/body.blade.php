@blaze

@props([])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()->add('table-tbody');
@endphp

<tbody {{ $attributes->class($classes) }}>
    {{ $slot }}
</tbody>
