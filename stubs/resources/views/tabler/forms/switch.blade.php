{{--
    Form Switch Component

    A toggle switch input (styled checkbox) with label and help text support.

    @prop string|null $name - Switch name attribute
    @prop string|null $id - Switch ID (auto-generated from name if not provided)
    @prop string $value - Switch value (default: '1')
    @prop bool $checked - Whether switch is checked/on
    @prop string|null $label - Label text (alternative to slot)
    @prop string|null $help - Help text displayed below switch
    @prop bool $disabled - Disable switch
    @prop bool $wrapper - Wrap in mb-3 div (default: true)

    @slot default - Label content (alternative to label prop)

    Available CSS Classes (use via class="" attribute):

    Layout:
    - form-check-reverse - Align switch to the right

    States:
    - is-valid           - Show valid state (green switch)
    - is-invalid         - Show invalid state (red switch)

    Sizing:
    - form-check-lg      - Large switch

    Usage Examples:

    Basic switch:
    <x-tabler::forms.switch name="notifications" label="Enable notifications" />

    Checked by default:
    <x-tabler::forms.switch name="active" label="Active" checked />

    With slot:
    <x-tabler::forms.switch name="darkmode">
        Enable <strong>Dark Mode</strong>
    </x-tabler::forms.switch>

    With help text:
    <x-tabler::forms.switch
        name="2fa"
        label="Two-factor authentication"
        help="Add an extra layer of security"
    />

    Reverse layout:
    <x-tabler::forms.switch name="public" label="Public profile" class="form-check-reverse" />

    Disabled:
    <x-tabler::forms.switch name="feature" label="Beta feature" disabled />
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
    $switchId = $id ?? ($name ? str_replace(['[', ']'], ['-', ''], $name) . '-' . uniqid() : 'switch-' . uniqid());

    // Determine if checked
    $isChecked = old($name) !== null ? old($name) == $value : $checked;
@endphp

@if ($wrapper)
    <div class="mb-3">
@endif
<label {{ $attributes->merge(['class' => 'form-check form-switch']) }}>
    <input type="checkbox" class="form-check-input" id="{{ $switchId }}"
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
