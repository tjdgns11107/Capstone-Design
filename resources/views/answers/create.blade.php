@extends('headers.header')

@section('content')

    <form id="post_answer" class="form__auth">
        {!! csrf_field() !!}

        <div class="create_ans">
            <div class="tag"><label for="ans_ques_title">질문 제목</label></div>
            <div id="ans_ques_title">{{$question->question_title}}</div>
        </div>
        
        <div class="create_ans">
            <div class="tag"><label for="ans_ques_content">질문 내용</label></div>
            <pre id="ans_ques_content">{{$question->question_content}}</div>
        </div>

        <div id="user_bar" class="create_ans">
            <label for="user_id">질문자</label>
            <div id="user_id">{{ $question->user->user_id }}</div>
        </div>

        <div class="{{ $errors->has('answer_content') ? 'has-error' : '' }}">
            <div class="tag"><label for="answer_content">답변 내용</label></div>
            <textarea name="answer_content" id="answer_content" wrap=hard  cols="75" rows="12"></textarea>
            {!! $errors->first('answer_content', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="create_ans" data-add-id="{{$question->id}}">
            <button type="submit" id="save_answer">답변 등록</button>
        </div>

    </form>


@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/answer.js"></script>
<script>
    $(document).ready(function() {
        var str = $('#ans_ques_content').html();
        str = str.split('&lt;br/&gt;').join("\n");
        $('#ans_ques_content').html(str);
    });
</script>
<link rel="stylesheet" href="/css/qna.css">