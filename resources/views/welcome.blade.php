<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <title>Bài tập lớn 3</title>
    </head>
    <body>
        <div class="head">
            <div>
                <h1>BTL3</h1>
            </div>
            <div class="">
                @if (Route::has('login'))
                    <div class="top-right ">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    </div>
                @endif
            </div>
            <div> Chào mừng bạn đến trang quản trị của chúng tôi.</div>
        </div>
    </body>
</html>
