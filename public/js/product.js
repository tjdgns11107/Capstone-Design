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

        var title = $('#product_title').val();
        var price = $('#product_price').val();
        var content = $('#product_content').val();

        console.log(title, price, content);
        
        $.ajax({
            url: "/products",
            type: 'POST',
            data: {
                title: title,
                price: price,
                content: content,
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
        var aid = $(this).parent('div').attr('data-pro-id');
        console.log(aid);

        $.ajax({
            url: '/products/' + aid + "/edit",
            type: 'GET',
            success: function(data) {
                location.href = '/products/' + aid + '/edit';
            }
        });
    });

    // 제품 업데이트
    $('#updateProduct').on('click', function(e) {
        e.preventDefault();
        var upid = $('#updateProduct').closest('#editProduct').attr('data-up-id');
        console.log(upid);

        var title = $('#product_title').val();
        var price = $('#product_price').val();
        var content = $('#product_content').val();


        if(confirm('정보를 수정 하시겠습니까?')) {
            $.ajax({
                '_method': 'PATCH',
                url: '/product/' + upid,
                type: 'patch',
                data: {
                    title: title,
                    price: price,
                    content: content,
                },
                success: function(data) {
                    location.href = '/products';
                }
            });
        }
    });

    // 제품 삭제
    $('.deleteProduct').on('click', function() {
        var pid = $(this).parent('div').attr('data-pro-id');
        console.log(pid);
        
        if(confirm('삭제하시겠습니까')) {
            $.ajax({
                url: "/products/" + pid,
                type: 'DELETE',
                success: function() {
                    location.href = '/products';
                }
            });
        }
    });
});
