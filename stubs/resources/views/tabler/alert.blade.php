{{--
    Tabler Alert Component

    Alert messages are used to inform users of the status of their action and help them solve any problems that might have occurred.

    @prop string $color - Alert color variant (default: 'info')
    @prop string|null $icon - Icon name from blade-tabler-icons (auto-detected based on color if not provided)
    @prop bool $dismissible - Whether the alert can be dismissed (default: false)
    @prop bool $important - Use important variant with solid background color (default: false)

    Available CSS Classes (use via class="" attribute):

    Alert Variants:
    - alert-success        - Success message with green color
    - alert-info           - Informational message with blue color
    - alert-warning        - Warning message with yellow color
    - alert-danger         - Error/danger message with red color
    - alert-{color}        - Any Tabler theme color (primary, secondary, etc.)

    Alert Modifiers:
    - alert-important      - Solid background with white text
    - alert-minor          - Transparent background with border only
    - alert-dismissible    - Makes alert dismissible (automatically added if dismissible prop is true)

    Alert Layout:
    - alert-icon           - Icon styling class (used on icon element)
    - alert-heading        - Heading/title element class
    - alert-description    - Description text class
    - alert-link           - Link element styling
    - alert-action         - Action link styling (underlined)
    - alert-list           - List styling within alert

    Usage Examples:

    Basic Alert:
    <x-tabler::alert color="success">
        Your account has been saved!
    </x-tabler::alert>

    Alert with Icon:
    <x-tabler::alert color="danger" icon="alert-circle">
        An error occurred during processing.
    </x-tabler::alert>

    Dismissible Alert:
    <x-tabler::alert color="warning" dismissible>
        Please review your information before continuing.
    </x-tabler::alert>

    Important Alert:
    <x-tabler::alert color="success" important dismissible>
        Operation completed successfully!
    </x-tabler::alert>

    Alert with Named Slots:
    <x-tabler::alert color="info">
        <x-slot:title>Did you know?</x-slot>
        <x-slot:description>Here is something that you might like to know.</x-slot>
    </x-tabler::alert>

    Alert with Custom Content:
    <x-tabler::alert color="danger" class="mb-3">
        <h4 class="alert-heading">Error Processing Request</h4>
        <div class="alert-description">
            The following errors occurred:
            <ul class="alert-list">
                <li>Invalid email address</li>
                <li>Password is too short</li>
            </ul>
        </div>
    </x-tabler::alert>

    JavaScript Requirements:
    - Dismissible alerts require Bootstrap 5 JS for data-bs-dismiss="alert" functionality
    - Include Bootstrap JS in your layout or via CDN

    Accessibility:
    - role="alert" is automatically added for screen readers
    - aria-label="close" is added to close button
    - Alert close button is keyboard accessible

    Livewire Compatibility:
    <x-tabler::alert wire:poll.5s="checkStatus" color="info">
        Checking for updates...
    </x-tabler::alert>
--}}

@props([
    'color' => 'info',
    'icon' => null,
    'dismissible' => false,
    'important' => false,
    'title' => null,
    'description' => null,
])

@php
    // Auto-detect icon based on color if not provided (and not explicitly disabled)
    if ($icon === null) {
        $icon = match ($color) {
            'success' => 'check',
            'warning' => 'alert-triangle',
            'danger', 'error' => 'alert-circle',
            'info' => 'info-circle',
            default => false,
        };
    }

    // Normalize 'error' to 'danger' for Bootstrap compatibility
    $alertColor = $color === 'error' ? 'danger' : $color;
@endphp

<div
    {{ $attributes->class(['alert', "alert-{$alertColor}", 'alert-important' => $important, 'alert-dismissible' => $dismissible])->merge([
            'role' => 'alert',
        ]) }}>
    @if ($icon)
        <div class="alert-icon">
            <x-dynamic-component :component="'tabler-' . $icon" />
        </div>
    @endif

    <div>
        @if ($title)
            <h4 class="alert-heading">{{ $title }}</h4>
        @endif

        @if ($description)
            <div class="alert-description">
                {{ $description }}
            </div>
        @elseif ($slot->isNotEmpty())
            {{ $slot }}
        @endif
    </div>

    @if ($dismissible)
        <button type="button" class="btn-close{{ $important ? ' btn-close-white' : '' }}" data-bs-dismiss="alert"
            aria-label="close"></button>
    @endif
</div>
