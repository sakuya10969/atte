@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('header_content')
    <nav class="header_nav">
        <ul class="header_menu">
            <li class="header_menu_item"><a class="header_menu_link" href="/">ホーム</a></li>
            <li class="header_menu_item"><a class="header_menu_link" href="/attendance">日付一覧</a></li>
            <li class="header_menu_item">
                <form class="header_menu_form" action="/logout" method="post">
                    @csrf
                    <button class="header_menu_btn" type="submit">ログアウト</button>
                </form>
            </li>
        </ul>
    </nav>
@endsection

@section('main_content')
    <div class="top_pagination">
        {{ $attendance_by_date->links('vendor.pagination.date') }}
    </div>
    <table class="attendance_table">
        <tr class="attendance_table_row">
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
        </tr>
        @foreach ($attendance_items as $attendance_item)
            <tr class="attendance_table_row">
                <td>{{ $attendance_item->user->name }}</td>
                <td>{{ \Carbon\Carbon::parse($attendance_item->attendance_start)->format("H:i:s") }}</td>
                <td>{{ \Carbon\Carbon::parse($attendance_item->attendance_end)->format("H:i:s") }}</td>
                <td>{{ $attendance_item->rest_time() }}</td>
                <td>{{ $attendance_item->attendance_time() }}</td>
            </tr>
        @endforeach
    </table>
    <div class="bottom_pagination">
        {{ $attendance_items->links('vendor.pagination.page_number') }}
    </div>
@endsection
