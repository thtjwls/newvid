//인덱스 부분 로그인 영역제어
$(function () {
    var indexId = $("#login_form_index_id");
    var indexPass = $("#login_form_index_pass");
    var indexSubmit = $("#login_form_index_submit");

    indexPass.keydown(function (e) {
        if (e.keyCode == 13) {
            indexLoginSubmit();
        }
    });

    indexSubmit.click(function () {
        indexLoginSubmit();
    })

    var page2SearchForm = $("#page2_search_form").children("input");

    page2SearchForm.keydown(function (e) {
        if (e.keyCode == 13) {
            page2ListSearch();
        }
    })
    


    function indexLoginSubmit() { //인덱스페이지 로그인 서브밋 액션은 이곳에다가 작성 해주세요.
        var urlPath = "lib/login_data.php";
        var indexLoginData = $("#login_submit_form").serialize();

        if (indexId.val() == "") {
            alert("아이디를 입력 해주세요.");
        } else if (indexPass.val() == "") {
            alert("비밀번호를 입력 해주세요.");
        } else {
            $.ajax({
                url: urlPath+"?mod=login",
                type: "POST",
                data: indexLoginData,
                success: function (data) {
                    if (data != "connect") {
                        alert("로그인에 실패하였습니다." + data)
                    } else {
                        location.href = "page2.php";
                    }
                }
            })
        }
    }
});

$(function () {
    var contaner = $(".page1_section").children("ul");
    var max = contaner.children("li").length;
    var i;
    for (var i = 2; i <= max + 1; i++) {
        (function (i) {
            $("#page_nav" + i).click(function () {
                location.href = "page"+i+".php";
            });
        })(i);
    }
});

function page2_list_del(idx) {
    var input = confirm("정말삭제하시겠습니까?");

    if (input == true) {
        location.href = "php/page2_module.php?mod=del&idx=" + idx;
    } else {
        return false;
    }
}

function page2ListSearch() {
    var search = $("#search").val();
    var date1 = $("#date1").val();
    var date2 = $("#date2").val();

    if (search == "" && date1 == "" && date2 == "") {
        alert("검색어를 입력 해주세요.");
    } else {
        location.href = "page2.php?search=" + search + "&date1=" + date1 + "&date2=" + date2;
    }
}

function page3ListSearch() {
    /* scale 조정을 위한 로직 */

    var search = $("#search").val();
    var scale = $("#scaleSize").val();
    var scaleSelected = $("#scaleSize > option");

    location.href = "page3.php?search=" + search + "&scale=" + scale;    
}

function page2ListFull() {
    location.href = "page2.php";
}

function page3ListFull() {
    location.href = "page3.php";
}


/* page2 datepicker */
$(function () {
    

    $("#date1").datepicker({
        showOn: "both",
        buttonImage: "img/calendar-icon.png",
        dateFormat: "yy-mm-dd",
        defaultDate: "+1w",
        changeMonth: true,
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        onClose: function (selectedDate) {
            $("#date2").datepicker("option", "minDate", selectedDate);
        }
    });

    $("#date2").datepicker({
        showOn: "both",
        buttonImage: "img/calendar-icon.png",
        dateFormat: "yy-mm-dd",
        defaultDate: "+1w",
        changeMonth: true,
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        onClose: function (selectedDate) {
            $("#date1").datepicker("option", "maxDate", selectedDate);
        }
    });
});

/* page2 datepicker end */

function page2_list_modify(idx) {
    $("#page2_modify_form").slideDown(300);

    $.ajax({
        url: "php/page2_module.php?mod=modify&idx=" + idx,
        type: "GET",
        success: function (data) {
            $("#page2_modify_data").html(data);
        }
    })
}

function page2ModiDataFunc() {
    var idx = $("#modiIdx").val();
    var dataParam = $("#page2_modify_form_data").serialize();

    $.ajax({
        url: "php/page2_module.php?mod=modiInsert",
        type: "POST",
        data: dataParam,
        success: function (data) {
            $("#page2_modify_form").slideUp(300, function () {
                location.reload();
            });
        }
    })
}

function page2_modify_close() {
    $("#page2_modify_form").slideUp(300);
}

function modiDateFunc() {
    $("#modiFuncDate").datepicker({        
        dateFormat: "yy-mm-dd",
        defaultDate: "+1w",
        changeMonth: true,
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
    });
}

/* 재고현황 엑셀 파일 다운로드 */

$(document).ready(function () {
    $(document).ready(function () {
        $("#ExportExcelBtn").on('click', function () {
            var uri = $("#jego_status").excelexportjs({
                containerid: "jego_status"
                , datatype: 'table'
                , returnUri: true
            });

            $(this).attr('download', 'ExportToExcel.xls').attr('href', uri).attr('target', '_blank');
        });
    });

    $(document).ready(function () {
        $("#ExportExcelBtnPage3").on('click', function () {
            var uri = $("#page3_BBS_Table").excelexportjs({
                containerid: "page3_BBS_Table"
                , datatype: 'table'
                , returnUri: true
            });

            $(this).attr('download', 'ExportToExcel.xls').attr('href', uri).attr('target', '_blank');
        });
    });
});


function page3Del(idx) {
    var input = confirm("정말 삭제하시겠습니까?");
    if (input == true) {
        $.ajax({
            url: "php/page3Mode.php?mode=del&idx=" + idx,
            success: function (data) {
                window.location.reload();
            }
        })
    } else {
        return false;
    }
}

function page3Scale(n) {
    $.ajax({
        url: "page3.php?scale=" + n,
        type: "GET",
        success: function (d) {
            //window.location.reload();
            console.log(d);
        }
    })
}