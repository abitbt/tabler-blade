@blaze

@props([
    // Data source - can be a Laravel paginator or manual configuration
    'paginator' => null,

    // Manual configuration (used if paginator not provided)
    'currentPage' => 1,
    'lastPage' => 1,
    'total' => 0,
    'perPage' => 15,
    'onEachSide' => 3, // Number of pages to show on each side of current page

    // URL configuration
    'url' => null, // Base URL for pagination links
    'queryString' => [], // Additional query parameters

    // UI Options
    'showFirstLast' => false, // Show first/last page links
    'showText' => false, // Use text labels instead of icons
    'showNumbers' => true, // Show page numbers
    'alignment' => 'start', // start, center, end

    // Style variants
    'variant' => null, // outline, circle
    'size' => null, // sm, lg

    // Labels
    'previousLabel' => 'Previous',
    'nextLabel' => 'Next',
    'firstLabel' => 'First',
    'lastLabel' => 'Last',

    // Icons (used when showText is false)
    'previousIcon' => 'chevron-left',
    'nextIcon' => 'chevron-right',
    'firstIcon' => 'chevrons-left',
    'lastIcon' => 'chevrons-right',
])

@php
    use Abitbt\TablerBlade\Tabler;
    use Illuminate\Pagination\LengthAwarePaginator;

    // If paginator is provided, extract data from it
    if ($paginator instanceof LengthAwarePaginator) {
        $currentPage = $paginator->currentPage();
        $lastPage = $paginator->lastPage();
        $total = $paginator->total();
        $perPage = $paginator->perPage();
        $url = $paginator->url(1);
        $queryString = request()->query();
    }

    // Build pagination classes
    $paginationClasses = Tabler::classes()
        ->add('pagination')
        ->add($variant === 'outline' ? 'pagination-outline' : '')
        ->add($variant === 'circle' || (is_array($variant) && in_array('circle', $variant)) ? 'pagination-circle' : '')
        ->add($size === 'sm' ? 'pagination-sm' : '')
        ->add($size === 'lg' ? 'pagination-lg' : '')
        ->add($attributes->pluck('class'));

    // Determine wrapper alignment
    $alignmentClass = match ($alignment) {
        'center' => 'justify-content-center',
        'end' => 'justify-content-end',
        default => 'justify-content-start',
    };

    // Calculate visible page range
    $start = max(1, $currentPage - $onEachSide);
    $end = min($lastPage, $currentPage + $onEachSide);

    // Adjust range to show consistent number of pages
    if ($end - $start < $onEachSide * 2) {
        if ($start === 1) {
            $end = min($lastPage, $start + $onEachSide * 2);
        } elseif ($end === $lastPage) {
            $start = max(1, $end - $onEachSide * 2);
        }
    }

    // Check if we need ellipsis
    $showStartEllipsis = $start > 1;
    $showEndEllipsis = $end < $lastPage;

    // Helper function to generate URL
    $generateUrl = function ($page) use ($url, $queryString, $paginator) {
        if ($paginator) {
            return $paginator->url($page);
        }

        if ($url) {
            $query = array_merge($queryString, ['page' => $page]);
            return $url . '?' . http_build_query($query);
        }

        return '#';
    };
@endphp

@if ($lastPage > 1)
    <div class="{{ $alignmentClass }}">
        <ul {{ $attributes->except(['class'])->class($paginationClasses) }}>
            {{-- First page link --}}
            @if ($showFirstLast)
                <li class="page-item {{ $currentPage === 1 ? 'disabled' : '' }}">
                    <a class="page-link{{ $showText ? ' page-text' : '' }}"
                        href="{{ $currentPage === 1 ? '#' : $generateUrl(1) }}"
                        @if ($currentPage === 1) tabindex="-1" aria-disabled="true" @endif
                        aria-label="{{ $firstLabel }}">
                        @if ($showText)
                            {{ $firstLabel }}
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon">
                                <polyline points="11 17 6 12 11 7"></polyline>
                                <polyline points="18 17 13 12 18 7"></polyline>
                            </svg>
                        @endif
                    </a>
                </li>
            @endif

            {{-- Previous page link --}}
            <li class="page-item {{ $currentPage === 1 ? 'disabled' : '' }}">
                <a class="page-link{{ $showText ? ' page-text' : '' }}"
                    href="{{ $currentPage === 1 ? '#' : $generateUrl($currentPage - 1) }}"
                    @if ($currentPage === 1) tabindex="-1" aria-disabled="true" @endif
                    aria-label="{{ $previousLabel }}">
                    @if ($showText)
                        {{ $previousLabel }}
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    @endif
                </a>
            </li>

            {{-- Page numbers --}}
            @if ($showNumbers)
                {{-- First page if not in range --}}
                @if ($showStartEllipsis && $start > 2)
                    <li class="page-item">
                        <a class="page-link" href="{{ $generateUrl(1) }}">1</a>
                    </li>
                @endif

                {{-- Start ellipsis --}}
                @if ($showStartEllipsis)
                    <li class="page-item">
                        <span class="page-link disabled">&hellip;</span>
                    </li>
                @endif

                {{-- Page range --}}
                @for ($page = $start; $page <= $end; $page++)
                    <li class="page-item {{ $page === $currentPage ? 'active' : '' }}">
                        @if ($page === $currentPage)
                            <span class="page-link">{{ $page }}</span>
                        @else
                            <a class="page-link" href="{{ $generateUrl($page) }}">{{ $page }}</a>
                        @endif
                    </li>
                @endfor

                {{-- End ellipsis --}}
                @if ($showEndEllipsis)
                    <li class="page-item">
                        <span class="page-link disabled">&hellip;</span>
                    </li>
                @endif

                {{-- Last page if not in range --}}
                @if ($showEndEllipsis && $end < $lastPage - 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $generateUrl($lastPage) }}">{{ $lastPage }}</a>
                    </li>
                @endif
            @endif

            {{-- Next page link --}}
            <li class="page-item {{ $currentPage === $lastPage ? 'disabled' : '' }}">
                <a class="page-link{{ $showText ? ' page-text' : '' }}"
                    href="{{ $currentPage === $lastPage ? '#' : $generateUrl($currentPage + 1) }}"
                    @if ($currentPage === $lastPage) tabindex="-1" aria-disabled="true" @endif
                    aria-label="{{ $nextLabel }}">
                    @if ($showText)
                        {{ $nextLabel }}
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    @endif
                </a>
            </li>

            {{-- Last page link --}}
            @if ($showFirstLast)
                <li class="page-item {{ $currentPage === $lastPage ? 'disabled' : '' }}">
                    <a class="page-link{{ $showText ? ' page-text' : '' }}"
                        href="{{ $currentPage === $lastPage ? '#' : $generateUrl($lastPage) }}"
                        @if ($currentPage === $lastPage) tabindex="-1" aria-disabled="true" @endif
                        aria-label="{{ $lastLabel }}">
                        @if ($showText)
                            {{ $lastLabel }}
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon">
                                <polyline points="13 17 18 12 13 7"></polyline>
                                <polyline points="6 17 11 12 6 7"></polyline>
                            </svg>
                        @endif
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif
