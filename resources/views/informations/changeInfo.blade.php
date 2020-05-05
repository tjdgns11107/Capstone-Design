@extends('headers.header')

@section('content')

    <form action="{{ route('informations.update') }}" method="post" id="info_form">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="user_id">아이디<div class="sub">(변경 불가)</div></label>
            <div class="info">{{ Auth::user()->user_id }}</div>
            <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->user_id}}" readonly/>
        </div>

        <div class="form-group">
            <label for="name">이름<div class="sub">(변경 불가)</div></label>
            <div class="info">{{ Auth::user()->name }}</div>
        </div>
        
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">이메일</label><br>
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email}}" />
            {!! $errors->first('email', '<br /><span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
            <label for="phone">휴대전화</label><br>
            <input type="tel" pattern="[0-9]{3}-[0-9]{3,4}-[0-9]{4}" name="phone" class="form-control" value="{{ Auth::user()->phone }}" />
            {!! $errors->first('phone', '<br /><span class="form-error">:message</span>') !!}
        </div>

        
        <div class='form-group'>
            <button type="submit" class="btn">정보 수정</button>
        </div>
    </form>
    

    @include('partials.footer')

@stop

<link rel="stylesheet" href="/css/info.css">