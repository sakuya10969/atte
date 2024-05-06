@if ($paginator->hasPages())
    <nav>
        <ul class="pagination" style="display: flex; justify-content: center; align-items:center; padding-left: 0; list-style: none;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" style="margin-right: 10px;">
                    <span style="color: grey; font-size: 24px;">&lsaquo;</span>
                </li>
            @else
                <li style="margin-right: 10px;">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="color: blue; text-decoration: none; font-size: 24px; border: 1px solid white;">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true" style="margin: 0;">
                        <span style="color: grey;">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page" style="margin: 0; background-color:blue; padding: 10px 16px; font-size: 16px;">
                                <span style="color: white;">{{ $page }}</span>
                            </li>
                        @else
                            <li style="margin: 0 ;">
                                <a href="{{ $url }}" style="color: blue; text-decoration: none; background-color: white; padding: 10px 16px; font-size: 16px;">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li style="margin-left: 10px;">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="color: blue; text-decoration: none; font-size: 24px; border: 1px solid white;">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" style="margin-left: 10px;">
                    <span style="color: grey; font-size: 24px; border: 1px solid white;">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif