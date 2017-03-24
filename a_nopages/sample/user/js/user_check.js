function user_add() {
    var name = document.getElementById("name");
    var id = document.getElementById("id");
    var pass = document.getElementById("pass");
    var hiddenid = document.getElementById("hiddenid");
    var hiddenpass = document.getElementById("hiddenpass");
    var company = document.getElementById("company");
    var buse = document.getElementById("buse");
    var level = document.getElementById("level");
    var web_level = document.getElementById("web_level");
    var hp = document.getElementById("hp");
    var cp = document.getElementById("cp");
    var email = document.getElementById("email");

    if (name.value == "") {
        alert("이름을 입력 해주세요.");
        name.focus();
    } else if (id.value == "") {
        alert("아이디를 입력 해주세요.");
        id.focus();
    } else if (pass.value == "") {
        alert("비밀번호를 입력 해주세요.");
        pass.focus();
    } else if (!hiddenid) {
        alert("아이디 중복확인을 해주세요.");
        id.focus();
    } else if (!hiddenpass) {
        alert("비밀번호 확인을 해주세요.");
        hiddenpass.focus();
    } else if (company.value == "") {
        alert("회사명을 입력 해주세요.");
        company.focus();
    } else if (buse.value == "") {
        alert("부서를 입력 해주세요.");
        buse.focus();
    } else if (hp.value == "") {
        alert("휴대폰번호를 입력해주세요.");
        hp.focus();
    } else if (cp.value == "") {
        alert("내선번호를 입력 해주세요.");
        cp.focus();
    } else if (email.value == "") {
        alert("이메일주소를 입력해주세요.");
        email.focus();
    } else {
        var input = confirm("회사명 ["+company.value+"] 로 가입됩니다.\n가입하시겠습니까?");
        if (input == true) {
            document.user_add_form.submit();
        } else {
            return false;
        }
    }
}

