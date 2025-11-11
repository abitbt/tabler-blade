{{--
    Placeholder Component

    Loading placeholder skeleton for content that hasn't loaded yet.

    @prop string|null $type - Placeholder type: 'text' (default), 'image', 'button'
    @prop string|null $size - Size for text placeholders: 'xs', 'sm', 'lg'
    @prop string|null $width - Width: 'full', 'half', 'quarter', or custom percentage
    @prop bool $animated - Enable animation (wave effect)

    @slot default - Custom placeholder content

    Available CSS Classes (use via class="" attribute):

    Placeholder Base:
    - placeholder        - Base placeholder class
    - placeholder-glow   - Animated glow effect
    - placeholder-wave   - Animated wave effect (also via animated prop)

    Placeholder Sizes:
    - placeholder-xs     - Extra small placeholder
    - placeholder-sm     - Small placeholder
    - placeholder-lg     - Large placeholder

    Placeholder Width:
    - col-12             - Full width
    - col-6              - Half width
    - col-4              - Third width
    - col-3              - Quarter width
    - w-{percentage}     - Custom width (w-75, w-50, w-25)

    Usage Examples:

    Text placeholder:
    <x-tabler::placeholder width="full" />

    Multiple text lines:
    <div>
        <x-tabler::placeholder width="full" />
        <x-tabler::placeholder width="75" class="mt-2" />
        <x-tabler::placeholder width="50" class="mt-2" />
    </div>

    Animated placeholder:
    <x-tabler::placeholder width="full" animated />

    Small placeholders:
    <x-tabler::placeholder size="sm" width="full" />
    <x-tabler::placeholder size="sm" width="75" class="mt-2" />

    Button placeholder:
    <x-tabler::placeholder type="button" />

    Card with placeholders:
    <x-tabler::cards.card>
        <x-tabler::cards.body>
            <h5 class="card-title">
                <x-tabler::placeholder width="50" />
            </h5>
            <p class="card-text">
                <x-tabler::placeholder width="full" />
                <x-tabler::placeholder width="full" />
                <x-tabler::placeholder width="75" />
            </p>
            <x-tabler::placeholder type="button" />
        </x-tabler::cards.body>
    </x-tabler::cards.card>

    Custom placeholder:
    <x-tabler::placeholder>
        <span class="placeholder col-7"></span>
        <span class="placeholder col-4"></span>
        <span class="placeholder col-4"></span>
        <span class="placeholder col-6"></span>
    </x-tabler::placeholder>
--}}

@props([
    'type' => 'text',
    'size' => null,
    'width' => null,
    'animated' => false,
])

@php
    // Build placeholder classes
    $classes = ['placeholder'];

    // Size
    if ($size) {
        $classes[] = 'placeholder-' . $size;
    }

    // Width
    if ($width) {
        if ($width === 'full') {
            $classes[] = 'col-12';
        } elseif ($width === 'half') {
            $classes[] = 'col-6';
        } elseif ($width === 'quarter') {
            $classes[] = 'col-3';
        } elseif (is_numeric($width)) {
            $classes[] = 'w-' . $width;
        } else {
            $classes[] = $width;
        }
    }

    // Animation
    if ($animated) {
        $classes[] = 'placeholder-wave';
    }

    // Type-specific classes
    if ($type === 'button') {
        $classes[] = 'btn';
        $classes[] = 'disabled';
    }
@endphp

@if ($slot->isNotEmpty())
    {{-- Custom placeholder --}}
    <div {{ $attributes->merge(['class' => $animated ? 'placeholder-wave' : '']) }}>
        {{ $slot }}
    </div>
@else
    {{-- Auto-generated placeholder --}}
    <span {{ $attributes->merge(['class' => implode(' ', $classes)]) }}></span>
@endif
