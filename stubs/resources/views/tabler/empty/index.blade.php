@blaze

@props([
    'icon' => null,
    'illustration' => null,
    'header' => null,
    'title' => 'No results found',
    'subtitle' => 'Try adjusting your search or filter to find what you\'re looking for.',
    'bordered' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('empty')
        ->add($bordered ? 'empty-bordered' : '');

    // Determine which visual type to use (priority: header > illustration > icon)
    $hasVisual = $header || $illustration || $icon;
    $defaultIcon = $icon ?? 'mood-sad';
@endphp

<div {{ $attributes->class($classes) }}>
    {{-- Visual element (one of three types) --}}
    @if ($header)
        <div class="empty-header">{{ $header }}</div>
    @elseif ($illustration)
        <div class="empty-img">
            @if (is_string($illustration) && Str::startsWith($illustration, ['http://', 'https://', '/']))
                <img src="{{ $illustration }}" alt="{{ $title }}" />
            @else
                {{ $illustration }}
            @endif
        </div>
    @elseif ($hasVisual)
        <div class="empty-icon">
            <tabler:icon :name="$defaultIcon" />
        </div>
    @endif

    {{-- Content --}}
    <p class="empty-title">{{ $title }}</p>
    <p class="empty-subtitle text-secondary">{{ $subtitle }}</p>

    {{-- Action --}}
    @if ($slot->isNotEmpty())
        <div class="empty-action">
            {{ $slot }}
        </div>
    @endif
</div>
