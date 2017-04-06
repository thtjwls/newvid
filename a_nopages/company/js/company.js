
//서브메뉴 show,hide
$(document).ready(function () {
    var $i;
    for ($i = 1; $i <= 8; $i++) {
        (function ($i) {
            $("#page0" + $i).stop().on("mouseenter", function () {
                $("#sub_menu" + $i).stop().slideDown(); 
                //$("#sub_menu" + $i + " li").css("display","inline");
            });

            $("#page0" + $i).stop().on("mouseleave", function () {
                $("#sub_menu" + $i).stop().slideUp();
                ////$("#sub_menu" + $i + " li").css("display", "none");
            });
        })($i);
    };
});

//탑 메뉴 디자인
$(document).ready(function () {
    var $i;
    for ($i = 1; $i <= 8; $i++) {
        (function ($i) {
            $("#page0" + $i).stop().on("mouseenter", function () {
                $("#page0" + $i + " > a").stop().animate({
                    color: "#000",
                    fontWeight:"bold"
                });             
            });

            var $page_num = $("#page_num").val();
            if ($page_num == "page0" + $i) {
                return false;
            } else {
                $("#page0" + $i).stop().on("mouseleave", function () {
                    $("#page0" + $i).stop().animate({
                        color: "",
                    });
                });
            }
        })($i);
    }
});



//visited 디자인
$(document).ready(function () {
    var $page_num = $("#page_num").val();
    var $i;
    for ($i = 1; $i <= 8; $i++) {
        (function ($i) {
            if ($page_num == "page0" + $i) {                
                $("#page0" + $i + " > a ").css("font-weight", "bold");
            }
        })($i);
    }
}
);

//popup
$(document).ready(function () {
    $("#report1").click(function () {
        window.open("../popup/report1.html", "윤리강령","width=800px; height=600px");
    });
})

//service form
$(document).ready(function () {
    $("#service_submit").click(function () {
        $form_mod = $("[name=subject]").val();
        if ($form_mod == "구독신청") {
            var $agree = $("#agree");
            var $cli_name = $(".cli_name");
            var $cli_email = $(".cli_email");
            var $cli_tel1 = $(".cli_tel1");
            var $cli_tel2 = $(".cli_tel2");
            var $cli_tel3 = $(".cli_tel3");
            var $name = $(".name");
            var $company = $(".company");
            var $company_num = $(".company_num");
            var $email = $(".email");
            var $view_num = $(".view_num");
            var $tel1 = $(".tel1");
            var $tel2 = $(".tel2");
            var $tel3 = $(".tel3");
            var $post_num = $(".post_num");
            var $addr = $(".addr");
            var $inner_addr = $(".inner_addr");
            if ($agree.is(":checked") == false) {
                alert("개인정보 수집 및 이용에 동의 해주세요.");
                $agree.focus();
                return false;
            } else if ($cli_name.val() == "") {
                alert("신청자의 이름을 입력해주세요.");
                $cli_name.focus();
            } else if ($cli_email.val() == "") {
                alert("신청자의 메일을 입력해주세요.");
                $cli_email.focus();
            } else if ($cli_tel1.val() == "" || $cli_tel2.val() == "" || $cli_tel3.val() == "") {
                alert("신청자의 연락처를 입력해주세요.");
                $cli_tel1.focus();
            } else if ($name.val() == "") {
                alert("수취인의 이름을 입력해주세요.");
                $name.focus();
            } else if ($email.val() == "") {
                alert("수취인의 이메일을 입력해주세요.");
                $email.focus();
            } else if ($view_num.val() == "") {
                alert("부수를 입력 해주세요.");
                $view.focus();
            } else if ($tel1.val() == "" || $tel2.val() == "" || $tel3.val() == "") {
                alert("수취인의 연락처를 입력해주세요.");
                $tel1.focus();
            } else if ($post_num.val() == "" || $addr.val() == "" || $inner_addr.val() == "") {
                alert("수취인 주소를 입력 해주세요.");
                $post_num.focus();
            } else {
                var $input = confirm("정말 제출 하시겠습니까?");
                if ($input == true) {
                    $("[name=service_form]").submit();
                } else {
                    return false;
                }
            }
        } else if ($form_mod == "저작권문의") {
            var $name = $("[name=name]");
            var $email = $("[name=email]");
            var $hp = $("[name=hp]");
            var $title = $("[name=title]");
            var $contents = $("[name=contents]");
            var $agree = $("#agree");

            if ($agree.is(":checked") == false) {
                alert("개인정보 수집 및 이용에 동의 해주세요.");
                $agree.focus();
                return false;
            } else if ($name.val() == "") {
                alert("이름을 입력 해주세요.");
                $name.focus();
            } else if ($email.val() == "") {
                alert("이메일을 입력 해주세요.");
                $email.focus();
            } else if ($hp.val() == "") {
                alert("연락처를 입력 해주세요.");
                $hp.focus();
            } else if ($title.val() == "") {
                alert("제목을 입력 해주세요.");
                $title.focus();
            } else if ($contents.val() == "") {
                alert("내용을 입력 해주세요.");
                $contents.focus();
            } else {
                var $input = confirm("정말 제출 하시겠습니까?");
                if ($input == true) {
                    $("[name=service_form]").submit();
                } else {
                    return false;
                }
            }
        } else if ($form_mod == "기사제보") {
            var $name = $("[name=name]");
            var $email = $("[name=email]");
            var $tel = $("[name=tel]");
            var $title = $("[name=title]");
            var $contents = $("[name=contents]");
            var $agree = $("#agree");
            
            if ($agree.is(":checked") == false) {
                alert("개인정보 수집 및 이용에 동의 해주세요.");
                $agree.focus();
                return false;
            } else if ($name.val() == "") {
                alert("이름을 입력 해주세요.");
                $name.focus();
            } else if ($email.val() == "") {
                alert("이메일을 입력 해주세요.");
                $email.focus();
            } else if ($tel.val() == "") {
                alert("연락처를 입력 해주세요.");
                $tel.focus();
            } else if ($title.val() == "") {
                alert("제목을 입력 해주세요.");
                $title.focus();
            } else if ($contents.val() == "") {
                alert("내용을 입력 해주세요.");
                $contents.focus();
            } else {
                var $input = confirm("정말 제출 하시겠습니까?");
                if ($input == true) {
                    $("[name=service_form]").submit();
                } else {
                    return false;
                }
            }
        } else if ($form_mod == "광고문의") {
            var $name = $("[name=name]");
            var $email = $("[name=email]");
            var $tel = $("[name=tel]");
            var $homepage = $("[name=homepage]");
            var $company = $("[name=company]");
            var $adv_coat = $("[name=adv_coat]");
            var $adv_date1 = $("[name=adv_date1]");
            var $adv_date2 = $("[name=adv_date2]");
            var $contents = $("[name=contents]");
            var $agree = $("#agree");

            if ($agree.is(":checked") == false) {
                alert("개인정보 수집 및 이용에 동의 해주세요.");
                $agree.focus();
                return false;
            } else if ($name.val() == "") {
                alert("이름을 입력 해주세요.");
                $name.focus();
            } else if ($company.val() == "") {
                alert("회사명을 입력 해주세요.");
                $company.focus();
            } else if ($email.val() == "") {
                alert("이메일을 입력 해주세요.");
                $email.focus();
            } else if ($tel.val() == "") {
                alert("연락처를 입력 해주세요.");
                $tel.focus();
            } else if ($contents.val() == "") {
                alert("내용을 입력 해주세요.");
                $contents.focus();
            } else {
                var $input = confirm("정말 제출 하시겠습니까?");
                if ($input == true) {
                    $("[name=service_form]").submit();
                } else {
                    return false;
                }
            }
        }
    });
});


