@if ($unique_dates->isNotEmpty())
    <nav>
        <ul class="pagination" style="display: flex; justify-content: center; padding-left: 0; list-style-type: none;">
            {{-- Previous Date Link --}}
            @php
                $currentDateIndex = $unique_dates->search(function($date) use ($selected_date) {
                    return $date->date == $selected_date;
                });
                $previousDate = optional($unique_dates->get($currentDateIndex - 1))->date;
                $nextDate = optional($unique_dates->get($currentDateIndex + 1))->date;
            @endphp

            @if ($currentDateIndex > 0 && $previousDate)
                <li style="margin-right: 10px;">
                    <a href="{{ route('attendance', ['date' => $previousDate]) }}" rel="prev" aria-label="@lang('pagination.previous')" style="text-decoration: none; color: #000;">&lsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" style="margin-right: 10px; color: #ccc;">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @endif

            {{-- Current Page Date --}}
            <li aria-disabled="true" style="margin: 0 5px; font-weight: bold;">
                <span>{{ $selected_date }}</span>
            </li>

            {{-- Next Date Link --}}
            @if ($currentDateIndex < $unique_dates->count() - 1 && $nextDate)
                <li style="margin-left: 10px;">
                    <a href="{{ route('attendance', ['date' => $nextDate]) }}" rel="next" aria-label="@lang('pagination.next')" style="text-decoration: none; color: #000;">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" style="margin-left: 10px; color: #ccc;">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif