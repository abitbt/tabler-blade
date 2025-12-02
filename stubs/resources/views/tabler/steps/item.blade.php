@blaze

@props([
    'active' => false,
    'href' => null,
    'tooltip' => null,
    'tooltipPlacement' => 'top',
    'as' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Determine element type: <a> if href, otherwise <span> or custom tag
    $tag = $as ?? ($href ? 'a' : 'span');

    $classes = Tabler::classes()
        ->add('step-item')
        ->add($active ? 'active' : '');

    // Build tooltip attributes
    $tooltipAttrs = [];
    if ($tooltip) {
        $tooltipAttrs['data-bs-toggle'] = 'tooltip';
        $tooltipAttrs['data-bs-placement'] = $tooltipPlacement;
        $tooltipAttrs['title'] = $tooltip;
    }

    // Merge href if using <a> tag
    if ($tag === 'a' && $href) {
        $attributes = $attributes->merge(['href' => $href]);
    }

    // Add ARIA attributes
    $ariaAttrs = ['role' => 'listitem'];
    if ($active) {
        $ariaAttrs['aria-current'] = 'step';
    }
    if ($tag === 'span' && !$href) {
        $ariaAttrs['aria-disabled'] = 'true';
    }
@endphp

<{{ $tag }} {{ $attributes->class($classes)->merge($tooltipAttrs)->merge($ariaAttrs) }}>
    {{ $slot }}
    </{{ $tag }}>
