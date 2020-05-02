@extends('headers.header')

@section('content')

    <div>제품 구매</div>

    <br>

    <form id="order_post" class="form__auth">
        {!! csrf_field() !!}

        <div id="product_id">{{$product->id}}</div>
        <div id="buy_user">{{Auth::user()->id}}</div>

        <div class="form-group ">
            <label for="product_title">제품명</label>
            <div>{{$product->product_title}}</div>
        </div>

        <br>

        <div class="form-group ">
            <label for="product_price">결제 금액</label>
            <div>{{$product->product_price}}</div>
        </div>
        
        <br>

        <div class="form-group {{ $errors->has('order_') ? 'has-error' : '' }}">
            <label for="send_user">받는 사람</label>
            <input type="text" name="send_user" id="send_user" class="form-control" autofocus />
            {!! $errors->first('send_user', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('send_address') ? 'has-error' : '' }}">
            <label for="send_address">주소</label>
            <input type="text" name="send_address" id="send_address" class="form-control" />
            {!! $errors->first('send_address', '<span class="form-error">:message</span>') !!}
        </div>

        <div class='form-group'>
            <button type="submit" id="buy_product">구매</button>
        </div>

    </form>


@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/order.js"></script>
<link rel="stylesheet" href="/css/order.css">