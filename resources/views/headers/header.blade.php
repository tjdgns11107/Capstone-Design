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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    
    <header>
        <div id="top_nav">
            <img src="/img/logo_green.png" alt="Logo" id="header_logo" class="top_bar">
            <div class="top_bar" id="products">제품</div>
            <div class="top_bar" id="qna">QnA</div>
            @if(Auth::user())
                <div class="top_bar" id="challenge">챌린지</div>
                <div class="top_bar" id="posture">통계</div>
                <div class="top_bar" id="information">{{ Auth::user()->name }}</div>
                <div class="top_bar" id="orders" data-user-id="{{Auth::user()->id}}">주문</div>
                <div class="top_bar" id="logout">로그아웃</div>
            @else                
                <div class="top_bar" id="login">로그인</div>
                <div class="top_bar" id="register">회원가입</div>
            @endguest
        </div>

    </header>

    <div>
        @if(isset($menu))
            <h2 id="title_bar">{{$menu}}</h2>
        @endif
    </div>
    
    @yield('content')

</body>
</html>