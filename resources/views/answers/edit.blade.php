@extends('headers.header')

@section('content')

<form id="edit_answer" class="form__auth" data-que-id="{{$answer->question->id}}">
        {!! csrf_field() !!}

        <input type="hidden" id="user_id" value="{{$answer->question->user_id}}">

        <div>
            <div class="tag"><label for="ans_ques_title">질문 제목</label><div>
            <div id="ans_ques_title">{{$answer->question->question_title}}</div>
        </div>
        
        <div>
            <div class="tag"><label for="ans_ques_content">질문 내용</label></div>
            <div id="ans_ques_content">{{$answer->question->question_content}}</div>
        </div>

        <div class="form_group {{ $errors->has('answer_content') ? 'has-error' : '' }}">
            <div class="tag"><label for="answer_content">답변 내용</label></div>
            <textarea name="answer_content" id="answer_content" wrap=hard  cols="75" rows="12">{{ old('answer_content', $answer->answer_content) }}</textarea>            
            {!! $errors->first('answer_content', '<span class="form-error">:message</span>') !!}
        </div>

        <div id="save_id" class='form_group' data-answer-id="{{$answer->id}}">
            <button type="submit" id="update_answer">답변 수정</button>
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

        if($('#answer_content')) {
            var str = $('#answer_content').html();
            str = str.split('&lt;br/&gt;').join("\n");
            $('#answer_content').html(str);
        }
    });
</script>
<link rel="stylesheet" href="/css/qna.css">