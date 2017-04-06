	function login(){
		var id = document.login_form.id.value;
		var pass = document.login_form.pass.value;
		
		if(id == ""){
			window.alert("아이디를 입력 해주세요.");
			document.login_form.id.focus();
		} else if (pass == "")
		{
			window.alert("비밀번호를 입력 해주세요.");
			document.login_form.pass.focus();
		} else {
			document.login_form.submit();
		}
	}

	function useradd_go(){
		self.close();
		opener.location.href="http://thtjwls.dothome.co.kr/test/users/user_add.php";
	}

	function usersearch_go(){
		self.close();
		opener.location.href="http://thtjwls.dothome.co.kr/test/users/id_search.php";
	}

	function addressAPI() {
	    window.open("./lib/add_search.php", "ADDRESS_API", "width=500,height=300,up=150,left=150");
	}