@props([
    'checked' => false,
    'disabled' => false,
    'size' => null,
    'name' => null,
    'id' => null,
    'value' => '1',
    'label' => null,
    'labelOn' => null,
    'labelOff' => null,
    'description' => null,
    'required' => false,
    'inline' => false,
    'single' => false,
    'highlight' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $inputId = $id ?? 'switch-' . uniqid();

    $classes = Tabler::classes()
        ->add('form-check')
        ->add('form-switch')
        ->add(match ($size) {
            'lg' => 'form-switch-lg',
            default => '',
        })
        ->add($inline ? 'form-check-inline' : '')
        ->add($single ? 'form-check-single' : '')
        ->add($highlight ? 'form-check-highlight' : '');
@endphp

<label {{ $attributes->class($classes) }}>
    <input
        class="form-check-input"
        type="checkbox"
        id="{{ $inputId }}"
        @if($name) name="{{ $name }}" @endif
        @if($value) value="{{ $value }}" @endif
        @if($checked) checked @endif
        @if($disabled) disabled @endif
    />

    @if($labelOn && $labelOff)
        <span class="form-check-label{{ $required ? ' required' : '' }}">
            <span class="form-check-label-on">{{ $labelOn }}</span>
            <span class="form-check-label-off">{{ $labelOff }}</span>
        </span>
    @elseif($label)
        <span class="form-check-label{{ $required ? ' required' : '' }}">
            {{ $label }}
        </span>
    @elseif($slot->isNotEmpty())
        <span class="form-check-label{{ $required ? ' required' : '' }}">
            {{ $slot }}
        </span>
    @endif

    @if($description)
        <span class="form-check-description">{{ $description }}</span>
    @endif
</label>
