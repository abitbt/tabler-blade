{{--
    Form File Input Component

    A file upload input with label, help text, and validation support.

    @prop string|null $name - File input name attribute
    @prop string|null $id - File input ID (auto-generated from name if not provided)
    @prop string|null $label - Label text
    @prop string|null $help - Help text (displayed above input)
    @prop string|null $error - Error message (overrides Laravel validation errors)
    @prop string|null $accept - Accepted file types (e.g., "image/*", ".pdf,.doc")
    @prop bool $multiple - Allow multiple file selection
    @prop bool $required - Mark as required field
    @prop bool $disabled - Disable file input
    @prop bool $wrapper - Wrap in mb-3 div (default: true)

    Available CSS Classes (use via class="" attribute):

    States:
    - is-valid           - Show valid state (green border)
    - is-invalid         - Show invalid state (red border, auto-added on error)

    Sizing:
    - form-control-sm    - Small file input
    - form-control-lg    - Large file input

    Width Utilities:
    - w-auto, w-25, w-50, w-75, w-100 - Width percentages

    Usage Examples:

    Basic file input:
    <x-tabler::forms.file name="document" label="Upload document" />

    Accept specific file types:
    <x-tabler::forms.file
        name="avatar"
        label="Profile picture"
        accept="image/png,image/jpeg"
    />

    Multiple file upload:
    <x-tabler::forms.file
        name="attachments"
        label="Attachments"
        multiple
        help="You can select multiple files"
    />

    Required field:
    <x-tabler::forms.file
        name="resume"
        label="Resume"
        accept=".pdf,.doc,.docx"
        required
    />
--}}

@props([
    'name' => null,
    'id' => null,
    'label' => null,
    'help' => null,
    'error' => null,
    'accept' => null,
    'multiple' => false,
    'required' => false,
    'disabled' => false,
    'wrapper' => true,
])

@php
    $fileId = $id ?? ($name ? str_replace(['[', ']'], ['-', ''], $name) : 'file-' . uniqid());

    // Build file input classes
    $fileClasses = ['form-control'];

    // Add validation classes
    if ($error || $errors->has($name)) {
        $fileClasses[] = 'is-invalid';
    }

    // Get error message
    $errorMessage = $error ?? ($name ? $errors->first($name) : null);
@endphp

@if ($wrapper)
    <div class="mb-3">
@endif
@if ($label)
    <label for="{{ $fileId }}" class="form-label">
        {{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

@if ($help)
    <small class="form-hint">{{ $help }}</small>
@endif

<input type="file" id="{{ $fileId }}"
    @if ($name) name="{{ $name }}{{ $multiple ? '[]' : '' }}" @endif
    @if ($accept) accept="{{ $accept }}" @endif
    @if ($multiple) multiple @endif @if ($required) required @endif
    @if ($disabled) disabled @endif
    {{ $attributes->merge(['class' => implode(' ', $fileClasses)]) }} />

@if ($errorMessage)
    <div class="invalid-feedback d-block">{{ $errorMessage }}</div>
@endif
@if ($wrapper)
    </div>
@endif
