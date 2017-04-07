//product 글쓰기 폼 fade 효과 (on)
function productInsertFrom() {
    var container = $("#writeFormDiv");
    var title = $("#captionTitle");
    var foot = $("#wirteFormFootHend");

    title.html("품목 등록");
    foot.val("등록완료");
    container.css("display", "block");
    container.animate({
        opacity: 1,
    }, 300);

    wirteFuncAjax("insert");
};

function productModify(idx) {
    var container = $("#writeFormDiv");
    var title = $("#captionTitle");
    var foot = $("#wirteFormFootHend");

    $.ajax({
        url: "php/function.php?mod=modify&idx=" + idx,
        type: "GET",
        success: function (d) {
            $("#productHiddenData").html(d);
            udataFunc(d);            
        }
    });

    function udataFunc(d) {        
        var udata1 = $("#udata1").val();
        var udata2 = $("#udata2").val();
        var udata3 = $("#udata3").val();
        var udata4 = $("#udata4").val();
        var udata5 = $("#udata5").val();
        var udataCate = $("#udata6").val();        

        
        var idVariable = $("#udataidx").val()
        console.log(udataCate)

        $("#j_name").val(udata1);
        $("#j_date").val(udata2);
        $("#j_code").val(udata3);
        $("#j_coat").val(udata4);
        $("#j_etc").val(udata5);

        //체크안되서 막아놈
        //$(".writeFormCheckLabel input[type=radio]").removeAttr("checked");
        //$(".writeFormCheckLabel input[value=" + udataCate + "]").attr("checked","checked");

        //지식인 수정 2016-10-09
        //$(".writeFormCheckLabel input[value='" + udataCate + "']").attr("checked", "checked");
        $("#writeFormIdx").val(idVariable);
    }

    title.html("품목 수정");   
    foot.val("수정완료");
    container.css("display", "block");
    container.animate({
        opacity: 1,
    }, 300);

    wirteFuncAjax("modi");
}

function productModifyData() {
    var dataSheet = $("#writeForm").serialize();

    $.ajax({
        url: "php/function.php?mod=modifyInsert",
        type: "POST",
        data: dataSheet,
        success: function (d) {
            console.log(d);
            if (d == 0) {
                $("#cheet").load("/je #cheet");
                productFromDel();
            } else {
                
            }            
        }
    })
}
    
function wirteFuncAjax(mod) {
    var wirteFormFootHend = $("#wirteFormFootHend");
    var idxHend = $("#writeFormIdx");

    if (mod == "modi") {
        wirteFormFootHend.attr("onclick", "productModifyData();");
        idxHend.attr("name","idx")
    } else if (mod == "insert") {
        wirteFormFootHend.attr("onclick", "productWriteData();");
        idxHend.removeAttr("name");
    }
}


//product 글쓰기 폼 fade 효과 (off)
function productFromDel() {
    var container = $("#writeFormDiv");
    $("#writeFormDiv input[type=text], #writeFormDiv textarea").val("");
    

    container.animate({
        opacity: 0,
    }, 300, function () {
        container.css("display", "none");
    });
};

//product data insert
function productWriteData() {
    var _name = $("#j_name");
    var _date = $("#j_date");
    var _code = $("#j_code");
    var _coat = $("#j_coat");
    var _etc = $("#j_etc");
    var _cate = $("input[type=radio]:checked");
    var dataForm = $("#writeForm").serialize();    
    
    if (_name.val() == "") {
        alert("품명을 입력하세요.");
        _name.focus();
    } else if (_date.val() == "") {
        alert("입고일을 입력 하세요.");
        _date.focus();
    } else if (_code.val() == "") {
        alert("분류코드를 입력 하세요.");
        _code.focus();
    } else if (_coat.val() == "") {
        alert("금액을 입력하세요.\n금액을 모를경우 [0] 으로 입력 하세요.");
        _coat.focus();
    } else {
        $.ajax({
            url: "php/function.php?mod=insert",
            type: "POST",
            data: dataForm,
            success: function (data) {
                console.log(data);
                if (data == 1) {
                    alert("오류가 발생하였습니다.\n잠시 후 다시 시도 해주세요.");
                } else if (data == 0) {
                    alert("성공적으로 제출되었습니다.");
                    $("#writeForm input[type=text],textarea").val("");
                    $("#cheetTable").load("/je #cheetTable");
                } else {
                    alert("알수없는 오류");
                }
            }
        })
    }
}

$(function () {
    $("#j_date").datepicker({
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
    });

})



function productRemove(idx) {
    var input = confirm("정말 삭제하시겠습니까?");
    if (input == false) {
        return false;
    } else {
        $.ajax({
            url: "php/function.php?mod=delete&idx=" + idx,
            type: "GET",
            success: function (d) {
                if (d == 0) {
                    alert("삭제되었습니다.");
                    $("#cheet").load("/je #cheet");
                } else {
                    alert("삭제에 실패하였습니다. \n잠시 후 다시 시도해주세요.");
                    return false;
                }
            }
        });
    };
}

function search() {
    var searchData = $("#searchData").val();    

    if (searchData == "") {
        alert("검색어를 입력하세요.");
    } else {
        searchSubmitData();
    }

    function searchSubmitData() {
        location.href = "?search=" + searchData;
    }
}

function searchEmpty() {
    location.href = "?search=";
}

$(function () {
    $(document).ready(function () {
        $("#ExportExcelBtn").on('click', function () {
            var uri = $("#cheetTable").excelexportjs({
                containerid: "cheetTable"
                , datatype: 'table'
                , returnUri: true
            });

            $(this).attr('download', 'ExportToExcel.xls').attr('href', uri).attr('target', '_blank');
        });
    });
})