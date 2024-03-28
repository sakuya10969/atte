<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Atte</title>
        <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
        <link rel="stylesheet" href="{{asset('css/common.css')}}">
        @yield("css")
    </head>


    <body>
        <header>
            <div class="header_ttl">
                <h1 class="header_ttl_content">Atte</h1>
            </div>
            @yield("header_content")
        </header>


        <main>
            @yield("main_content")
        </main>


        <footer>
            <div class="footer_content">
                <small class="footer_copyright">Atte,Inc</small>
            </div>
        </footer>
    </body>

</html>