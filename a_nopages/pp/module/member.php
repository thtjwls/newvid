<?
include "../lib/session.php";
include "../lib/dbconnect.php";    
?>
<?


$mod = $_GET["mod"];
$id = $_GET["id"];
$nickG = $_GET["nick"];

//insert member
$name = $_POST["name"];
$id = $_POST["id"];
$pass = password_hash($_POST["pass"],PASSWORD_DEFAULT);
$nick = $_POST["nick"];
$post_num = $_POST["post_num"];
$address = $_POST["address"];
$inner_address = $_POST["inner_address"];
$tel = $_POST["tel1"]."-".$_POST["tel2"]."-".$_POST["tel3"];
$etc = $_POST["etc"];
$regist_day = date("Y-m-d H:i:s");
$regist_ip = $_SERVER["REMOTE_ADDR"];
//insert member end
//login member
$login_id = $_REQUEST["login_id"];
$login_pass = $_REQUEST["login_pass"];
//login member end

function idcheck($id) {
    //include "../lib/dbconnect.php";
    global $connect;

    $idChkQuery = "select count(id) from pp_member where id='$id'";
    $idResult = mysql_query($idChkQuery,$connect);
    $idCnt = mysql_result($idResult,0,0);

    if($idCnt > 0) {
        echo "no";
    } else {
        echo "ok";
    }
};

 function nickcheck($nickG) {
     global $connect;

     $nickChkQuery = "select count(nick) from pp_member where nick='$nickG'";
     $nickResult = mysql_query($nickChkQuery,$connect);
     $nickCnt = mysql_result($nickResult,0,0);

     if($nickCnt > 0) {
         echo "no";
     } else {
         echo "ok";
     }
 }


if($mod == "idCheck") {
    idcheck($id);
}

if($mod == "nickCheck") {
    nickcheck($nickG);
}

if($mod == "add") {
    global $connect;

    $insertQuery = "insert into pp_member (id,name,pass,nick,post_num,address,inner_address,tel,etc,regist_day,regist_ip) values ";
    $insertQuery = $insertQuery."('$id','$name','$pass','$nick','$post_num','$address','$inner_address','$tel','$etc','$regist_day','$regist_ip')";
    $insertResult = mysql_query($insertQuery,$connect);

    if($insertResult) {
?>
<script>
    alert("가입성공");
    location.href = "../";
</script>
<?
    } else {
        ?>
<script>
    alert("가입실패");
</script>
        <?
    }
}

if($mod == "login") {
    global $connect;

    $loginIdCntQuery = "select count(idx) from pp_member where id='$login_id'";
    $loginIdCntResult = mysql_query($loginIdCntQuery,$connect);
    $loginIdCnt = mysql_result($loginIdCntResult,0,0);

    if($loginIdCnt == 0) {
        echo "no";
    } else {
        $loginQuery = "select idx,id,pass from pp_member where id='$login_id'";
        $loginResult = mysql_query($loginQuery,$connect);
        $loginRow = mysql_fetch_array($loginResult);
        $db_id = $loginRow[id];
        $db_pass = $loginRow[pass];
        $db_idx = $loginRow[idx];
        //echo "db_pass :" .$db_pass;
        //echo "<br>";
        //echo "login_pass :". $login_pass;
        //echo "<br>";

        if(password_verify($login_pass, $db_pass)) {
            $_SESSION['useridx']=$db_idx;
        } else {
            //로그인 실패
            echo "no";
        }
    }
}

if($mod == "logout") {
    unset($_SESSION['useridx']);
    unset($_SESSION['username']);
    unset($_SESSION['usernick']);
    ?>
<script>
    alert("로그아웃 되었습니다.");
    location.href = "../index.php";
</script>
<?
}

if($mod == "modify") {
    $tel = $_POST["tel1"]."-".$_POST["tel2"]."-".$_POST["tel3"];    
    $modifyQuery = "update pp_member set pass='$pass', post_num='$post_num', address='$address', inner_address='$inner_address', tel='$tel', etc='$etc' where idx='$useridx'";
    //echo "modifyQuery :" .$modifyQuery;
    $modifyResult = mysql_query($modifyQuery,$connect);
    if(!$modifyResult) {
        ?>
<script>
    alert("알수없는 오류로 수정에 실패하였습니다.\n문제가 지속될 경우 관리자에게 문의하십시오.");
    history.go(-1);
</script>
        <?
    } else {
        ?>
<script>
    alert("수정완료");
    history.go(-1);
</script>
        <?
    }
}
?>