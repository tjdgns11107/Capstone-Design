@extends('headers.header')

@section('content')

    <div id="showDiv">
        
        <div class="show_pro form_group {{ $errors->has('title') ? 'has-error' : '' }}">
            <div class="tag"><label for="title">제품 명</label></div>
            <div id="title">{{ $product->product_title }}</div>
        </div>

        <div class="show_pro form_group {{ $errors->has('price') ? 'has-error' : '' }}">
            <div class="tag"><label for="price">제품 가격</label></div>
            <div id="price">{{ $product->product_price }}</div>
        </div>

        <div class="show_pro form_group {{ $errors->has('content') ? 'has-error' : '' }}">
            <div class="tag"><label for="content">제품 설명</label></div>
            <pre id="content">{{ $product->product_content }}</pre>
        </div>
        
        <div id="date_bar">
            <div class="date">작성일 : {{ $product->created_at }}</div>
            <div class="date">수정일 : {{ $product->updated_at }}</div>
        </div>

        <div class="show_pro" data-pro-id="{{ $product->id }}">
            @if(Auth::user())
                <button id="order" class="show_btn" data-ord-id="{{ $product->id }}">주문하기</button>
                @if(Auth::user()->admin)
                    <button class="alterProduct show_btn">제품 수정</button>
                    <button class="deleteProduct show_btn">제품 삭제</button>
                @endif
            @endif
            <button id="backProducts" class="show_btn">목록으로</button>
        </div>

    </div>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/product.js"></script>
<script src="/js/order.js"></script>
<script>
    $(document).ready(function() {
        var str = $('#content').html();
        str = str.split('&lt;br/&gt;').join("\n");
        $('#content').html(str);
    });
</script>
<link rel="stylesheet" href="/css/product.css">