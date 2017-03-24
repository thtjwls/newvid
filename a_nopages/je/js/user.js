$(function () {
    var _id = $("#id");
    var _pass = $("#pass");
    var _passConfirm = $("#passConfirm");
    var _name = $("#name");
    var _company = $("#company");
    var _buse = $("#buse");
    var _tel = $("#tel");
    var _postNum = $("#postNum");
    var _addr = $("#address");
    var _inAddr = $("#inAddr");
    var c_id = $("#c_id");
    var c_pass = $("#c_pass");
    var c_passConfirm = $("#c_passConfirm");
    

    //항목 값 추출

    _id.blur(function () {
        //아이디 포커스 이벤트 시 ajax 카운트 가져옴
        _idCheck(_id.val());
    })

    _pass.blur(function () {
        if (_pass.val().length < 6) {
            $("#passSub").css("display", "block");
            $("#passSub").css("color", "red");
            $("#passSub").html("비밀번호가 너무 짧습니다.");
        } else {
            $("#passSub").html("");
            completeCheck("pass");
        }

        console.log(_pass.val().length);
    });

    _passConfirm.blur(function () {
        if (_pass.val() != _passConfirm.val()) {
            $("#passConfirmSub").css("display", "block");
            $("#passConfirmSub").css("color", "red");
            $("#passConfirmSub").html("비밀번호가 틀립니다.");
        } else {
            $("#passConfirmSub").html("");
            completeCheck("passConfirm");
        }
    });

    _name.blur(function () {
        if ($(this).val() != "") {
            completeCheck("name");
        } else if ($(this).val() == "") {

        }
    })

    _tel.blur(function () {
        if ($(this).val() != "") {
            completeCheck("tel");
        } else if ($(this).val() == "") {

        }
    })

    _addr.blur(function () {
        if ($(this).val() != "") {
            completeCheck("addr");
        } else if ($(this).val() == "") {

        }
    })

    _inAddr.blur(function () {
        if ($(this).val() != "") {
            completeCheck("inAddr");
        } else if ($(this).val() == "") {
        }
    })

    //항목 값 추출 끝

    //항목 함수
    function _idCheck(p) { //아이디체크
        $.ajax({
            url: "php/user.php?mod=idCheck&id=" + p,
            type: "GET",
            success: function (e) {
                console.log(e);
                if (e == "true") {
                    $("#idSub").html("");
                    $("#c_id").val("ok");
                } else {
                    $("#idSub").html("이미 사용중인 아이디 입니다.");
                    $("#c_id").val("");
                }
            }
        })
    }

    function completeCheck(c) {
        $("#c_" + c).val("ok");
    }

    //항목 함수 끝

    //Submit 액션
    $("#formSubmitBtn").click(function () {
        var userAddForm = $("#userAddForm");
        var addData = userAddForm.serialize();

        if (_id.val() == "") {
            alert("아이디를 입력 해주세요");
            _id.focus();
        } else if (_pass.val() == "") {
            alert("비밀번호를 입력 하세요.");
            _pass.focus();
        } else if (_passConfirm.val() == "") {
            alert("비밀번호 확인을 입력하세요.");
            _passConfirm.focus();
        } else if (_name.val() == "") {
            alert("이름을 입력 하세요.");
            _name.focus();
        } else if (_tel.val() == "") {
            alert("연락처를 입력 해주세요.");
            _tel.focus();
        } else if (_postNum.val() == "") {
            alert("주소를 입력해주세요.");
            _postNum.focus();
        } else if (_addr.val() == "") {
            alert("주소를 입력 해주세요.");
            _addr.focus();
        } else if (_inAddr.val() == "") {
            alert("상세주소를 입력 해주세요.");
            _inAddr.focus();
        } else if (c_id.val() != "ok") {
            alert("사용 할 수 있는 아이디를 입력 해주세요.");
            _id.focus();
        } else if (c_pass.val() != "ok") {
            alert("사용 할 수 있는 비밀번호를 입력 해주세요.");
            _pass.focus();
        } else if (c_passConfirm.val() != "ok") {
            alert("비밀번호를 확인 해주세요.");
            c_passConfirm.focus();
        } else {
            $.ajax({
                url: "php/user.php?mod=insert",
                type: "post",
                data: addData,
                success: function (data) {
                    try {
                        if (data == "false") {
                            alert("가입에 실패하였습니다. 잠시 후 다시 시도해주세요.\n문제가 지속 될 경우 관리자에게 문의하세요.");
                            console.log(data);
                        } else if (data == "true") {
                            alert("가입에 성공했습니다.");
                            console.log(data);
                            location.href = "/je";
                        } else {
                            console.log(data);
                            console.log(addData);
                        }
                    } catch (e) {
                        console.log(e, data);
                    }
                }
            })
        }
    });
});

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
            document.getElementById('postNum').value = data.zonecode; //5자리 새우편번호 사용
            document.getElementById('addr').value = fullAddr;

            // 커서를 상세주소 필드로 이동한다.
            document.getElementById('inAddr').focus();
        }
    }).open();
}

