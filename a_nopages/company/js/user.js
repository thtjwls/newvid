function login_btn() {
    var inputId = $("#login_id").val();
    var inputPass = $("#login_pass").val();

    if (inputId == "") {
        alert("아이디를 입력 해 주세요.");
        $("#login_id").focus();
    } else if (inputPass == "") {
        alert("비밀번호를 입력 해 주세요.");
        $("#login_pass").focus();
    } else {
        $("#login_form").submit();
    };
};

$(document).ready(function () {
    $("#logins").click(function () {
        $.ajax({
            url: "../user/user.php?mod=login",
            type: "post",
            data: $("#login_form").serialize(),
            success: function (data) {
                $("#login_header").html(data);
            }
        });
    });
});

$(document).ready(function () {    
    $("#id_check").click(function () {
        //아이디 중복확인
        var $addFormId = $("#addFormId").val();
        var $idCheckResult = $("id_check_result").val();
        if ($addFormId == "") {
            alert("아이디를 입력 해주세요.");
        } else if (!$addFormId.match(/([a-zA-Z0-9].*)|(.*[a-zA-Z0-9])/) || $addFormId.length < 3 || $addFormId.length >= 20) {
            alert("아이디는 한글이 들어갈 수 없습니다.\n영문+숫자 3~20");
        } else {
            $.ajax({
                url: "../user/user.php?mod=idcheck&id=" + $addFormId,
                success: function (data) {
                    $("#id_result").html(data);
                }
            })
        }
    })

    $("#pass").keyup(function () {
        //pass value
        
        var $pass = $("#pass").val();        
        
        if (!$pass.match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~])|([!,@,#,$,%,^,&,*,?,_,~].*[a-zA-Z0-9])/) || $pass.length < 6) {
            $("#pass_help").html("비밀번호는 6자이상 영문+숫자+특수문자 조합으로 만들어주세요.");
        } else {
            $("#pass_help").html("");
        }        
    })

    $("#pass_confirm").keyup(function () {
        //pass confirm

        var $pass_confirm = $("#pass_confirm").val();
        var $pass = $("#pass").val();        

        if ($pass != $pass_confirm) {
            $("#pass_confirm_help").css("color", "#e23636");
            $("#pass_confirm_help").html("비밀번호가 일치하지 않습니다.");
        } else {
            $("#pass_confirm_help").css("color", "#0f40e1");
            $("#pass_confirm_help").html("비밀번호 확인");            
        }
    })



    $("#nick_check").click(function () {
        //닉네임 중복 확인
        var $addFormNick = $("#nick").val();
        var $nickCheckResult = $("#nick_check_help");

        if ($addFormNick == "") {
            alert("닉네임을 입력 해주세요.");
        } else {
            $.ajax({
                url: "../user/user.php?mod=nick_check&nick=" + $addFormNick,
                success: function (data) {
                    $("#nick_check_help").html(data);
                }
            })
        }
    })

    $("#add_form").click(function () {
        //회원가입폼 submit

        var $inputName = $("#name");
        var $inputId = $("#addFormId");
        var $inputPass = $("#pass");
        var $inputPassConfirm = $("#pass_confirm");
        var $inputEmail = $("#email");
        var $inputNick = $("#nick");
        var $inputTel1 = $("#tel1");
        var $inputTel2 = $("#tel2");
        var $inputTel3 = $("#tel3");
        var $inputPostNum = $("#post_num");
        var $inputAddress = $("#address");
        var $inputInnerAddress = $("#inner_address");
        var $resultId = $("#id_check_result");
        var $resultNick = $("#nick_check_result");

        if ($inputName.val() == "") {
            alert("이름을 입력 해주세요.");
        } else if ($inputId.val() == "") {
            alert("아이디를 입력 해주세요.");
        } else if ($inputPass.val() == "") {
            alert("비밀번호를 입력 해주세요.");
        } else if ($inputPassConfirm.val() == "") {
            alert("비밀번호 확인을 해주세요.");
        } else if (!$inputPass.val().match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~])|([!,@,#,$,%,^,&,*,?,_,~].*[a-zA-Z0-9])/) || $inputPass.val().length < 6) {
            alert("비밀번호는 정규식에 맞춰 입력 해주세요.\n숫자,문자,특수문자 조합 6자리 이상");
        } else if ($inputEmail.val() == "") {
            alert("이메일을 입력 해주세요.");
        } else if ($inputNick.val() == "") {
            alert("닉네임을 입력 해주세요.");
        } else if ($inputTel1.val() == "") {
            alert("전화번호를 입력 해주세요.");
        } else if ($inputTel2.val() == "") {
            alert("전화번호를 입력 해주세요.");
        } else if ($inputTel3.val() == "") {
            alert("전화번호를 입력 해주세요.");
        } else if ($inputPostNum.val() == "") {
            alert("주소를 입력해주세요.");
        } else if ($inputAddress.val() == "") {
            alert("주소를 입력해주세요.");
        } else if ($inputInnerAddress.val() == "") {
            alert("주소를 입력해주세요.");
        } else if ($resultId.val() == "") {
            alert("아이디 중복확인을 해주세요. ");
        } else if ($resultNick.val() == "") {
            alert("닉네임 중복 확인을 해주세요.");
        } else if ($inputPass.val() != $inputPassConfirm.val()) {
            alert("비밀번호 확인을 해주세요.");        
        } else {
            $("#user_insert").submit();
        }
    })

    $("#modify_form").click(function () {
        //modify submit

        var $inputPass = $("#pass");
        var $inputPassConfirm = $("#pass_confirm");
        var $inputEmail = $("#email");
        var $inputTel1 = $("#tel1");
        var $inputTel2 = $("#tel2");
        var $inputTel3 = $("#tel3");
        var $inputPostNum = $("#post_num");
        var $inputAddress = $("#address");
        var $inputInnerAddress = $("#inner_address");


        if ($inputPass.val() == "") {
            alert("비밀번호를 입력 해주세요.");
        } else if ($inputPassConfirm.val() == "") {
            alert("비밀번호 확인을 해주세요.");
        } else if (!$inputPass.val().match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~])|([!,@,#,$,%,^,&,*,?,_,~].*[a-zA-Z0-9])/) || $inputPass.val().length < 6) {
            alert("비밀번호는 정규식에 맞춰 입력 해주세요.\n숫자,문자,특수문자 조합 6자리 이상");
        } else if ($inputEmail.val() == "") {
            alert("이메일을 입력 해주세요.");
        } else if ($inputTel1.val() == "") {
            alert("전화번호를 입력 해주세요.");
        } else if ($inputTel2.val() == "") {
            alert("전화번호를 입력 해주세요.");
        } else if ($inputTel3.val() == "") {
            alert("전화번호를 입력 해주세요.");
        } else if ($inputPostNum.val() == "") {
            alert("주소를 입력해주세요.");
        } else if ($inputAddress.val() == "") {
            alert("주소를 입력해주세요.");
        } else if ($inputInnerAddress.val() == "") {
            alert("주소를 입력해주세요.");
        } else if ($inputPass.val() != $inputPassConfirm.val()) {
            alert("비밀번호 확인을 해주세요.");
        } else {
            $("#user_modify").submit();
        }
    })
})




/* 다음 주소 api */
function post_code() {
    new daum.Postcode({
        oncomplete: function (data) {
            // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

            // 각 주소의 노출 규칙에 따라 주소를 조합한다.
            // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
            var fullAddr = ''; // 최종 주소 변수
            var extraAddr = ''; // 조합형 주소 변수

            // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
            if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                fullAddr = data.roadAddress;

            } else { // 사용자가 지번 주소를 선택했을 경우(J)
                fullAddr = data.jibunAddress;
            }

            // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
            if (data.userSelectedType === 'R') {
                //법정동명이 있을 경우 추가한다.
                if (data.bname !== '') {
                    extraAddr += data.bname;
                }
                // 건물명이 있을 경우 추가한다.
                if (data.buildingName !== '') {
                    extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                fullAddr += (extraAddr !== '' ? ' (' + extraAddr + ')' : '');
            }

            // 우편번호와 주소 정보를 해당 필드에 넣는다.
            document.getElementById('post_num').value = data.zonecode; //5자리 새우편번호 사용
            document.getElementById('address').value = fullAddr;

            // 커서를 상세주소 필드로 이동한다.
            document.getElementById('inner_address').focus();
        }
    }).open();
}
