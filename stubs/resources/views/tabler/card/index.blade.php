@blaze

@props([
    'padding' => null,
    'active' => false,
    'inactive' => false,
    'borderless' => false,
    'link' => false,
    'linkRotate' => false,
    'linkPop' => false,
    'rotateEnd' => false,
    'rotateStart' => false,
    'stacked' => false,
    'aside' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('card')
        ->add(
            match ($padding) {
                'sm', 'small' => 'card-sm',
                'md', 'medium' => 'card-md',
                'lg', 'large' => 'card-lg',
                default => '',
            },
        )
        ->add($active ? 'card-active' : '')
        ->add($inactive ? 'card-inactive' : '')
        ->add($borderless ? 'card-borderless' : '')
        ->add($link ? 'card-link' : '')
        ->add($linkRotate ? 'card-link-rotate' : '')
        ->add($linkPop ? 'card-link-pop' : '')
        ->add($rotateEnd ? 'card-rotate-end' : '')
        ->add($rotateStart ? 'card-rotate-start' : '')
        ->add($stacked ? 'card-stacked' : '')
        ->add($aside ? 'card-aside' : '');

    $tag = $link ? 'a' : 'div';
@endphp

<{{ $tag }} {{ $attributes->class($classes) }}>
    {{ $slot }}
    </{{ $tag }}>
