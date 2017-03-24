//유저리스트로 복귀
function userlist() {
	location.href="http://thtjwls.dothome.co.kr/test/manager/manager.php?sboard=users";
}

function search_user(){
	var user_search = document.getElementById('user_search').value;
	var userfind	= document.getElementById('userfind').value;

	if(user_search == ""){
		alert("검색어를 입력하세요.");
	}else{
	location.href="http://thtjwls.dothome.co.kr/test/manager/manager.php?sboard=users&search="+user_search+"&find="+userfind;
	}
}
