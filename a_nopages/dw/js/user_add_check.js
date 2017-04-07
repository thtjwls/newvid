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
			var hiddennick		= document.getElementById("hiddennick");
			
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
				window.open("user/user_add_idcheck.php?id="+id,"IDCHECK","width=500,height=300,up=150,left=150");
			}
		}

		function nick_check(){
			var nick = document.getElementById("nick").value;
			
			if(nick == ""){
				window.alert("닉네임을 입력하세요.");
			}else {
				window.open("user/user_add_nickcheck.php?nick="+nick,"IDCHECK","width=500,height=300,up=150,left=150");
			}
		}

