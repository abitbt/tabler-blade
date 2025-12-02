@blaze

@props([
    'color' => 'gray',
    'size' => null,
    'animated' => false,
    'lite' => false,
    'showDot' => true,
    'dotAnimated' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('status')
        ->add("status-{$color}")
        ->add(
            match ($size) {
                'sm' => 'status-sm',
                'md' => 'status-md',
                'lg' => 'status-lg',
                default => '',
            },
        )
        ->add($lite ? 'status-lite' : '')
        ->add($animated ? 'status-animated' : '');
@endphp

<span {{ $attributes->class($classes) }}>
    @if ($showDot)
        <tabler:status.dot :color="$color" :animated="$dotAnimated" />
    @endif
    {{ $slot }}
</span>
