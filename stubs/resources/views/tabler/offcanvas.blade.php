{{--
    Offcanvas Component

    A sidebar panel that slides in from the edge of the viewport.
    Can be toggled via data attributes and appears from start, end, top, or bottom.

    @prop string $id - Unique ID for the offcanvas (required for Bootstrap toggle)
    @prop string|null $title - Offcanvas title text
    @prop string $placement - Position: 'start', 'end', 'top', 'bottom' (default: 'start')
    @prop bool $backdrop - Show backdrop overlay (default: true)
    @prop bool $scroll - Allow body scrolling when offcanvas is open (default: false)

    @slot default - Main offcanvas content
    @slot:title - Custom title markup (alternative to $title prop)
    @slot:header - Custom header content (replaces entire header)
    @slot:footer - Optional footer content

    Available CSS Classes (use via class="" attribute):

    Placement:
    - offcanvas-start        - Slide from left (default)
    - offcanvas-end          - Slide from right
    - offcanvas-top          - Slide from top
    - offcanvas-bottom       - Slide from bottom

    Size Modifiers (for start/end placements):
    - offcanvas-sm           - Small offcanvas (320px)
    - offcanvas-md           - Medium offcanvas (400px)
    - offcanvas-lg           - Large offcanvas (500px)
    - offcanvas-xl           - Extra large offcanvas (800px)
    - w-100, w-75, w-50      - Custom width percentages

    Height Modifiers (for top/bottom placements):
    - h-auto                 - Auto height (content-based)
    - h-25, h-50, h-75       - Height percentages
    - vh-100                 - Full viewport height

    State Classes:
    - show                   - Display the offcanvas (handled by Bootstrap JS)
    - showing                - Animation state (handled by Bootstrap JS)
    - hiding                 - Animation state (handled by Bootstrap JS)

    Header/Body/Footer Styles:
    - offcanvas-header       - Offcanvas header container
    - offcanvas-title        - Title text styling
    - offcanvas-body         - Main content area
    - offcanvas-footer       - Footer area (not standard, but supported)

    Background Colors:
    - bg-white, bg-light, bg-dark, bg-primary, bg-secondary
    - bg-{color}-lt (light variants)

    Text Colors:
    - text-white, text-dark, text-muted
    - Use with dark backgrounds for proper contrast

    Bootstrap Data Attributes (for trigger buttons):
    - data-bs-toggle="offcanvas"
    - data-bs-target="#offcanvasId"
    - data-bs-backdrop="true|false|static"
    - data-bs-scroll="true|false"
    - data-bs-dismiss="offcanvas"

    Usage Examples:

    Basic offcanvas (left side):
    <x-tabler::offcanvas id="myOffcanvas" title="Menu">
        <p>Offcanvas content here</p>
    </x-tabler::offcanvas>

    <!-- Trigger button -->
    <button data-bs-toggle="offcanvas" data-bs-target="#myOffcanvas">
        Open Menu
    </button>

    Right-side offcanvas:
    <x-tabler::offcanvas id="rightPanel" title="Settings" placement="end">
        <p>Settings panel content</p>
    </x-tabler::offcanvas>

    Top offcanvas (notification banner):
    <x-tabler::offcanvas id="notification" placement="top" class="h-auto">
        <p>This is a notification banner</p>
    </x-tabler::offcanvas>

    Bottom offcanvas (cookie banner):
    <x-tabler::offcanvas id="cookies" placement="bottom" class="h-auto">
        <div class="container">
            <strong>Do you like cookies?</strong> 🍪
            <button class="btn btn-primary" data-bs-dismiss="offcanvas">
                Accept
            </button>
        </div>
    </x-tabler::offcanvas>

    Without backdrop:
    <x-tabler::offcanvas id="noBackdrop" title="Panel" :backdrop="false">
        Content here
    </x-tabler::offcanvas>

    Allow scrolling:
    <x-tabler::offcanvas id="scrollable" title="Panel" :scroll="true">
        Long content that allows body scrolling
    </x-tabler::offcanvas>

    With custom header and footer:
    <x-tabler::offcanvas id="custom">
        <x-slot:header>
            <div class="offcanvas-header bg-primary text-white">
                <h5 class="offcanvas-title">Custom Header</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
            </div>
        </x-slot:header>

        Main content here

        <x-slot:footer>
            <div class="offcanvas-footer border-top p-3">
                <button class="btn btn-primary">Save</button>
                <button class="btn" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </x-slot:footer>
    </x-tabler::offcanvas>

    Large offcanvas:
    <x-tabler::offcanvas id="large" title="Large Panel" placement="end" class="offcanvas-lg">
        Wide content area
    </x-tabler::offcanvas>

    Full height with scrollable body:
    <x-tabler::offcanvas id="fullHeight" title="Full Height" placement="end">
        <div style="height: 2000px;">
            Tall content that scrolls
        </div>
    </x-tabler::offcanvas>
--}}

@props(['id', 'title' => null, 'placement' => 'start', 'backdrop' => true, 'scroll' => false])

@php
    // Build offcanvas classes
    $classes = ['offcanvas', 'offcanvas-' . $placement];
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $classes)]) }} tabindex="-1" id="{{ $id }}"
    aria-labelledby="{{ $id }}Label" @if (!$backdrop) data-bs-backdrop="false" @endif
    @if ($scroll) data-bs-scroll="true" @endif>
    {{-- Header --}}
    @if (isset($header))
        {{ $header }}
    @else
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="{{ $id }}Label">
                {{ $title }}
            </h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
    @endif

    {{-- Body --}}
    <div class="offcanvas-body">
        {{ $slot }}
    </div>

    {{-- Footer (optional) --}}
    @isset($footer)
        {{ $footer }}
    @endisset
</div>
