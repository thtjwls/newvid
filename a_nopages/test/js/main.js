		function login() {
			window.open("http://thtjwls.dothome.co.kr/test/users/login.php","LOGIN","width=500,height=400,up=150,left=150"); //로그인 팝업
		}

		function visor() {
			alert("접근 권한이 없습니다. \n 관리자에게 문의하세요.");
		}

		function free_board() {
			//document.getElementById("contents_if").src="http://thtjwls.dothome.co.kr/test/board/board_list.php";
			location.href="http://thtjwls.dothome.co.kr/test/board/board_list.php";
		}

		function home_go(){
			location.href="http://thtjwls.dothome.co.kr/test";
		}

		function idcheck(){
			var check = document.getElementById("sessionnick").value;

			if (check ==""){
				alert("로그인 후 이용 해주세요");
				window.open("http://thtjwls.dothome.co.kr/test/users/login.php","LOGIN","width=500,height=300,up=150,left=150");
			}
			else {
				location.href="http://thtjwls.dothome.co.kr/test/board/board_write.php";
			}
		}

		function notice_check(){
			var check = document.getElementById("sessionnick").value;

			if (check ==""){
				alert("로그인 후 이용 해주세요");
				window.open("http://thtjwls.dothome.co.kr/test/users/login.php","LOGIN","width=500,height=300,up=150,left=150");
			}
			else {
				location.href="http://thtjwls.dothome.co.kr/test/notice/notice_write.php";
			}
		}

		function searchsend(){
			opener.getElementById("searchclick").src="http://thtjwls.dothome.co.kr/test/";
		}

		function board() {
			var write_subject = document.writeform.write_subject;
			var write_contents = document.writeform.write_contents;
			
			if(write_subject.value==""){
				alert("제목을 입력 하세요.");
			}else if(write_contents.value==""){
				alert("내용을 입력 하세요.");
			}else{
				var input = confirm("저장하시겠습니까?");
				if(input==true){
					document.getElementById("writeform").submit();
				}else{
					return false;
				}	//컨펌 종료
			}	//if 종료
		} //function 종료

		window.onload = function(){
			var sub = document.getElementById("subject");

		}

		function subject_click(){
			document.getElementId("subject").value="";
		}

		function re_insert(){
			var re_text = document.getElementById("re_text").value;
			var re_nick = document.getElementById("re_nick").value;

			if(re_text == ""){
				alert("댓글 내용을 입력 해 주세요.");
			} else if(re_nick == ""){
				alert("로그인 후 이용해주세요 ^^");
				window.open("http://thtjwls.dothome.co.kr/test/users/login.php","LOGIN","width=500,height=300,up=150,left=150");
			} else {
				document.getElementById("re_comment_insert_form").submit();
			}
		}

		function reple_delete(){
			var board_idx = document.getElementById("board_idx").value;
			var re_nick = document.getElementById("re_nick").value;
			var idx	= document.getElementById("re_idx").value;
			var input = confirm("정말 삭제하시겠습니까?");

			if(input == true){
				location.href="http://thtjwls.dothome.co.kr/test/board/reple_delete.php?board_idx="+board_idx+"&nick="+re_nick+"&idx="+idx;
			}
		}
		
		/*
		var filename = document.getElementById("fileonename").value;
		function down(filename){
			
			url="http://thtjwls.dothome.co.kr/test/lib/down_load.php?filename="+filename;
			location.href=url;			
		}
		*/

		function test(){
			var filename = document.getElementById("fileonename").value;

			url="http://thtjwls.dothome.co.kr/test/lib/down_load.php?filename="+filename;
			location.href=url;
		}

		function user_insert_check (){
			var name			= document.getElementById("name").value;
			var id				= document.getElementById("id").value;
			var pass			= document.getElementById("pass").value;
			var pass_confirm	= document.getElementById("pass_confirm").value;
			var nick			= document.getElementById("nick").value;
			var email1			= document.getElementById("email1").value;
			var email2			= document.getElementById("email2").value;
			var address			= document.getElementById("address").value;
			var hiddenid		= document.getElementById("hiddenid");
			var hiddenpass		= document.getElementById("hiddenpass");
			
			if(name == ""){	
				window.alert("이름을 입력하세요.");
				document.getElementById("name").focus();
			} else if (id == "")
			{
				window.alert("아이디를 입력하세요.");
				document.getElementById("id").focus();
			} else if (pass == ""){
				window.alert("패스워드를 입력하세요.");
				document.getElementById("pass").focus();
			} else if (pass_confirm == "")
			{
				window.alert("패스워드를 확인하세요.");
				document.getElementById("pass_confirm").focus();
			} else if (nick == "")
			{
				window.alert("닉네임을 확인하세요.");
				document.getElementById("nick").focus();
			} else if (email1 == "" || email2 == "")
			{
				window.alert("이메일을 확인하세요.");
				document.getElementById("email1").focus();
			} else if (address == "")
			{
				window.alert("주소를 확인하세요.");
				document.getElementById("address").focus();
			} else if (!hiddenid)
			{
				window.alert("아이디 중복확인을 해주세요.");
			} else if (!hiddenpass)
			{
				window.alert("비밀번호 확인을 해주세요.");
			} else if(!hiddennick)
			{
				alert("닉네임 중복확인을 해주세요.");				
			} else {
				document.user_add_form.submit();
			}
		}

		function user_modify_check(){
			var pass			= document.getElementById("pass").value;
			var pass_confirm	= document.getElementById("pass_confirm").value;
			var email1			= document.getElementById("email1").value;
			var email2			= document.getElementById("email2").value;
			var address			= document.getElementById("address").value;
			var hiddenpass		= document.getElementById("hiddenpass");

			if(pass	== ""){
				window.alert("패스워드를 입력하세요.");
				document.getElementById("pass").focus();
				} 
				else if (pass_confirm == "")
				{
					window.alert("패스워드를 확인하세요.");
					document.getElementById("pass_confirm").focus();
				}
				else if (email1 == "" || email2 == "")
				{
					window.alert("이메일을 확인하세요.");
					document.getElementById("email1").focus();
				}
				else if (address == "")
				{
					window.alert("주소를 확인하세요.");
					document.getElementById("address").focus();
				} 
				else if (!hiddenpass)
				{
					window.alert("비밀번호 확인을 해주세요.");
				} else {
					document.user_modify_form.submit();
				}
			}

		function pass_check(){
			var pass = document.getElementById("pass").value;
			var pass_confirm = document.getElementById("pass_confirm").value;

						
			if (pass == "" || pass_confirm == "")
			{
				window.alert("패스워드를 입력 하세요.");
			} 
			else if (pass.length<6)
			{
				alert("비밀번호는 영문,숫자,특수문자 조합 6자리 이상으로 입력하세요.");
			}
			//else if (!=/^[a-zA-Z0-9!@#$%^&*()?_~]{6,15}$/.pass)
			 else if(!pass.match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~])|([!,@,#,$,%,^,&,*,?,_,~].*[a-zA-Z0-9])/))
			{
				alert("비밀번호는 영문,숫자,특수문자 조합 6자리 이상으로 입력하세요.");
			}
			else if (pass != pass_confirm)
			{
				window.alert("입력하신 비밀번호가 맞지 않습니다.");
			} 
			else
			{
				window.alert("패스워드가 확인 되었습니다.");
				document.getElementById("hidden_ok").innerHTML += "<input type='hidden' id='hiddenpass' name='hiddenpass'>"
			}
			
		}

		function id_check(){
			var id = document.getElementById("id").value;
			
			if(id == ""){
				window.alert("아이디를 입력하세요.");
			} else if (id.length<5 || id.length>10)
			{
				alert("ID는 영문 5자 이상 10자 이하로 입력 해주세요.");
			}else {
				window.open("user_add_idcheck.php?id="+id,"IDCHECK","width=500,height=300,up=150,left=150");
			}
		}

		function nick_check(){
			var nick = document.getElementById("nick").value;
			
			if(nick == ""){
				window.alert("닉네임을 입력하세요.");
			}else {
				window.open("user_add_nickcheck.php?nick="+nick,"IDCHECK","width=500,height=300,up=150,left=150");
			}
		}

		function id_search() {
			var id_search	= document.getElementById("hidden_search").value;
			var hp			= document.getElementById("sid_hp").value;	
			var name		= document.getElementById("sid_name").value;	
			
			location.href="http://thtjwls.dothome.co.kr/test/users/id_search.php?mode="+id_search+"&name="+name+"&hp="+hp;
		}
		

		function pass_search() {
			var pass_search	= document.getElementById("hidden_pass").value;
			var id			= document.getElementById("sipass_id").value;
			var name		= document.getElementById("sipass_name").value;
			var hp			= document.getElementById("sipass_hp").value;

			location.href="http://thtjwls.dothome.co.kr/test/users/id_search.php?mode="+pass_search+"&name="+name+"&hp="+hp+"&id="+id;
		}