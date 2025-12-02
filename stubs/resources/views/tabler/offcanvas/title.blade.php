@blaze

@props([
    'id' => null,
])

<h2 {{ $attributes->class('offcanvas-title') }} @if ($id) id="{{ $id }}" @endif>
    {{ $slot }}
</h2>
