@props([
    'label' => null,
    'disabled' => false,
])

<optgroup {{ $attributes }} @if ($label) label="{{ $label }}" @endif
    @if ($disabled) disabled @endif>
    {{ $slot }}
</optgroup>
