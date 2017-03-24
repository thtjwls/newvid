var url = $(location).attr("search");

function bbsMove(i, k)
{
    var page = i;
    var key = k;    
    
    console.log($(location).attr("search"));
    
    $("#ajax_load_key_" + key).load("./" + url + "&page=" + page + " #ajax_load_key_" + key + " > .ajax_load_box");
}

function bbsSearch(u) {
    var search;
    var defaultParam = url.split("&");

    var pageParam = defaultParam[0];    

    search = $("#notice_search").val();    

    console.log(pageParam + "&search=" + search);
  
    if (u != 0) {
        location.href = pageParam + "&search=" + search;
    } else {
        
        location.href = pageParam;
    }    
}

function loginForm(i) {
    /* login display */
    var container = $(".login_wrap_absolute");

    if (i === true) {
        container.fadeIn(500);
    } else {
        container.fadeOut(500);
    }
}


function login_submit() {
    /* login data */
    var input_id = $("#login_member_id");
    var input_pass = $("#login_member_pass");

    var data_id = $("#hidden_login_id");
    var data_pass = $("#hidden_login_pass");

    var login_msg_support = $("#login_support_text");    

    if (input_id.val() == "") {
        support("아이디를 입력하세요.");
        input_id.focus();
    } else if (input_pass.val() == "") {
        support("비밀번호를 입력 하세요.");
        input_pass.focus();
    } else {
        inputValueData();
    }

    function inputValueData() {
        data_id.val(input_id.val());
        data_pass.val(input_pass.val());        

        loginAjaxSubmit();
    }
    
    function loginAjaxSubmit() {        

        if (data_id.val() == "" || data_pass.val() == "") {
            support("데이터 전송에 문제가 있습니다. 관리자에게 문의하세요.");
        } else {
            var Param = $("#login_submit_form").serialize();

            $.ajax({
                url: "/sn/php/control/control.Membership.php?chk_mod=memberLogin",
                data: Param,
                type: "POST",
                cache: false,
                error: function (req, sta, err) {
                    alert("code : " + req.sta + "\r\nmessage : " + req.responseText);
                },
                success: function (data) {
                    console.log(data);
                    try {

                        if (data == 0) {
                            loginForm(false);
                            setTimeout(function () {
                                window.location.reload(0);
                            }, 500);
                        } else if (data == 2) {
                            support("승인 되지 않은 아이디 입니다.<br>관리자에게 문의하세요.");
                        } else {
                            support("아이디 또는 패스워드 정보를 찾을 수 없습니다.");
                        }

                    } catch (e) {
                        console.log(e);
                    }
                }
            })
        }
    }

    function support(t) {        
        login_msg_support.html(t);

        login_msg_support.stop().animate({
            opacity: 1,
        });

        setTimeout(function () {
            login_msg_support.stop().animate({
                opacity: 0,
            });
        },2000);
    }

}

$(function () {
    $("#notice_search").keypress(function (e) {
        console.log(e);

        if (e.keyCode == 13) {
            bbsSearch();
        }
    })
})