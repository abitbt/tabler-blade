@blaze

@php
    // Extract icon attribute before props
    $icon ??= $attributes->pluck('icon');
@endphp

@props([
    'tag' => 'div',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()->add('accordion-heading-content');
@endphp

<{{ $tag }} {{ $attributes->class($classes) }}>
    @if ($icon)
        <div class="accordion-button-icon">
            <tabler:icon :name="$icon" />
        </div>
    @endif

    {{ $slot }}
    </{{ $tag }}>
