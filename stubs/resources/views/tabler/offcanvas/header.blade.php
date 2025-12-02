@blaze

@props([
    'title' => null,
    'hideClose' => false,
])

<div {{ $attributes->class('offcanvas-header') }}>
    @if ($title)
        <h2 class="offcanvas-title">{{ $title }}</h2>
    @else
        {{ $slot }}
    @endif

    @unless ($hideClose)
        <tabler:offcanvas.close />
    @endunless
</div>
