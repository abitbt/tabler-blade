{{--
    Form Input Component

    A flexible text input with label, help text, validation, and icon support.

    @prop string $type - Input type: 'text', 'email', 'password', 'number', etc. (default: 'text')
    @prop string|null $name - Input name attribute
    @prop string|null $id - Input ID (auto-generated from name if not provided)
    @prop string|null $value - Input value
    @prop string|null $placeholder - Placeholder text
    @prop string|null $label - Label text
    @prop string|null $help - Help text (displayed above input)
    @prop string|null $error - Error message (overrides Laravel validation errors)
    @prop bool $required - Mark as required field
    @prop bool $disabled - Disable input
    @prop bool $readonly - Make input read-only
    @prop string|null $size - Size variant: 'sm', 'lg'
    @prop string|null $icon - Tabler icon name (without 'tabler-' prefix)
    @prop string $iconPosition - Icon position: 'start', 'end' (default: 'end')
    @prop bool $loading - Show loading spinner instead of icon
    @prop bool $wrapper - Wrap in mb-3 div (default: true)

    @slot default - Not used for input

    Available CSS Classes (use via class="" attribute):

    Form Control States:
    - is-valid           - Show valid state (green border)
    - is-invalid         - Show invalid state (red border, auto-added on error)

    Input Styles:
    - form-control-light - Light background variant
    - form-control-dark  - Dark background variant
    - form-control-rounded - Rounded corners
    - form-control-flush - Remove background and borders

    Additional Input Classes:
    - form-control-color - Color picker style
    - form-control-plaintext - Plain text style (no border)

    Sizing (also available via size prop):
    - form-control-sm    - Small input
    - form-control-lg    - Large input

    Width Utilities:
    - w-auto, w-25, w-50, w-75, w-100 - Width percentages

    Usage Examples:

    Basic input:
    <x-tabler::forms.input name="email" label="Email Address" type="email" required />

    With icon:
    <x-tabler::forms.input name="search" icon="search" placeholder="Search..." />

    With help text:
    <x-tabler::forms.input
        name="username"
        label="Username"
        help="Choose a unique username"
        required
    />

    Light background variant:
    <x-tabler::forms.input name="name" class="form-control-light" />

    Small width input:
    <x-tabler::forms.input name="code" label="Code" class="w-25" />
--}}

@props([
    'type' => 'text',
    'name' => null,
    'id' => null,
    'value' => null,
    'placeholder' => null,
    'label' => null,
    'help' => null,
    'error' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'size' => null,
    'icon' => null,
    'iconPosition' => 'end',
    'loading' => false,
    'wrapper' => true,
])

@php
    // Generate unique ID from name if not provided
    $inputId = $id ?? ($name ? str_replace(['[', ']'], ['-', ''], $name) : 'input-' . uniqid());

    // Build input classes array
    $inputClasses = ['form-control'];

    // Size variations
    if ($size) {
        $inputClasses[] = 'form-control-' . $size;
    }

    // Validation state
    if ($error || ($name && $errors->has($name))) {
        $inputClasses[] = 'is-invalid';
    }

    // Check if we need icon wrapper
    $hasIcon = $icon || $loading;

    // Determine error message (explicit error prop or Laravel validation errors)
    $errorMessage = $error ?? ($name ? $errors->first($name) : null);
@endphp

@if ($wrapper)
    <div class="mb-3">
@endif
{{-- Label --}}
@if ($label)
    <label for="{{ $inputId }}" class="form-label">
        {{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

{{-- Help Text (above input) --}}
@if ($help)
    <small class="form-hint">{{ $help }}</small>
@endif

{{-- Input with optional icon wrapper --}}
@if ($hasIcon)
    <div class="input-icon @if ($iconPosition === 'start') input-icon-start @endif">
@endif

{{-- Icon (start position) --}}
@if ($hasIcon && $iconPosition === 'start')
    <span class="input-icon-addon">
        @if ($loading)
            <div class="spinner-border spinner-border-sm text-secondary" role="status"></div>
        @elseif($icon)
            <x-dynamic-component :component="'tabler-' . $icon" class="icon" />
        @endif
    </span>
@endif

{{-- The actual input element --}}
<input type="{{ $type }}" id="{{ $inputId }}"
    @if ($name) name="{{ $name }}" @endif value="{{ old($name, $value) }}"
    @if ($placeholder) placeholder="{{ $placeholder }}" @endif
    @if ($required) required @endif @if ($disabled) disabled @endif
    @if ($readonly) readonly @endif
    {{ $attributes->merge(['class' => implode(' ', $inputClasses)]) }}>

{{-- Icon (end position) --}}
@if ($hasIcon && $iconPosition === 'end')
    <span class="input-icon-addon">
        @if ($loading)
            <div class="spinner-border spinner-border-sm text-secondary" role="status"></div>
        @elseif($icon)
            <x-dynamic-component :component="'tabler-' . $icon" class="icon" />
        @endif
    </span>
@endif

@if ($hasIcon)
    </div>
@endif

{{-- Error Message --}}
@if ($errorMessage)
    <div class="invalid-feedback d-block">{{ $errorMessage }}</div>
@endif
@if ($wrapper)
    </div>
@endif
