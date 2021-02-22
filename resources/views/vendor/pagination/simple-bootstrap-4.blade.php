@if ($paginator->hasPages())
    <ul class="pagination justify-content-center mt-5" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link prev"></span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link prev" href="{{ $paginator->previousPageUrl() }}" rel="prev"></a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link next" href="{{ $paginator->nextPageUrl() }}" rel="next"></a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link next"></span>
            </li>
        @endif
    </ul>
@endif
