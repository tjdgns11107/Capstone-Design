<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/main.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/js/header.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    
    <header>
        <div id="top_nav">
            <div class="top_bar" id="challenge">챌린지</div>
            <div class="top_bar" id="products">제품</div>
            <div class="top_bar" id="qna">QnA</div>
            @if(Auth::user())
                <div class="top_bar">통계</div>
                <div class="top_bar" id="information">{{ Auth::user()->user_id }}</div>
                <div class="top_bar" id="orders" data-user-id="{{Auth::user()->id}}">주문</div>
                <div class="top_bar" id="logout">로그아웃</div>
            @else                
                <div class="top_bar" id="login">로그인</div>
                <div class="top_bar" id="register">회원가입</div>
            @endguest
        </div>
    </header>
    
    @yield('content')

</body>
</html>