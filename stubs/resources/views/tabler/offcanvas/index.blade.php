@blaze

@props([
    'id' => null,
    'position' => 'start',         // start|end|top|bottom
    'size' => null,                // sm|md|lg|xl
    'backdrop' => true,
    'keyboard' => true,
    'scroll' => false,
    'responsive' => null,          // sm|md|lg|xl|xxl
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate unique ID if not provided
    $id ??= 'offcanvas-' . uniqid();

    // Validate position
    $position = in_array($position, ['start', 'end', 'top', 'bottom'])
        ? $position
        : 'start';

    // Define size widths/heights
    $sizes = [
        'sm' => '20rem',    // 320px
        'md' => '25rem',    // 400px (default)
        'lg' => '37.5rem',  // 600px
        'xl' => '50rem',    // 800px
    ];

    // Get width/height based on size
    $sizeValue = $size && isset($sizes[$size]) ? $sizes[$size] : null;

    // Build classes
    $classes = Tabler::classes()
        ->add('offcanvas')
        ->add($responsive ? "offcanvas-{$responsive}" : '')
        ->add("offcanvas-{$position}");

    // Build inline styles for custom size
    $styleAttr = null;
    if ($sizeValue) {
        if (in_array($position, ['start', 'end'])) {
            $styleAttr = "width: {$sizeValue}";
        } elseif (in_array($position, ['top', 'bottom'])) {
            $styleAttr = "height: {$sizeValue}";
        }
    }

    // Build merge attributes
    $mergeAttrs = [
        'id' => $id,
        'tabindex' => '-1',
        'role' => 'dialog',
        'aria-hidden' => 'true',
        'data-bs-backdrop' => $backdrop ? 'true' : 'false',
        'data-bs-keyboard' => $keyboard ? 'true' : 'false',
        'data-bs-scroll' => $scroll ? 'true' : 'false',
    ];

    if ($styleAttr) {
        $mergeAttrs['style'] = $styleAttr;
    }
@endphp

<div {{ $attributes->class($classes)->merge($mergeAttrs) }}>
    {{ $slot }}
</div>
