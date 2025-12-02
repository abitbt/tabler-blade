@blaze

@props([
    // Content
    'src' => null,
    'alt' => null,
    'initials' => null,
    'icon' => null,

    // Styling
    'size' => 'md', // xs, sm, md, lg, xl
    'rounded' => null, // null (default), 'circle', 'square', 'pill', or number (0, 1, 2, 3)
    'color' => null, // bg-{color}-lt for initials/icons

    // Status
    'status' => null, // success, danger, warning, info, or any color
    'statusText' => null,
    'statusIcon' => null,

    // Link behavior
    'href' => null,
    'as' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Determine element type
    $element = $as ?? ($href ? 'a' : 'span');

    // Build size classes
    $sizeClass = match ($size) {
        'xs' => 'avatar-xs',
        'sm' => 'avatar-sm',
        'lg' => 'avatar-lg',
        'xl' => 'avatar-xl',
        default => '',
    };

    // Build rounded classes
    $roundedClass = match ($rounded) {
        'circle' => 'rounded-circle',
        'square', '0' => 'rounded-0',
        'pill' => 'rounded-pill',
        '1' => 'rounded-1',
        '2' => 'rounded-2',
        '3' => 'rounded-3',
        default => '', // Default Tabler avatar border-radius
    };

    // Build color classes
    $colorClass = $color ? "bg-{$color}-lt" : '';

    // Build classes
    $classes = Tabler::classes()->add('avatar')->add($sizeClass)->add($roundedClass)->add($colorClass);

    // Build status badge classes
    $statusClass = match ($status) {
        'success' => 'bg-success',
        'danger', 'offline' => 'bg-danger',
        'warning', 'busy' => 'bg-warning',
        'info', 'online' => 'bg-success',
        default => $status ? "bg-{$status}" : '',
    };

    // Determine content to display
    $hasImage = !empty($src);
    $hasInitials = !empty($initials);
    $hasIcon = !empty($icon);
    $hasContent = $slot->isNotEmpty();
@endphp

<{{ $element }} {{ $attributes->class($classes) }}
    @if ($hasImage) style="background-image: url({{ $src }})" @endif
    @if ($href) href="{{ $href }}" @endif
    @if ($alt) title="{{ $alt }}" @endif data-tabler-avatar>

    {{-- Status Badge --}}
    @if ($status || $statusText || $statusIcon)
        <span class="badge {{ $statusClass }}">
            @if ($statusText)
                {{ $statusText }}
            @elseif ($statusIcon)
                <tabler:icon :name="$statusIcon" class="avatar-status-icon" />
            @endif
        </span>
    @endif

    {{-- Content (initials, icon, or slot) --}}
    @if (!$hasImage)
        @if ($hasInitials)
            {{ strtoupper(substr($initials, 0, 2)) }}
        @elseif ($hasIcon)
            <tabler:icon :name="$icon" class="avatar-icon" />
        @elseif ($hasContent)
            {{ $slot }}
        @else
            <tabler:icon name="user" class="avatar-icon" />
        @endif
    @endif
    </{{ $element }}>
