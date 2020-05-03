@extends('headers.header')

@section('content')

<form id="post_answer" class="form__auth">
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
            <input type="text" name="answer_content" id="answer_content" class="form-control" />
            {!! $errors->first('answer_content', '<span class="form-error">:message</span>') !!}
        </div>

        <div class='form-group' data-add-id="{{$answer->id}}">
            <button type="submit" id="save_answer">답변 등록</button>
        </div>

    </form>


@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/answer.js"></script>
<link rel="stylesheet" href="/css/qna.css">