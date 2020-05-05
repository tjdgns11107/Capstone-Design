@extends('headers.header')

@section('content')


    <div>주문 수정</div>

    <br>

    <form id="edit_form" class="form__auth" data-ord-id="{{$order->id}}">
        {!! csrf_field() !!}
        {!! method_field('PATCH') !!}
    
        <div>
            <label for="order_id">주문 번호</label>
            <div id="order_id">{{ $order->id }}</div>
        </div>

        <br>
        
        <div>
            <label for="order_product_title">제품 명</label>
            <div id="order_product_title">{{ $order->product->product_title }}</div>
        </div>

        <br>

        <div>
            <label for="order_product_price">제품 가격</label>
            <div id="order_product_price">{{ $order->product->product_price }}</div>
        </div>

        <br>
       
        <div>
            <label for="buy_user">주문자</label>
            <div id="buy_user">{{ $order->user->user_id }}</div>
        </div>
        
        <br>
        
        <div class="form-group {{ $errors->has('send_user') ? 'has-error' : '' }}">
            <label for="send_user">받는 사람</label>
            <input type="text" name="send_user" id="send_user" class="form-control" value="{{ old('send_user', $order->send_user) }}" autofocus />
            {!! $errors->first('send_user', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('send_address') ? 'has-error' : '' }}">
            <label for="send_address">배송 주소</label>
            <input type="text" name="send_address" id="send_address" class="form-control" value="{{ old('send_address', $order->send_address) }}" />
            {!! $errors->first('send_address', '<span class="form-error">:message</span>') !!}
        </div>

        <div id="user_num" class='form-group' data-use-id='{{$order->buy_user}}'>
            <button type="submit" id="save_order">주문 수정</button>
        </div>

    </form>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/order.js"></script>