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
            @include('tabler::pagination.partials.nav-button', [
                'isDisabled' => $paginator->onFirstPage(),
                'url' => $paginator->previousPageUrl(),
                'direction' => 'prev',
                'label' => config('tabler.pagination.previous_label', 'prev'),
                'ariaLabel' => __('pagination.previous'),
            ])

            {{-- Next Page Link --}}
            @include('tabler::pagination.partials.nav-button', [
                'isDisabled' => !$paginator->hasMorePages(),
                'url' => $paginator->nextPageUrl(),
                'direction' => 'next',
                'label' => config('tabler.pagination.next_label', 'next'),
                'ariaLabel' => __('pagination.next'),
            ])
        </ul>
    </nav>
@endif
