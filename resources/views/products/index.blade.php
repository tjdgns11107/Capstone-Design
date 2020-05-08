@extends('headers.header')

@section('content')

    <table align="center" class="pro_index">
        <th class="pro_th" id="pro_id_th">제품 번호</th>
        <th class="pro_th" id="pro_title_th">제품 명</th>
        <th class="pro_th" id="pro_price_th">제품 가격</th>
        <th class="pro_th" id="pro_create_th">제품 등록일</th>
        @if(Auth::user() && Auth::user()->admin)
            <th class="pro_th_2" id="pro_ad_th">제품 관리</th>
        @endif
        @forelse($products as $product)
            <tr class="pro_tr show_pro" data-pro-id="{{ $product->id }}">
                <td class="text_1 pro_td">{{ $product->id }}</td>
                <td class="text_1 title_bar pro_td">{{ $product->product_title }}</td>
                <td class="text_2 pro_td">{{ $product->product_price }}</td>
                <td class="text_1 pro_td">{{ $product->created_at }}</td>
                @if(Auth::user() && Auth::user()->admin)
                    <td>
                        <button class="alterProduct btn">제품 수정</button>
                        <button class="deleteProduct btn">제품 삭제</button>
                    </td>
                @endif
            </tr>
        @empty
            @if(Auth::user() && Auth::user()->admin)
                <tr class="pro_tr">
                    <td colspan="5" id="empty_pro">등록 된 제품이 없습니다.</td>
                </tr>
            @else
            <tr class="pro_tr">
                <td colspan="4" id="empty_pro">등록 된 제품이 없습니다.</td>
            </tr>
            @endif
        @endforelse
    </table>

    @if(Auth::user() && Auth::user()->admin)
        <div>
            <input id="addProduct" type="button" value="제품 추가"/>
        </div>
    @endif

    @include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/product.js"></script>
<link rel="stylesheet" href="/css/product.css">