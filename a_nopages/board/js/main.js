$(function () {
    $('[data-toggle="popover"]').popover();

    activeMenu();
   
})


//URL 페이지 파라미터 가쳐오기
function getUrlVars()
{
    var vars = [], hash;
    var urlKey;
    var urlValue;

    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    
    return vars['menu'];
}

//상단 nav active 클래스 활성 ??
function activeMenu()
{
    var formEle = $("#login_form");
    var param = formEle.serialize();

    $.ajax({

    });
}


//Login
function login()
{

var formContainer = $("#login_form");
var dataParam = formContainer.serialize();
var login = new Array(	
);
login["id"] = $("#login_id");
login["password"] = $("#login_pass");
login["support"] = $("#login_support");

$.fn.extend({

	//text : "text" , type : (type) danger or success
	chkEmptyForm : function (text,type) {
		this.addClass("text-" + type);
		this.text(text);		
	},
});	


	function test()
	{
		console.log(this);
	}

	if (login["id"].val() == "")
	{
		login["support"].chkEmptyForm("ID 를 입력 해주세요.","danger");
	} 
	else if (login["password"].val() == "")
	{
		login["support"].chkEmptyForm("PASSWORD 를 입력 해주세요.","danger");
	} 
	else
	{	
		var obj = new Object();
		obj.loginId = login["id"].val();
		obj.loginPass = login["password"].val();

		var json_data = JSON.stringify(obj);

		var request = $.ajax({
            url: "module/control/Control_C.php?mod=login",
            dataType: "json",
			type : "POST",
            data: json_data,            
        });

		//console.log(request.done());
		request.fail(function (data) {
		    console.log(data);
		    login["support"].chkEmptyForm("등록된 데이터를 찾을수 없습니다.", "danger");
		})

		request.done(function (data) {
		    
		    window.location.href = "http://www.sindy.co.kr/board/?menu=dashboard";
		})
	}
}


//리스트 수정
function contentModify(i)
{
    window.location.href = '?menu=dashboardModify&Idxno=' + i;
}

//리스트 삭제
function contentDel(i)
{
    var delConfirm = confirm("정말 삭제하시겠습니까?\n삭제되면 복구 할 수 없습니다.");

    if ( delConfirm === true )
    {

        $.ajax({
            url: "module/control/Control_C.php?mod=contentDel&Idxno=" + i,
            type: "GET",
            success: function (data) {
                console.log(data);
                if (data == true) {
                    alert("성공적으로 삭제되었습니다.");
                    location.reload();
                }

                else {
                    alert("잠시 후 다시 시도하세요.");
                }
            },
        });

    } else {
        return false;
    }
}