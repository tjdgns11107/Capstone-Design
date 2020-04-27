@extends('headers.header')

@section('content')

    <form id="postProduct" class="form__auth">
        {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('product_title') ? 'has-error' : '' }}">
            <label for="product_title">제품 명</label>
            <input type="text" name="product_title" class="form-control" value="{{ old('product_title') }}" autofocus />
            {!! $errors->first('product_title', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('product_price') ? 'has-error' : '' }}">
            <label for="product_price">제품 가격</label>
            <input type="text" onKeyup="this.value=this.value.replace(/[^0-9]/g,'');" name="product_price" class="form-control" value="{{ old('product_price') }}" />
            {!! $errors->first('product_price', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('product_content') ? 'has-error' : '' }}">
            <label for="product_content">제품 설명</label>
            <input type="text" name="product_content" class="form-control" value="{{ old('product_content') }}" />
            {!! $errors->first('product_content', '<span class="form-error">:message</span>') !!}
        </div>

        <div class='form-group'>
            <button type="submit">제품 등록</button>
        </div>

    </form>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/product.js"></script> 