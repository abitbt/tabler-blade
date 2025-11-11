{{--
    Form Select Group Item Component

    Individual item for use within <x-tabler::forms.selectgroup>.

    @prop string|null $name - Input name attribute
    @prop string|null $value - Input value
    @prop bool $checked - Whether item is selected
    @prop string $type - Input type: 'radio' or 'checkbox' (default: 'radio')
    @prop string|null $text - Button text (alternative to slot)
    @prop string|null $icon - Tabler icon name (without 'tabler-' prefix)

    @slot default - Button content (alternative to text prop)

    Usage Examples:

    Basic item:
    <x-tabler::forms.selectgroup-item name="plan" value="free" text="Free Plan" checked />

    With icon:
    <x-tabler::forms.selectgroup-item
        name="view"
        value="grid"
        text="Grid"
        icon="layout-grid"
    />

    With slot:
    <x-tabler::forms.selectgroup-item name="option" value="custom">
        Custom <strong>Option</strong>
    </x-tabler::forms.selectgroup-item>

    Checkbox type:
    <x-tabler::forms.selectgroup-item
        name="features[]"
        value="wifi"
        text="WiFi"
        type="checkbox"
    />
--}}

@props([
    'name' => null,
    'value' => null,
    'checked' => false,
    'type' => 'radio', // 'radio' or 'checkbox'
    'text' => null,
    'icon' => null,
])

@php
    $iconComponent = $icon ? 'tabler-' . $icon : null;
@endphp

<label {{ $attributes->merge(['class' => 'form-selectgroup-item']) }}>
    <input type="{{ $type }}" @if ($name) name="{{ $name }}" @endif
        @if ($value !== null) value="{{ $value }}" @endif class="form-selectgroup-input"
        @if ($checked) checked @endif />
    <span class="form-selectgroup-label">
        @if ($iconComponent)
            <x-dynamic-component :component="$iconComponent" class="me-1" />
        @endif
        @if ($text)
            {{ $text }}
        @else
            {{ $slot }}
        @endif
    </span>
</label>
