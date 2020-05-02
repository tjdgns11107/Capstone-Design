@extends('headers.header')

@section('content')

    <div>주문 내역</div>

    <br>
    
    @forelse($orders as $order)
        <div class="order_div" data-use-id="{{Auth::user()->id}}">
            <div class="orders">
                <div>주문 제품: {{$order->product->product_title}}</div>
                <div>받는 사람: {{$order->send_user}}</div>
                <div>보낼 주소: {{$order->send_address}}</div>
                <div>구매 날짜: {{$order->order_date}}</div>
            </div>
            <div class="order_bar" data-ord-id="{{$order->id}}">
                <button class="show_order">주문 확인</button>
                <button class="delete_order">주문 삭제</button>
            </div>
        </div>
        <br>
    @empty
        <div>주문 내역이 없습니다.</div>
    @endforelse
    

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/order.js"></script>
<link rel="stylesheet" href="/css/product.css">