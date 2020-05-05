$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 메인 페이지
    $('#header_logo').on('click', function() {
        location.href = '/';
    });

    // 로그인 페이지
    $('#login').on('click', function() {
        location.href = "/auth/login";
    });

    // 회원가입 페이지
    $('#register').on('click', function() {
        location.href = "/auth/register";
    });

    // 개인 정보 수정 페이지
    $('#information').on('click', function() {
        location.href = "/auth/change";
    });

    // 챌린지 페이지
    $('#challenge').on('click', function() {
        location.href = "/challenges";
    });

    // 주문 내역 확인 페이지
    $('#orders').on('click', function() {
        var oid = $(this).attr('data-user-id');
        
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

    // 로그아웃
    $('#logout').on('click', function() {
        location.href = "/auth/logout";
    });

    // 제품 확인 및 구매 페이지
    $('#products').on('click', function() {
        location.href = "/products";
    });

    // qna 페이지
    $('#qna').on('click', function() {
        location.href = "/qna";
    });

});