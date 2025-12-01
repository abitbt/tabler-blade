@blaze

@props([
    'count' => 3,
    'active' => 1,
    'color' => 'primary',
    'labels' => [],
])

@php
    use Abitbt\TablerBlade\Tabler;

    $count = max((int) $count, 1);
    $active = max((int) $active, 0);

    // If labels provided, use labels count
    if (!empty($labels) && is_array($labels)) {
        $count = count($labels);
    }

    $classes = Tabler::classes()->add('progress-steps');
@endphp

<ol {{ $attributes->class($classes) }} aria-label="Progress">
    @for ($i = 1; $i <= $count; $i++)
        @php
            $label = !empty($labels) ? $labels[$i - 1] ?? "Step {$i}" : "Step {$i}";
            $isActive = $i <= $active;
            $isCurrent = $i === $active;
        @endphp
        <li class="progress-steps-item{{ $isActive ? ' bg-' . $color : '' }}"
            @if ($isCurrent) aria-current="step" @endif>
            <span class="visually-hidden">
                {{ $label }}{{ $isCurrent ? ' (current)' : '' }}
            </span>
        </li>
    @endfor
</ol>
