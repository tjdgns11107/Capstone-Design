$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 질문 등록 창
    $('#add_answer').on('click', function() {
        var sid = $(this).parent('div').attr('data-add-id');
        console.log(sid);

        $.ajax({
            url: "/qna/answer/create",
            type: 'get',
            data: {
                id: sid,
            },
            success: function () {
                location.href = '/qna/answer/create?id=' + sid;
            }
        });
    });

    // 답변 등록
    $('#save_answer').on('click', function(e) {
        e.preventDefault();

        var aid = $(this).parent('div').attr('data-add-id');
        console.log(aid)

        $.ajax({
            url: "/qna/answer",
            type: 'POST',
            data: {
                id: aid,
                content: $('#answer_content').val(),
            },
            success: function() {
                location.href = '/qna/' + aid;
            }
        });
    });

    // 답변 수정 페이지로 이동
    $('#edit_ans').on('click', function() {
        var eid = $(this).parent('div').attr('data-ans-id');

        $.ajax({
            url: '/qna/answer/' + eid + "/edit",
            type: 'GET',
            success: function() {
                location.href = '/qna/answer/' + eid + '/edit';
            },
            error:function(request,status,error){
                console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        });
    });

    // 답변 수정
    $('#update_answer').on('click', function(e) {
        e.preventDefault();
        var upid = $(this).parent('div').attr('data-answer-id');
        var qid = $(this).closest('#edit_answer').attr('data-que-id');
        
        if(confirm('정보를 수정 하시겠습니까?')) {
            $.ajax({
                url: '/qna/answer/' + upid,
                type: 'patch',
                data: {
                    content: $('#answer_content').val(),
                },
                success: function() {
                    location.href = '/qna/' + qid;
                }
            });
        }
    });

    // 답변 삭제
    $('#del_ans').on('click', function() {
        var did = $(this).parent('div').attr('data-ans-id');

       if(confirm('삭제하시겠습니까')) {
            $.ajax({
                url: "/qna/answer/" + did,
                type: 'DELETE',
                success: function() {
                    location.href = '/qna/' + did;
                }
            });
        }
    });

});