@extends('headers.header')

@section('content')

    <form id="save_form">
        {!! csrf_field() !!}
        <div class="create_chal {{ $errors->has('challenge_title') ? 'has-error' : '' }}">
            <div class="tag"><label for="challenge_title">챌린지 이름</label></div>
            <input type="text" name="challenge_title" id="challenge_title" autofocus />
            {!! $errors->first('challenge_title', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="create_chal {{ $errors->has('default_entry_fee') ? 'has-error' : '' }}">
            <div class="tag"><label for="default_entry_fee" class="tag">참가비</label></div>
            <input type="text" name="default_entry_fee" id="default_entry_fee" />
            {!! $errors->first('default_entry_fee', '<span class="form-error">:message</span>') !!}
        </div>
        
        <div class="create_chal {{ $errors->has('challenge_information') ? 'has-error' : '' }}">
            <div class="tag"><label for="challenge_information" class="tag">챌린지 내용</label></div>
            <textarea name="challenge_information" id="challenge_information" wrap=hard  cols="75" rows="12"></textarea>
            {!! $errors->first('challenge_information', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="create_chal">
            <button type="submit" id="save_chal">챌린지 등록</button>
        </div>
    </form>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/challenge.js"></script>
<link rel="stylesheet" href="/css/challenge.css">