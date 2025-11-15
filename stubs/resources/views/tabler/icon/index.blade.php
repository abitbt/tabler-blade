@blaze

@php
    use Abitbt\TablerBlade\Icon;

    // Support both 'icon' and 'name' props for flexibility
    $iconName = $icon ?? ($name ?? null);
    $variant = $variant ?? 'outline';

    if (!$iconName) {
        throw new \InvalidArgumentException('Icon component requires either "icon" or "name" prop.');
    }

    // Build icon classes
    $classes = ['icon'];

    // Get existing class attribute
    if ($attributes->has('class')) {
        $classes[] = $attributes->get('class');
    }

    // Extract size variants
    $size = $attributes->pluck('size');
    if ($size) {
        $sizeClass = match ($size) {
            'xs' => 'icon-xs',
            'sm' => 'icon-sm',
            'md' => 'icon-md',
            'lg' => 'icon-lg',
            'xl' => 'icon-xl',
            default => '',
        };
        if ($sizeClass) {
            $classes[] = $sizeClass;
        }
    }

    // Merge class into attributes
    $attributes = $attributes->merge(['class' => implode(' ', $classes)]);

    // Get the SVG content using our Icon manager
    echo Icon::inline($iconName, $variant, $attributes->getAttributes());
@endphp
