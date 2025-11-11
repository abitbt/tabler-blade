{{--
    Ribbon Component

    Decorative ribbon banner for highlighting content, features, or status.

    @prop string $position - Ribbon position: 'top' (default), 'bottom', 'start', 'end', 'bookmark'
    @prop string|null $color - Ribbon color: 'primary', 'success', 'danger', 'warning', 'info', etc.

    @slot default - Ribbon text content

    Available CSS Classes (use via class="" attribute):

    Ribbon Colors:
    - ribbon-primary     - Primary color (blue)
    - ribbon-success     - Success color (green)
    - ribbon-danger      - Danger color (red)
    - ribbon-warning     - Warning color (yellow)
    - ribbon-info        - Info color (cyan)
    - ribbon-{color}     - Any Tabler color

    Ribbon Positions:
    - ribbon-top         - Top corner (default)
    - ribbon-bottom      - Bottom corner
    - ribbon-start       - Left side
    - ribbon-end         - Right side
    - ribbon-bookmark    - Bookmark style (top)

    Usage Examples:

    Basic ribbon:
    <x-tabler::cards.card>
        <x-tabler::ribbon>New</x-tabler::ribbon>
        <x-tabler::cards.body>Card with ribbon</x-tabler::cards.body>
    </x-tabler::cards.card>

    Colored ribbon:
    <x-tabler::cards.card>
        <x-tabler::ribbon color="danger">Sale</x-tabler::ribbon>
        <x-tabler::cards.body>Product card</x-tabler::cards.body>
    </x-tabler::cards.card>

    Bottom ribbon:
    <x-tabler::cards.card>
        <x-tabler::ribbon position="bottom" color="success">Featured</x-tabler::ribbon>
        <x-tabler::cards.body>Featured content</x-tabler::cards.body>
    </x-tabler::cards.card>

    Bookmark ribbon:
    <x-tabler::cards.card>
        <x-tabler::ribbon position="bookmark" color="primary">Premium</x-tabler::ribbon>
        <x-tabler::cards.body>Premium content</x-tabler::cards.body>
    </x-tabler::cards.card>
--}}

@props([
    'position' => 'top',
    'color' => null,
])

@php
    // Build ribbon classes
    $classes = ['ribbon'];

    // Position
    $classes[] = 'ribbon-' . $position;

    // Color
    if ($color) {
        $classes[] = 'ribbon-' . $color;
    }
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
    {{ $slot }}
</div>
