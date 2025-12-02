@blaze

@props([
    // Core attributes
    'name' => null,
    'label' => null,
    'help' => null,
    'error' => null,

    // Layout
    'inline' => false,
    'required' => false,

    // Wrapper
    'containerClass' => 'mb-3',
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate unique ID for error association
    $groupId = $name ? "{$name}-group" : uniqid('radio-group-');

    // Detect validation errors
    $hasError = $error !== null ? (bool) $error : $name && $errors->has($name);
    $errorMessage = $hasError ? ($error ?: $errors->first($name)) : null;

    // Build label classes
    $labelClasses = Tabler::classes()
        ->add('form-label')
        ->add($required ? 'required' : '');
@endphp

<div @if ($containerClass) class="{{ $containerClass }}" @endif data-tabler-radio-group>
    @if ($label)
        <label class="{{ $labelClasses }}">
            {{ $label }}
        </label>
    @endif

    <div @if ($inline) class="d-flex flex-wrap gap-3" @endif>
        {{ $slot }}
    </div>

    @if ($hasError && $errorMessage)
        <div id="{{ $groupId }}-error" class="invalid-feedback d-block">
            {{ $errorMessage }}
        </div>
    @endif

    @if ($help)
        <small class="form-hint">{{ $help }}</small>
    @endif
</div>
