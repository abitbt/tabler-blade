@blaze

@props([
    // Core attributes
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'id' => null,
    'value' => null,

    // UI elements
    'placeholder' => null,

    // Options
    'options' => [],

    // State
    'required' => false,
    'disabled' => false,

    // Select specific
    'multiple' => false,
    'size' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate ID from name if not provided
    $id = $id ?? ($name ? $name : uniqid('select-'));

    // Build select classes
    $selectClasses = Tabler::classes()->add('form-select')->add($attributes->pluck('class:select'));
@endphp

<select id="{{ $id }}" @if ($name) name="{{ $name }}" @endif
    @if ($required) required aria-required="true" @endif
    @if ($disabled) disabled @endif @if ($multiple) multiple @endif
    @if ($size) size="{{ $size }}" @endif
    {{ $attributes->except(['class', 'class:select', 'options'])->class($selectClasses) }} data-tabler-select>
    @if ($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif

    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" @if ($value == $optionValue) selected @endif>
                {{ $optionLabel }}
            </option>
        @endforeach
    @endif
</select>
