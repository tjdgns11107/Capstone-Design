@extends('headers.header')

@section('content')

<div id="challenge-container">
    <div class="entry-form">
        <h1>{{$challenge->name}}</h1>

        <form id="entry_form" data-chal-id="{{ $challenge->id }}">
            {!! csrf_field() !!}
            <br>

            <div>챌린지 개요</div>

            <br>

            <div>{{ $challenge->info }}</div>

            <div id="user_id" data-user-id="{{Auth::user()->id}}">참가자 : {{Auth::user()->user_id}}</div>

            <br>

            <div class="form-group {{ $errors->has('join_date') ? 'has-error' : '' }}">
                <label for="join_date">챌린지 시작 날짜</label>
                <input type="date" name="join_date" id="join_date" class="form-control" value="{{ old('join_date') }}"/>
                {!! $errors->first('join_date', '<span class="form-error">:message</span>') !!}
            </div>

            <br>

            <div class="form-group {{ $errors->has('join_term') ? 'has-error' : '' }}">
                <label for="join_term">챌린지 마무리 날짜</label>
                <input type="date" name="join_term" id="join_term" class="form-control" value="{{ old('join_date') }}"/>
                {!! $errors->first('join_term', '<span class="form-error">:message</span>') !!}
            </div>

            <br>
            
            <div>
                <input type="radio" name="entry_fee_radio" id="pay_entry_fee">참가비 지불하고 참가하기
                <input type="radio" name="entry_fee_radio" id="not_pay_entry_fee">무료로 참가하기
                <div id="radio_bar"></div>
            </div>

            <br>
            <button type="submit" id="apply_challenge">참가하기</button>
        </form>
    </div>
</div>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/challenge.js"></script>
<link rel="stylesheet" href="/css/challenge.css">