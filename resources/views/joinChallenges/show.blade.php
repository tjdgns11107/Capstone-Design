@extends('headers.header')

@section('content')

    <div>
        <input type="hidden" id="user_id" value="{{ $join->user->id }}">
        <input type="hidden" id="join_id" value="{{ $join->id }}">
    </div>

    <table align="center" id="show_join">
        <th class="s_join_th" colspan="2">{{ $join->challenge->challenge_title }}</th>
        <tr>
            <td class="join_title">도전 번호</td>
            <td class="join_content text_1">{{ $join->id }}</td>
        </tr>
        <tr>
            <td class="join_title">챌린지 내용</td>
            <td class="join_content text_1" id="info">{{ $join->challenge->challenge_information }}</td>
        </tr>
        <tr>
            <td class="join_title">유저 이름</td>
            <td class="join_content text_1">{{ $join->user->user_id }}</td>
        </tr>
        <tr>
            <td class="join_title">시작 날짜</td>
            <td class="join_content text_1">{{ $join->join_date }}</td>
        </tr>
        <tr>
            <td class="join_title">참여 기간</td>
            <td class="join_content text_1">{{ $join->join_term }}일</td>
        </tr>
        <tr>
            <td class="join_title">참가 비</td>
            <td class="join_content text_1">￦ {{ $join->entry_fee }}</td>
        </tr>
        <tr>
            <td class="join_title">달성율</td>
            <td class="join_content text_1">{{ $join->achivement }} %</td>
        </tr>
    </table>

    <div>
        @if(Auth::user()->id == $join->user_id)
            <button id="edit_join">챌린지 수정</button>
            <button id="del_join">챌린지 삭제</button>
        @endif
        <button id="back_join">목록으로</button>
    </div>


@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/joinChallenge.js"></script>
<script>
    $(document).ready(function() {    
        var str = $('#info').html();
        str = str.split('&lt;br/&gt;').join("\n");
        $('#info').html(str);
    });
</script>
<link rel="stylesheet" href="/css/challenge.css">