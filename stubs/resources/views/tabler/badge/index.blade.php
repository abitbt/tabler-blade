@blaze

@php
    // Extract namespaced attributes BEFORE @props
    $iconTrailing ??= $attributes->pluck('icon:trailing');
    $iconLeading ??= $attributes->pluck('icon:leading');
@endphp

@props([
    // Variant system
    'variant' => 'default', // default|light|outline|pill

    // Color
    'color' => null, // blue|red|green|azure|indigo|purple|pink|orange|yellow|lime|teal|cyan|primary|secondary|success|warning|danger|info|dark|light

    // Size
    'size' => null, // sm|lg

    // Icons
    'icon' => null, // Leading icon
    'iconTrailing' => null, // Trailing icon
    'iconOnly' => false, // Icon-only mode

    // Position & Behavior
    'notification' => false, // Notification positioning (absolute top-right)
    'blink' => false, // Blinking animation
    'dot' => false, // Force dot badge

    // Addon
    'addon' => null, // Addon badge text
    'addonColor' => null, // Addon badge color

    // Element type
    'href' => null, // Renders as <a> if set
    'as' => 'span', // Element tag (span|div|etc)
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Merge icon attributes
    $iconLeading = $icon ?? $iconLeading;

    // Auto-detect icon-only from empty slot (Flux pattern)
    $iconOnly = $iconOnly || ($slot->isEmpty() && ($iconLeading || $iconTrailing));

    // Auto-detect dot badge (empty slot and no icons)
    $isDotBadge = $dot || ($slot->isEmpty() && !$iconLeading && !$iconTrailing);

    // Build CSS classes
    $classes = Tabler::classes()
        ->add('badge')
        // Color system - different patterns for different variants
        ->add(
            match (true) {
                $color && $variant === 'default' => "bg-{$color} text-{$color}-fg",
                $color && $variant === 'light' => "bg-{$color}-lt",
                $color && $variant === 'outline' => "badge-outline text-{$color}",
                $variant === 'outline' && !$color => 'badge-outline',
                default => '',
            },
        )
        // Variant modifiers
        ->add($variant === 'pill' ? 'badge-pill' : '')
        // Size
        ->add($size ? "badge-{$size}" : '')
        // Icon handling
        ->add($iconOnly ? 'badge-icononly' : '')
        // Dot badge
        ->add($isDotBadge ? 'badge-dot' : '')
        // Position & behavior
        ->add($notification ? 'badge-notification' : '')
        ->add($blink ? 'badge-blink' : '');

    $tag = $href ? 'a' : $as;
    $attributes = $attributes->class($classes);

    if ($href) {
        $attributes = $attributes->merge(['href' => $href]);
    }

    // Add aria-label for dot/empty badges for accessibility
    if ($isDotBadge && !$attributes->has('aria-label') && $notification) {
        $attributes = $attributes->merge(['aria-label' => 'Notification']);
    }
@endphp

<{{ $tag }} {{ $attributes }} data-tabler-badge>
    @if ($iconLeading && !$isDotBadge)
        <tabler:icon :name="$iconLeading" />
    @endif

    @if ($slot->isNotEmpty() && !$isDotBadge)
        {{ $slot }}
    @endif

    @if ($iconTrailing && !$isDotBadge)
        <tabler:icon :name="$iconTrailing" />
    @endif

    @if ($addon)
        <span class="badge-addon{{ $addonColor ? ' bg-' . $addonColor : '' }}">
            {{ $addon }}
        </span>
    @endif
    </{{ $tag }}>
