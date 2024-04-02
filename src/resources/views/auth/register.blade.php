@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('main_content')
    <div class="register_form">
        <h2 class="register_form_heading">会員登録</h2>
        <form class="register_form_input_item" action="/register" method="post">
            @csrf
            <input class="register_form_input" type="text" name="name" placeholder="名前" value="{{ old('name') }}">
            <input class="register_form_input" type="text" name="email" placeholder="メールアドレス" value="{{old('email')}}">
            <input class="register_form_input" type="text" name="password" placeholder="パスワード" value="{{old('password')}}">
            <input class="register_form_input" type="text" name="password_confirmation" placeholder="確認用パスワード" value="{{old('password_confimation')}}">
            <input class="register_form_btn" type="submit" value="会員登録">
        </form>
        <p class="register_form_text">アカウントをお持ちの方はこちらから<br><a class="login_link" href="/login">ログイン</a></p>
    </div>
@endsection
