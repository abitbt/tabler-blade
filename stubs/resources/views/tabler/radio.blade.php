@blaze

@props([
    // Core attributes
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'id' => null,
    'value' => null,
    'checked' => false,

    // State
    'required' => false,
    'disabled' => false,

    // Styling
    'inline' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate ID from name and value if not provided
    $id = $id ?? ($name && $value ? "{$name}-{$value}" : uniqid('radio-'));

    // Build wrapper classes
    $wrapperClasses = Tabler::classes()
        ->add('form-check')
        ->add($inline ? 'form-check-inline' : '');

    // Build input classes
    $inputClasses = Tabler::classes()->add('form-check-input')->add($attributes->pluck('class:input'));
@endphp

<label class="{{ $wrapperClasses }}" data-tabler-radio>
    <input type="radio" id="{{ $id }}" @if ($name) name="{{ $name }}" @endif
        @if ($value !== null) value="{{ $value }}" @endif
        @if ($checked) checked @endif
        @if ($required) required aria-required="true" @endif
        @if ($disabled) disabled @endif
        {{ $attributes->except(['class', 'class:input', 'inline'])->class($inputClasses) }}>

    @if ($slot->isNotEmpty())
        <span class="form-check-label">
            {{ $slot }}
        </span>
    @endif
</label>
