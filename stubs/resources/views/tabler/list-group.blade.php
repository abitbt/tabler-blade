{{--
    List Group Component

    Flexible component for displaying a series of content.

    @prop bool $flush - Remove borders and rounded corners
    @prop bool $numbered - Show numbered list

    @slot default - List group items

    Available CSS Classes (use via class="" attribute):

    List Group Styles:
    - list-group         - Base list group class (applied automatically)
    - list-group-flush   - Flush style (also via flush prop)
    - list-group-numbered - Numbered list (also via numbered prop)

    List Group Item:
    - list-group-item    - Individual list item
    - list-group-item-action - Interactive/clickable item
    - active             - Active/selected item
    - disabled           - Disabled item

    List Group Item Colors:
    - list-group-item-primary   - Primary background
    - list-group-item-secondary - Secondary background
    - list-group-item-success   - Success background (green)
    - list-group-item-danger    - Danger background (red)
    - list-group-item-warning   - Warning background (yellow)
    - list-group-item-info      - Info background (cyan)

    Usage Examples:

    Basic list group:
    <x-tabler::list-group>
        <li class="list-group-item">First item</li>
        <li class="list-group-item">Second item</li>
        <li class="list-group-item">Third item</li>
    </x-tabler::list-group>

    Flush list group:
    <x-tabler::list-group flush>
        <li class="list-group-item">Item 1</li>
        <li class="list-group-item">Item 2</li>
        <li class="list-group-item">Item 3</li>
    </x-tabler::list-group>

    Actionable list group:
    <x-tabler::list-group>
        <a href="#" class="list-group-item list-group-item-action active">
            Dashboard
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            Settings
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            Profile
        </a>
    </x-tabler::list-group>

    Numbered list group:
    <x-tabler::list-group numbered>
        <li class="list-group-item">First task</li>
        <li class="list-group-item">Second task</li>
        <li class="list-group-item">Third task</li>
    </x-tabler::list-group>

    Colored list items:
    <x-tabler::list-group>
        <li class="list-group-item list-group-item-success">Success item</li>
        <li class="list-group-item list-group-item-danger">Danger item</li>
        <li class="list-group-item list-group-item-warning">Warning item</li>
    </x-tabler::list-group>
--}}

@props([
    'flush' => false,
    'numbered' => false,
])

@php
    // Build list-group classes
    $classes = ['list-group'];

    // Flush variant
    if ($flush) {
        $classes[] = 'list-group-flush';
    }

    // Numbered variant
    if ($numbered) {
        $classes[] = 'list-group-numbered';
    }

    // Determine element type
    $element = $numbered ? 'ol' : 'ul';
@endphp

<{{ $element }} {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
    {{ $slot }}
    </{{ $element }}>
