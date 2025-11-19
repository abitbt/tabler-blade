@blaze

@php
    // Extract namespaced attributes BEFORE @props
    $iconTrailing ??= $attributes->pluck('icon:trailing');
    $iconLeading ??= $attributes->pluck('icon:leading');
    $iconVariant ??= $attributes->pluck('icon:variant');
@endphp

@props([
    // Core attributes
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'type' => 'text',
    'id' => null,
    'value' => null,

    // UI elements
    'placeholder' => null,

    // State
    'required' => false,
    'disabled' => false,
    'readonly' => false,

    // Styling
    'size' => null, // 'sm', 'lg', null
    'variant' => null, // 'rounded', 'flush', 'light', 'dark', null

    // Icons
    'icon' => null,
    'iconTrailing' => null,
    'iconPosition' => 'leading',
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate ID from name if not provided
    $id = $id ?? ($name ? $name : uniqid('input-'));

    // Build input classes
    $inputClasses = Tabler::classes()
        ->add('form-control')
        ->add(
            match ($size) {
                'sm' => 'form-control-sm',
                'lg' => 'form-control-lg',
                default => '',
            },
        )
        ->add(
            match ($variant) {
                'rounded' => 'form-control-rounded',
                'flush' => 'form-control-flush',
                'light' => 'form-control-light',
                'dark' => 'form-control-dark',
                default => '',
            },
        )
        ->add($attributes->pluck('class:input'));

    // Determine if we need icon wrapper
    $hasIcon = $icon || $iconLeading || $iconTrailing;
    $leadingIcon = $iconLeading ?? ($iconPosition === 'leading' ? $icon : null);
    $trailingIcon = $iconTrailing ?? ($iconPosition === 'trailing' ? $icon : null);
@endphp

@if ($hasIcon)
    <div class="input-icon" data-tabler-input>
        @if ($leadingIcon)
            <span class="input-icon-addon">
                @if (is_string($leadingIcon))
                    <tabler:icon :name="$leadingIcon" :variant="$iconVariant" />
                @else
                    {{ $leadingIcon }}
                @endif
            </span>
        @endif

        <input type="{{ $type }}" id="{{ $id }}"
            @if ($name) name="{{ $name }}" @endif
            @if ($value !== null) value="{{ $value }}" @endif
            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
            @if ($required) required aria-required="true" @endif
            @if ($disabled) disabled @endif @if ($readonly) readonly @endif
            {{ $attributes->except(['class', 'class:input', 'icon:leading', 'icon:trailing', 'icon:variant'])->class($inputClasses) }}>

        @if ($trailingIcon)
            <span class="input-icon-addon">
                @if (is_string($trailingIcon))
                    <tabler:icon :name="$trailingIcon" :variant="$iconVariant" />
                @else
                    {{ $trailingIcon }}
                @endif
            </span>
        @endif
    </div>
@else
    <input type="{{ $type }}" id="{{ $id }}"
        @if ($name) name="{{ $name }}" @endif
        @if ($value !== null) value="{{ $value }}" @endif
        @if ($placeholder) placeholder="{{ $placeholder }}" @endif
        @if ($required) required aria-required="true" @endif
        @if ($disabled) disabled @endif @if ($readonly) readonly @endif
        {{ $attributes->except(['class', 'class:input', 'icon:leading', 'icon:trailing', 'icon:variant'])->class($inputClasses) }}
        data-tabler-input>
@endif
