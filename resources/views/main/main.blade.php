@extends('headers.main')

@section('content')

    <div id="background">
        <img src="/img/web_background.png" alt="background image">
        <div id="logo_box">
            <img src="/img/logo_white.png" alt="Logo" id="main_logo">
        </div>
        <div id="main_text">IoT 방석을 통한 자세 교정</div>
    </div>

    @include('partials.footer')

@stop

<link rel="stylesheet" href="/css/main.css">