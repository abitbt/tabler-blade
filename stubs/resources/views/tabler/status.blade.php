{{--
    Status Component

    Status indicator dot for showing online/offline, active/inactive states.

    @prop string|null $color - Status color: 'success', 'danger', 'warning', 'info', 'secondary', etc.
    @prop bool $animated - Enable pulsing animation
    @prop bool $dot - Show as dot only (no text label)

    @slot default - Status label text

    Available CSS Classes (use via class="" attribute):

    Status Colors:
    - status-success     - Green (online, active, success)
    - status-danger      - Red (offline, error, danger)
    - status-warning     - Yellow (away, warning)
    - status-info        - Blue (busy, info)
    - status-secondary   - Gray (inactive, disabled)
    - status-{color}     - Any Tabler color

    Status Variants:
    - status-dot         - Dot indicator (also via dot prop)
    - status-indicator   - Larger indicator style
    - status-animated    - Pulsing animation (also via animated prop)

    Usage Examples:

    Basic status with label:
    <x-tabler::status color="success">Online</x-tabler::status>

    Status dot only:
    <x-tabler::status color="danger" dot />

    Animated status:
    <x-tabler::status color="success" animated>Live</x-tabler::status>

    Status in text:
    User is <x-tabler::status color="warning">Away</x-tabler::status>

    Larger status indicator:
    <x-tabler::status color="success" class="status-indicator">Active</x-tabler::status>
--}}

@props([
    'color' => 'secondary',
    'animated' => false,
    'dot' => false,
])

@php
    // Build status classes
    $classes = ['status'];

    // Color
    $classes[] = 'status-' . $color;

    // Dot variant
    if ($dot || $slot->isEmpty()) {
        $classes[] = 'status-dot';
    }

    // Animated
    if ($animated) {
        $classes[] = 'status-animated';
    }
@endphp

<span {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
    @if (!$dot && $slot->isNotEmpty())
        {{ $slot }}
    @endif
</span>
