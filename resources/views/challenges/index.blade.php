@extends('headers.header')

@section('content')

    <div id="list_bar">
        <button id="challenge_list" data-part-id="{{Auth::user()->id}}">챌린지 현황</button>
    </div>

    @foreach($challenges as $challenge)

    <div class="challenge-box">
        <h1 class="title">{{ $challenge->challenge_title }}</h1>
        <pre class="infor">{{ $challenge->challenge_information }}</pre>
        <div class="entry_challenge" data-cha-id="{{ $challenge->id }}">
            <button class="entry_btn">참가하기</button>
            @if(Auth::user() && Auth::user()->admin)
                <button class="show_chal">챌린지 확인</button>
                <button class="edit_chal">챌린지 수정</button>
                <button class="del_chal">챌린지 삭제</button>
            @endif
        </div>
    </div>

    @endforeach
    
    @if(Auth::user() && Auth::user()->admin)
        <button id="add_chal">챌린지 추가</button>
    @endif

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/challenge.js"></script>
<script src="/js/joinChallenge.js"></script>
<script>
    $(document).ready(function() {    
        var arr = $('.infor');
        for(var i = 0 ; i < arr.length ; i++) {
            str = arr[i].innerText.split('<br/>').join("\n");
            arr[i].innerText = str;
        }
    });
</script>
<link rel="stylesheet" href="/css/challenge.css">