$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 제품 생성 페이지 이동
    $('#addProduct').on('click', function() {
        location.href = "/products/create";
    });

    // 제품 등록
    $('#saveProduct').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: "/products",
            type: 'POST',
            data: {
                title: $('#product_title').val(),
                price: $('#product_price').val(),
                content: $('#product_content').val(),
            },
            success: function() {
                location.href = '/products';
            },
            error:function(request,status,error){
                console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        });
    });

    // 제품 보기
    $('.watchProduct').on('click', function() {
        var sid = $(this).parent('div').attr('data-pro-id');
        
        $.ajax({
            url: '/products/' + sid,
            type: 'GET',
            success: function() {
                location.href = '/products/' + sid;
            }
        });
    });

    // 각 제품 보기에서 제품 홈으로
    $('#backProducts').on('click', function() {
        location.href = '/products';
    });

    // 제품 수정 페이지
    $('.alterProduct').on('click', function() {
        var eid = $(this).parent('div').attr('data-pro-id');
        
        $.ajax({
            url: '/products/' + eid + "/edit",
            type: 'GET',
            success: function() {
                location.href = '/products/' + eid + '/edit';
            }
        });
    });

    // 제품 업데이트
    $('#updateProduct').on('click', function(e) {
        e.preventDefault();
        var upid = $('#updateProduct').closest('#editProduct').attr('data-up-id');

        if(confirm('정보를 수정 하시겠습니까?')) {
            $.ajax({
                url: '/products/' + upid,
                type: 'patch',
                data: {
                    title: $('#product_title').val(),
                    price: $('#product_price').val(),
                    content: $('#product_content').val(),
                },
                success: function() {
                    location.href = '/products';
                },
                error:function(request,status,error){
                    console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
            });
        }
    });

    // 제품 삭제
    $('.deleteProduct').on('click', function() {
        var did = $(this).parent('div').attr('data-pro-id');
        
        if(confirm('삭제하시겠습니까')) {
            $.ajax({
                url: "/products/" + did,
                type: 'DELETE',
                success: function() {
                    location.href = '/products';
                }
            });
        }
    });
});
