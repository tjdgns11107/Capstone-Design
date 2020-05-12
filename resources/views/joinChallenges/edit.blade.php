@extends('headers.header')

@section('content')
    
    <h1>{{$join->challenge->challenge_title}}</h1>

    <form id="edit_join_form">
    {!! csrf_field() !!}

    <div>{{ $join->challenge->challenge_information }}</div>

    <div id="user_id" data-user-id="{{ $join->user->id }}">참가자 : {{ $join->user->user_id }}</div>
    <div id="challenge_id" date-join-id="{{$join->challenge->id}}">참가 번호 : {{$join->challenge->id}}</div>

    <div class="form-group {{ $errors->has('join_date') ? 'has-error' : '' }}">
        <label for="join_date">챌린지 시작 날짜</label>
        <input type="date" name="join_date" id="join_date" value="{{ old('join_date', $join->join_date) }}"/>
        {!! $errors->first('join_date', '<span class="form-error">:message</span>') !!}
    </div>

    <input type="hidden" id="term" value="{{$join->join_term}}">

    <div class="form-group {{ $errors->has('join_term') ? 'has-error' : '' }}">
        <label for="join_term">챌린지 마무리 날짜</label>
        <input type="date" name="join_term" id="join_term" value="{{ old('join_date') }}"/>
        {!! $errors->first('join_term', '<span class="form-error">:message</span>') !!}
    </div>

    <div>
        <label for="entry_fee">참가비</label>
        <input type="text" name="entry_fee" id="entry_fee" value="{{ $join->entry_fee }}">
    </div>

    <button type="submit" id="save_join">챌린지 저장</button>

    </form>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/joinChallenge.js"></script>
<script>
    $(document).ready(function () {   
        function calDate(date, day, sign) {
            var yy = parseInt(date.substr(0,4), 10);
            var mm = parseInt(date.substr(5, 2), 10);
            var dd = parseInt(date.substr(8), 10);
            var op = parseInt(day);

            if(sign == '+') {
                d = new Date(yy, mm-1, dd+op);
            } else if(sign == '-') {
                d = new Date(yy, mm-1, dd-op);
            }

            console.log(d);

            yy = d.getFullYear();
            mm = d.getMonth()+1;
            mm = (mm < 10) ? '0' + mm : mm;
            dd = d.getDate();
            dd = (dd < 10) ? '0' + dd : dd; 

            return '' + yy + '-' + mm + '-' + dd;
        }

        var start_date = $('#join_date').val();
        var day = $('#term').val();

        console.log(start_date, day);

        $('#join_term').val(calDate(start_date, day, '+'));
    });
</script>
<link rel="stylesheet" href="/css/challenge.css">