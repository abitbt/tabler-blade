@blaze

@php
    // Extract namespaced attributes BEFORE @props
    $alertTitle ??= $attributes->pluck('alert:title');
    $alertIcon ??= $attributes->pluck('alert:icon');
@endphp

@props([
    // Type
    'type' => 'info', // info|success|warning|danger|primary|secondary|light|dark or any Tabler color

    // Structure
    'title' => null, // Alert title/heading
    'icon' => null, // Icon name to display
    'dismissible' => false, // Show close button
    'important' => false, // Important style (filled background)

    // HTML element
    'as' => 'div',
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Merge namespaced attributes
    $title = $title ?? $alertTitle;
    $iconName = $icon ?? $alertIcon;

    // Auto-select default icon based on type if no icon specified
    if (!$iconName && !isset($attributes['alert:icon'])) {
        $iconName = match ($type) {
            'success' => 'check',
            'warning' => 'alert-triangle',
            'danger' => 'alert-circle',
            'info' => 'info-circle',
            default => null,
        };
    }

    // Build CSS classes
    $classes = Tabler::classes()
        ->add('alert')
        ->add("alert-{$type}")
        ->add($important ? 'alert-important' : '')
        ->add($dismissible ? 'alert-dismissible' : '');

    $attributes = $attributes->class($classes);
    $attributes = $attributes->merge(['role' => 'alert']);

    // Determine if we have complex content (title + description)
    $hasTitle = !empty($title);
    $hasIcon = !empty($iconName);
@endphp

<{{ $as }} {{ $attributes }} data-tabler-alert>
    @if ($hasIcon)
        <div class="alert-icon">
            <tabler:icon :name="$iconName" class="alert-icon" />
        </div>
    @endif

    @if ($hasTitle)
        <div>
            <h4 class="alert-heading">{{ $title }}</h4>
            @if ($slot->isNotEmpty())
                <div class="alert-description">
                    {{ $slot }}
                </div>
            @endif
        </div>
    @else
        {{ $slot }}
    @endif

    @if ($dismissible)
        <a class="btn-close{{ $important ? ' btn-close-white' : '' }}" data-bs-dismiss="alert" aria-label="close"></a>
    @endif
    </{{ $as }}>
