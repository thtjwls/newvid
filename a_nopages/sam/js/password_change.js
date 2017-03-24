var dataForm = $("#password_search_form");
var input_pass = $("#change_password");
var input_confirm_pass = $("#change_password_confirm");
var chk_input_password = $("#input_password_support_text");
var matchPass = /^(?=.*[a-zA-Z])((?=.*\d)|(?=.*\W)).{6,20}$/;

var dengerMsg = "Check youre Password...";
var serverErrMsg = "Server Fatal Error...!!";

function submitPassChange()
{
    if (input_pass.val() == "") {
        chk_input_password.dengerMsg(dengerMsg);
    } else if (input_confirm_pass.val() == "") {
        chk_input_password.dengerMsg(dengerMsg);
    } else if (!input_pass.val().match(matchPass)) {
        chk_input_password.dengerMsg(dengerMsg);
    } else if (input_pass.val() != input_confirm_pass.val()) {
        chk_input_password.dengerMsg(dengerMsg);
    } else {
        passwordAjaxSubmit();
    }
}

function passwordAjaxSubmit() {
    $.ajax({
        url: "control/control.UserImport.php?control=passChangeUser",
        data: dataForm.serialize(),
        type: "POST",
        success: function (d) {
            console.log("d : " + d);
            if (d == "false") {
                try {
                    chk_input_password.dengerMsg(serverErrMsg);
                } catch (e) { console.log(e); }
            } else if (d == "true") {
                try {
                    alert("비밀번호가 변경 되었습니다.");
                    window.location.href = "./?mod=loginView";
                } catch (e) { console.log(e); }
            }
        },
    });
};

$.fn.extend({    
    dengerMsg: function (m) {

        this.text(m);
        this.slideDown();

        setTimeout(function () {            
            chk_input_password.slideUp();
            chk_input_password.text("");
        },2000);
    },    
})