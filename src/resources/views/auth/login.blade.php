@extends("layouts.app")


@section("css")
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section("main_content")
<div class="login_form">
    <h2 class="login_form_heading">ログイン</h2>
    <form class="login_form_input_item" action="/login" method="post">
        <input class="login_form_input" type="text" name="email" placeholder="メールアドレス">
        <input class="login_form_input" type="text" name="password" placeholder="パスワード">
        <input class="login_form_btn" type="submit" value="ログイン">
    </form>
    <p class="login_form_text">アカウントをお持ちでない方はこちらから<br><a class="register_link" href="/register">会員登録</a></p>
</div>
@endsection