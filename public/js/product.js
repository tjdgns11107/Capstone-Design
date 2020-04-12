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

    $('#postProduct').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: "/products",
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function() {
                location.href = '/products';
            },
            error:function(request,status,error){
                console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        });
    });

    // $('.alterProduct').onclick('click', function() {
            
    // });

    $('.deleteProduct').on('click', function() {
        var pid = $(this).attr('data-del-id');
        console.log(pid);
        
        if(confirm) {
            $.ajax({
                url: "/products/" + pid,
                type: 'DELETE',
                processData: false,
                contentType: false,
                success: function() {
                    location.href = '/products';
                },
                error:function(request,status,error){
                    console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
            });
        }
    });
});
