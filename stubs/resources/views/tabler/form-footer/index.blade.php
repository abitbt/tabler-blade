@props([
    'align' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('form-footer')
        ->add(match ($align) {
            'center' => 'text-center',
            'end' => 'text-end',
            default => '',
        });
@endphp

<div {{ $attributes->class($classes) }}>
    {{ $slot }}
</div>
