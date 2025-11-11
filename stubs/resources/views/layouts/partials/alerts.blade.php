{{--
    Flash Messages / Alerts

    Automatically displays flash messages from the session.

    Supported session keys (configurable in config/tabler.php):
    - success
    - error
    - warning
    - info

    Usage in controller:
    return redirect()->back()->with('success', 'Operation completed successfully!');
--}}

@php
    $sessionKeys = config('tabler.flash_messages.session_keys', ['success', 'error', 'warning', 'info']);
    $enabled = config('tabler.flash_messages.enabled', true);

    // Icon mapping
    $iconMap = [
        'success' => 'check',
        'error' => 'alert-circle',
        'warning' => 'alert-triangle',
        'info' => 'info-circle',
    ];
@endphp

@if ($enabled)
    @foreach ($sessionKeys as $type)
        @if (session()->has($type))
            <x-tabler::alert color="{{ $type }}" icon="{{ $iconMap[$type] ?? 'info-circle' }}" dismissible
                class="mb-3">
                {{ session($type) }}
            </x-tabler::alert>
        @endif
    @endforeach
@endif