/* 다음 주소 api */
function sample6_execDaumPostcode() {
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
            document.getElementById('sample6_postcode').value = data.zonecode; //5자리 새우편번호 사용
            document.getElementById('sample6_address').value = fullAddr;

            // 커서를 상세주소 필드로 이동한다.
            document.getElementById('sample6_address2').focus();
        }
    }).open();
}
/* 다음 주소 api 끝*/

$(document).ready(function () {
    $("#datepicker1").datepicker({
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
        onSelect: function (selected) {
            $("#datepicker2").datepicker("option", "minDate", selected)
        }
    });

    $("#datepicker2").datepicker({
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
        onSelect: function (selected) {
            $("#datepicker1").datepicker("option", "maxDate", selected)
        }
    });
});

$(document).ready(function () {
    $("#write_btn").click(function () {
        location.href = ("../pages/page05_write.php");
    });
});

//page07 view aside animate
$(document).ready(function () {
    var $i;
    for ($i = 1; $i <= 9; $i++) {
        (function ($i) {
            $("#member" + $i).stop().on("mouseenter", function () {
                $("#member" + $i).stop().animate({
                    backgroundColor: "#f24444",
                    color: "#FFF"
                });
            });

            $("#member" + $i).stop().on("mouseleave", function () {
                $("#member" + $i).stop().animate({
                    backgroundColor: "#FFF",
                    color: "#454545"
                });
            });
        })($i);
    };
});

$(document).ready(function () {
    $("#page01").on("mouseenter", function () {
        $("#submenu1").css("display", "block");
    });

    $("#page01").on("mouseleave", function () {
        $("#submenu1").css("display", "none");
    });
})

function scrollmove(obj, scrollTime) {
    var scrollTarget = $("#" + obj);
    var targetOffset = scrollTarget.offset();
    var moveScroll = Math.floor(targetOffset.top);

    //alert("scrollTarget :" + scrollTarget + "\ntargetOffset :" + targetOffset + "\nmoveScroll :" + moveScroll);
    
    $("html, body").stop().animate({
        scrollTop: moveScroll+"px"
    },scrollTime);
    
}

function notice_delete(idx) {    
    var input = confirm("정말 삭제하시겠습니까?");
    if (input == false) {
        return false;
    } else {        
        location.href = ("../pages/page05_delete.php?idx=" + idx);
    }
}