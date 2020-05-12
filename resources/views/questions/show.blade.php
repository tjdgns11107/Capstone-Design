@extends('headers.header')

@section('content')

    <div id="show_ques">
        
        <div class="show_question">
            <div class="tag">제목</div>
            <div id="title">{{ $question->question_title }}</div>
        </div>

        <div class="show_question">
            <div class="tag">질문 내용</div>
            <pre id="content">{{ $question->question_content }}</pre>
        </div>

        <div id="date_bar" class="show_question">
            <div class="date">작성일 : {{ $question->created_at }}</div>
            <div class="date">수정일 : {{ $question->updated_at }}</div>
        </div>

        @if(isset($answer))
            <pre class="ans_content">{{ $answer->answer_content }}</pre>
            <div class="show_question" data-ques-id="{{ $question->id }}" data-ans-id="{{ $answer->id }}">
            @if(Auth::user())
                @if(Auth::user()->id == $question->user_id)
                        <button id="ques_alt" class="qna_btn">글 수정</button>
                        <button id="ques_del" class="qna_btn">글 삭제</button>
                @endif
                @if(Auth::user()->admin)
                        <button id="edit_ans" class="qna_btn">답글 수정</button>
                        <button id="del_ans" class="qna_btn">답글 삭제</button>
                @endif
            @endif
        @else
            <div class="ans_content">답변이 없습니다.</div>
            @if(Auth::user())
                <div class="show_question" data-ques-id="{{ $question->id }}">
                @if(Auth::user()->id == $question->user_id)
                    <button id="ques_alt" class="qna_btn">글 수정</button>
                    <button id="ques_del" class="qna_btn">글 삭제</button>
                @endif
                @if(Auth::user()->admin)      
                    <button id="add_answer" class="qna_btn">답변 달기</button>
                @endif
            @else
                <div class="show_question">
            @endif
        @endif
            <button id="back_qna" class="qna_btn">목록으로</button>
        </div>

    </div>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/question.js"></script>
<script src="/js/answer.js"></script>
<script>
    $(document).ready(function() {    
        var str = $('#content').html();
        str = str.split('&lt;br/&gt;').join("\n");
        $('#content').html(str);
        
        if($('.ans_content')) {
            var str = $('.ans_content').html();
            str = str.split('&lt;br/&gt;').join("\n");
            $('.ans_content').html(str);
        }
    });
</script>
<link rel="stylesheet" href="/css/qna.css">