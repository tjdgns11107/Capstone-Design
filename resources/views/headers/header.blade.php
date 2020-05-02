<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/header.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/js/header.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    
    <header>
        <div align="right">
            <ul id="top_nav">
        @guest
                <li class="top_bar" id="login">로그인</li>
                <li class="top_bar" id="register">회원가입</li>
        @else
                <li class="top_bar" id="information">{{ Auth::user()->user_id }}</li>
                <li class="top_bar" id="orders" data-user-id="{{Auth::user()->id}}">결제 내역</li>
                <li class="top_bar" id="logout">로그아웃</li>
        @endguest
                <li class="top_bar" id="products">주문</li>
                <li class="top_bar" id="qna">고객센터</li>
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