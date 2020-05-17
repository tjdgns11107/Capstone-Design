@extends('headers.header')

@section('content')

    <div id="show_chal">
        <div class="tag"><label for="title">챌린지 이름</label></div>
        <div id="title">{{ $challenge->challenge_title }}</div>
    </div>

    <div>
        <div class="tag"><label for="fee">기본 참가비</label></div>
        <div id="fee">￦ {{ $challenge->default_entry_fee }}</div>
    </div>

    <div>
        <div class="tag"><label for="info">챌린지 내용</label></div>
        <pre id="info">{{ $challenge->challenge_information }}</pre>
    </div>

    <div id="chal_bar " data-cha-id="{{ $challenge->id }}">
        <button class="entry_btn">참가하기</button>
        <button id="back_chal">목록으로</button>
        @if(Auth::user() && Auth::user()->id == $challenge->user->id)
            <button class="edit_chal">챌린지 수정</button>
            <button class="del_chal">챌린지 삭제</button>
        @endif
    </div>
    
@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/challenge.js"></script>
<script src="/js/joinChallenge.js"></script>
<script>
    $(document).ready(function() {    
        var str = $('#info').html();
        str = str.split('&lt;br/&gt;').join("\n");
        $('#info').html(str)
    });
</script>
<link rel="stylesheet" href="/css/challenge.css">