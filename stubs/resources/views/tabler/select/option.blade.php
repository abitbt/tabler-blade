@props([
    'value' => null,
    'selected' => false,
    'disabled' => false,
    'indicator' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Build data attributes for custom properties (indicators)
    $customProperties = null;
    if ($indicator) {
        $customProperties = $indicator;
    }
@endphp

<option {{ $attributes }} @if ($value !== null) value="{{ $value }}" @endif
    @if ($selected) selected @endif @if ($disabled) disabled @endif
    @if ($customProperties) data-custom-properties="{{ $customProperties }}" @endif>
    {{ $slot }}
</option>
