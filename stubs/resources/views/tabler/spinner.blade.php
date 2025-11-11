{{--
    Spinner Component

    Loading spinner to indicate an in-progress action.
    Supports multiple sizes, colors, and types (border or growing).

    @prop string|null $type - Spinner type: 'border' (default), 'grow'
    @prop string|null $size - Spinner size: 'sm' (small)
    @prop string|null $color - Spinner color: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', etc.

    @slot default - Optional accessible label text (visually hidden)

    Available CSS Classes (use via class="" attribute):

    Spinner Types:
    - spinner-border     - Border spinner (default, rotating circle)
    - spinner-grow       - Growing spinner (pulsing dots)

    Spinner Sizes:
    - spinner-border-sm  - Small border spinner
    - spinner-grow-sm    - Small grow spinner

    Spinner Colors (via text-{color}):
    - text-primary       - Primary color
    - text-secondary     - Secondary color
    - text-success       - Success color (green)
    - text-danger        - Danger color (red)
    - text-warning       - Warning color (yellow/orange)
    - text-info          - Info color (cyan)
    - text-{color}       - Any Tabler color

    Utility Classes:
    - m-0, m-1, m-2      - Margin utilities
    - me-2, ms-2         - Margin end/start for inline spinners

    Usage Examples:

    Basic spinner:
    <x-tabler::spinner />

    Colored spinner:
    <x-tabler::spinner color="primary" />

    Small spinner:
    <x-tabler::spinner size="sm" color="danger" />

    Growing spinner:
    <x-tabler::spinner type="grow" color="success" />

    Spinner with accessible label:
    <x-tabler::spinner color="primary">
        Loading...
    </x-tabler::spinner>

    Inline spinner with button:
    <x-tabler::button disabled>
        <x-tabler::spinner size="sm" class="me-2" />
        Processing...
    </x-tabler::button>

    Multiple spinners (loading indicator):
    <div class="d-flex align-items-center gap-2">
        <x-tabler::spinner type="grow" size="sm" color="primary" />
        <x-tabler::spinner type="grow" size="sm" color="primary" />
        <x-tabler::spinner type="grow" size="sm" color="primary" />
    </div>

    Centered spinner:
    <div class="d-flex justify-content-center">
        <x-tabler::spinner color="primary" />
    </div>
--}}

@props([
    'type' => 'border',
    'size' => null,
    'color' => null,
])

@php
    // Build spinner classes
    $classes = [];

    // Spinner type
    if ($type === 'grow') {
        $classes[] = 'spinner-grow';

        // Size for grow type
        if ($size === 'sm') {
            $classes[] = 'spinner-grow-sm';
        }
    } else {
        // Default: border type
        $classes[] = 'spinner-border';

        // Size for border type
        if ($size === 'sm') {
            $classes[] = 'spinner-border-sm';
        }
    }

    // Color
    if ($color) {
        $classes[] = 'text-' . $color;
    }
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $classes)]) }} role="status">
    @if ($slot->isEmpty())
        <span class="visually-hidden">Loading...</span>
    @else
        <span class="visually-hidden">{{ $slot }}</span>
    @endif
</div>
