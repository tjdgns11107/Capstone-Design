@extends('headers.header')

@section('content')

    <form action="{{ route('informations.update') }}" method="post" class="form__auth">
        {!! csrf_field() !!}
        <div>회원 정보 수정</div>

        <div class="form-group">
            <label for="user_id">아이디</label>
            <div style="display:inline">{{ Auth::user()->user_id }}</div>
            <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->user_id}}" readonly/>
        </div>

        <div class="form-group">
            <label for="name">이름</label>
            <div style="display:inline">{{ Auth::user()->name }}</div>
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">이메일</label>
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email}}" />
            {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
            <label for="phone">전화번호</label>
            <input type="tel" pattern="[0-9]{3}-[0-9]{3,4}-[0-9]{4}" name="phone" class="form-control" value="{{ Auth::user()->phone }}" />
            {!! $errors->first('phone', '<span class="form-error">:message</span>') !!}
        </div>

        
        <div class='form-group'>
            <button type="submit">정보 수정</button>
        </div>
    </form>
    

    @include('partials.footer')

@stop
