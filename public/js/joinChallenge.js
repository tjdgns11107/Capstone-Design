$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 날짜 차이 계산
    function dateDif(startDate, endDate) {
        var arr1 = startDate.split('-');
        var arr2 = endDate.split('-');
        var date1 = new Date(arr1[0], arr1[1], arr1[2]);
        var date2 = new Date(arr2[0], arr2[1], arr2[2]);
        var dif = date2 - date1;
        var cDay = 24 * 60 * 60 * 1000;// 시 * 분 * 초 * 밀리세컨

        return parseInt(dif/cDay);
    }

    // 날짜 차이 가감산
    function calDate(date, day, sign) {
        var yy = parseInt(date.substr(0,4), 10);
        var mm = parseInt(date.substr(5, 2), 10);
        var dd = parseInt(date.substr(8), 10);
        var op = parseInt(day);

        if(sign == '+') {
            d = new Date(yy, mm-1, dd+op);
        } else if(sign == '-') {
            d = new Date(yy, mm-1, dd-op);
        }

        yy = d.getFullYear();
        mm = d.getMonth() + 1;
        mm = (mm < 10) ? '0' + mm : mm;
        dd = d.getDate();
        dd = (dd < 10) ? '0' + dd : dd; 

        return '' + yy + '-' + mm + '-' + dd;
    }

    // 챌린지 참가 현황
    $('#challenge_list').on('click', function() {
        var uid = $(this).attr('data-part-id');

        $.ajax({
            url: '/join_challenges',
            type: 'get',
            data: {
                id: uid,
            },
            success: function() {
                location.href = '/join_challenges?id=' + uid;

            }
        });
    });

    // 챌린지 참가 페이지
    $('.entry_btn').on('click', function() {
        var eid = $(this).parent('div').attr('data-cha-id');

        console.log(eid);

        $.ajax({
            url: '/join_challenges/create',
            type: 'GET',
            data: {
                id: eid,
            },
            success: function() {
                location.href = '/join_challenges/create?id=' + eid;
            },
        });
    });

    // 창 추가 생성 막기 위한 변수
    var entry_count = 0;
      
    $('#pay_entry_fee').click(function(e){
        entry_count++;

        if(entry_count == 1) {
            var $label = $('<label for="entry_fee" id="entry_fee_label">참가비 설정</label>')
            var $input = $('<input type="text" id="entry_fee" name="entry_fee" placeholder="금액 설정"/>');

            $('#radio_bar').append($label);
            $('#radio_bar').append($input);
        }
        console.log('끝');
        console.log(entry_count);
    });

    $('#not_pay_entry_fee').click(function(e){
        $('#entry_fee_label').remove();
        $('#entry_fee').remove();

        entry_count = 0;
    });

    // 챌린지 도전
    $('#apply_challenge').on('click', function(e) {
        e.preventDefault();

        var start_date = $('#join_date').val();
        var end_date = $('#join_term').val();
        var entry_fee = $('#entry_fee').val();
        var test = dateDif(start_date, end_date);

        if(! entry_fee) {
            entry_fee = 0;
        }

        $.ajax({
            url: '/join_challenges',
            type: 'post',
            data: {
                challenge_id: $('#entry_form').attr('data-chal-id'),
                user_id: $('#user_id').attr('data-user-id'),
                date: start_date,
                term: dateDif(start_date, end_date),
                fee: entry_fee,
            },
            success: function() {
                location.href = "/challenges"
            }
        });
    });

    // 챌린지 확인
    $('.join_tr').on('click',function() {
        var sid = $(this).attr('data-cs-id');

        $.ajax({
            url: '/join_challenges/' + sid,
            type: 'get',
            success: function() {
                location.href = "/join_challenges/" + sid;
            }
        });
    });

    // 목록으로 이동
    $('#back_join').on('click', function() {
        var uid = $('#user_id').val();
        $.ajax({
            url: '/join_challenges',
            type: 'get',
            data: {
                id: uid,
            },
            success: function() {
                location.href = '/join_challenges?id=' + uid;
            }
        });
    });

    // 참여 챌린지 수정
    $('#edit_join').on('click', function() {
        var eid = $('#join_id').val();

        if(confirm('챌린지를 수정 하시겠습니까?')) {
            $.ajax({
                url: '/join_challenges/' + eid + '/edit',
                type: 'get',
                success: function() {
                    location.href = '/join_challenges/' + eid + '/edit';
                },
                error:function(request,status,error){
                    console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
            });
        }
    });

    // 참여 챌린지 수정
    $('#save_join').on('click', function(e) {
        e.preventDefault();

        var start_date = $('#join_date').val();
        var end_date = $('#join_term').val();
        var eid = $('#challenge_id').attr('date-join-id');

        $.ajax({
            url: '/join_challenges/' + eid,
            type: 'patch',
            data: {
                date: start_date,
                term: dateDif(start_date, end_date),
                fee : $('#entry_fee').val(),
            }, success: function() {
                location.href = "/join_challenges/" + eid;
            }
        });
    });

    $('#del_join').on('click', function() {
        var did = $('#join_id').val();
        var uid = $('#user_id').val();

        console.log(did, uid);
        if(confirm('챌린지를 삭제하시겠습니까?')) {
            $.ajax({
                url: '/join_challenges/' + did,
                type: 'delete',
                data: {
                    id: did,
                    user_id: uid,
                }, success: function() {
                    location.href = '/join_challenges?id=' + uid;
                }
            });
        }
    });

});