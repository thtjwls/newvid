$(document).ready(function () {
    $("#datepicker1").datepicker({
        dateFormat: 'yy-mm-dd',
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        yearSuffix: '년',
        numberOfMonths: 1,
        onSelect: function (selected) {
            $("#datepicker2").datepicker("option", "minDate", selected)
        }
    });

    $("#datepicker2").datepicker({
        dateFormat: 'yy-mm-dd',
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        yearSuffix: '년',
        numberOfMonths: 1,
        onSelect: function (selected) {
            $("#datepicker1").datepicker("option", "maxDate", selected)
        }
    });
});


$(document).ready(function () {
    $("#paper_save").click(function () {
        var $title = $("#tx_trex_subject").val();
        var $contents = $(".tx-content-container").val();
        
        if ($title == "") {
            alert("문서제목을 입력하세요.");
            return false;
        } else {
            $("#tx_editor_form").attr("action", "./lib/paper_insert.php?mod=paper_save");
            Editor.save();
        }
    })
})


//결제문서 저장
$(document).ready(function () {
    $("#approve_save").click(function () {
        window.open("./lib/approve_select.html", "결제문서저장", "width=300px,height=300px");
        $("<input type='hidden' name='sta' value='1' id='sta'>").appendTo("#approve_save"); //현재상태 스크립트
    })
});

//경영기획실 폴더 펼치기,접기
$(document).ready(function () {
    $(".show_buse1").click(function () {
        var $display_sta = $("#paper_submenu").css("display");
        if ($display_sta == "none") {
            $("#paper_submenu").css("display", "block");
        } else {
            $("#paper_submenu").css("display", "none");
        }
    })
});


/*
$(document).ready(function () {
    $(".header > ul > li").hover(
        function () {
            $(this).css("backgroundColor", "#FFF");
            $(this).css("border", "1px solid #FFF");
            $(this).css("color", "#999");
        },
        function () {
            $(this).css("backgroundColor", "#f22f00");
            $(this).css("border", "#f22f00");
            $(this).css("border", "1px solid #FFF");
        }        
    )
})
*/

