@blaze

@props([
    'subtitle' => null,
])

<h3 {{ $attributes->class('card-title') }}>
    {{ $slot }}
    @if ($subtitle)
        <span class="card-subtitle">{{ $subtitle }}</span>
    @endif
</h3>
