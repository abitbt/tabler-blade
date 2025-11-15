{{--
    Default Pagination View for Laravel's links() method

    This view is automatically used when you call {{ $paginator->links() }}
    It uses the Tabler pagination component internally for consistent styling.

    Usage in Blade:
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

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span
                                    class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

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
