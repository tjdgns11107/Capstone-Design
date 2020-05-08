$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 현재 날짜 구하는 함수
    function getRecentDate(){
        var date = new Date();
     
        var recentYear = date.getFullYear();
        var recentMonth = date.getMonth() + 1;
        var recentDay = date.getDate();
     
        if(recentMonth < 10) recentMonth = "0" + recentMonth;
        if(recentDay < 10) recentDay = "0" + recentDay;
     
        return recentYear + "-" + recentMonth + "-" + recentDay;
    }

    // 주문 페이지로 이동
    $('#order').on('click', function() {
        var oid = $(this).attr('data-ord-id');

        $.ajax({
            url: "/orders/create",
            type: 'GET',
            data: {
                id: oid,
            },
            success: function() {
                location.href = '/orders/create?id=' + oid;
            }
        });
    });

    // 제품 구매
    $('#buy_product').on('click', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: "/orders",
            type: 'POST',
            data: {
                product_id: $('#product_id').val(),
                buy_user: $('#buy_user').val(),
                order_date: getRecentDate(),
                send_user:$('#send_user').val(),
                send_address:$('#send_address').val(),
                payment:0,
            },
            success: function(data) {
                alert('주문이 완료되었습니다.');
                location.href = '/orders/' + data;
            }
        });
    });

    // 주문 확인
    $('.show_order').on('click', function() {
        var sid = $(this).parent('.order_bar').attr('data-ord-id');
        console.log(sid);

        $.ajax({
            url: '/orders/' + sid,
            type: 'GET',
            success: function(data) {
                location.href = '/orders/' + sid;
            }
        });
    });

    // 목록으로 이동
    $('#back_order').on('click', function() {
        var oid = $(this).parent('div').attr('data-use-id');
        
        $.ajax({
            url: "/orders",
            type: 'GET',
            data: {
                id: oid,
            },
            success: function() {
                location.href = "/orders?id=" + oid;
            }
        });
    });

    // 주문 수정
    $('#edit_order').on('click', function() {
        var eid = $(this).parent('div').attr('data-ord-id');

        $.ajax({
            url: '/orders/' + eid + "/edit",
            type: 'GET',
            success: function() {
                location.href = '/orders/' + eid + '/edit';
            },
            error:function(request,status,error){
                console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        });
    });

    // 주문 업데이트
    $('#save_order').on('click', function(e) {
        e.preventDefault();
        var uid = $(this).closest('form#edit_form').attr('data-ord-id');

        if(confirm('주문을 수정 하시겠습니까?')) {
            $.ajax({
                url: '/orders/' + uid,
                type: 'patch',
                data: {
                    user: $('#send_user').val(),
                    address: $('#send_address').val(),
                    user_id: $(this).parent('div').attr('data-use-id'),
                },
                success: function() {
                    location.href = '/orders/' + uid;
                }
            });
        }
    });

    // 주문 삭제
    $('.delete_order').on('click', function() {
        var did = $(this).parent('div').attr('data-ord-id');
        var uid = $(this).parent('div').attr('data-use-id');

        console.log(did, uid);
        
        if(confirm('주문을 삭제 하시겠습니까?')) {
            $.ajax({
                url: '/orders/' + did,
                type: 'DELETE',
                data: {
                    id: did,
                    user_id: uid,
                },
                success: function() {
                    location.href = "/orders?id=" + uid;
                }
            });
        }
    });
});