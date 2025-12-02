@blaze

@props(['type' => 'button'])

@if ($attributes->has('href'))
    <a {{ $attributes }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['type' => $type]) }}>{{ $slot }}</button>
@endif
