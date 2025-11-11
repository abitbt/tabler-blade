{{--
    Form Range Slider Component

    A range slider input for selecting numeric values within a range.

    @prop string|null $name - Range input name attribute
    @prop string|null $id - Range input ID (auto-generated from name if not provided)
    @prop int|float $value - Current value (default: 50)
    @prop int|float $min - Minimum value (default: 0)
    @prop int|float $max - Maximum value (default: 100)
    @prop int|float $step - Step increment (default: 1)
    @prop string|null $label - Label text
    @prop bool $wrapper - Wrap in mb-3 div (default: true)

    Available CSS Classes (use via class="" attribute):

    Styling:
    - form-range         - Default range slider style (auto-applied)

    Width Utilities:
    - w-auto, w-25, w-50, w-75, w-100 - Width percentages

    Usage Examples:

    Basic range slider:
    <x-tabler::forms.range name="volume" label="Volume" />

    Custom range:
    <x-tabler::forms.range
        name="price"
        label="Price"
        min="0"
        max="1000"
        step="10"
        value="500"
    />

    Percentage slider:
    <x-tabler::forms.range
        name="opacity"
        label="Opacity"
        min="0"
        max="100"
        step="5"
    />

    Small increments:
    <x-tabler::forms.range
        name="zoom"
        label="Zoom level"
        min="0.5"
        max="2.0"
        step="0.1"
        value="1.0"
    />
--}}

@props([
    'name' => null,
    'id' => null,
    'value' => 50,
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'label' => null,
    'wrapper' => true,
])

@php
    $rangeId = $id ?? ($name ? str_replace(['[', ']'], ['-', ''], $name) : 'range-' . uniqid());
@endphp

@if ($wrapper)
    <div class="mb-3">
@endif
@if ($label)
    <label for="{{ $rangeId }}" class="form-label">{{ $label }}</label>
@endif

<input type="range" id="{{ $rangeId }}" @if ($name) name="{{ $name }}" @endif
    value="{{ old($name, $value) }}" min="{{ $min }}" max="{{ $max }}" step="{{ $step }}"
    {{ $attributes->merge(['class' => 'form-range']) }} />
@if ($wrapper)
    </div>
@endif
