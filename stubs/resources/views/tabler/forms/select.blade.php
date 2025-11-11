{{--
    Form Select Component

    A dropdown select with label, validation, and option groups support.

    @prop string|null $name - Select name attribute
    @prop string|null $id - Select ID (auto-generated from name if not provided)
    @prop string|array|null $value - Selected value(s)
    @prop array $options - Options array (value => label or value => [label => sublabel] for optgroups)
    @prop string|null $placeholder - Placeholder option text
    @prop string|null $label - Label text
    @prop string|null $help - Help text (displayed above select)
    @prop string|null $error - Error message (overrides Laravel validation errors)
    @prop bool $required - Mark as required field
    @prop bool $disabled - Disable select
    @prop bool $multiple - Enable multiple selection
    @prop int|null $size - Visible options count (for multiple selects)
    @prop bool $wrapper - Wrap in mb-3 div (default: true)

    @slot default - Custom option elements (alternative to options prop)

    Available CSS Classes (use via class="" attribute):

    Form Select States:
    - is-valid           - Show valid state (green border)
    - is-invalid         - Show invalid state (red border, auto-added on error)

    Select Sizing:
    - form-select-sm     - Small select
    - form-select-lg     - Large select

    Width Utilities:
    - w-auto, w-25, w-50, w-75, w-100 - Width percentages

    Usage Examples:

    Basic select:
    <x-tabler::forms.select
        name="country"
        label="Country"
        :options="['us' => 'United States', 'uk' => 'United Kingdom']"
    />

    With placeholder:
    <x-tabler::forms.select
        name="status"
        placeholder="Select status..."
        :options="['active' => 'Active', 'inactive' => 'Inactive']"
    />

    With optgroups:
    <x-tabler::forms.select
        name="fruit"
        :options="[
            'Citrus' => ['orange' => 'Orange', 'lemon' => 'Lemon'],
            'Berries' => ['strawberry' => 'Strawberry', 'blueberry' => 'Blueberry']
        ]"
    />

    Small width select:
    <x-tabler::forms.select name="month" class="w-25" :options="[]" />
--}}

@props([
    'name' => null,
    'id' => null,
    'value' => null,
    'options' => [],
    'placeholder' => null,
    'label' => null,
    'help' => null,
    'error' => null,
    'required' => false,
    'disabled' => false,
    'multiple' => false,
    'size' => null,
    'wrapper' => true,
])

@php
    // Generate unique ID from name if not provided
    $selectId = $id ?? ($name ? str_replace(['[', ']'], ['-', ''], $name) : 'select-' . uniqid());

    // Build select classes array
    $selectClasses = ['form-select'];

    // Validation state
    if ($error || ($name && $errors->has($name))) {
        $selectClasses[] = 'is-invalid';
    }

    // Determine error message (explicit error prop or Laravel validation errors)
    $errorMessage = $error ?? ($name ? $errors->first($name) : null);

    // Get current value (old input takes precedence)
    $currentValue = old($name, $value);
@endphp

@if ($wrapper)
    <div class="mb-3">
@endif
{{-- Label --}}
@if ($label)
    <label for="{{ $selectId }}" class="form-label">
        {{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

{{-- Help Text (above select) --}}
@if ($help)
    <small class="form-hint">{{ $help }}</small>
@endif

{{-- Select Element --}}
<select id="{{ $selectId }}"
    @if ($name) name="{{ $name }}{{ $multiple ? '[]' : '' }}" @endif
    @if ($required) required @endif @if ($disabled) disabled @endif
    @if ($multiple) multiple @endif
    @if ($size) size="{{ $size }}" @endif
    {{ $attributes->merge(['class' => implode(' ', $selectClasses)]) }}>
    {{-- Placeholder option --}}
    @if ($placeholder && !$multiple)
        <option value="">{{ $placeholder }}</option>
    @endif

    {{-- Options from array --}}
    @if (!empty($options))
        @foreach ($options as $optionValue => $optionLabel)
            @if (is_array($optionLabel))
                {{-- Optgroup --}}
                <optgroup label="{{ $optionValue }}">
                    @foreach ($optionLabel as $subValue => $subLabel)
                        <option value="{{ $subValue }}"
                            @if ($multiple && is_array($currentValue) && in_array($subValue, $currentValue)) selected
                                @elseif(!$multiple && $subValue == $currentValue) selected @endif>
                            {{ $subLabel }}</option>
                    @endforeach
                </optgroup>
            @else
                {{-- Regular option --}}
                <option value="{{ $optionValue }}"
                    @if ($multiple && is_array($currentValue) && in_array($optionValue, $currentValue)) selected
                        @elseif(!$multiple && $optionValue == $currentValue) selected @endif>
                    {{ $optionLabel }}</option>
            @endif
        @endforeach
    @endif

    {{-- Slot for custom options --}}
    {{ $slot }}
</select>

{{-- Error Message --}}
@if ($errorMessage)
    <div class="invalid-feedback d-block">{{ $errorMessage }}</div>
@endif
@if ($wrapper)
    </div>
@endif
