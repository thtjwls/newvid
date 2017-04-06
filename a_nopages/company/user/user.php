<? session_start();
   include "../lib/session.php";
?>

<meta charset="utf-8" />
<? include "../db/dbconnect.php"; ?>
<?
$mod=$_GET["mod"];
$idx=$_GET["idx"];

$name = $_POST["name"];
$id=$_POST["id"];
$id_check=$_GET["id"];
$nick_check = $_GET["nick"];
$pass=$_POST["pass"];
$insert_pass=password_hash($_POST["insert_pass"],PASSWORD_BCRYPT);
$modify_pass = password_hash($_POST["modify_pass"],PASSWORD_BCRYPT);
$email=$_POST["email"];
$nick=$_POST["nick"];
$tel=$_POST["tel1"]."-".$_POST["tel2"]."-".$_POST["tel3"];
$post_num=$_POST["post_num"];
$address = $_POST["address"];
$inner_address=$_POST["inner_address"];
$level = 1;
$regist_day = date("Y-m-d H:i:s");
$regist_ip=$_SERVER['REMOTE_ADDR'];
$login_id = $_POST["login_id"];
$login_pass = $_POST["login_pass"];
//예제
//password_hash($password, PASSWORD_BCRYPT
//$login_pass = password_hash("ekdP0919!",PASSWORD_BCRYPT);
//echo "login_pass :" .$login_pass;
//$login_pass = sha1($input_pass);


if($mod=="insert") {
    $sql="insert into it_user (";
    $sql=$sql."name,id,pass,email,nick,tel,post_num,address,inner_address,level,regist_day,regist_ip) values (";
    $sql=$sql."'$name','$id','$insert_pass','$email','$nick','$tel','$post_num','$address','$inner_address','$level','$regist_day','$regist_ip')";
    $result=mysql_query($sql,$connect);

    if(!$result){
?>
<script>
    alert("가입에 실패하였습니다. 잠시 후 다시 시도해주세요.\n문제가 지속 될 경우 관리자에게 문의하세요.(032-452-0184)");   
    //history.go(-1);
</script>
<?
        //echo"query :" .$sql;
    } else {        
?>
<script>
    alert("축하합니다.\n가입이 성공되었습니다.");
    location.href = ("../");
</script>
<?
    } //insert > result
} //mod=insert
else if ($mod=="login") { //로그인 모드


    $sql="select count(id) from it_user where id='$login_id'";
    $result=mysql_query($sql,$connect);
    $id_check_cnt=mysql_result($result,0,0);
  
    if($id_check_cnt == 0) {
?>
<script>
    alert("아이디 또는 비밀번호를 확인 해주세요.1");
    location.reload();
</script>
<?
    } else {
        $login_query="select idx,name,id,pass,nick from it_user where id='$login_id'";
        $login_result=mysql_query($login_query,$connect);
        $row=mysql_fetch_array($login_result);
        $db_id = $row[id];
        $db_pass = $row[pass];
        $login_name = $row[name];
        $login_idx = $row[idx];
        $login_nick = $row[nick];


        if(password_verify($login_pass, $db_pass)) {//로그인 성공
            $_SESSION['useridx']=$login_idx;
            $_SESSION['username']=$login_name;
            $_SESSION['userid']=$login_id;
?>
<script>
    location.reload();    
</script>
<?

        } else {
            //로그인실패
?>
<script>
    alert("아이디 또는 비밀번호를 확인 해주세요.");
    location.reload();
</script>
<?
        }
    }
} //mod=login
else if($mod == "logout" ){
    unset($_SESSION['useridx']);
    unset($_SESSION['username']);
    unset($_SESSION['usernick']);
?>
<script>
    alert("로그아웃 되었습니다.");
    history.go(-1);
</script>
<?
} //mod =logout
else if($mod == "idcheck") {
    $sql = "select count(id) from it_user where id='$id_check'";
    $result = mysql_query($sql,$connect);
    $id_check = mysql_result($result,0,0);

    if($id_check == "0") {
        echo("사용 가능 한 아이디입니다.");
?>
<script>
    document.getElementById("id_result").style.color = "#1973ef";
        document.getElementById("id_check_result").value = "ok";
</script>
        <?
    } else {
        echo("이미 사용중인 아이디 입니다.");
        ?>
<script>
    document.getElementById("id_result").style.color = "red";
</script>
<?
    }
 } // mod = nickcheck
else if($mod == "nick_check") {
    $sql = "select count(nick) from it_user where nick='$nick_check'";
    $result = mysql_query($sql,$connect);
    $nick_cnt = mysql_result($result,0,0);

    if($nick_cnt == 0) {
?>
<script>
    document.getElementById("nick_check_help").style.color = "#1973ef";
    document.getElementById("nick_check_result").value = "ok";
</script>
        <?
        echo ("사용 가능한 닉네임 입니다.");
    } else {
        echo ("이미 사용중인 닉네임 입니다.");
        ?>
<script>
    document.getElementById("nick_check_help").style.color = "#f24444";
</script>
<?
    }
} else if($mod == "modify"){
    $modi_query = "update it_user set pass='$modify_pass', email='$email', tel='$tel', post_num='$post_num', address='$address', inner_address='$inner_address' where idx ='$idx'";
    $modi_result = mysql_query($modi_query,$connect);

    if(!$modi_result) {
?>
<script>
    alert("수정에 실패했습니다.\n잠시 후 다시 시도해주세요.");
    history.go(-1);
</script>
<?
    } else {
?>
<script>
    alert("수정되었습니다.");
    history.go(-1);
</script>
<?
    }
}
?>