//로그인 라이트박스
function loginLightBox() {
    container = $("#loginTab");
    documentHeight = $(document).height();

    container.css("display", "block");
    container.css("height", documentHeight);
    container.animate({
        opacity: 0.8
    }, 300);
}

function loginLightBoxClose() {
    container = $("#loginTab");

    container.animate({
        opacity: 0
    }, 300, function () {
        container.css("display", "none");
    });    
}

function logout() {
    $.ajax({
        url: "php/user.php?mod=logout",
        success: function () {
            $("#headerNav").load("index.php #headerNav");
            $("#cheet").load("/je #cheet");
        }
    })
}

function _login() {
    var dataForm = $("#loginForm");
    var Logindata = dataForm.serialize();
    var _id = $("#loginId");
    var _pass = $("#loginPass");
    var formSupport = $("#formSupport");
    var msg = "아이디 또는 비밀번호가 다릅니다.";
    var waitMsg = "승인 대기중인 아이디입니다.\n관리자에게 문의하세요.\n032-452-0184";
    var fatalColor = "red";
    var warrningColor = "blue";



    $.ajax({
        url: "php/user.php?mod=login",
        data: Logindata,
        type: "POST",
        success: function (d) {
            console.log(d);
            try {
                switch (d) {
                    case "false":
                        formSupport.css("color", fatalColor);
                        formSupport.html(msg);
                        break;
                    case "true":
                        loginLightBoxClose();
                        $("#headerNav").load("index.php #headerNav");
                        $("#cheet").load("/je #cheet");
                        break;
                    case "wait":
                        formSupport.css("color", warrningColor);
                        formSupport.html(waitMsg);
                        break;
                    default:
                        break;
                }
            } catch (e) {
                console.log(e);
                alert("예외가 발생 하였습니다." + e + "\n관리자에게 문의하세요.");
            }
        }
    })
}

$(function () {
    $("#formModiBtn").click(function () {
        var modiData = $("#userAddForm").serialize();
        var _pass = $("#pass");
        var _passConfirm = $("#passConfirm");
        var _buse = $("#buse");
        var _company = $("#company");
        var _tel = $("#tel");
        var _postNum = $("#postNum");
        var _addr = $("#addr");
        var _inAddr = $("#inAddr");

        if (_pass.val() == "") {
            alert("비밀번호를 입력 해주세요.");
        } else if (_passConfirm.val() == "") {
            alert("비밀번호 확인을 입력 해주세요.");                    
        } else if (_postNum.val() == "") {
            alert("주소를 입력 해주세요.");
        } else if (_addr.val() == "") {
            alert("주소를 입력 해주세요.");
        } else if (_inAddr.val() == "") {
            alert("주소를 입력 해주세요.");
        } else if ($("#c_pass").val() != "ok") {
            alert("사용 할 수 있는 비밀번호를 입력 해주세요.");
        } else {
            $.ajax({
                url: "php/user.php?mod=modify",
                type: "POST",
                data: modiData,
                success: function (d) {
                    console.log(d);
                    if (d == "false") {
                        alert("수정에 실패하였습니다. 잠시 후 다시 시도해주세요.\n문제가 지속되면 관리자에게 문의하세요.");
                    } else if (d == "true") {
                        alert("수정되었습니다.");
                        window.location.reload();
                    }
                }
            })
        }
    })
})