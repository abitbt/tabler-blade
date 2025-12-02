@props([
    'flat' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('input-group')
        ->add($flat ? 'input-group-flat' : '');
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>
