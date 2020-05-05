@extends('headers.header')

@section('content')

    <form action="{{ route('sessions.create') }}" method="post" id="login_form">
        {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
            <input type="text" name="user_id" class="form-control" placeholder="아이디" value="{{ old('user_id') }}" autofocus />
            {!! $errors->first('user_id', '<br /><span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" name="password"  class="form-control" placeholder="비밀번호" value="{{ old('password') }}">
            {!! $errors->first('password', '<br /><span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <button type="submit" class="btn">로  그  인</button>
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input id="checkbox" type="checkbox" name="remember" value="{{ old('remember', 1) }}">
                    로그인 기억하기 <span class="text-danger">(공용 PC에서는 사용하지 마세요)</span>
                </label>
            </div>
        </div>

        <div class="form-group">
            <div class="text-center">
                회원이 아니라면?
                <a id="regist" href="{{ route('users.create') }}">
                    회원 가입
                </a>
            </div>
        </div>

    </form>

    @include('partials.footer')

@stop

<link rel="stylesheet" href="/css/user.css">