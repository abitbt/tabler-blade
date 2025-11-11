{{--
    Pagination Component

    Navigation for paginated content. Supports Laravel's pagination object
    or manual page configuration.

    @prop object|null $paginator - Laravel paginator object (optional)
    @prop int|null $currentPage - Current page number (if not using paginator)
    @prop int|null $totalPages - Total number of pages (if not using paginator)
    @prop string|null $size - Pagination size: 'sm', 'lg'
    @prop bool $simple - Use simple pagination (Previous/Next only)
    @prop bool $firstLast - Show first/last page links
    @prop bool $textButtons - Use text labels instead of icons
    @prop int|null $onEachSide - Number of pages to show on each side of current page (default: 3, use for large page counts)
    @prop string|null $prevTitle - Custom title for previous button (with subtitle)
    @prop string|null $nextTitle - Custom title for next button (with subtitle)

    @slot default - Custom pagination links (overrides automatic rendering)

    Available CSS Classes (use via class="" attribute):

    Pagination Styles:
    - pagination-outline  - Outlined style with borders
    - pagination-circle   - Circular/pill-shaped buttons

    Pagination Sizes:
    - pagination-sm      - Small pagination
    - pagination-lg      - Large pagination

    Pagination Item States:
    - active             - Current/active page
    - disabled           - Disabled link

    Usage Examples:

    With Laravel paginator:
    <x-tabler::pagination :paginator="$users" />

    Manual pagination:
    <x-tabler::pagination :currentPage="3" :totalPages="10" />

    Small pagination:
    <x-tabler::pagination :paginator="$users" size="sm" />

    Large pagination:
    <x-tabler::pagination :paginator="$users" size="lg" />

    Simple pagination (Prev/Next only):
    <x-tabler::pagination :paginator="$users" simple />

    With first/last links:
    <x-tabler::pagination :currentPage="5" :totalPages="20" firstLast />

    Text buttons instead of icons:
    <x-tabler::pagination :currentPage="3" :totalPages="10" textButtons />

    Outline style:
    <x-tabler::pagination :paginator="$users" class="pagination-outline" />

    Circle/pill style:
    <x-tabler::pagination :paginator="$users" class="pagination-circle" />

    Circle + outline combined:
    <x-tabler::pagination :paginator="$users" class="pagination-circle pagination-outline" />

    Large page count with ellipsis:
    <x-tabler::pagination :currentPage="10" :totalPages="50" :onEachSide="2" />

    With descriptive titles (for documentation navigation):
    <x-tabler::pagination :currentPage="2" :totalPages="5" prevTitle="Getting Started" nextTitle="Components" />

    Custom pagination:
    <x-tabler::pagination>
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </x-tabler::pagination>

    Centered pagination:
    <x-tabler::pagination :paginator="$users" class="justify-content-center" />

    Right-aligned pagination:
    <x-tabler::pagination :paginator="$users" class="justify-content-end" />
--}}

@props([
    'paginator' => null,
    'currentPage' => null,
    'totalPages' => null,
    'size' => null,
    'simple' => false,
    'firstLast' => false,
    'textButtons' => false,
    'onEachSide' => 3,
    'prevTitle' => null,
    'nextTitle' => null,
])

@php
    // Build pagination classes
    $classes = ['pagination'];

    // Size modifier
    if ($size) {
        $classes[] = 'pagination-' . $size;
    }

    // Determine pagination data
    $current = $paginator ? $paginator->currentPage() : $currentPage;
    $total = $paginator ? $paginator->lastPage() : $totalPages;
    $hasPages = $total > 1;

    // Build page range with ellipsis for large page counts
    $pageRange = [];
    if ($total && !$simple) {
        if ($total <= $onEachSide * 2 + 3) {
            // Show all pages if total is small
            $pageRange = range(1, $total);
        } else {
            // Show pages with ellipsis
            $start = max(1, $current - $onEachSide);
            $end = min($total, $current + $onEachSide);

            // Adjust range if we're near the start or end
        if ($current <= $onEachSide + 1) {
            $end = min($total, $onEachSide * 2 + 1);
        }
        if ($current >= $total - $onEachSide) {
            $start = max(1, $total - $onEachSide * 2);
        }

        $pageRange = [
            'showStartEllipsis' => $start > 2,
            'showEndEllipsis' => $end < $total - 1,
            'start' => $start,
            'end' => $end,
            ];
        }
    }

    // Check if using descriptive titles
    $hasDescriptiveTitles = $prevTitle || $nextTitle;
@endphp

