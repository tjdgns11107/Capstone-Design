@extends('headers.header')

@section('content')

    <div id="show_ques">
        
        <div class="form-group {{ $errors->has('question_title') ? 'has-error' : '' }}">
            <label for="question_title">제목</label>
            <div id="question_title" class="form-control">{{ $question->question_title }}</div>
        </div>
        <br>

        <div class="form-group {{ $errors->has('question_content') ? 'has-error' : '' }}">
            <label for="question_content">질문 내용</label>
            <div id="question_content" class="form-control">{{ $question->question_content }}</div>
        </div>
        <br>

        <div>
            <div>작성일 : {{ $question->created_at }}</div>
            <div>수정일 : {{ $question->updated_at }}</div>
        </div>

        <br>

        @if(Auth::user())
            @if(Auth::user()->id == $question->user_id)
                <div data-ques-id="{{ $question->id }}">
                    <button id="ques_alt">글 수정</button>
                    <button id="ques_del">글 삭제</button>
                </div>
                
                <br>
            @endif
        @endif

        @if(isset($answer))

            <div>{{ $answer->answer_content }}</div>

            <br>

            @if(Auth::user())
                @if(Auth::user()->admin)
                    <div data-ans-id="{{ $answer->id }}">
                        <button id="edit_ans">답글 수정</button>
                        <button id="del_ans">답글 삭제</button>
                    </div>

                    <br>
                @endif
            @endif
        @else

            <div>답변이 없습니다.</div>

            <br>
            @if(Auth::user())
                @if(Auth::user()->admin)      
                    <div id="answer_bar" data-add-id="{{ $question->id }}">
                        <button id="add_answer">답변 달기</button>
                    </div>
            
                    <br>
                @endif
            @endif
        @endif

        <div>
            <button id="back_qna">목록으로</button>
        </div>

    </div>


@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/question.js"></script>
<script src="/js/answer.js"></script>
<link rel="stylesheet" href="/css/qna.css">