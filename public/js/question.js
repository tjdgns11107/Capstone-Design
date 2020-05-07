$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 제품 생성 페이지 이동
    $('#add_ques').on('click', function() {
        $.ajax({
            url: '/qna/create',
            type: 'GET',
            success: function() {
                location.href = "/qna/create";
            }
        })
    });

    // 질문 등록
    $('#save_question').on('click', function(e) {
        e.preventDefault();

        var str = $('#question_content').val();
        str = str.replace(/(?:\r\n|\r|\n)/g, '<br/>');

        $.ajax({
            url: "/qna",
            type: 'POST',
            data: {
                user_id: $('#user_id').val(),
                title: $('#question_title').val(),
                content: str,
            },
            success: function() {
                location.href = '/qna';
            }
        });
    });

    // 질문 보기
    $('.qna_tr').on('click', function() {
        var sid = $(this).attr('data-que-id');

        $.ajax({
            url: '/qna/' + sid,
            type: 'GET',
            success: function() {
                location.href = '/qna/' + sid;
            },
            error:function(request,status,error){
                console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        });
    });

    // 질문 리스트로 이동
    $('#back_qna').on('click', function() {
        location.href = '/qna';
    });

    // 질문 수정 페이지
    $('#ques_alt').on('click', function() {
        var eid = $(this).parent('div').attr('data-ques-id');
        
        $.ajax({
            url: '/qna/' + eid + "/edit",
            type: 'GET',
            success: function() {
                location.href = '/qna/' + eid + '/edit';
            }
        });
    });

    // 질문 업데이트
    $('#update_ques').on('click', function(e) {
        e.preventDefault();
        var upid = $('#update_ques').closest('form').attr('data-up-id');

        var str = $('#question_content').val();
        str = str.replace(/(?:\r\n|\r|\n)/g, '<br/>');

        if(confirm('정보를 수정 하시겠습니까?')) {
            $.ajax({
                url: '/qna/' + upid,
                type: 'patch',
                data: {
                    title: $('#question_title').val(),
                    content: str,
                },
                success: function() {
                    location.href = '/qna/' + upid;
                }
            });
        }
    });

    // 질문 삭제
    $('#ques_del').on('click', function() {
        var did = $(this).parent('div').attr('data-ques-id');
        
        if(confirm('삭제하시겠습니까')) {
            $.ajax({
                url: "/qna/" + did,
                type: 'DELETE',
                success: function() {
                    location.href = '/qna';
                }
            });
        }
    });
});
