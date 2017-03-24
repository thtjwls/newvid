function LoginData() {
    var param = $("#LoginFormData").serialize();
    var paramFile = "php/dataParam.php";    
    var err = "등록되지 않은 아이디 또는 비밀번호가 맞지 않습니다.";
    var noAccess = "승인되지 않은 아이디 입니다.";
    var FatalErr = "치명적인 오류";
    var supportContainer = $("#LoginSupport");

    $.ajax({
        url: paramFile + "?mod=loginChk",
        type: "POST",
        data:param,
        success: function (data) {
            if (data == 0) {
                try {
                    window.location.href = "?mod=main";                    
                    console.log(data);
                } catch (e) {
                    Console.log(e);
                }
            } else if (data == 1) {
                supportContainer.html(err);
                clearHTML(supportContainer);
                console.log("d : " + data);
            } else if (data == 2) {
                supportContainer.html(noAccess);
                clearHTML(supportContainer);
                console.log("d : " + data);
            } else {
                supportContainer.html(FatalErr);
                clearHTML(supportContainer);
                console.log("d : " + data);
            }
        }
    })
}

function clearHTML(d) {
    setTimeout(function () {
        d.html("");
    },2000);
}