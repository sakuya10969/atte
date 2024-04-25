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
    <div class="upper_pagination">
        {{ $attendance_items->links('vendor.pagination.date') }}
    </div>
    <table class="attendance_table">
        <tr class="attendance_table_row">
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
        </tr>
        <tr class="attendance_table_row">
            <td>sakuya</td>
            <td>13:00</td>
            <td>22:00</td>
            <td>1:00</td>
            <td>7:00</td>
        </tr>
    </table>
    <div class="lower_pagination">
        {{ $attendance_items->links('vendor.pagination.page_number') }}
    </div>
@endsection
