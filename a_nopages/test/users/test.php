<!DOCTYPE HTML>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>New Document</title>
<script>
    function passwordCheck() {
         
        var userID = document.getElementById("userID").value;
        var password = document.getElementById("password").value;
        var newPassword1 = document.getElementById("newPassword1").value;
        var newPassword2 = document.getElementById("newPassword2").value;
         
        // 재입력 일치 여부
        if (newPassword1 != newPassword2) {
            alert("입력한 두 개의 비밀번호가 서로  일치하지 않습니다.");
            return false;
        }
         
        // 길이
        if(!/^[a-zA-Z0-9!@#$%^&*()?_~]{6,15}$/.test(newPassword1))
        { 
            alert("비밀번호는 숫자, 영문, 특수문자 조합으로 6~15자리를 사용해야 합니다."); 
            return false;
        }
         
        // 영문, 숫자, 특수문자 2종 이상 혼용
        var chk = 0;
        if(newPassword1.search(/[0-9]/g) != -1 ) chk ++;
        if(newPassword1.search(/[a-z]/ig)  != -1 ) chk ++;
        if(newPassword1.search(/[!@#$%^&*()?_~]/g)  != -1  ) chk ++;
        if(chk < 2)
        { 
            alert("비밀번호는 숫자, 영문, 특수문자를 두가지이상 혼용하여야 합니다."); 
            return false;
        }
         
        // 동일한 문자/숫자 4이상, 연속된 문자
        if(/(\w)\1\1\1/.test(newPassword1) || isContinuedValue(newPassword1))
        {
            alert("비밀번호에 4자 이상의 연속 또는 반복 문자 및 숫자를 사용하실 수 없습니다."); 
            return false;
        }
         
        // 아이디 포함 여부
        if(newPassword1.search(userID)>-1)
        {
            alert("ID가 포함된 비밀번호는 사용하실 수 없습니다."); 
            return false;
        }
         
        // 기존 비밀번호와 새 비밀번호 일치 여부
        if (password == newPassword2) {
            alert("기존 비밀본호와 새 비밀번호가 일치합니다.");
            return false;
        }
         
        alert("테스트 통과!");
         
    }
     
    function isContinuedValue(value) {
        console.log("value = " + value);
        var intCnt1 = 0;
        var intCnt2 = 0;
        var temp0 = "";
        var temp1 = "";
        var temp2 = "";
        var temp3 = "";
 
        for (var i = 0; i < value.length-3; i++) {
            console.log("=========================");
            temp0 = value.charAt(i);
            temp1 = value.charAt(i + 1);
            temp2 = value.charAt(i + 2);
            temp3 = value.charAt(i + 3);
 
            console.log(temp0)
            console.log(temp1)
            console.log(temp2)
            console.log(temp3)
 
            if (temp0.charCodeAt(0) - temp1.charCodeAt(0) == 1
                    && temp1.charCodeAt(0) - temp2.charCodeAt(0) == 1
                    && temp2.charCodeAt(0) - temp3.charCodeAt(0) == 1) {
                intCnt1 = intCnt1 + 1;
            }
 
            if (temp0.charCodeAt(0) - temp1.charCodeAt(0) == -1
                    && temp1.charCodeAt(0) - temp2.charCodeAt(0) == -1
                    && temp2.charCodeAt(0) - temp3.charCodeAt(0) == -1) {
                intCnt2 = intCnt2 + 1;
            }
            console.log("=========================");
        }
 
        console.log(intCnt1 > 0 || intCnt2 > 0);
        return (intCnt1 > 0 || intCnt2 > 0);
    }
</script>
</head>
 
<body>
    id : <input id="userID" type="text" value="abcd"/><br/>
    password : <input id="password" type="text" value="abcd"/><br/>
    newPassword : <input id="newPassword1" type="text" value="abcd"/><br/>
    newPassword : <input id="newPassword2" type="text" value="abcd"/><br/>
    <button onclick="passwordCheck()">Click</button>
</body>
</html>
