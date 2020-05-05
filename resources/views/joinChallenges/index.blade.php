@extends('headers.header')

@section('content')


    <table align="center">
        <th id="join_th">참여 번호</th>
        <th id="join_name_th">챌린지 명</th>
        <th id="join_date_th">시작 날짜</th>
        <th id="join_term_th">참여 기간</th>
        <th id="join_fee_th">참여 비용</th>
        @forelse($joins as $join)
        <tr class="join_tr">
            <td class="text_1">{{ $join->id }}</td>
            <td class="text_1">{{ $join->challenge->challenge_name }}</div>
            <td class="text_1">{{ $join->join_date }}</div>
            <td class="text_2">{{ $join->join_term }}일</div>
            <td class="text_2">{{ $join->entry_fee }}원</div>
        </tr>
        @empty
            <tr class="join_tr">
                <td colspan="5" class="">지원중인 챌린지가 없습니다.</div>
            </tr>
        @endforelse
    </table>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/challenge.js"></script>
<link rel="stylesheet" href="/css/challenge.css">