@if ($slot->isNotEmpty())
    {{-- Custom pagination links provided --}}
    <ul {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
        {{ $slot }}
    </ul>
@elseif($hasPages)
    <ul {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
        {{-- First Page Link --}}
        @if ($firstLast)
            @if ($paginator)
                <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link{{ $textButtons ? ' page-text' : '' }}" href="{{ $paginator->url(1) }}"
                        aria-label="First">
                        @if ($textButtons)
                            First
                        @else
                            <x-tabler-chevrons-left class="icon" />
                        @endif
                    </a>
                </li>
            @else
                <li class="page-item {{ $current <= 1 ? 'disabled' : '' }}">
                    <a class="page-link{{ $textButtons ? ' page-text' : '' }}" href="#" aria-label="First">
                        @if ($textButtons)
                            First
                        @else
                            <x-tabler-chevrons-left class="icon" />
                        @endif
                    </a>
                </li>
            @endif
        @endif

        {{-- Previous Page Link --}}
        @if ($paginator)
            <li
                class="page-item{{ $paginator->onFirstPage() ? ' disabled' : '' }}{{ $hasDescriptiveTitles ? ' page-prev' : '' }}">
                <a class="page-link{{ $textButtons ? ' page-text' : '' }}" href="{{ $paginator->previousPageUrl() }}"
                    rel="prev" aria-label="Previous">
                    @if ($prevTitle)
                        <div class="page-item-subtitle">previous</div>
                        <div class="page-item-title">{{ $prevTitle }}</div>
                    @else
                        @if ($textButtons)
                            Previous
                        @else
                            <x-tabler-chevron-left class="icon" />
                            prev
                        @endif
                    @endif
                </a>
            </li>
        @else
            <li
                class="page-item{{ $current <= 1 ? ' disabled' : '' }}{{ $hasDescriptiveTitles ? ' page-prev' : '' }}">
                <a class="page-link{{ $textButtons ? ' page-text' : '' }}" href="#" aria-label="Previous">
                    @if ($prevTitle)
                        <div class="page-item-subtitle">previous</div>
                        <div class="page-item-title">{{ $prevTitle }}</div>
                    @else
                        @if ($textButtons)
                            Previous
                        @else
                            <x-tabler-chevron-left class="icon" />
                            prev
                        @endif
                    @endif
                </a>
            </li>
        @endif

        @if (!$simple && !$hasDescriptiveTitles)
            {{-- Pagination Page Numbers --}}
            @if ($paginator)
                @if (is_array($pageRange) && isset($pageRange['showStartEllipsis']))
                    {{-- Show page 1 if not in range --}}
                    @if ($pageRange['showStartEllipsis'])
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
                        </li>
                        <li class="page-item disabled">
                            <span class="page-link">&hellip;</span>
                        </li>
                    @endif

                    {{-- Show pages in range --}}
                    @for ($page = $pageRange['start']; $page <= $pageRange['end']; $page++)
                        <li class="page-item {{ $page == $current ? 'active' : '' }}">
                            <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor

                    {{-- Show last page if not in range --}}
                    @if ($pageRange['showEndEllipsis'])
                        <li class="page-item disabled">
                            <span class="page-link">&hellip;</span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->url($total) }}">{{ $total }}</a>
                        </li>
                    @endif
                @else
                    {{-- Show all pages --}}
                    @foreach ($pageRange as $page)
                        <li class="page-item {{ $page == $current ? 'active' : '' }}">
                            <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
                        </li>
                    @endforeach
                @endif
            @else
                {{-- Manual pagination --}}
                @if (is_array($pageRange) && isset($pageRange['showStartEllipsis']))
                    {{-- Show page 1 if not in range --}}
                    @if ($pageRange['showStartEllipsis'])
                        <li class="page-item {{ 1 == $current ? 'active' : '' }}">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item disabled">
                            <span class="page-link">&hellip;</span>
                        </li>
                    @endif

                    {{-- Show pages in range --}}
                    @for ($page = $pageRange['start']; $page <= $pageRange['end']; $page++)
                        <li class="page-item {{ $page == $current ? 'active' : '' }}">
                            <a class="page-link" href="#">{{ $page }}</a>
                        </li>
                    @endfor

                    {{-- Show last page if not in range --}}
                    @if ($pageRange['showEndEllipsis'])
                        <li class="page-item disabled">
                            <span class="page-link">&hellip;</span>
                        </li>
                        <li class="page-item {{ $total == $current ? 'active' : '' }}">
                            <a class="page-link" href="#">{{ $total }}</a>
                        </li>
                    @endif
                @else
                    {{-- Show all pages --}}
                    @foreach ($pageRange as $page)
                        <li class="page-item {{ $page == $current ? 'active' : '' }}">
                            <a class="page-link" href="#">{{ $page }}</a>
                        </li>
                    @endforeach
                @endif
            @endif
        @endif

        {{-- Next Page Link --}}
        @if ($paginator)
            <li
                class="page-item{{ !$paginator->hasMorePages() ? ' disabled' : '' }}{{ $hasDescriptiveTitles ? ' page-next' : '' }}">
                <a class="page-link{{ $textButtons ? ' page-text' : '' }}" href="{{ $paginator->nextPageUrl() }}"
                    rel="next" aria-label="Next">
                    @if ($nextTitle)
                        <div class="page-item-subtitle">next</div>
                        <div class="page-item-title">{{ $nextTitle }}</div>
                    @else
                        @if ($textButtons)
                            Next
                        @else
                            next
                            <x-tabler-chevron-right class="icon" />
                        @endif
                    @endif
                </a>
            </li>
        @else
            <li
                class="page-item{{ $current >= $total ? ' disabled' : '' }}{{ $hasDescriptiveTitles ? ' page-next' : '' }}">
                <a class="page-link{{ $textButtons ? ' page-text' : '' }}" href="#" aria-label="Next">
                    @if ($nextTitle)
                        <div class="page-item-subtitle">next</div>
                        <div class="page-item-title">{{ $nextTitle }}</div>
                    @else
                        @if ($textButtons)
                            Next
                        @else
                            next
                            <x-tabler-chevron-right class="icon" />
                        @endif
                    @endif
                </a>
            </li>
        @endif

        {{-- Last Page Link --}}
        @if ($firstLast)
            @if ($paginator)
                <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link{{ $textButtons ? ' page-text' : '' }}" href="{{ $paginator->url($total) }}"
                        aria-label="Last">
                        @if ($textButtons)
                            Last
                        @else
                            <x-tabler-chevrons-right class="icon" />
                        @endif
                    </a>
                </li>
            @else
                <li class="page-item {{ $current >= $total ? 'disabled' : '' }}">
                    <a class="page-link{{ $textButtons ? ' page-text' : '' }}" href="#" aria-label="Last">
                        @if ($textButtons)
                            Last
                        @else
                            <x-tabler-chevrons-right class="icon" />
                        @endif
                    </a>
                </li>
            @endif
        @endif
    </ul>
@endif
