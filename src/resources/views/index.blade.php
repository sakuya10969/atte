@extends("layouts.app")



@section("css")
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection



@section("header_content")
<nav class="header_nav">
    <ul class="header_menu">
        <li class="header_menu_item"><a class="header_menu_link" href="/">ホーム</a></li>
        <li class="header_menu_item"><a class="header_menu_link" href="/attendance">日付一覧</a></li>
        <li class="header_menu_item"><a class="header_menu_link" href="/login">ログアウト</a></li>
    </ul>
</nav>
@endsection



@section("main_content")
<div class="main_text">
    <h2 class="main_text_item">福場凛太郎さんお疲れ様です！</h2>
</div>
<div class="btn_container">
    <div class="btn_container_upper">
        <form class="attendance_form" action="/work_start" method="post">
            @csrf
            <button class="form_btn" type="submit">勤務開始</button>
        </form>

        <form class="attendance_form" action="/work_end" method="post">
            @csrf
            <button class="form_btn" type="submit">勤務終了</button>
        </form>
    </div>

    <div class="btn_container_lower">
        <form class="attendance_form" action="/break_start" method="post">
            @csrf
            <button class="form_btn" type="submit">休憩開始</button>
        </form>

        <form class="attendance_form" action="/break_end" method="post">
            @csrf
            <button class="form_btn" type="submit">休憩終了</button>
        </form>
    </div>
</div>
@endsection