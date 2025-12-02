@props([
    'checkbox' => false,
    'radio' => false,
])

<span {{ $attributes->class('input-group-text') }}>
    @if($checkbox)
        <input class="form-check-input m-0" type="checkbox" {{ $attributes->except('class') }} />
    @elseif($radio)
        <input class="form-check-input m-0" type="radio" {{ $attributes->except('class') }} />
    @else
        {{ $slot }}
    @endif
</span>
