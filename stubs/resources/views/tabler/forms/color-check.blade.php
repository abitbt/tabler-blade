{{--
    Form Color Check Component

    A color selector input (radio or checkbox) for choosing colors visually.

    @prop string|null $name - Input name attribute
    @prop string|null $value - Input value
    @prop string $color - Color name (default: 'primary')
    @prop bool $checked - Whether input is checked
    @prop string $type - Input type: 'radio' or 'checkbox' (default: 'radio')

    Available CSS Classes (use via class="" attribute):

    Shape:
    - form-colorinput-rounded - Circular color selector
    - form-colorinput-lg      - Large color selector

    Usage Examples:

    Color radio group:
    <x-tabler::forms.color-check name="theme" value="primary" color="primary" checked />
    <x-tabler::forms.color-check name="theme" value="danger" color="danger" />
    <x-tabler::forms.color-check name="theme" value="success" color="success" />

    Rounded color selectors:
    <x-tabler::forms.color-check name="color" value="blue" color="blue" class="form-colorinput-rounded" />
    <x-tabler::forms.color-check name="color" value="red" color="red" class="form-colorinput-rounded" />

    Multiple selection (checkbox):
    <x-tabler::forms.color-check name="colors[]" value="primary" color="primary" type="checkbox" />
    <x-tabler::forms.color-check name="colors[]" value="secondary" color="secondary" type="checkbox" />

    Available colors:
    primary, secondary, success, info, warning, danger, light, dark,
    blue, azure, indigo, purple, pink, red, orange, yellow, lime, green, teal, cyan
--}}

@props([
    'name' => null,
    'value' => null,
    'color' => 'primary',
    'checked' => false,
    'type' => 'radio', // 'radio' or 'checkbox'
])

@php
    $colorClass = 'bg-' . $color;
@endphp

<label {{ $attributes->merge(['class' => 'form-colorinput']) }}>
    <input @if ($name) name="{{ $name }}" @endif type="{{ $type }}"
        @if ($value !== null) value="{{ $value }}" @endif class="form-colorinput-input"
        @if ($checked) checked @endif />
    <span class="form-colorinput-color {{ $colorClass }}"></span>
</label>
