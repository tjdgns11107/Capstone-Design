@extends('headers.header')

@section('content')

    <form action="{{ route('users.create') }}" method="post" class="form__auth">
        {!! csrf_field() !!}
        
        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
            <label for="user_id">아이디</label>
            <input type="text" name="user_id" class="form-control" placeholder="아이디" value="{{ old('user_id') }}" autofocus />
            {!! $errors->first('user_id', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name">이름</label>
            <input type="text" name="name" class="form-control" placeholder="이름" value="{{ old('name') }}">
            {!! $errors->first('name', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">이메일</label>
            <input type="email" name="email" class="form-control" placeholder="exam@example.com" value="{{ old('email') }}">
            {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
            <label for="phone">전화번호</label>
            <input type="tel" pattern="[0-9]{3}-[0-9]{3,4}-[0-9]{4}" name="phone" class="form-control" placeholder="012-(3)456-7890" value="{{ old('phone') }}">
            {!! $errors->first('phone', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">비밀번호</label>
            <input type="password" name="password" class="form-control" placeholder="비밀번호" value="{{ old('password') }}">
            {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            <label for="password_confirmation">비밀번호 확인</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="비밀번호 확인" value="{{ old('password_confirmation') }}">
            {!! $errors->first('password_confirmation', '<span class="form-error">:message</span>') !!}
        </div>

        <div class='form-group'>
            <button type="submit">Register</button>
        </div>

    </form>

    @include('partials.footer')

@stop
