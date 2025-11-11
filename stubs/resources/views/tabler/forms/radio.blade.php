{{--
    Form Radio Component

    A radio button input with label and help text support.

    @prop string|null $name - Radio name attribute (groups radios with same name)
    @prop string|null $id - Radio ID (auto-generated from name+value if not provided)
    @prop string|null $value - Radio value
    @prop bool $checked - Whether radio is checked
    @prop string|null $label - Label text (alternative to slot)
    @prop string|null $help - Help text displayed below radio
    @prop bool $disabled - Disable radio
    @prop bool $wrapper - Wrap in mb-3 div (default: true)

    @slot default - Label content (alternative to label prop)

    Available CSS Classes (use via class="" attribute):

    Layout:
    - form-check-inline  - Display inline instead of block
    - form-check-reverse - Align radio to the right

    States:
    - is-valid           - Show valid state (green radio)
    - is-invalid         - Show invalid state (red radio)

    Sizing:
    - form-check-lg      - Large radio

    Usage Examples:

    Radio group:
    <x-tabler::forms.radio name="plan" value="free" label="Free Plan" checked />
    <x-tabler::forms.radio name="plan" value="pro" label="Pro Plan" />
    <x-tabler::forms.radio name="plan" value="enterprise" label="Enterprise Plan" />

    Inline radios:
    <x-tabler::forms.radio name="size" value="sm" label="Small" class="form-check-inline" :wrapper="false" />
    <x-tabler::forms.radio name="size" value="md" label="Medium" class="form-check-inline" :wrapper="false" />
    <x-tabler::forms.radio name="size" value="lg" label="Large" class="form-check-inline" :wrapper="false" />

    With slot:
    <x-tabler::forms.radio name="option" value="custom">
        Custom <strong>Option</strong>
    </x-tabler::forms.radio>

    With help text:
    <x-tabler::forms.radio
        name="billing"
        value="monthly"
        label="Monthly billing"
        help="Pay monthly, cancel anytime"
    />
--}}

@props([
    'name' => null,
    'id' => null,
    'value' => null,
    'checked' => false,
    'label' => null,
    'help' => null,
    'disabled' => false,
    'wrapper' => true,
])

@php
    // Generate ID from name and value if not provided
    $radioId =
        $id ?? ($name && $value ? str_replace(['[', ']'], ['-', ''], $name) . '-' . $value : 'radio-' . uniqid());

    // Determine if checked
    $isChecked = old($name) !== null ? old($name) == $value : $checked;
@endphp

@if ($wrapper)
    <div class="mb-3">
@endif
<label {{ $attributes->merge(['class' => 'form-check']) }}>
    <input type="radio" class="form-check-input" id="{{ $radioId }}"
        @if ($name) name="{{ $name }}" @endif
        @if ($value !== null) value="{{ $value }}" @endif
        @if ($isChecked) checked @endif @if ($disabled) disabled @endif>
    @if ($label)
        <span class="form-check-label">{{ $label }}</span>
    @else
        <span class="form-check-label">{{ $slot }}</span>
    @endif
</label>

{{-- Help Text --}}
@if ($help)
    <small class="form-hint d-block">{{ $help }}</small>
@endif
@if ($wrapper)
    </div>
@endif
