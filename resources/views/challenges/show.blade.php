@extends('headers.header')

@section('content')

    <div>
        <div>챌린지 이름</div>
        <div id="title">{{ $challenge->challenge_title }}</div>
    </div>

    <div>
        <div>기본 참여금</div>
        <div>{{ $challenge->default_entry_fee }}</div>
    </div>

    <div>
        <div>챌린지 내용</div>
        <pre id="info">{{ $challenge->challenge_information }}</pre>
    </div>

    <div data-cha-id="{{ $challenge->id }}">
        <button class="edit_chal">챌린지 수정</button>
        <button class="del_chal">챌린지 삭제</button>
    </div>

    <div class="create_chal">
        <button type="submit" id="save_chal">챌린지 등록</button>
    </div>
    
@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/challenge.js"></script>
<script>
    $(document).ready(function() {    
        var str = $('#info').html();
        console.log(str);
        str = str.split('&lt;br/&gt;').join("\n");
        $('#info').html(str)
    });
</script>
<link rel="stylesheet" href="/css/challenge.css">