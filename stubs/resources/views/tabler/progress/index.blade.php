@blaze

@props([
    'value' => 0,
    'max' => 100,
    'color' => null,
    'size' => null,
    'showValue' => false,
    'indeterminate' => false,
    'striped' => false,
    'animated' => false,
    'native' => false,
    'values' => null,
    'separated' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Clamp value between 0 and max
    $percentage = min(max((float) $value, 0), (float) $max);
    $percentageDisplay = $max > 0 ? round(($percentage / $max) * 100) : 0;

    // Build container classes
    $classes = Tabler::classes()
        ->add('progress')
        ->add(
            match ($size) {
                'sm' => 'progress-sm',
                'lg' => 'progress-lg',
                'xl' => 'progress-xl',
                default => '',
            },
        )
        ->add($separated ? 'progress-separated' : '');
@endphp

@if ($native)
    {{-- Native HTML5 progress element --}}
    <progress {{ $attributes->class($classes) }} value="{{ $percentage }}" max="{{ $max }}"></progress>
@elseif($values && is_array($values))
    {{-- Multiple progress bars --}}
    <div {{ $attributes->class($classes) }}>
        @foreach ($values as $index => $bar)
            @php
                $barValue = is_array($bar) ? $bar['value'] ?? 0 : $bar;
                $barColor = is_array($bar) ? $bar['color'] ?? null : null;
                $barPercentage = min(max((float) $barValue, 0), 100);
            @endphp
            <div class="progress-bar{{ $barColor ? ' bg-' . $barColor : '' }}" style="width: {{ $barPercentage }}%"
                role="progressbar" aria-valuenow="{{ $barPercentage }}" aria-valuemin="0" aria-valuemax="100"
                aria-label="{{ $barPercentage }}% Complete">
                <span class="visually-hidden">{{ $barPercentage }}% Complete</span>
            </div>
        @endforeach
    </div>
@elseif($indeterminate)
    {{-- Indeterminate progress (loading state) --}}
    <div {{ $attributes->class($classes) }}>
        <div class="progress-bar progress-bar-indeterminate{{ $color ? ' bg-' . $color : '' }}" role="progressbar"
            aria-label="Loading" aria-valuetext="Loading">
        </div>
    </div>
@else
    {{-- Single progress bar --}}
    <div {{ $attributes->class($classes) }}>
        <div class="progress-bar{{ $color ? ' bg-' . $color : '' }}{{ $striped ? ' progress-bar-striped' : '' }}{{ $animated && $striped ? ' progress-bar-animated' : '' }}"
            style="width: {{ $percentageDisplay }}%" role="progressbar" aria-valuenow="{{ $percentageDisplay }}"
            aria-valuemin="0" aria-valuemax="100" aria-label="{{ $percentageDisplay }}% Complete">
            @if ($showValue)
                {{ $percentageDisplay }}%
            @else
                <span class="visually-hidden">{{ $percentageDisplay }}% Complete</span>
            @endif
        </div>
    </div>
@endif
