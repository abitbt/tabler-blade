@props([
    'btnActions' => false,
])

@php
    $actionsClasses = ['card-actions'];

    if ($btnActions) {
        $actionsClasses[] = 'btn-actions';
    }
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $actionsClasses)]) }}>
    {{ $slot }}
</div>
