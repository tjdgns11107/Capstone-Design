@extends('headers.header')

@section('content')

    <form id="editProduct" class="form__auth" data-up-id="{{$product->id}}">
        {!! csrf_field() !!}
    
        <div class="form_group {{ $errors->has('id') ? 'has-error' : '' }}">
            
        </div>
        
        <div class="form_group {{ $errors->has('product_title') ? 'has-error' : '' }}">
            <div class="tag"><label for="product_title">제품 명</label></div>
            <input type="text" name="product_title" id="product_title" value="{{ old('product_title', $product->product_title) }}" autofocus />
            {!! $errors->first('product_title', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form_group {{ $errors->has('product_price') ? 'has-error' : '' }}">
            <div class="tag"><label for="product_price">제품 가격</label></div>
            <input type="text" onKeyup="this.value=this.value.replace(/[^0-9]/g,'');" name="product_price" id="product_price" value="{{ old('product_price', $product->product_price) }}" />
            {!! $errors->first('product_price', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form_group {{ $errors->has('product_content') ? 'has-error' : '' }}">
            <div class="tag"><label for="product_content">제품 설명</label></div>
            <textarea name="product_content" id="product_content" cols="65" rows="12">{{ $product->product_content }}</textarea>
            {!! $errors->first('product_content', '<span class="form-error">:message</span>') !!}
        </div>

        <div class='form_group submit_btn'>
            <button type="submit" id="updateProduct">제품 수정</button>
        </div>

    </form>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/product.js"></script>
<script>
    $(document).ready(function() {
        var str = $('#product_content').val();
        str = str.split('<br/>').join("\n");
        $('#product_content').val(str);
    });
</script>
<link rel="stylesheet" href="/css/product.css">