@if (!empty($unique_dates))
    <nav>
        <ul class="pagination" style="display: flex; justify-content: center; padding-left: 0; list-style-type: none;">
            @php
                $currentDateIndex = array_search($selected_date, $unique_dates);
                $previousDateIndex = $currentDateIndex - 1;
                $nextDateIndex = $currentDateIndex + 1;
                $previousDate = $previousDateIndex >= 0 ? $unique_dates[$previousDateIndex] : null;
                $nextDate = $nextDateIndex < count($unique_dates) ? $unique_dates[$nextDateIndex] : null;
            @endphp

            {{-- Previous Date Link --}}
            @if ($previousDate)
                <li style="margin-right: 10px;">
                    <a href="{{ route('attendance', ['date' => $previousDate]) }}" rel="prev"
                        aria-label="@lang('pagination.previous')" style="text-decoration: none; color: #000;">&lsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" style="margin-right: 10px; color: #ccc;">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @endif

            <li aria-disabled="true" style="margin: 0 5px; font-weight: bold;">
                <span>{{ $selected_date }}</span>
            </li>

            {{-- Next Date Link --}}
            @if ($nextDate)
                <li style="margin-left: 10px;">
                    <a href="{{ route('attendance', ['date' => $nextDate]) }}" rel="next"
                        aria-label="@lang('pagination.next')" style="text-decoration: none; color: #000;">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" style="margin-left: 10px; color: #ccc;">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif