@blaze

@props([
    'id' => null,
    'show' => false,
    'autohide' => false,
    'delay' => 5000,
    'title' => null,
    'subtitle' => null,
    'hideHeader' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate unique ID if not provided
    $id ??= 'toast-' . uniqid();

    $classes = Tabler::classes()
        ->add('toast')
        ->add($show ? 'show' : '');

    $dataAttributes = [
        'role' => 'alert',
        'aria-live' => 'assertive',
        'aria-atomic' => 'true',
    ];

    if (!$autohide) {
        $dataAttributes['data-bs-autohide'] = 'false';
    } else {
        $dataAttributes['data-bs-delay'] = $delay;
    }
@endphp

<div {{ $attributes->class($classes)->merge($dataAttributes) }} id="{{ $id }}">
    @unless ($hideHeader)
        <div class="toast-header">
            @if ($title)
                <strong class="me-auto">{{ $title }}</strong>
            @endif

            @if ($subtitle)
                <small>{{ $subtitle }}</small>
            @endif

            <button type="button" class="btn-close ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    @endunless

    <div class="toast-body">
        {{ $slot }}
    </div>
</div>
