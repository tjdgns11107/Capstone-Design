@extends('headers.header')

@section('content')

    <div id="register_div">

        <form action="{{ route('users.create') }}" method="post" id="regist_form">
            {!! csrf_field() !!}
            
            <div class="form_group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                <input type="text" class="input_bar" name="user_id" placeholder="아이디" value="{{ old('user_id') }}" autofocus />
                {!! $errors->first('user_id', '<br /><span class="form-error">:message</span>') !!}
            </div>

            <div class="form_group {{ $errors->has('name') ? 'has-error' : '' }}">
                <input type="text" class="input_bar" name="name" placeholder="이름" value="{{ old('name') }}">
                {!! $errors->first('name', '<br /><span class="form-error">:message</span>') !!}
            </div>

            <div class="form_group {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" class="input_bar" name="email" placeholder="exam@example.com" value="{{ old('email') }}">
                {!! $errors->first('email', '<br /><span class="form-error">:message</span>') !!}
            </div>

            <div class="form_group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <input type="tel" class="input_bar" pattern="[0-9]{3}-[0-9]{3,4}-[0-9]{4}" name="phone" placeholder="012-(3)456-7890" value="{{ old('phone') }}">
                {!! $errors->first('phone', '<br /><span class="form-error">:message</span>') !!}
            </div>

            <div class="form_group {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" class="input_bar" name="password" placeholder="비밀번호" value="{{ old('password') }}">
                {!! $errors->first('password', '<br /><span class="form-error">:message</span>') !!}
            </div>

            <div class="form_group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <input type="password" class="input_bar" name="password_confirmation" placeholder="비밀번호 확인" value="{{ old('password_confirmation') }}">
                {!! $errors->first('password_confirmation', '<br /><span class="form-error">:message</span>') !!}
            </div>

            <div class='form_group'>
                <button type="submit" class="btn">회  원  가  입</button>
            </div>

        </form>

        <div class="text-center">
            이미 회원 가입을 마치셨나요?
            <a id="login" href="{{ route('sessions.create') }}">
                로그인
            </a>
        </div>

    </div>

    @include('partials.footer')

@stop

<link rel="stylesheet" href="/css/regist.css">