{{--
    Alert Component

    Alert messages inform users of the status of their action and help them solve problems.
    Supports various types (success, info, warning, danger) and customization options.

    @prop string $type - Alert type: 'success', 'info', 'warning', 'danger' (default: 'info')
    @prop string|null $title - Alert title/heading
    @prop string|null $icon - Tabler icon name (without 'tabler-' prefix) to display on the left
    @prop bool $dismissible - Show close button for dismissing the alert
    @prop bool $important - Use colored background instead of subtle styling

    @slot default - Main alert content
    @slot:title - Optional slot for custom title markup
    @slot:actions - Optional slot for action buttons

    Available CSS Classes (use via class="" attribute):

    Alert Types (colors):
    - alert-success      - Success message (green)
    - alert-info         - Informational message (blue)
    - alert-warning      - Warning message (yellow/orange)
    - alert-danger       - Error/danger message (red)
    - alert-{color}      - Any Tabler color (primary, secondary, lime, cyan, facebook, etc.)

    Alert Variants:
    - alert-important    - Filled background style (more prominent)
    - alert-dismissible  - Can be closed (also available via dismissible prop)

    Content Styling:
    - alert-heading      - Title/heading text style
    - alert-description  - Description/content wrapper
    - alert-icon         - Icon wrapper and icon styling
    - alert-link         - Link styling within alerts

    Close Button:
    - btn-close          - Standard close button
    - btn-close-white    - White close button (for important/filled alerts)

    Usage Examples:

    Basic alert:
    <x-tabler::alert type="success" title="Success!">
        Your changes have been saved.
    </x-tabler::alert>

    Alert with icon:
    <x-tabler::alert type="warning" icon="alert-triangle" title="Warning">
        Please review your information.
    </x-tabler::alert>

    Dismissible alert:
    <x-tabler::alert type="danger" dismissible title="Error occurred">
        Could not process your request.
    </x-tabler::alert>

    Important alert (filled background):
    <x-tabler::alert type="info" important dismissible>
        <strong>Note:</strong> This is an important message.
    </x-tabler::alert>

    Alert with custom title slot:
    <x-tabler::alert type="success" icon="check">
        <x-slot:title>
            <strong>Completed!</strong>
        </x-slot:title>
        All tasks have been finished successfully.
    </x-tabler::alert>

    Alert with action buttons:
    <x-tabler::alert type="warning" dismissible>
        <x-slot:title>Confirm Action</x-slot:title>
        Are you sure you want to proceed?
        <x-slot:actions>
            <x-tabler::button color="warning" size="sm">Confirm</x-tabler::button>
            <x-tabler::button size="sm">Cancel</x-tabler::button>
        </x-slot:actions>
    </x-tabler::alert>

    Alert with link:
    <x-tabler::alert type="info" title="New update available">
        Version 2.0 is now available. <a href="#" class="alert-link">Learn more</a>
    </x-tabler::alert>

    Custom color alert:
    <x-tabler::alert class="alert-lime" title="Success!">
        Custom lime color alert.
    </x-tabler::alert>
--}}

@props([
    'type' => 'info',
    'title' => null,
    'icon' => null,
    'dismissible' => false,
    'important' => false,
])

@php
    // Build alert classes
    $classes = ['alert'];

    // Add type class
    $classes[] = 'alert-' . $type;

    // Important variant (filled background)
    if ($important) {
        $classes[] = 'alert-important';
    }

    // Dismissible variant
    if ($dismissible) {
        $classes[] = 'alert-dismissible';
    }

    // Prepare icon component name
    $iconComponent = $icon ? 'tabler-' . $icon : null;

    // Determine close button style (white for important alerts)
    $closeButtonClass = $important ? 'btn-close btn-close-white' : 'btn-close';
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $classes)]) }} role="alert">
    @if ($iconComponent)
        {{-- Alert with icon layout (uses alert-icon wrapper) --}}
        <div class="alert-icon">
            <x-dynamic-component :component="$iconComponent" class="icon alert-icon" />
        </div>
        <div>
            @if ($title)
                <h4 class="alert-heading">{{ $title }}</h4>
                @if ($slot->isNotEmpty())
                    <div class="alert-description">{{ $slot }}</div>
                @endif
            @else
                {{-- No title, content goes directly --}}
                {{ $slot }}
            @endif
            @isset($actions)
                <div class="btn-list mt-2">{{ $actions }}</div>
            @endisset
        </div>
    @elseif($title)
        {{-- Alert with title but no icon --}}
        <h4 class="alert-heading">{{ $title }}</h4>
        @if ($slot->isNotEmpty())
            <div class="alert-description">{{ $slot }}</div>
        @endif
        @isset($actions)
            <div class="btn-list mt-2">{{ $actions }}</div>
        @endisset
    @else
        {{-- Simple alert without icon or title --}}
        {{ $slot }}
        @isset($actions)
            <div class="btn-list mt-2">{{ $actions }}</div>
        @endisset
    @endif

    {{-- Dismissible close button --}}
    @if ($dismissible)
        <a class="{{ $closeButtonClass }}" data-bs-dismiss="alert" aria-label="close"></a>
    @endif
</div>
