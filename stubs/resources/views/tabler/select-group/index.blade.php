@props([
    'type' => 'radio',
    'name' => null,
    'pills' => false,
    'boxes' => false,
    'vertical' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('form-selectgroup')
        ->add($pills ? 'form-selectgroup-pills' : '')
        ->add($boxes ? 'form-selectgroup-boxes' : '')
        ->add($vertical ? 'form-selectgroup-vertical' : '');

    // Generate unique ID for this group to pass context to children
    $groupId = 'selectgroup-' . uniqid();
@endphp

<div
    {{ $attributes->class($classes) }}
    data-selectgroup-type="{{ $type }}"
    data-selectgroup-name="{{ $name }}"
    data-selectgroup-id="{{ $groupId }}"
>
    {{ $slot }}
</div>
