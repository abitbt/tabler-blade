{{--
    Progress Component

    Visual indicator for showing completion percentage of a task or process.
    Supports multiple progress bar styles, sizes, colors, and animated states.

    @prop int|float $value - Progress value (0-100)
    @prop int|float|null $max - Maximum value (default: 100)
    @prop string|null $color - Progress bar color: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', etc.
    @prop string|null $size - Progress bar size: 'sm' (small, thin bar)
    @prop string|null $label - Text label to display inside progress bar
    @prop bool $striped - Enable striped pattern
    @prop bool $animated - Enable animation (requires striped)
    @prop bool $indeterminate - Show indeterminate/loading state

    @slot default - Optional content to display below or alongside progress bar

    Available CSS Classes (use via class="" attribute):

    Progress Sizes:
    - progress-sm        - Small/thin progress bar

    Progress Colors (via progress-bar element):
    - bg-primary         - Primary color (default blue)
    - bg-secondary       - Secondary color (gray)
    - bg-success         - Success color (green)
    - bg-danger          - Danger color (red)
    - bg-warning         - Warning color (yellow/orange)
    - bg-info            - Info color (cyan)
    - bg-{color}         - Any Tabler color

    Progress Styles:
    - progress-striped   - Striped pattern (on progress element)
    - progress-animated  - Animated stripes (requires striped)

    Special States:
    - progress-bar-indeterminate - Loading/indeterminate animation

    Usage Examples:

    Basic progress bar:
    <x-tabler::progress :value="75" />

    Colored progress bar:
    <x-tabler::progress :value="60" color="success" />

    Small progress bar:
    <x-tabler::progress :value="45" size="sm" color="warning" />

    Progress with label:
    <x-tabler::progress :value="80" label="80%" color="primary" />

    Striped progress:
    <x-tabler::progress :value="50" striped color="info" />

    Animated striped progress:
    <x-tabler::progress :value="70" striped animated color="danger" />

    Indeterminate/loading state:
    <x-tabler::progress indeterminate color="primary" />

    Custom max value:
    <x-tabler::progress :value="25" :max="50" label="50%" />

    Multiple progress bars (stack them):
    <div class="progress">
        <div class="progress-bar bg-primary" style="width: 15%"></div>
        <div class="progress-bar bg-success" style="width: 30%"></div>
        <div class="progress-bar bg-warning" style="width: 20%"></div>
    </div>

    Progress with description below:
    <x-tabler::progress :value="65" color="success">
        <div class="mt-2 text-secondary">Uploading files... 65% complete</div>
    </x-tabler::progress>
--}}

@props([
    'value' => 0,
    'max' => 100,
    'color' => null,
    'size' => null,
    'label' => null,
    'striped' => false,
    'animated' => false,
    'indeterminate' => false,
])

@php
    // Build progress container classes
    $progressClasses = ['progress'];

    // Size modifier
    if ($size) {
        $progressClasses[] = 'progress-' . $size;
    }

    // Build progress-bar classes
    $barClasses = ['progress-bar'];

    // Color
    if ($color) {
        $barClasses[] = 'bg-' . $color;
    }

    // Striped pattern
    if ($striped || $animated) {
        $barClasses[] = 'progress-bar-striped';
    }

    // Animated stripes
    if ($animated) {
        $barClasses[] = 'progress-bar-animated';
    }

    // Indeterminate state
    if ($indeterminate) {
        $barClasses[] = 'progress-bar-indeterminate';
    }

    // Calculate percentage
    $percentage = $max > 0 ? min(($value / $max) * 100, 100) : 0;

    // For indeterminate, show full width with animation
    if ($indeterminate) {
        $percentage = 100;
    }
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $progressClasses)]) }}>
    <div class="{{ implode(' ', $barClasses) }}" role="progressbar" style="width: {{ $percentage }}%"
        aria-valuenow="{{ $value }}" aria-valuemin="0" aria-valuemax="{{ $max }}">
        @if ($label)
            {{ $label }}
        @endif
    </div>
</div>

@if ($slot->isNotEmpty())
    {{ $slot }}
@endif
