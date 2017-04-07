
var ids_email = $("#IDsearch_email");
var ids_tel = $("#IDsearch_tel");
var pss_id = $("#PASSsearch_id");
var pss_tel = $("#PASSsearch_tel");

var ids_msg = "이메일과 전화번호를 입력 해야합니다.";
var pss_msg = "아이디와 연락처를 입력 해야합니다.";

var support_text = $("#search_support_text");

function id_search_submit() {
    var dataForm = $("#ids_form");

    if (ids_email.val() == "") {
        alert(ids_msg);
    } else if (ids_tel.val() == "") {
        alert(ids_msg);
    } else {
        $.ajax({
            url: "control/control.UserImport.php?control=id_search_User&ad_Email=" + ids_email.val() + "&ad_TEL=" + ids_tel.val(),
            type: "GET",
            success: function (data) {
                if (data == "false") {
                    try {
                        support_text.text("등록 된 정보가 없습니다.");
                    } catch (e) { }
                } else {
                    try {
                        support_text.text("등록 된 아이디는 " + data + " 입니다.");
                        /*
                        setTimeout(function () {
                            support_text.text("");
                        },3000);                                                
                        */
                    } catch (e) { }
                }
            }
        })
    }
}

function pass_search_submit() {
    var dataForm = $("#pss_form");

    if (pss_id.val() == "") {
        alert(pss_msg);
    } else if (pss_tel.val() == "") {
        alert(pss_msg);
    } else {
        $.ajax({
            url: "control/control.UserImport.php?control=pass_search_User&ad_ID=" + pss_id.val() + "&ad_TEL=" + pss_tel.val(),
            type: "GET",
            success: function (data) {
                console.log(data);
                if (data == "false") {
                    support_text.text("등록 된 정보가 없습니다.");                    
                } else {
                    dataForm.submit();
                }
            }
        })
    }
}