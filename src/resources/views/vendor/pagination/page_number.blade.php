@if ($paginator->hasPages())
    <nav>
        <ul class="pagination" style="display: flex; justify-content: center; padding-left: 0;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" style="margin-right: 10px;">
                    <span style="color: grey;">&lsaquo;</span>
                </li>
            @else
                <li style="margin-right: 10px;">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="color: blue; text-decoration: none;">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true" style="margin: 0 5px;">
                        <span style="color: grey;">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page" style="margin: 0 5px; background-color: blue; border-radius: 4px;">
                                <span style="color: white; padding: 8px 16px;">{{ $page }}</span>
                            </li>
                        @else
                            <li style="margin: 0 5px;">
                                <a href="{{ $url }}" style="color: blue; text-decoration: none; background-color: white; padding: 8px 16px; border-radius: 4px;">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li style="margin-left: 10px;">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="color: blue; text-decoration: none;">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" style="margin-left: 10px;">
                    <span style="color: grey;">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif