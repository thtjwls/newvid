var    
    ad_NAME             = $("input[name=ad_NAME]"),
    ad_Name_Chk         = $("#form_id_Chk"),
    ad_Pass_Chk         = $("#form_pass_Chk"),
    ad_Pass_Cofirm_Chk  = $("#form_passConfirm_Chk"),
    ad_ID               = $("input[name=ad_ID]"),
    ad_PASS             = $("input[name=ad_PASS]"),
    ad_PASS_confirm     = $("input[name=ad_PASS_confirm]"),
    ad_TEL              = $("input[name=ad_TEL]"),
    ad_Email            = $("input[name=ad_Email]"),
    ad_POST_NUM         = $("input[name=ad_POST_NUM]"),
    ad_ADDRESS          = $("input[name=ad_ADDRESS]"),
    ad_DETAIL_ADDRESS   = $("input[name=ad_DETAIL_ADDRESS]"),
    ad_agree            = $("#ad_agree");
    
//패스워드 유효성 검사
    var matchPass = /^(?=.*[a-zA-Z])((?=.*\d)|(?=.*\W)).{6,20}$/;

$(function () {
    dataChk();
})

function dataChk() {
    //해당 필드 포커스아웃 이벤트

    var support;
    

    ad_NAME.blur(function () {
        ck_empty(1, "NAME");
    });


    ad_ID.blur(function () {
        id_ajax_submit();
    });

    ad_PASS.blur(function () {        
        pass_default_chk();
    })


    ad_PASS_confirm.blur(function () {
        ck_empty(4, "PASS_confirm");
    })

    ad_PASS_confirm.keyup(function () {
        pass_confirm_chk();
    })      

    ad_TEL.blur(function () {
        ck_empty(5, "TEL");
    })

    ad_Email.blur(function () {
        ck_empty(6, "Email");
    })

    ad_POST_NUM.focus(function () {
        post_code();
    })

    ad_POST_NUM.blur(function () {
        ck_empty(7, "POST_NUM");
    })

    ad_ADDRESS.blur(function () {
        ck_empty(8, "ADDRESS");
    })

    ad_DETAIL_ADDRESS.blur(function () {
        ck_empty(9, "DETAIL_ADDRESS");
    })
}


//기본 빈값 엘리먼트 속성 i : support 인덱스 넘버 , name : 엘리먼트 속성 넘버
function ck_empty(i,name,errMsg) {
    var _msg = "해당 필드는 빈 칸이 될 수 없습니다.";
    var _dengerColor = "#ee4848";    

    if ($("[name=ad_" + name + "]").val() == "") {
        $("#su_" + i + "").text(_msg);
        $("#su_" + i + "").css({
            color: _dengerColor,
            display: "block",
        });

        return false;
    } else {
        $("#su_" + i + "").text("");
        $("#su_" + i + "").css({
            display: "none",
        });

        return true;
    }
}

//id check ajax
function id_ajax_submit() {
    if (ck_empty(2, "ID") == true) {
        if (ad_ID.val().length < 4) {
            $("#su_2").text("아이디가 너무 짧습니다.");
            $("#su_2").css({ display: "block", color: "#ee4848" });
        } else {
            $("#su_2").text("");
            $("#su_2").css({ display: "none" });

            //id data chk ajax
            $.ajax({
                url: "control/control.UserImport.php?control=idChk",
                data: $("#userAddFormData").serialize(),
                type: "POST",
                success: function (data) {
                    if (data == "false") {
                        $("p#su_2").text("사용 할 수 없는 아이디 입니다..");
                        $("p#su_2").css({
                            color: "#ee4848",
                            display: "block"
                        });

                        $("#form_id_Chk").val(""); //ajax 리턴 값은 히든필드에서 추출
                    } else {
                        $("p#su_2").text("");
                        $("p#su_2").css({ display: "none" });
                        $("#form_id_Chk").val("ok"); //ajax 리턴 값은 히든필드에서 추출
                    };
                },
            });
            //id data chk ajax end
        }
    }
}

//비밀번호
function pass_default_chk() {
    if (ck_empty(3, "PASS") == true) {
        if (ad_PASS.val().match(matchPass)) {
            $("p#su_3").css({ display: "none" });
            $("#form_pass_Chk").val("ok");
        } else {
            $("p#su_3").css({ color: "#ee4848", display: "block", });
            $("p#su_3").text("비밀번호는 6자 에서 20자 사이 영문,숫자,특수문자 포함 해서 입력해주세요.");
            $("#form_pass_Chk").val("");

        }
    }
}

//비밀번호 확인
function pass_confirm_chk() {
    if (ad_PASS.val() != ad_PASS_confirm.val()) {
        $("p#su_4").css({ color: "#ee4848", display: "block" });
        $("p#su_4").text("비밀번호가 다릅니다.");
        $("#form_passConfirm_Chk").val("");
    } else {
        $("p#su_4").css({ display: "block" });
        $("p#su_4").text("");
        $("#form_passConfirm_Chk").val("ok");
    }
}

function dataSetUp() {
    var c = 0;
    var t;
    var max = $("#userAddFormData").children("input:not(input[type=button])").length;

    console.log("max : " + max);
    if (ad_agree.is(":checked")) {
        switch (c) {
            case 0:
                if (ck_empty(1, "NAME") == true) c = c + 1;
                console.log(c);

                id_ajax_submit();
                if ($("#form_id_Chk").val() == "ok") c = c + 1;
                console.log(c);

                pass_default_chk();
                if ($("#form_pass_Chk").val() == "ok") c = c + 1;
                console.log(c);

                if(ck_empty(4, "PASS_confirm") == true) 
                    pass_confirm_chk();

                if ($("#form_passConfirm_Chk").val() == "ok") c = c + 1;
                console.log(c);

                if (ck_empty(5, "TEL") == true) c = c + 1;
                console.log(c);

                if (ck_empty(6, "Email") == true) c = c + 1;
                console.log(c);

                if (ck_empty(7, "POST_NUM") == true) c = c + 1;
                console.log(c);

                if (ck_empty(8, "ADDRESS") == true) c = c + 1;
                console.log(c);

                if (ck_empty(9, "DETAIL_ADDRESS") == true) c = c + 1;
                console.log(c);
            case 1:
                console.log(c);
                if (c < max) {
                    alert("break....!");
                    break;
                } else if (c >= max) {
                    try {                        
                        /* 이곳에서 데이터를 서브밋 한다. */
                        $("#userAddFormData").attr("action", "control.UserImport.php?control=AddUser");
                        $("#userAddFormData").submit();                        
                    } catch (e) { }
                }
            default:
                break;
        }
    } else {
        alert("약관에 동의 하세여");
        ad_agree.css({ margin: "10px 0" });
        ad_agree.focus();
    }
    
}


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
            //제이쿼리로 엘리먼트 타겟 을 name 으로 변경했다.
            //document.getElementsByName('input[name=ad_POST_NUM]').value = data.zonecode; //5자리 새우편번호 사용
            //document.getElementsByName('input[name=ad_ADDRESS]').value = fullAddr;
            // 커서를 상세주소 필드로 이동한다.
            //document.getElementsByName('input[name=ad_DETAIL_ADDRESS]').focus();            

            $("input[name=ad_POST_NUM]").val(data.zonecode);
            $("input[name=ad_ADDRESS]").val(fullAddr);
            $("input[name=ad_DETAIL_ADDRESS]").focus();
        }
    }).open();
}