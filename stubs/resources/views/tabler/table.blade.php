{{--
    Table Component

    A flexible table component for displaying tabular data with Tabler styling.

    @prop bool $responsive - Wrap table in responsive container (default: true)
    @prop bool $card - Add card table styling (requires table to be inside a card)
    @prop bool $vcenter - Vertically center cell content

    @slot default - Table content (thead, tbody, tfoot)

    Available CSS Classes (use via class="" attribute):

    Table Styles:
    - table              - Base table class (automatically added)
    - table-vcenter      - Vertically center cell content (also available via vcenter prop)
    - table-nowrap       - Prevent cell content from wrapping
    - table-striped      - Add zebra-striping to table rows
    - table-hover        - Add hover state to table rows
    - table-bordered     - Add borders on all sides of table and cells
    - table-borderless   - Remove all borders
    - table-sm           - Make table more compact with smaller cell padding

    Responsive Tables:
    - table-responsive   - Horizontal scrolling on all viewports (also via responsive prop)
    - table-responsive-sm - Horizontal scrolling below sm breakpoint
    - table-responsive-md - Horizontal scrolling below md breakpoint
    - table-responsive-lg - Horizontal scrolling below lg breakpoint
    - table-responsive-xl - Horizontal scrolling below xl breakpoint

    Card Integration:
    - card-table         - Style for tables inside cards (also available via card prop)

    Row Color Variants (apply to <tr>):
    - table-primary      - Primary color background
    - table-secondary    - Secondary color background
    - table-success      - Success color background
    - table-danger       - Danger color background
    - table-warning      - Warning color background
    - table-info         - Info color background
    - table-light        - Light color background
    - table-dark         - Dark color background
    - table-active       - Active state background

    Table Mobile (Responsive):
    - table-mobile-sm    - Stack table on sm breakpoint and below
    - table-mobile-md    - Stack table on md breakpoint and below
    - table-mobile-lg    - Stack table on lg breakpoint and below

    Interactive Tables:
    - table-selectable   - Add selection functionality to rows

    Sticky Elements:
    - sticky-top         - Make thead sticky to top (apply to <thead>)

    Column Widths:
    - w-1                - Minimal column width (auto-size to content)
    - w-auto             - Auto column width
    - w-{percentage}     - Set column width (e.g., w-50, w-25)

    Text Utilities (for cells):
    - text-secondary     - Secondary text color
    - text-muted         - Muted text color
    - text-reset         - Reset link color to inherit
    - text-nowrap        - Prevent text wrapping
    - text-end           - Right-align text
    - text-center        - Center-align text
    - fw-bold            - Bold font weight

    Usage Examples (use the code below in your Blade views):

    Basic responsive table with vertical centering:
    - Use vcenter prop for vertical cell alignment
    - Use responsive prop (default true) for horizontal scrolling

    Striped table: Add class="table-striped"
    Small table: Add class="table-sm"
    Hover effect: Add class="table-hover"
    Nowrap: Add class="table-nowrap"
    Borderless: Add class="table-borderless"

    Card table (inside card): Use card prop
    Non-responsive: Set :responsive="false"

    Row colors: Add table-{color} class to <tr> tags
    (table-primary, table-success, table-danger, table-warning, table-info, etc.)

    Sticky header: Add class="sticky-top" to <thead>
    Minimal column width: Add class="w-1" to <th> or <td>
--}}

@props([
    'responsive' => true,
    'card' => false,
    'vcenter' => false,
])

@php
    // Build table classes
    $tableClasses = ['table'];

    // Vertical centering
    if ($vcenter) {
        $tableClasses[] = 'table-vcenter';
    }

    // Card table styling
    if ($card) {
        $tableClasses[] = 'card-table';
    }
@endphp

@if ($responsive)
    <div class="table-responsive">
        <table {{ $attributes->merge(['class' => implode(' ', $tableClasses)]) }}>
            {{ $slot }}
        </table>
    </div>
@else
    <table {{ $attributes->merge(['class' => implode(' ', $tableClasses)]) }}>
        {{ $slot }}
    </table>
@endif
