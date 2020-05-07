@extends('headers.header')

@section('content')

    <form id="edit_question" class="form__auth" data-up-id="{{$question->id}}">
        {!! csrf_field() !!}
        {!! method_field('PATCH') !!}
        
        <div class="edit_ques {{ $errors->has('question_title') ? 'has-error' : '' }}">
            <div class="tag"><label for="question_title">제목</label></div>
            <input type="text" name="question_title" id="question_title" class="form-control" value="{{ old('question_title', $question->question_title) }}" autofocus />
            {!! $errors->first('question_title', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="edit_ques {{ $errors->has('question_content') ? 'has-error' : '' }}">
            <div class="tag"><label for="question_content">질문 내용</label></div>
            <textarea name="question_content" id="question_content" wrap=hard  cols="75" rows="12">{{ old('question_content', $question->question_content) }}</textarea>
            {!! $errors->first('question_content', '<span class="form-error">:message</span>') !!}
        </div>

        <div class='edit_ques'>
            <button type="submit" id="update_ques">질문 수정</button>
        </div>

    </form>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/question.js"></script>
<script>
    $(document).ready(function() {    
        var str = $('#question_content').val();
        str = str.split('<br/>').join("\n");
        $('#question_content').val(str);
    });
</script>
<link rel="stylesheet" href="/css/qna.css">