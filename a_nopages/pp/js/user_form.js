$(function () {
    var name = $("#name");
    var id = $("#id");
    var id_chk = $("#id_chk");
    var pass = $("#pass");
    var pass_chk = $("#passchk");
    var nick = $("#nick");
    var nickChkbtn = $("#nickChkbtn");    
    var post_num = $("#post_num");
    var addresss = $("#address");
    var inner_address = $("#inner_address");
    var tel1 = $("#tel1");
    var tel2 = $("#tel2");
    var tel3 = $("#tel3");
    var idConfirm = $("#idConfirm");
    var passConfirm = $("#passConfirm");
    var passchkConfirm = $("#passchkConfirm");
    var nickConfirm = $("#nickConfirm");


    id_chk.click(function () {
        if (id.val() == "") {
            $("#id_chk_help").css("color", "red");
            $("#id_chk_help").html("아이디를 입력 해주세요.");
        } else if (!id.val().match(/([a-zA-Z0-9].*)|(.*[a-zA-Z0-9])/) || id.val().length < 3 || id.val().length >= 20) {
            $("#id_chk_help").css("color", "red");
            $("#id_chk_help").html("아이디는 영문 또는 숫자 3자이상으로 입력해주세요.");
        } else {
            $.ajax({
                url: "module/member.php?mod=idCheck&id="+id.val(),
                success: function (data) {                    
                    if (data == "ok") {
                        $("#id_chk_help").css("color", "blue");
                        $("#id_chk_help").html("사용가능 한 아이디 입니다.");
                        $("#idConfirm").val("ok");
                    } else {
                        $("#id_chk_help").css("color", "red");
                        $("#id_chk_help").html("이미 사용중인 아이디 입니다.");
                    }                    
                }
            })
        }
    });

    pass.keyup(function () {
        if (pass.val() == "" || !pass.val().match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~])|([!,@,#,$,%,^,&,*,?,_,~].*[a-zA-Z0-9])/) || pass.val().length < 6) {            
            $("#pass_chk_help").html("비밀번호는 6자이상 영문,숫자,특수문자 조합으로 만들어주세요.")
        } else {
            $("#pass_chk_help").html("");
            $("#passConfirm").val("ok");
        }
    })

    pass_chk.keyup(function () {
        if (pass.val() != pass_chk.val()) {
            $("#pass_confirm").css("color", "red");
            $("#pass_confirm").html("비밀번호가 일치하지 않습니다.");
        } else {
            $("#pass_confirm").css("color", "blue");
            $("#pass_confirm").html("비밀번호 확인");
            $("#passchkConfirm").val("ok");
        }
    })

    nickChkbtn.click(function () {
        if (nick.val() == "") {
            $("#nick_chk_help").css("color", "red");
            $("#nick_chk_help").html("닉네임을 입력 해 주세요.");
        } else if (nick.val().match(/(.*[!,@,#,$,%,^,&,*,?,_,~])|([!,@,#,$,%,^,&,*,?,_,~].*)/)) {
            $("#nick_chk_help").css("color", "red");
            $("#nick_chk_help").html("닉네임에 특수문자가 들어갈 수 없습니다.");
        } else {
            $.ajax({
                url: "module/member.php?mod=nickCheck&nick=" + nick.val(),
                success: function (data) {
                    if (data == "ok") {
                        $("#nick_chk_help").css("color", "blue");
                        $("#nick_chk_help").html("사용가능 한 닉네임 입니다.");
                        $("#nickConfirm").val("ok");
                    } else {
                        $("#nick_chk_help").css("color", "red");
                        $("#nick_chk_help").html("이미 사용중인 닉네임 입니다.");
                    }
                }
            })
        }
    })

    $("#form_fin").click(function () {
        if (name.val() == "") {
            alert("이름을 입력 해주세요.");
            name.focus();
        } else if (id.val() == "") {
            alert("아이디를 입력 해주세요.");
            id.focus();
        } else if (pass.val() == "") {
            alert("비밀번호를 입력 해주세요.");
            pass.focus();
        } else if (pass_chk.val() == "") {
            alert("비밀번호 확인을 입력 해주세요.");
            pass_chk.focus();
        } else if (nick.val() == "") {
            alert("닉네임을 입력 해주세요.");
            nick.focus();
        } else if(post_num.val() ==""){
            alert("우편번호 확인을 해주세요.");
            post_num.focus();
        } else if (addresss.val() == "") {
            alert("주소확인을 해주세요.");
            addresss.focus();
        } else if (inner_address.val() == "") {
            alert("상세주소를 입력 해주세요.");
            inner_address.focus();
        } else if (idConfirm.val() != "ok") {
            alert("아이디 중복확인을 해주세요.");
        } else if (passConfirm.val() != "ok") {
            alert("비밀번호를 입력 해주세요.")
        } else if (passchkConfirm.val() != "ok") {
            alert("비밀번호 확인을 해주세요.");
        } else if (nickConfirm.val() != "ok") {
            alert("닉네임 중복확인을 해주세요.");
        } else {
            $("#member_ad_form").submit();
        }
    })

    $(".memberModify").click(function () {
        if (pass.val() == "") {
            alert("비밀번호를 입력 해주세요.");
            pass.focus();
        } else if (pass_chk.val() == "") {
            alert("비밀번호 확인을 입력 해주세요.");
            pass_chk.focus();
        } else if (post_num.val() == "") {
            alert("우편번호 확인을 해주세요.");
            post_num.focus();
        } else if (addresss.val() == "") {
            alert("주소확인을 해주세요.");
            addresss.focus();
        } else if (inner_address.val() == "") {
            alert("상세주소를 입력 해주세요.");
            inner_address.focus();
        } else if (passConfirm.val() != "ok") {
            alert("비밀번호를 입력 해주세요.")
        } else if (passchkConfirm.val() != "ok") {
            alert("비밀번호 확인을 해주세요.");
        } else {
            var input = confirm("정말 수정하시겠습니까.?");
            if (input == true) {
                $(".memberModifyForm").submit();
            } else {
                return false;
            }
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


function login_form() {
    var loginId = $("#login_id");
    var loginPass = $("#login_pass");

    if (loginId.val() == "") {
        $(".inner_login_wrap > p").css("color", "red");
        $(".inner_login_wrap > p").html("아이디를 입력 해주세요.");
    } else if (loginPass.val() == "") {
        $(".inner_login_wrap > p").css("color", "red");
        $(".inner_login_wrap > p").html("비밀번호를 입력 해주세요.");
    } else {
        /* 모듈 수정 */
        var param = $("#login_wrap_input_form").serialize();
        var msg = "아이디 또는 비밀번호를 확인 해주세요.";
        
        $.ajax({
            url: "module/member.php?mod=login",
            data: param,
            type : "POST",
            success: function (data) {
                if (data == "no") {
                    $(".inner_login_wrap > p").css("color", "red");
                    $(".inner_login_wrap > p").html(msg);
                } else {
                    location.href = "index.php";
                }
            }
        })        
        //$(".login_wrap_input_form").submit();
    }
}
