$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 챌린지 생성 페이지
    $('#add_chal').on('click', function() {
        $.ajax({
            url: '/challenges/create',
            type: 'get',
            success: function() {
                location.href = '/challenges/create';
            },
            error:function(request,status,error){
                console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        });
    });

    // 챌린지 저장
    $('#save_chal').on('click', function(e) {
        e.preventDefault();
        
        var str = $('#challenge_information').val();
        str = str.replace(/(?:\r\n|\r|\n)/g, '<br/>');
        console.log(typeof($('#challenge_user').val()));

        $.ajax({
            url: '/challenges',
            type: 'post',
            data: {
                user: $('#challenge_user').val(),
                title: $('#challenge_title').val(),
                fee: $('#default_entry_fee').val(),
                content: str,
            }, success: function() {
                location.href = '/challenges';
            },
            error:function(request,status,error){
                console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        });
    });

    // 챌린지 보기
    $('.title').on('click', function() {
        var sid = $(this).attr('data-chall-id');

        $.ajax({
            url: '/challenges/' + sid,
            type: 'get',
            success: function() {
                location.href = '/challenges/' + sid;
            }
        });
    });

    // 팰린지 페이지로
    $('#back_chal').on('click', function() {
        location.href = '/challenges';
    });

    // 챌린지 수정
    $('.edit_chal').on('click', function() {
        var eid = $(this).parent('div').attr('data-cha-id');

        console.log(eid);

        $.ajax({
            url: '/challenges/' + eid + '/edit',
            type: 'get',
            success: function() {
                location.href = '/challenges/' + eid + '/edit';
            }
        });
    });

    // 챌린지 업데이트
    $('#edit_chal').on('click', function(e) {
        e.preventDefault();

        var uid = $('#challenge_id').val();
        
        var str = $('#challenge_information').val();
        str = str.replace(/(?:\r\n|\r|\n)/g, '<br/>');

        if(confirm('챌린지를 수정하시겠습니까?')) {
            $.ajax({
                url: '/challenges/' + uid,
                type: 'patch',
                data: {
                    title: $('#challenge_title').val(),
                    fee: $('#default_entry_fee').val(),
                    content: str,
                },
                success: function() {
                    location.href = '/challenges/' + uid;
                }
            });
        }
    });

    // 챌린지 삭제
    $('.del_chal').on('click', function() {
        var did = $(this).parent('div').attr('data-cha-id');

        console.log(did);

        if(confirm('챌린지를 삭제하시겠습니까?')) {
            $.ajax({
                url: '/challenges/' + did,
                type: 'delete',
                success: function() {
                    location.href = '/challenges';
                }
            });
        }
    });

});