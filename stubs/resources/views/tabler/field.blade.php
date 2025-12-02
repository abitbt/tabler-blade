{{--
    Field Wrapper Component

    Wraps form inputs with consistent label, description, and error display.
    Eliminates duplication across input, select, textarea, checkbox, and radio components.

    @props
    - label (string) - Field label text
    - description (string) - Help text displayed before input
    - descriptionTrailing (string) - Help text displayed after input
    - error (string|bool) - Error message or boolean to auto-detect from $errors
    - required (bool) - Mark field as required [default: false]
    - name (string) - Field name for error detection (auto-detected from wire:model)
    - variant (string) - Layout variant: block|inline [default: block]

    @example
    <tabler:field label="Email" description="We'll never share your email" required>
        <tabler:input type="email" wire:model="email" />
    </tabler:field>

    @example Inline layout
    <tabler:field label="Email" variant="inline">
        <tabler:input type="email" wire:model="email" />
    </tabler:field>
--}}
@blaze

@props([
    'name' => null,
    'label' => null,
    'description' => null,
    'descriptionTrailing' => null,
    'error' => null,
    'required' => false,
    'variant' => 'block', // block|inline
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Auto-detect field name from slot's wire:model if not provided
if (!$name && $slot->isEmpty() === false) {
    // Try to extract wire:model from slot content
    // This is a simple heuristic - components should pass name explicitly for reliability
    preg_match('/wire:model(?:\.live)?=["\']([^"\']+)["\']/', $slot, $matches);
        $name = $matches[1] ?? null;
    }

    $hasError = $error !== null ? (bool) $error : $name && $errors->has($name);
    $errorMessage = $hasError ? (is_string($error) ? $error : ($name ? $errors->first($name) : null)) : null;

    $classes = Tabler::classes()->add($variant === 'inline' ? 'row mb-3' : 'mb-3');
@endphp

<div {{ $attributes->only('class')->class($classes) }} data-tabler-field>
    @if ($label)
        <label
            class="form-label{{ $required ? ' required' : '' }}{{ $variant === 'inline' ? ' col-3 col-form-label' : '' }}">
            {{ $label }}
        </label>
    @endif

    @if ($description && !$label)
        <div class="form-text mb-2">{{ $description }}</div>
    @endif

    <div class="{{ $variant === 'inline' ? 'col' : '' }}">
        @if ($description && $label)
            <div class="form-text mb-2">{{ $description }}</div>
        @endif

        {{ $slot }}

        @if ($hasError && $errorMessage)
            <div class="invalid-feedback d-block">{{ $errorMessage }}</div>
        @endif

        @if ($descriptionTrailing)
            <div class="form-text mt-2">{{ $descriptionTrailing }}</div>
        @endif
    </div>
</div>
