@blaze

@props([
    'src' => null,
    'position' => 'top',
    'ratio' => '21x9',
    'alt' => '',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $positionClass = match ($position) {
        'top' => 'card-img-top',
        'bottom' => 'card-img-bottom',
        default => 'card-img-top',
    };

    $classes = Tabler::classes()->add($positionClass);

    // If src is provided, use img tag, otherwise use div with background
    $useImgTag = !empty($src) && !str_contains($src, 'background-image');
@endphp

@if ($useImgTag)
    <img {{ $attributes->class($classes) }} src="{{ $src }}" alt="{{ $alt }}" />
@else
    @php
        $divClasses = Tabler::classes()
            ->add('img-responsive')
            ->add("img-responsive-{$ratio}")
            ->add($positionClass);
    @endphp
    <div {{ $attributes->class($divClasses) }}
        @if ($src) style="background-image: url({{ $src }})" @endif>
        {{ $slot }}
    </div>
@endif
