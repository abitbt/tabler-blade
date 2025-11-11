{{--
    Form Textarea Component

    A multi-line text input with label, validation, and auto-resize support.

    @prop string|null $name - Textarea name attribute
    @prop string|null $id - Textarea ID (auto-generated from name if not provided)
    @prop string|null $value - Textarea value
    @prop string|null $placeholder - Placeholder text
    @prop string|null $label - Label text
    @prop string|null $help - Help text (displayed above textarea)
    @prop string|null $error - Error message (overrides Laravel validation errors)
    @prop bool $required - Mark as required field
    @prop bool $disabled - Disable textarea
    @prop bool $readonly - Make textarea read-only
    @prop int $rows - Number of visible text rows (default: 3)
    @prop bool $autosize - Enable auto-resize based on content
    @prop bool $wrapper - Wrap in mb-3 div (default: true)

    @slot default - Default textarea content (alternative to value prop)

    Available CSS Classes (use via class="" attribute):

    Form Control States:
    - is-valid           - Show valid state (green border)
    - is-invalid         - Show invalid state (red border, auto-added on error)

    Textarea Styles:
    - form-control-light - Light background variant
    - form-control-dark  - Dark background variant

    Sizing:
    - form-control-sm    - Small textarea
    - form-control-lg    - Large textarea

    Auto-resize (also available via autosize prop):
    - autosize           - Auto-resize based on content

    Width Utilities:
    - w-auto, w-25, w-50, w-75, w-100 - Width percentages

    Usage Examples:

    Basic textarea:
    <x-tabler::forms.textarea name="description" label="Description" rows="5" />

    With auto-resize:
    <x-tabler::forms.textarea
        name="notes"
        label="Notes"
        autosize
        placeholder="Enter your notes..."
    />

    Light background variant:
    <x-tabler::forms.textarea name="bio" class="form-control-light" />
--}}

@props([
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
    'rows' => 3,
    'autosize' => false,
    'wrapper' => true,
])

@php
    // Generate unique ID from name if not provided
    $textareaId = $id ?? ($name ? str_replace(['[', ']'], ['-', ''], $name) : 'textarea-' . uniqid());

    // Build textarea classes array
    $textareaClasses = ['form-control'];

    // Auto-resize functionality
    if ($autosize) {
        $textareaClasses[] = 'autosize';
    }

    // Validation state
    if ($error || ($name && $errors->has($name))) {
        $textareaClasses[] = 'is-invalid';
    }

    // Determine error message (explicit error prop or Laravel validation errors)
    $errorMessage = $error ?? ($name ? $errors->first($name) : null);
@endphp

@if ($wrapper)
    <div class="mb-3">
@endif
{{-- Label --}}
@if ($label)
    <label for="{{ $textareaId }}" class="form-label">
        {{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

{{-- Help Text (above textarea) --}}
@if ($help)
    <small class="form-hint">{{ $help }}</small>
@endif

{{-- Textarea Element --}}
<textarea id="{{ $textareaId }}" @if ($name) name="{{ $name }}" @endif
    @if ($placeholder) placeholder="{{ $placeholder }}" @endif
    @if ($required) required @endif @if ($disabled) disabled @endif
    @if ($readonly) readonly @endif rows="{{ $rows }}"
    {{ $attributes->merge(['class' => implode(' ', $textareaClasses)]) }}>{{ old($name, $value ?? $slot) }}</textarea>

{{-- Error Message --}}
@if ($errorMessage)
    <div class="invalid-feedback d-block">{{ $errorMessage }}</div>
@endif
@if ($wrapper)
    </div>
@endif
