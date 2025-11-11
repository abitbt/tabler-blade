@props([
    'id' => null,
    'show' => false,
    'autohide' => false,
    'delay' => 5000,
    'hideHeader' => false,
    'avatar' => null,
    'title' => null,
    'subtitle' => null,
    'dismissible' => true,
])

@php
    $classes = ['toast'];
    if ($show) {
        $classes[] = 'show';
    }
@endphp

<div
    {{ $attributes->merge([
        'class' => implode(' ', $classes),
        'id' => $id,
        'role' => 'alert',
        'aria-live' => 'assertive',
        'aria-atomic' => 'true',
        'data-bs-autohide' => $autohide ? 'true' : 'false',
        'data-bs-delay' => $delay,
    ]) }}>
    @unless ($hideHeader)
        <div class="toast-header">
            @if ($avatar)
                <span class="avatar avatar-xs me-2" style="background-image: url({{ $avatar }})"></span>
            @endif
            @if ($title)
                <strong class="me-auto">{{ $title }}</strong>
            @endif
            @if ($subtitle)
                <small>{{ $subtitle }}</small>
            @endif
            @if ($dismissible)
                <button type="button" class="btn-close ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
            @endif
        </div>
    @endunless
    <div class="toast-body">
        {{ $slot }}
    </div>
</div>
