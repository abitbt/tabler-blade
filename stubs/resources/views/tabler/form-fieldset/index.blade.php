@props([
    'legend' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('form-fieldset');
@endphp

<fieldset {{ $attributes->class($classes) }}>
    @if($legend)
        <legend>{{ $legend }}</legend>
    @endif

    {{ $slot }}
</fieldset>
