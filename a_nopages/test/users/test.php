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
         
        // ���Է� ��ġ ����
        if (newPassword1 != newPassword2) {
            alert("�Է��� �� ���� ��й�ȣ�� ����  ��ġ���� �ʽ��ϴ�.");
            return false;
        }
         
        // ����
        if(!/^[a-zA-Z0-9!@#$%^&*()?_~]{6,15}$/.test(newPassword1))
        { 
            alert("��й�ȣ�� ����, ����, Ư������ �������� 6~15�ڸ��� ����ؾ� �մϴ�."); 
            return false;
        }
         
        // ����, ����, Ư������ 2�� �̻� ȥ��
        var chk = 0;
        if(newPassword1.search(/[0-9]/g) != -1 ) chk ++;
        if(newPassword1.search(/[a-z]/ig)  != -1 ) chk ++;
        if(newPassword1.search(/[!@#$%^&*()?_~]/g)  != -1  ) chk ++;
        if(chk < 2)
        { 
            alert("��й�ȣ�� ����, ����, Ư�����ڸ� �ΰ����̻� ȥ���Ͽ��� �մϴ�."); 
            return false;
        }
         
        // ������ ����/���� 4�̻�, ���ӵ� ����
        if(/(\w)\1\1\1/.test(newPassword1) || isContinuedValue(newPassword1))
        {
            alert("��й�ȣ�� 4�� �̻��� ���� �Ǵ� �ݺ� ���� �� ���ڸ� ����Ͻ� �� �����ϴ�."); 
            return false;
        }
         
        // ���̵� ���� ����
        if(newPassword1.search(userID)>-1)
        {
            alert("ID�� ���Ե� ��й�ȣ�� ����Ͻ� �� �����ϴ�."); 
            return false;
        }
         
        // ���� ��й�ȣ�� �� ��й�ȣ ��ġ ����
        if (password == newPassword2) {
            alert("���� ��к�ȣ�� �� ��й�ȣ�� ��ġ�մϴ�.");
            return false;
        }
         
        alert("�׽�Ʈ ���!");
         
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
