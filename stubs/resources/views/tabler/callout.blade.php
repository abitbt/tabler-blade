@blaze

@props([
    // UI elements
    'title' => null,
    'icon' => null,

    // Styling
    'variant' => 'info', // info, warning, danger, success
    'dismissible' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Build classes
    $classes = Tabler::classes()
        ->add('alert')
        ->add(
            match ($variant) {
                'success' => 'alert-success',
                'warning' => 'alert-warning',
                'danger' => 'alert-danger',
                'info' => 'alert-info',
                default => 'alert-info',
            },
        )
        ->add($dismissible ? 'alert-dismissible' : '');
@endphp

<div {{ $attributes->class($classes) }} role="alert" data-tabler-callout>
    @if ($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif

    @if ($icon || $title)
        <div class="d-flex">
            @if ($icon)
                <div>
                    <tabler:icon :name="$icon" class="alert-icon" />
                </div>
            @endif
            <div>
                @if ($title)
                    <h4 class="alert-title">{{ $title }}</h4>
                @endif
                <div class="text-secondary">
                    {{ $slot }}
                </div>
            </div>
        </div>
    @else
        {{ $slot }}
    @endif
</div>
