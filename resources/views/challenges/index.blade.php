@extends('headers.header')

@section('content')

    <div>

    <div id="list_bar">
        <button id="challenge_list" data-part-id="{{Auth::user()->id}}">챌린지 현황</button>
    </div>

    @foreach($challenges as $challenge)

    <div class="challenge-box">
        <h1 class="challenge-name">{{ $challenge->challenge_name }}</h1>
        <div>{{ $challenge->challenge_information }}</div>
        <br>
        <div class="entry_challenge" data-cha-id="{{ $challenge->id }}">
            <button class="entry_btn">참가하기</button>
        </div>
    </div>

    @endforeach

    </div>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/challenge.js"></script>
<link rel="stylesheet" href="/css/challenge.css">