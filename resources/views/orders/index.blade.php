@extends('headers.header')

@section('content')

    <table align="center">
        <th id="product_th">주문 번호</th>
        <th id="send_user_th">받는 사람</th>
        <th id="send_address_th">주문 제품</th>
        <th id="order_date_th">구매 날짜</th>
        <th id="order_th">확인/신청</th>
    @forelse($orders as $order)
        <tr class="order_tr" data-use-id="{{$order->user->id}}">
            <td class="text_1">{{$order->id}}</td>
            <td class="text_1">{{$order->send_user}}</td>
            <td class="text_2">
                <div id="order_title">{{$order->product->product_title}}</div>
                <div id="order_content">{{$order->product->product_content}}</div>
            </td>
            <td class="text_1">{{$order->order_date}}</td>
            <td>
                <div class="order_bar" data-ord-id="{{$order->id}}">
                    <button class="show_order btn">주문 확인</button>
                    <button class="delete_order btn">주문 취소</button>
                </div>
            </td>
        </div>
        </tr>
    @empty
        <tr class="order_tr">
            <td colspan="5" class="text_1">주문 내역이 없습니다.</td>
        </tr>
    @endforelse
    </table>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/order.js"></script>
<link rel="stylesheet" href="/css/order.css">