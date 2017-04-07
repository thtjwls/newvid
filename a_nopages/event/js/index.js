$(function () {
    var submitBtn = $("#submitBtnId");
    var inputName = $("input[name=name]");
    var inputTel1 = $("input[name=tel1]");
    var inputTel2 = $("input[name=tel2]");
    var inputTel3 = $("input[name=tel3]");
    var nameHelper = $("#nameHelper");
    var telHelper = $("#telHelper");
    var dengerColor = "#dd3939";

    submitBtn.click(function () {
        var dataParam = $("#lotsForm").serialize();

        if (inputName.val() == "") {
            Helper(nameHelper, dengerColor, inputName);
        } else if (inputTel1.val() == "") {
            Helper(telHelper, dengerColor, inputTel1);
        } else if (inputTel2.val() == "") {
            Helper(telHelper, dengerColor, inputTel2);
        } else if (inputTel3.val() == "") {
            Helper(telHelper, dengerColor, inputTel3);
        } else {
            $.ajax({
                url: "lib/lotsInput.php?mod=confirm",
                type: "POST",
                data: dataParam,
                success: function (data) {
                    console.log(data);
                    if (data == "telFalse") {
                        if (telFalseConfirm() == true) {
                            insertData(dataParam);
                            console.log(dataParam);
                        } else {
                            return false;
                        }
                    } else if (data == "telTrue") {
                        insertData(dataParam);
                    }
                }
            })
        }
    })

    function dataConfirm() {
        $("#lotsForm").attr("action", "lib/lotsInput.php?mod=confirm");
        $("#lotsForm").submit();
    }

    function dataInsert() {
        $("#lotsForm").attr("action", "lotsInput.php?mod=insert");
        $("#lotForm").submit();
    }

    function Helper(d, c, i) {
        d.css("color", c);
        d.css("display", "inline");
        i.focus();
    }

    function insertData(dataP) {
        $.ajax({
            url: "lib/lotsInput.php?mod=insert",
            type: "POST",
            data: dataP,
            success: function (dataP) {
                window.location.reload();
                console.log(dataP);
            }
        })
    }

    function telFalseConfirm() {
        var input = confirm("중복된 연락처가 있습니다.\n무시하고 등록하시겠습니까?");

        return input;
    }
});

function userDel(id) {
    var delConfirm = confirm("정말 삭제하시겠습니까?");

    if (delConfirm == true) {
        $.ajax({
            url: "lib/lotsInput.php?mod=del&idx=" + id,
            success: function (data) {
                console.log(data);
                if (data == "delSuccess") {
                    window.location.reload();
                } else {
                    alert("삭제 중 문제가 발생했습니다. 잠시 후 다시 시도해주세요.\n문제가 지속 될 경우 관리자에게 문의하세요.");
                }
            }
        })
    }
}

function lotsActive() {
    var lotsCnt = $("#lotsUserCnt").val();

    $.ajax({
        url: "lib/lotsInput.php?mod=lotsAct&num=" + lotsCnt,
        success: function (data) {
            console.log(data);
            $(".lotsA").slideDown(300);
            $("#appendToData").html(data);
        }
    });
}

function dataReset() {
    var dataR = confirm("DB의 들어있는 모든 데이터를 리셋합니다. \n한번 지워진 자료는 복구되지않습니다.\n데이터를 삭제하시겠습니까?");

    if (dataR == false) {
        return false;
    } else {
        $.ajax({
            url: "lib/lotsInput.php?mod=clear",
            success: function () {
                window.location.reload();
            }
        })
    }
}

/* 재고현황 엑셀 파일 다운로드 */

$(document).ready(function () {
    $(document).ready(function () {
        $("#ExportExcelBtn").on('click', function () {
            var uri = $("#lotsATable").excelexportjs({
                containerid: "lotsATable"
                , datatype: 'table'
                , returnUri: true
            });            

            $(this).attr('download', 'ExportToExcel.xls').attr('href', uri).attr('target', '_blank');
        });
    });
});


$(function () {
    $("#ExportExit").click(function () {
        $(".lotsA").slideUp();
    })    
})

function dateView() {
    var toDat = new Date();    

    alert(toY);
}

