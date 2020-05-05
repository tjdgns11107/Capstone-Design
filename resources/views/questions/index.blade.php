@extends('headers.header')

@section('content')

    <table align="center">
        <th class="qna_th" id="qna_id_th">번호</th>
        <th class="qna_th" id="qna_title_th">제목</th>
        <th class="qna_th" id="qna_user_th">작성자</th>
        <th class="qna_th"  id="qna_create_th">등록일</th>

        @forelse($questions as $question)
            <tr class="qna_tr" data-ques-id="{{$question->id}}">
                <td class="text_1">{{ $question->id }}</td>
                <td class="text_1">{{ $question->question_title }}</td>
                <td class="text_1">{{ $question->user->user_id }}</td>
                <td class="text_1">{{ $question->created_at }}</td>
            </td>
        @empty
            <tr>
                <td colspan="4" id="qna_tr">질문이 등록되어있지 않습니다.</td>
            </tr>
        @endforelse

    </table>

    <br>

    @if(Auth::user())
        <div>
            <button id="add_ques">글 등록</button>
        </div>
    @endif

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/question.js"></script>
<link rel="stylesheet" href="/css/qna.css">