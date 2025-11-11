{{--
    Divider Component

    Horizontal rule with optional text label.

    @prop string|null $color - Divider color: 'primary', 'secondary', 'success', etc.
    @prop bool $dashed - Use dashed line style

    @slot default - Optional label text

    Available CSS Classes (use via class="" attribute):

    Divider Styles:
    - hr-text            - HR with text label (applied automatically if slot has content)
    - hr-text-left       - Left-aligned text
    - hr-text-right      - Right-aligned text
    - hr-text-center     - Center-aligned text (default)

    Line Styles:
    - border-dashed      - Dashed line (also via dashed prop)
    - border-dotted      - Dotted line

    Colors:
    - text-{color}       - Color the divider text
    - border-{color}     - Color the divider line

    Usage Examples:

    Basic divider:
    <x-tabler::divider />

    Divider with text:
    <x-tabler::divider>OR</x-tabler::divider>

    Left-aligned text:
    <x-tabler::divider class="hr-text-left">Section Title</x-tabler::divider>

    Dashed divider:
    <x-tabler::divider dashed>Continue</x-tabler::divider>

    Colored divider:
    <x-tabler::divider class="text-primary">Premium Content</x-tabler::divider>
--}}

@props([
    'color' => null,
    'dashed' => false,
])

@php
    // Build classes
    $classes = [];

    // If has text content, add hr-text class
    if ($slot->isNotEmpty()) {
        $classes[] = 'hr-text';
    }

    // Dashed style
    if ($dashed) {
        $classes[] = 'border-dashed';
    }

    // Color
    if ($color) {
        $classes[] = 'text-' . $color;
    }
@endphp

@if ($slot->isNotEmpty())
    <div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
        {{ $slot }}
    </div>
@else
    <hr {{ $attributes->merge(['class' => implode(' ', $classes)]) }} />
@endif
