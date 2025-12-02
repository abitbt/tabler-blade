@blaze

@props([
    'href' => null,
    'type' => 'button',
    'disabled' => false,
    'current' => null,
])

@php
    // Detect current state for links
    if ($href && $current === null) {
        $hrefForCurrentDetection = str($href)->startsWith(trim(config('app.url')))
            ? (string) str($href)->after(trim(config('app.url'), '/'))
            : $href;

        if ($hrefForCurrentDetection === '') {
            $hrefForCurrentDetection = '/';
        }

        $requestIs = function ($pattern) {
            // Support current route detection during Livewire update requests
            return app('livewire')?->isLivewireRequest()
                ? str()->is($pattern, app('livewire')->originalPath())
                : request()->is($pattern);
        };

        $current = $hrefForCurrentDetection
            ? $requestIs($hrefForCurrentDetection === '/' ? '/' : trim($hrefForCurrentDetection, '/'))
            : false;
    }
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['data-current' => $current]) }}
        @if ($disabled) aria-disabled="true" @endif>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes }} @if ($disabled) disabled @endif>
        {{ $slot }}
    </button>
@endif
