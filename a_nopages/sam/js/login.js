var
    url = "control/control.Login.php",
    input_ID = $("input[name=input_ID]"),
    input_PASS = $("input[name=input_PASS]"),    
    sup = $("#login_support");

function loginSetup() {

    if (input_ID.val() == "") {
        sup.text("아이디를 입력 해야 합니다.");
    } else if (input_PASS.val() == "") {
        sup.text("비밀번호를 입력 해야 합니다.");
    } else {
        data_submit_Param();
    }    
}

function data_submit_Param() {
    var Param = $("#login_data_form").serialize();

    $.ajax({
        url: url,
        type: "POST",
        data: Param,
        success: function (data) {
            console.log(data);
            if (data == "false") {
                sup.text("아이디 또는 비밀번호가 다릅니다.")                
            } else if (data == "true") {
                sup.text("");
                window.location.href = "./index.php";
            } else {

            }
        }
    })
}    