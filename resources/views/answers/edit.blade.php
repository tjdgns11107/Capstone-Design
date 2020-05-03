@extends('headers.header')

@section('content')

<form id="edit_answer" class="form__auth" data-que-id="{{$question->id}}">
        {!! csrf_field() !!}

        <div id="user_id" >{{Auth::user()->id}}</div>

        <div>
            <label for="question_title">질문 제목</label>
            <div id="question_title">{{$question->question_title}}</div>
        </div>

        <br>
        
        <div>
            <label for="question_content">질문 내용</label>
            <div id="question_content">{{$question->question_content}}</div>
        </div>

        <hr>

        <div class="form-group {{ $errors->has('answer_content') ? 'has-error' : '' }}">
            <label for="answer_content">답변 내용</label>
            <input type="text" name="answer_content" id="answer_content" class="form-control" value="{{ old('answer_content', $answer->answer_content) }}" />
            {!! $errors->first('answer_content', '<span class="form-error">:message</span>') !!}
        </div>

        <div id="save_id" class='form-group' data-answer-id="{{$answer->id}}">
            <button type="submit" id="update_answer">답변 수정</button>
        </div>

    </form>


@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/answer.js"></script>
<link rel="stylesheet" href="/css/qna.css">