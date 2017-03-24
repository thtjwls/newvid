

var _reg01 = /^(?=.*[a-zA-Z])((?=.*\d)|(?=.*\W)).{6,20}$/; /* 영문 소문자, 대문자 포함 6자에서 20자 사이 */
var _reg02 = /([가-힣ㄱ-ㅎㅏ-ㅣ])/; /* 한글 구분 */
var _reg03 = /\s/; /* 공백 구분 */

$.fn.extend({
    ok_font: function (t) {
        if (t === false) t = "";
        
        this.nextAll("p").html(t);
        this.nextAll("p").css("color", "#4452e4");
    },
    denger_font: function (t) {
        if (t === false) t = "";

        this.nextAll("p").html(t);
        this.nextAll("p").css("color", "#fc470d");
    },
    member_val_empty: function (t) {
        if (t !== false) {
            this.nextAll("p").html(t);
            this.nextAll("p").css("color", "#fc470d");
            this.focus();
        } else {
            this.nextAll("p").html("");
        }
    }
});

//각 폼
var member_name = $("input[name=member_name]");
var member_id = $("input[name=member_id]");
var member_pass = $("input[name=member_pass]");
var member_pass_confirm = $("input[name=member_pass_confirm]");
var member_buse = $("select[name=member_buse]");
var member_email = $("input[name=member_email]");
var member_hp = $("input[name=member_hp]");
var member_tel = $("input[name=member_tel]");
var member_agree = $("#membership_agree");
var member_hidden_id_chk = $("#hidden_id");
var member_hidden_pass_chk = $("#hidden_pass");
var member_hidden_pass_confirm_chk = $("#hidden_pass_confirm");
var member_id_support = $("#member_id_support");
var member_pass_support = $("#member_pass_support");
var member_pass_confirm_support = $("#member_pass_confirm_support");
var member_submit_form = $("#member_submit_form");


var denger_color = "#fc470d";
var ok_color = "#4552e4";

//데이터 URL
var url = "/sn/php/control/control.Membership.php";

function id_chk()
{
    if (member_id.val().match(/([가-힣ㄱ-ㅎㅏ-ㅣ])|\s|[\{\}\[\]\/?.,;:|\)*~`!^\-+<>@\#$%&\\\=\(\'\"]/)) {
        member_id.denger_font("아이디에는 한글,공백,특수문자가 들어갈 수 없습니다.");
        this.focus();
    } else if (member_id.val().length < 4) {
        member_id.denger_font("아이디가 너무 짧습니다. 4글자 이상 입력 해주세요.");        
        this.focus();
    } else {
        $.ajax({
            url: url + "?chk_mod=id_chk&member_id=" + member_id.val(),
            type: "GET",
            success: function (data) {                
                console.log(data);
                try {
                    if (data == 0) {
                        member_hidden_id_chk.val(true);
                        //member_id_support.ok_font("사용 가능 한 아이디 입니다.");
                        member_id.ok_font("사용 가능 한 아이디 입니다.");
                    } else if (data !== 0) {
                        member_id.denger_font("사용 할 수 없는 아이디입니다.");
                        member_hidden_id_chk.val("");
                    }
                } catch (e) {
                    console.log(e);
                }
            }
        })
    }    
}

function pass_chk() {
    if (!member_pass.val().match(_reg01)) {        
        member_pass.denger_font("6자 이상 20자 이하 영문,대문자,특수문자 조합");
    } else {
        member_pass.denger_font(false);
        member_hidden_pass_chk.val(true);
    }
}

function pass_confirm_chk() {    
    if (member_pass.val() != member_pass_confirm.val()) {
        member_pass_confirm.denger_font("비밀번호와 일치하지 않습니다.");
        member_hidden_pass_confirm_chk.val("");        
    } else {
        member_pass_confirm.denger_font(false);
        member_hidden_pass_confirm_chk.val(true);
    }
}

function member_add_submit() {

    var dataTrue = 0;

    var element =
    [
        member_name,
        member_id,
        member_pass,
        member_pass_confirm,
        member_email,
        member_hp,
        member_tel,
        member_hidden_id_chk,
        member_hidden_pass_chk,
        member_hidden_pass_confirm_chk,
    ];

    var hidden_element =
    [
        
    ];

    if (!member_agree.is(":checked")) {
        alert("약관에 동의 해주세요.");
        member_agree.focus();
    } else {        
        try {
            /* member add form 데이터 검증은 이곳에서 하세요 */
            for (var i = 0; i < element.length; i++) {

                if (i == 7)
                {
                    if (element[i].val() == "")
                    {
                        element[1].member_val_empty("아이디를 확인 해 주세요.");
                        
                        break;
                    }

                }
                else if (i == 8)
                {
                    if (element[i].val() == "")
                    {
                        element[2].member_val_empty("비밀번호를 확인 해 주세요.");

                        break;
                    }
                }
                else if (i == 9)
                {
                    if (element[i].val() == "")
                    {
                        element[3].member_val_empty("비밀번호를 확인 해 주세요.");

                        break;
                    }
                }

                if (element[i].val() == "")
                {
                    element[i].member_val_empty("해당필드는 빈칸 일 수 없습니다.");

                    break;
                }
                else
                {
                    element[i].member_val_empty(false);

                    dataTrue++;                    
                }                
            }

            if (dataTrue >= element.length) {                
                /* 데이터 서 구간 */
                var confirmData = confirm("작성하신 내용이 맞습니까?");                

                if (confirmData == false) {
                    return false;
                } else {

                    var Param = member_submit_form.serialize();

                    $.ajax({
                        url: "/sn/php/control/control.Membership.php?chk_mod=membershipInsert",
                        data: Param,
                        type: "POST",
                        cache: false,
                        error:function(req,sta,err) {
                            alert("code : " + req.sta + "\r\nmessage : " + req.responseText);
                        },
                        befaoreSend: function () {
                            ajax_sending_element();
                            $(".ajax_connection_object").fadeIn(200);
                        },
                        complete: function () {
                            $(".ajax_connection_object").fadeOut(200);
                        },
                        success: function (data) {                            
                            location.replace("?setPage=membershipAddSuccess");
                        },                        
                    });                    
                }                
                /* 데이터 서브밋 구간 끝*/
            }

            /* member add form 데이터 검증 끝*/
        } catch (e) {
            console.log(e);
        }        
    }
}

$(function () {    
    
})

function ajax_sending_element() {

    var height = $(window).height();
    var width = $(window).width();    

    $("<div>", {
        css: {
            position: "absolute",
            top:0,
            left: 0,
            width: 100+"%",
            height: 100+"%",
            zIndex: 9999,
            backgroundColor: "rgba(233,233,233,0.6)",
            display: "none",
            textAlign: "center",            
        },
    }).addClass("ajax_connection_object").appendTo("body");

    $("<img>", {
        src: "/sn/images/loading_img.gif",
        css :{
            borderRadius: 8,
            position: "absolute",
            top: 35 + "%",
            left: 45 + "%",
        }
    }).addClass("ajax_loding_img").appendTo(".ajax_connection_object");    
}

function call_by_ajax_lodingImg() {
    
}