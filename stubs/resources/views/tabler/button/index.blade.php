@blaze

@php
    // Extract namespaced attributes BEFORE @props
    $iconTrailing ??= $attributes->pluck('icon:trailing');
    $iconLeading ??= $attributes->pluck('icon:leading');
@endphp

@props([
    // Variant system
    'variant' => null, // primary|secondary|success|warning|danger|info|dark|light
    'outline' => false, // Outline style
    'ghost' => false, // Ghost/transparent style

    // Size
    'size' => null, // xs|sm|lg|xl

    // Shape
    'pill' => false, // Rounded pill
    'square' => null, // Auto-detect from empty slot

    // Icons
    'icon' => null, // Leading icon
    'iconTrailing' => null, // Trailing icon
    'iconOnly' => false, // Icon-only mode

    // Loading
    'loading' => null, // Auto-detect from wire:click

    // Element type
    'href' => null, // Renders as <a> if set
    'type' => 'button', // button|submit|reset

    // Tabler-specific
    'social' => null, // facebook|twitter|github|instagram|etc
    'animate' => null, // rotate|shake|pulse|tada|move-start
    'action' => false, // Action button style
    'link' => false, // Link button style

    // Layout
    'fullWidth' => false, // w-100
    'block' => false, // Alias for fullWidth

    // State
    'disabled' => false, // Disabled state
    'current' => null, // Current state for navigation

    // Advanced
    'kbd' => null, // Keyboard shortcut display
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Merge icon attributes
    $iconLeading = $icon ?? $iconLeading;

    // Auto-detect square from empty slot (Flux pattern)
    $square ??= $slot->isEmpty();

    // Auto-detect loading from Livewire (Flux pattern)
    $isTypeSubmitAndNotDisabledOnRender = $type === 'submit' && !$attributes->has('disabled');
    $isJsMethod = str_starts_with($attributes->whereStartsWith('wire:click')->first() ?? '', '$js.');
    $loading ??=
        $loading ??
        $isTypeSubmitAndNotDisabledOnRender ||
            ($attributes->whereStartsWith('wire:click')->isNotEmpty() && !$isJsMethod);

    if ($loading && $type !== 'submit' && !$isJsMethod) {
        $attributes = $attributes->merge(['wire:loading.attr' => 'data-loading']);

        // Add wire:target for scoped loading indicators
        if (!$attributes->has('wire:target') && ($target = $attributes->whereStartsWith('wire:click')->first())) {
            $attributes = $attributes->merge(['wire:target' => $target], escape: false);
        }
    }

    // Build CSS classes
    $classes = Tabler::classes()
        ->add('btn')
        // Variant handling
        ->add(
            match (true) {
                $action => 'btn-action',
                $link => 'btn-link',
                (bool) $social => "btn-{$social}",
                (bool) $variant && $outline => "btn-outline-{$variant}",
                (bool) $variant && $ghost => "btn-ghost-{$variant}",
                (bool) $variant => "btn-{$variant}",
                default => '',
            },
        )
        // Size
        ->add($size ? "btn-{$size}" : '')
        // Shape
        ->add($pill ? 'btn-pill' : '')
        ->add($square ? 'btn-square' : '')
        // Icon handling
        ->add($iconOnly ? 'btn-icon' : '')
        // State
        ->add($loading ? 'btn-loading' : '')
        ->add($disabled ? 'disabled' : '')
        // Layout
        ->add($fullWidth || $block ? 'w-100' : '')
        // Animation
        ->add($animate ? 'btn-animate-icon' : '')
        ->add($animate && $animate !== true ? "btn-animate-icon-{$animate}" : '')
        // Loading state visibility
        ->add(
            $loading
                ? [
                    '*:transition-opacity',
                    $type === 'submit'
                        ? '[&[disabled]>:not([data-loading-indicator])]:opacity-0'
                        : '[&[data-loading]>:not([data-loading-indicator])]:opacity-0',
                    $type === 'submit'
                        ? '[&[disabled]>[data-loading-indicator]]:opacity-100'
                        : '[&[data-loading]>[data-loading-indicator]]:opacity-100',
                    $type === 'submit' ? '[&[disabled]]:pointer-events-none' : 'data-loading:pointer-events-none',
                ]
                : [],
        );

    $attributes = $attributes->class($classes);

    // Add aria-label for icon-only buttons
    if ($iconOnly && !$attributes->has('aria-label')) {
        $attributes = $attributes->merge(['aria-label' => 'Button']);
    }
@endphp

<tabler:button.base :href="$href" :type="$type" :disabled="$disabled" :current="$current"
    :attributes="$attributes" data-tabler-button>
    @if ($loading)
        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
            data-loading-indicator></span>
    @endif

    @if ($iconLeading && !$iconOnly)
        <tabler:icon :name="$iconLeading" />
    @endif

    @if ($iconOnly && $iconLeading)
        <tabler:icon :name="$iconLeading" />
    @elseif($slot->isNotEmpty())
        <span>{{ $slot }}</span>
    @endif

    @if ($iconTrailing)
        <tabler:icon :name="$iconTrailing" class="icon-end" />
    @endif

    @if ($kbd)
        <kbd class="ms-2 text-xs">{{ $kbd }}</kbd>
    @endif
</tabler:button.base>
