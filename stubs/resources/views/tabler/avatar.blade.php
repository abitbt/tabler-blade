{{--
    Avatar Component

    User profile picture or placeholder with various sizes and styles.

    @prop string|null $src - Image source URL
    @prop string|null $alt - Alt text for image
    @prop string|null $size - Avatar size: 'sm', 'md' (default), 'lg', 'xl', 'xxl'
    @prop string|null $status - Status indicator: 'success', 'danger', 'warning', 'info', 'secondary'
    @prop string|null $shape - Avatar shape: 'rounded' (default), 'rounded-circle'
    @prop string|null $initials - Initials to display if no image (e.g., 'JD')
    @prop string|null $icon - Tabler icon name (without 'tabler-' prefix) if no image or initials
    @prop string|null $placeholder - Placeholder style if no content: 'icon' (default), 'initials'

    @slot default - Custom avatar content (overrides image/initials/icon)

    Available CSS Classes (use via class="" attribute):

    Avatar Sizes:
    - avatar-sm          - Small avatar (32px)
    - avatar-md          - Medium avatar (48px, default)
    - avatar-lg          - Large avatar (64px)
    - avatar-xl          - Extra large avatar (80px)
    - avatar-xxl         - XX Large avatar (128px)
    - avatar-2xl         - 2X Large (same as xxl)

    Avatar Shapes:
    - rounded            - Slightly rounded corners (default)
    - rounded-circle     - Perfect circle

    Status Indicators:
    - avatar-status      - Base status indicator class
    - bg-success         - Green status dot
    - bg-danger          - Red status dot
    - bg-warning         - Yellow status dot
    - bg-info            - Blue status dot
    - bg-secondary       - Gray status dot

    Placeholder Styles:
    - avatar-placeholder - Placeholder avatar (no image)

    Usage Examples:

    Avatar with image:
    <x-tabler::avatar src="https://example.com/avatar.jpg" alt="John Doe" />

    Avatar with initials:
    <x-tabler::avatar initials="JD" />

    Avatar with icon:
    <x-tabler::avatar icon="user" />

    Small avatar:
    <x-tabler::avatar src="/img/avatar.jpg" size="sm" />

    Large circular avatar:
    <x-tabler::avatar src="/img/avatar.jpg" size="lg" shape="rounded-circle" />

    Avatar with status indicator:
    <x-tabler::avatar src="/img/avatar.jpg" status="success" />

    Avatar with custom content:
    <x-tabler::avatar>
        <img src="/img/avatar.jpg" alt="User" />
    </x-tabler::avatar>
--}}

@props([
    'src' => null,
    'alt' => '',
    'size' => 'md',
    'status' => null,
    'shape' => 'rounded',
    'initials' => null,
    'icon' => null,
    'placeholder' => 'icon',
])

@php
    // Build avatar classes
    $classes = ['avatar'];

    // Size
    if ($size && $size !== 'md') {
        $classes[] = 'avatar-' . $size;
    }

    // Shape
    $classes[] = $shape;

    // Placeholder style
    if (!$src && !$slot->isNotEmpty()) {
        $classes[] = 'avatar-placeholder';
    }

    // Prepare icon component name
    $iconComponent = $icon ? 'tabler-' . $icon : 'tabler-user';
@endphp

<span {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
    @if ($slot->isNotEmpty())
        {{-- Custom content --}}
        {{ $slot }}
    @elseif($src)
        {{-- Image avatar --}}
        <img src="{{ $src }}" alt="{{ $alt }}" />
    @elseif($initials)
        {{-- Initials avatar --}}
        {{ strtoupper($initials) }}
    @else
        {{-- Icon placeholder --}}
        <x-dynamic-component :component="$iconComponent" class="icon" />
    @endif

    @if ($status)
        {{-- Status indicator --}}
        <span class="badge bg-{{ $status }}"></span>
    @endif
</span>
