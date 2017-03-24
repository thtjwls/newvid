<? session_start(); ?>
<? include "../db/dbconnect.php"; ?> 
<meta charset="UTF-8">
<?
$id=$_GET["id"];
$mod=$_GET["mod"];



if($mod=="id_search"){
$sql="select count(id) from pa_user where id = '$id'";
$result=mysql_query($sql,$connect);
$idcheck_cnt=mysql_result($result,0,0);

if($idcheck_cnt == 0){
    echo("사용 가능 한 아이디입니다.");
    ?>
    <script>
        document.getElementById("id_result").style.color = "blue";
        document.getElementById("id_result").innerHTML += "<input type='hidden' id='hiddenid' value='ok'>"
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
}

//회원 인설트
if($mod=="insert_confirm"){
    $name   =$_POST["name"];
    $id     =$_POST["id"];    
    $pass   =$_POST["pass"];
    $company=$_POST["company"];
    $buse   =$_POST["buse"];
    $level  =$_POST["level"];
    $web_level=$_POST["web_level"];
    $hp     =$_POST["hp"];
    $cp     =$_POST["cp"];
    $email  =$_POST["email"];
    $regist_day = date("Y-m-d H:i:s");

    $sql="insert into pa_user (name,id,pass,company,buse,level,site_level,regist_day,hp,cp,email) value";
    $sql=$sql."('$name','$id','$pass','$company','$buse','$level','$web_level','$regist_day','$hp','$cp','$email')";
    $result =mysql_query($sql,$connect);
    
    if(!$result){
?>
    <script>
        alert("가입에 실패하였습니다.\n잠시 후 다시 시도해주세요.\n문제가 지속되면 시스템관리자에게 문의하십시오.");
    </script>
<?
    } else {
?>
    <script>
        alert("성공적으로 가입되었습니다.\n로그인 후 이용 해 주십시오.");
        location.href = "../";
    </script>
<?}
}
?>

<?
    if($mod=="login"){
        $id=$_POST["id"];
        $pass=$_POST["pass"];

        $sql="select * from pa_user where id='$id'";
        $result=mysql_query($sql,$connect);
        $num_match=mysql_num_rows($result);

        if(!$num_match){
            echo("입력하신 아이디 또는 비밀번호정보가 없습니다.1");
        } else {
            $row=mysql_fetch_array($result);
            $db_pass=$row[pass];
            
            if($pass != $db_pass){
                echo "입력하신 아이디 또는 비밀번호정보가 없습니다.";
                exit;
            } else {
                $useridx=$row[idx];
                $userid=$row[id];
                $username=$row[name];
                $usercompany=$row[company];
                $userbuse=$row[buse];
                $userlevel=$row[level];
                $user_site_level=$row[site_level];
                $userhp=$row[hp];
                $usercp=$row[cp];
                $useremail=$row[email];
            
                $_SESSION['useridx']=$useridx;
                $_SESSION['userid']=$userid;
                $_SESSION['username']=$username;
                $_SESSION['usercompany']=$usercompany;
                $_SESSION['userbuse']=$userbuse;
                $_SESSION['userlevel']=$userlevel;
                $_SESSION['user_site_level']=$user_site_level;
                $_SESSION['userhp']=$userhp;
                $_SESSION['usercp']=$usercp;
                $_SESSION['useremail']=$useremail;
                ?>
                    <script>
                        location.href=("sample.php");
                    </script>
                <?
            }
        }
    }
?>