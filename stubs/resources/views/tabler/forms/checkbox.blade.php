{{--
    Form Checkbox Component

    A checkbox input with label and help text support.

    @prop string|null $name - Checkbox name attribute
    @prop string|null $id - Checkbox ID (auto-generated from name if not provided)
    @prop string $value - Checkbox value (default: '1')
    @prop bool $checked - Whether checkbox is checked
    @prop string|null $label - Label text (alternative to slot)
    @prop string|null $help - Help text displayed below checkbox
    @prop bool $disabled - Disable checkbox
    @prop bool $wrapper - Wrap in mb-3 div (default: true)

    @slot default - Label content (alternative to label prop)

    Available CSS Classes (use via class="" attribute):

    Layout:
    - form-check-inline  - Display inline instead of block
    - form-check-reverse - Align checkbox to the right

    States:
    - is-valid           - Show valid state (green checkbox)
    - is-invalid         - Show invalid state (red checkbox)

    Sizing:
    - form-check-lg      - Large checkbox

    Usage Examples:

    Basic checkbox:
    <x-tabler::forms.checkbox name="terms" label="I agree to terms" />

    Checkbox with slot:
    <x-tabler::forms.checkbox name="newsletter">
        Subscribe to our newsletter
    </x-tabler::forms.checkbox>

    Inline checkboxes:
    <x-tabler::forms.checkbox name="opt1" label="Option 1" class="form-check-inline" :wrapper="false" />
    <x-tabler::forms.checkbox name="opt2" label="Option 2" class="form-check-inline" :wrapper="false" />

    With help text:
    <x-tabler::forms.checkbox
        name="remember"
        label="Remember me"
        help="Keep me logged in for 30 days"
    />

    Reverse layout:
    <x-tabler::forms.checkbox name="accept" label="Accept" class="form-check-reverse" />
--}}

@props([
    'name' => null,
    'id' => null,
    'value' => '1',
    'checked' => false,
    'label' => null,
    'help' => null,
    'disabled' => false,
    'wrapper' => true,
])

@php
    // Generate ID from name if not provided
    $checkboxId = $id ?? ($name ? str_replace(['[', ']'], ['-', ''], $name) . '-' . uniqid() : 'checkbox-' . uniqid());

    // Determine if checked
    $isChecked = old($name) !== null ? old($name) == $value : $checked;
@endphp

@if ($wrapper)
    <div class="mb-3">
@endif
<label {{ $attributes->merge(['class' => 'form-check']) }}>
    <input type="checkbox" class="form-check-input" id="{{ $checkboxId }}"
        @if ($name) name="{{ $name }}" @endif value="{{ $value }}"
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
