@extends('headers.header')

@section('content')


    <form id="edit_form" class="form__auth" data-ord-id="{{$order->id}}">
        {!! csrf_field() !!}
    
        <table align="center">
            <tr>
                <td class="order_inline_1">주문 번호</td>
                <td class="order_inline_2">{{ $order->id }}</td>
            </tr>
            <tr>
                <td class="order_inline_1">제품 명</td>
                <td class="order_inline_2">{{ $order->product->product_title }}</td>
            </tr>
            <tr>
                <td class="order_inline_1">제품 가격</td>
                <td class="order_inline_2">{{ $order->product->product_price }}</td>
            </tr>
            <tr>
                <td class="order_inline_1">주문자</td>
                <td class="order_inline_2">{{ $order->user->user_id }}</td>
            </tr>
            <tr>
                <td class="order_inline_1">주문 날짜</td>
                <td class="order_inline_2">{{ $order->order_date }}</td>
            </tr>
        </table>

        <div class="form_group {{ $errors->has('send_user') ? 'has-error' : '' }}">
            <div class="tag"><label for="send_user">받는 사람</label></div>
            <input type="text" name="send_user" id="send_user" class="form-control order_div" value="{{ old('send_user', $order->send_user) }}" autofocus />
            {!! $errors->first('send_user', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form_group {{ $errors->has('send_address') ? 'has-error' : '' }}">
            <div class="tag"><label for="send_address">배송 주소</label></div>
            <input type="text" name="send_address" id="send_address" class="form-control order_div" value="{{ old('send_address', $order->send_address) }}" />
            {!! $errors->first('send_address', '<span class="form-error">:message</span>') !!}
        </div>

        <div id="user_num" class='form_group' data-use-id='{{$order->buy_user}}'>
            <button type="submit" id="save_order">주문 수정</button>
        </div>

    </form>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/order.js"></script>
<link rel="stylesheet" href="/css/order.css">