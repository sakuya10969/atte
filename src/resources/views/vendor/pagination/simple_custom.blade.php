@if ($paginator->hasPages())
    <nav>
        <ul class="pagination" style="display: flex; justify-content: center; padding-left: 0; list-style-type: none;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')" style="margin-right: 10px;">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @else
                <li style="margin-right: 10px;">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&rsaquo;</a>
                </li>
            @endif

            {{-- Current Page Date --}}
            <li class="disabled" aria-disabled="true" style="margin: 0 5px;">
                <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $paginator->currentPage())->format('Y-m-d') }}</span>
            </li>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li style="margin-left: 10px;">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" style="margin-left: 10px;">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif