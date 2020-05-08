@extends('headers.header')

@section('content')

    <form id="order_post" class="form__auth">
        {!! csrf_field() !!}

        <input type="hidden" id="product_id" value="{{$product->id}}" />
        <input type="hidden" id="buy_user" value="{{Auth::user()->id}}" />

        <div class="form-group">
            <div class="tag"><label for="product_title">제품명</label></div>
            <div class="order_div product_bar">{{$product->product_title}}</div>
        </div>

        <div class="form-group">
            <div class="tag"><label for="product_price">결제 금액</label></div>
            <div class="order_div product_bar">{{$product->product_price}}</div>
        </div>

        <div class="form-group {{ $errors->has('order_') ? 'has-error' : '' }}">
            <div class="tag"><label for="send_user">받는 사람</label></div>
            <input type="text" name="send_user" id="send_user" class="form-control order_div" value="{{ old('send_user') }}" autofocus />
            {!! $errors->first('send_user', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('send_address') ? 'has-error' : '' }}">
            <div class="tag"><label for="send_address">주소</label></div>
            <input type="text" name="send_address" id="send_address" class="form-control order_div" value="{{ old('send_address') }}"/>
            {!! $errors->first('send_address', '<span class="form-error">:message</span>') !!}
        </div>

        <div class='form-group submit_btn'>
            <button type="submit" id="buy_product">구매</button>
        </div>

    </form>


@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/order.js"></script>
<link rel="stylesheet" href="/css/order.css">