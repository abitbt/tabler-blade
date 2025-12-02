@props([
    'placeholder' => null,
    'multiple' => false,
    'size' => null,
    'invalid' => null,
    'disabled' => false,
    'required' => false,
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'id' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate unique ID if not provided
    $id = $id ?? 'select-' . uniqid();

    // Check validation state
    $invalid ??= $name && $errors->has($name);

    // Build classes
    $classes = Tabler::classes()
        ->add('form-select')
        ->add(
            match ($size) {
                'sm' => 'form-control-sm',
                'lg' => 'form-control-lg',
                default => '',
            },
        )
        ->add($invalid ? 'is-invalid' : '');
@endphp

<select {{ $attributes->class($classes) }} id="{{ $id }}" @if ($multiple) multiple @endif
    @if ($disabled) disabled @endif @if ($required) required @endif
    @if ($invalid) aria-invalid="true" @endif
    @if (is_numeric($size)) size="{{ $size }}" @endif>
    @if ($placeholder && !$multiple && !is_numeric($size))
        <option value="" disabled selected>{{ $placeholder }}</option>
    @endif

    {{ $slot }}
</select>
