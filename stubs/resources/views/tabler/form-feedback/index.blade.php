@props([
    'type' => 'invalid',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add(match ($type) {
            'valid' => 'valid-feedback',
            'invalid' => 'invalid-feedback',
            default => 'invalid-feedback',
        });
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>
