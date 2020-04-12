@extends('headers.header')

@section('content')

    <form action="{{ route('sessions.create') }}" method="post" class="form__auth">
        {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
            <label for="user_id">아이디</label>
            <input type="text" name="user_id" class="form-control" placeholder="아이디" value="{{ old('user_id') }}" autofocus />
            {!! $errors->first('user_id', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">비밀번호</label>
            <input type="password" name="password" class="form-control" placeholder="비밀번호" value="{{ old('password') }}">
            {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <button type="submit" class="btn">로그인</button>
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" value="{{ old('remember', 1) }}">
                    로그인 기억하기 <span class="text-danger">(공용 PC에서는 사용하지 마세요)</span>
                </label>
            </div>
        </div>

        <div class="form-group">
            <p class="text-center">
                회원이 아니라면?
                <a href="{{ route('users.create') }}">
                    회원 가입
                </a>
            </p>
            <!--<p class="text-center">
                {{--<a href="{{ route('remind.create') }}">--}}
                    비밀번호를 잊으셨나요?
                </a>
            </p>-->
        </div>

    </form>

    @include('partials.footer')

@stop
