@blaze

@props([
    // Core attributes
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'id' => null,
    'value' => '1',
    'checked' => false,

    // State
    'required' => false,
    'disabled' => false,

    // Styling
    'inline' => false,
    'variant' => null, // 'single' for standalone checkboxes
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate ID from name if not provided
    $id = $id ?? ($name ? $name : uniqid('checkbox-'));

    // Build wrapper classes
    $wrapperClasses = Tabler::classes()
        ->add('form-check')
        ->add($inline ? 'form-check-inline' : '')
        ->add($variant === 'single' ? 'form-check-single' : '');

    // Build input classes
    $inputClasses = Tabler::classes()->add('form-check-input')->add($attributes->pluck('class:input'));
@endphp

<label class="{{ $wrapperClasses }}" data-tabler-checkbox>
    <input type="checkbox" id="{{ $id }}" @if ($name) name="{{ $name }}" @endif
        value="{{ $value }}" @if ($checked) checked @endif
        @if ($required) required aria-required="true" @endif
        @if ($disabled) disabled @endif
        {{ $attributes->except(['class', 'class:input', 'inline'])->class($inputClasses) }}>

    @if ($slot->isNotEmpty())
        <span class="form-check-label">
            {{ $slot }}
        </span>
    @endif
</label>
