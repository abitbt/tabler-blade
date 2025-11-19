@blaze

@props([
    // Core attributes
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'id' => null,
    'value' => null,

    // UI elements
    'placeholder' => null,

    // State
    'required' => false,
    'disabled' => false,
    'readonly' => false,

    // Textarea specific
    'rows' => 3,
    'cols' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate ID from name if not provided
    $id = $id ?? ($name ? $name : uniqid('textarea-'));

    // Build textarea classes
    $textareaClasses = Tabler::classes()->add('form-control')->add($attributes->pluck('class:textarea'));
@endphp

<textarea id="{{ $id }}" @if ($name) name="{{ $name }}" @endif
    @if ($placeholder) placeholder="{{ $placeholder }}" @endif
    @if ($rows) rows="{{ $rows }}" @endif
    @if ($cols) cols="{{ $cols }}" @endif
    @if ($required) required aria-required="true" @endif
    @if ($disabled) disabled @endif @if ($readonly) readonly @endif
    {{ $attributes->except(['class', 'class:textarea'])->class($textareaClasses) }} data-tabler-textarea>{{ $value ?? $slot }}</textarea>
