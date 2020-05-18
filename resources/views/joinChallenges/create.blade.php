@extends('headers.header')

@section('content')

    <div id="entry_div">
        <h1>{{$challenge->name}}</h1>

        <form id="entry_form" data-chal-id="{{ $challenge->id }}">
            {!! csrf_field() !!}

            <div>
                <div class="tag"><label for="info">챌린지 개요</label></div>
                <pre id="info">{{ $challenge->challenge_information }}</pre>
                <input type="hidden" name="default_fee" id="default_fee" value="{{ $challenge->default_entry_fee  }}">
            </div>

            <div class="right_text">
                <label for="user_id">참가자</label>
                <div id="user_id" data-user-id="{{Auth::user()->id}}">{{Auth::user()->user_id}}</div>
            </div>

            <div class="date_bar">
                <div class="form_group {{ $errors->has('join_date') ? 'has-error' : '' }}">
                    <div class="tag date_text"><label for="join_date">챌린지 시작 날짜</label></div>
                    <input type="date" name="join_date" id="join_date" value="{{ old('join_date') }}"/>
                    {!! $errors->first('join_date', '<span class="form-error">:message</span>') !!}
                </div>

                <div class="form_group {{ $errors->has('join_term') ? 'has-error' : '' }}">
                    <div class="tag date_text"><label for="join_term">챌린지 종료 날짜</label></div>
                    <input type="date" name="join_term" id="join_term" value="{{ old('join_date') }}"/>
                    {!! $errors->first('join_term', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
            
            <div>
                <div class="tag">참가비 여부</div>
                <div class="fee_data">
                    <div class="entry_fee">
                        <input type="radio" name="pay_entry_fee" id="pay_entry_fee">
                        <label for="pay_entry_fee">참가비 지불하고 참가하기</label>
                    </div>
                    <div class="entry_fee">
                        <input type="radio" name="not_pay_entry_fee" id="not_pay_entry_fee">
                        <label for="not_pay_entry_fee">무료로 참가하기</label>
                    </div>
                        <div id="radio_bar"></div>
                </div>
            </div>

            <button type="submit" id="apply_challenge">참가하기</button>
        </form>
    </div>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/joinChallenge.js"></script>
<script>
    $(document).ready(function() {    
        var str = $('#info').html();
        console.log(str);
        str = str.split('&lt;br/&gt;').join("\n");
        $('#info').html(str)
    });
</script>
<link rel="stylesheet" href="/css/joinChallenge.css">