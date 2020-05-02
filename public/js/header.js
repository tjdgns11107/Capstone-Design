$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 로그인 페이지
    $('#login').on('click', function() {
        $.ajax({
            url: "/auth/login",
            type: 'GET',
            success: function() {
                location.href = "/auth/login";
            }
        });
    });

    // 회원가입 페이지
    $('#register').on('click', function() {
        $.ajax({
            url: "/auth/register",
            type: 'GET',
            success: function() {
                location.href = "/auth/register";
            }
        });
    });

    // 개인 정보 수정 페이지
    $('#information').on('click', function() {
        $.ajax({
            url: "/auth/change",
            type: 'GET',
            success: function() {
                location.href = "/auth/change";
            }
        });
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
            success: function(data) {
                // console.log(data);
                location.href = "/orders?id=" + oid;
            }
        });
    });

    // 로그아웃
    $('#logout').on('click', function() {
        $.ajax({
            url: "/auth/logout",
            type: 'GET',
            success: function() {
                location.href = "/auth/logout";
            }
        });
    });

    // 제품 확인 및 구매 페이지
    $('#products').on('click', function() {
        $.ajax({
            url: "/products",
            type: 'GET',
            success: function() {
                location.href = "/products";
            }
        });
    });

    // qna 페이지
    $('#qna').on('click', function() {
        $.ajax({
            url: "/qna",
            type: 'GET',
            success: function() {
                location.href = "/qna";
            }
        });
    });
});