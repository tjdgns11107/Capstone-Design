<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/header.css">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    
    <header>
        <div align="right">
            <ul id="top_nav">
        @guest
                <li class="top_bar"><a href="{{ route('sessions.create') }}" class="top_list">로그인</a></li>
                <li class="top_bar"><a href="{{ route('users.create') }}" class="top_list">회원가입</a></li>
        @else
                <li class="top_bar"><a href="{{ route('informations.index') }}" class="top_list">{{ Auth::user()->user_id }}</a></li>
                <li class="top_bar"><a href="{{ route('sessions.destroy') }}" class="top_list">로그아웃</a></li>
        @endguest
                <li class="top_bar"><a href="{{ route('products.index') }}" class="top_list">주문</a></li>
                <li class="top_bar"><a href="{{ route('qna.index') }}" class="top_list">고객센터</a></li>
            </ul>
        </div>

    </header>

    <div align="center">
        <a href="/">메인 페이지</a>
    </div>

    <nav>
        <div>로고</div>
    </nav>

    <hr>
    
    @yield('content')

</body>
</html>