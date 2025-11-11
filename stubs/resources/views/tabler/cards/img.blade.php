{{--
    Card Image Component

    Display images in cards with position control.

    @prop string|null $src - Image source URL
    @prop string $alt - Image alt text (default: '')
    @prop string $position - Position: 'top', 'bottom', 'start', 'end' (default: 'top')
    @prop bool $responsive - Enable responsive aspect ratio
    @prop string|null $ratio - Aspect ratio: '21x9', '16x9', '4x3', '1x1', etc.

    Usage:
    <x-tabler::cards.card>
        <x-tabler::cards.img src="/images/photo.jpg" alt="Photo" />
        <x-tabler::cards.body>Card content</x-tabler::cards.body>
    </x-tabler::cards.card>

    Responsive with aspect ratio:
    <x-tabler::cards.img src="/images/photo.jpg" responsive ratio="16x9" />
--}}

@props([
    'src' => null,
    'alt' => '',
    'position' => 'top',
    'responsive' => false,
    'ratio' => null,
])

@php
    $imgClasses = [];

    // Responsive images use background-image with aspect ratio
    if ($responsive && $ratio) {
        $imgClasses[] = 'img-responsive';
        $imgClasses[] = 'img-responsive-' . $ratio;
    }

    // Position-specific classes
    if ($position === 'top') {
        $imgClasses[] = 'card-img-top';
    } elseif ($position === 'bottom') {
        $imgClasses[] = 'card-img-bottom';
    } elseif ($position === 'start') {
        $imgClasses[] = 'card-img-start';
    } elseif ($position === 'end') {
        $imgClasses[] = 'card-img-end';
    }
@endphp

@if ($src)
    @if ($responsive && $ratio)
        <div {{ $attributes->merge(['class' => implode(' ', $imgClasses)]) }}
            style="background-image: url('{{ $src }}')"></div>
    @else
        <img src="{{ $src }}" alt="{{ $alt }}"
            {{ $attributes->merge(['class' => implode(' ', $imgClasses)]) }} />
    @endif
@endif
