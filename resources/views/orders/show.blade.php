@extends('headers.header')

@section('content')

    <div id="show_order">

        <table align="center" class="order_table">
            <th class="s_ord_th" colspan="2">주문 정보</th>
            <tr>
                <td class="order_title">주문 번호</td>
                <td class="order_content text_1">{{ $order->id }}</td>
            </tr>
            <tr>
                <td class="order_title">제품 명</td>
                <td class="order_content text_1">{{ $order->product->product_title }}</td>
            </tr>
            <tr>
                <td class="order_title">제품 가격</td>
                <td class="order_content text_1">{{ $order->product->product_price }}</td>
            </tr>
            <tr>
                <td class="order_title">주문자</td>
                <td class="order_content text_1">{{ $order->user->user_id }}</td>
            </tr>
            <tr>
                <td class="order_title">받는 사람</td>
                <td class="order_content text_1">{{ $order->send_user }}</td>
            </tr>
            <tr>
                <td class="order_title">배송 주소</td>
                <td class="order_content text_1">{{ $order->send_address }}</td>
            </tr>
            <tr>
                <td class="order_title">주문 날짜</td>
                <td class="order_content text_1">{{ $order->order_date }}</td>
            </tr>
        </table>

        <div class="order_nav" data-ord-id="{{$order->id}}" data-use-id="{{$order->user->id}}">
            <button class="show_btn" id="edit_order">주문 수정</button>
            <button class="delete_order show_btn">주문 삭제</button>
            <button class="show_btn" id="back_order">목록으로</button>
        </div>

    </div>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/order.js"></script>
<link rel="stylesheet" href="/css/order.css">