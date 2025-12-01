@blaze

@props([
    'color' => 'gray',
    'animated' => true,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('status-indicator')
        ->add($animated ? 'status-indicator-animated' : '')
        ->add("status-{$color}");
@endphp

<span {{ $attributes->class($classes) }}>
    <span class="status-indicator-circle"></span>
    <span class="status-indicator-circle"></span>
    <span class="status-indicator-circle"></span>
</span>
