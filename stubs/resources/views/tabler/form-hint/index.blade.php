@props([
    'id' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('form-hint');
@endphp

<div {{ $attributes->merge(['id' => $id])->class($classes) }}>
    {{ $slot }}
</div>
