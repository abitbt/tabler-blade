@blaze

@props([])

<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'btn-close', 'data-bs-dismiss' => 'modal', 'aria-label' => 'Close']) }}></button>
