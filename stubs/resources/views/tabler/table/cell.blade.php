@blaze

@props([
    'header' => false,
    'scope' => null,
    'nowrap' => false,
    'truncate' => false,
    'width' => null,
    'dataLabel' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add($nowrap ? 'text-nowrap' : '')
        ->add($truncate ? 'td-truncate' : '');

    if ($width) {
        $classes->add(
            match ($width) {
                '1' => 'w-1',
                'auto' => 'w-auto',
                default => '',
            },
        );
    }

    $tag = $header ? 'th' : 'td';

    $scopeAttr = '';
    if ($header && $scope) {
        $scopeAttr = ' scope="' . e($scope) . '"';
    }
@endphp

<{{ $tag }}{!! $scopeAttr !!}@if ($dataLabel) data-label="{{ $dataLabel }}" @endif
    {{ $attributes->class($classes) }}>
    {{ $slot }}
    </{{ $tag }}>
