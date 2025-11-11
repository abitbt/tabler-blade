{{--
    Simple Pagination View for Laravel's simplePaginate() method

    This view is automatically used when you call {{ $paginator->links() }}
    on a simple paginator (created with simplePaginate() instead of paginate()).
    Shows only Previous and Next buttons without page numbers.

    Usage in Blade:
    @php
    $users = User::simplePaginate(10);
    @endphp
    {{ $users->links() }}
--}}

@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">
                        <x-tabler-chevron-left class="icon" />
                        prev
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <x-tabler-chevron-left class="icon" />
                        prev
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        next
                        <x-tabler-chevron-right class="icon" />
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">
                        next
                        <x-tabler-chevron-right class="icon" />
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
