@blaze

@props([
    'title' => null,
    'hideClose' => false,
])

<div {{ $attributes->class('modal-header') }}>
    @if ($title)
        <h5 class="modal-title">{{ $title }}</h5>
    @else
        {{ $slot }}
    @endif

    @unless ($hideClose)
        <tabler:modal.close />
    @endunless
</div>
