@blaze

@props([
    'icon' => null,
    'iconColor' => null,
    'time' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Check if parent timeline is simple (passed via context)
    $isSimpleTimeline = $attributes->get('data-simple-parent', false);

    $iconClasses = Tabler::classes()
        ->add('timeline-event-icon')
        ->add($iconColor ? "bg-{$iconColor}" : '');
@endphp

<li {{ $attributes->except(['data-simple-parent'])->class('timeline-event') }}>
    @if ($icon && !$isSimpleTimeline)
        <div class="{{ $iconClasses }}">
            <tabler:icon :name="$icon" />
        </div>
    @endif

    <div class="card timeline-event-card">
        <div class="card-body">
            @if ($time)
                <div class="text-secondary float-end">{{ $time }}</div>
            @endif
            {{ $slot }}
        </div>
    </div>
</li>
