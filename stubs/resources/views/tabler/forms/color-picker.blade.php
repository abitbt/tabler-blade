{{--
    Form Color Picker Component

    An HTML5 color picker input for selecting colors.

    @prop string|null $name - Color picker name attribute
    @prop string|null $id - Color picker ID (auto-generated from name if not provided)
    @prop string $value - Default color value in hex format (default: '#066fd1')
    @prop string|null $label - Label text
    @prop bool $wrapper - Wrap in mb-3 div (default: true)

    Available CSS Classes (use via class="" attribute):

    Sizing:
    - form-control-sm    - Small color picker
    - form-control-lg    - Large color picker

    Width Utilities:
    - w-auto, w-25, w-50, w-75, w-100 - Width percentages

    Usage Examples:

    Basic color picker:
    <x-tabler::forms.color-picker name="theme_color" label="Theme color" />

    Custom default color:
    <x-tabler::forms.color-picker
        name="background"
        label="Background color"
        value="#ffffff"
    />

    Without wrapper:
    <x-tabler::forms.color-picker name="accent" :wrapper="false" />

    Small color picker:
    <x-tabler::forms.color-picker
        name="highlight"
        label="Highlight"
        class="form-control-sm"
    />
--}}

@props([
    'name' => null,
    'id' => null,
    'value' => '#066fd1',
    'label' => null,
    'wrapper' => true,
])

@php
    $pickerId = $id ?? ($name ? str_replace(['[', ']'], ['-', ''], $name) : 'color-picker-' . uniqid());
@endphp

@if ($wrapper)
    <div class="mb-3">
@endif
@if ($label)
    <label for="{{ $pickerId }}" class="form-label">{{ $label }}</label>
@endif

<input type="color" id="{{ $pickerId }}" @if ($name) name="{{ $name }}" @endif
    value="{{ old($name, $value) }}" {{ $attributes->merge(['class' => 'form-control form-control-color']) }} />
@if ($wrapper)
    </div>
@endif
