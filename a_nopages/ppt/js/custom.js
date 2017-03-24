$(function () {
    $("#start_time, #end_time").timepicki();

    $("#regi_date").datepicker({
        //showOn: "both",
        //buttonImage: "img/calendar-icon.png",
        dateFormat: "yy-mm-dd",
        //defaultDate: "+1w",
        changeMonth: true,
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
    });
})

function dateSend() {
    var dataParam = $("#sendForm").serialize();
    var cat1 = $("#regi_date").val();
    var cat2 = $("#start_time").val();
    var cat3 = $("#end_time").val();

    if ((cat1 && cat2 && cat3) == "") {
        alert("필드값엔 공백이 있을수 없어용 ~_~");
    } else {
        $.ajax({
            url: "input.php?mod=insert",
            type: "POST",
            data: dataParam,
            success: function (data) {
                console.log(data);
                if (data == "insertOk") {
                    window.location.reload();
                } else {
                    alert("조금있다 다시시도하세용!!");
                }
            }
        })
    }    
}

function TotalCoat() {
    var tt = $("#Hours").val();
    var times = $("#totalTime").val();

    
    $("<span></span>").html(tt * times + "원").appendTo(".totalCost");
    
}

$(function () {
    $("#deletefunc").click(function () {
        var input = confirm("삭제하면 데이터를 복구할 수 없어용\n정말삭제하시겠어요?");

        if (input == true) {
            $.ajax({
                url: "input.php?mod=del",
                success: function (data) {
                    window.location.reload();
                }
            })
        } else {
            return false;
        }
    });    
})

function ListDel(idx) {
    var LDel = confirm("정말 삭제하시겠어요?");

    if (LDel == true) {
        $.ajax({
            url: "input.php?mod=Ldel&idx=" + idx,
            success: function (data) {
                window.location.reload();
            }
        })
    } else {
        return false;
    }
}
