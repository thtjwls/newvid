<?
 SESSION_START();
   $useridx = $_SESSION['useridx'];
   include "dbconnect.php";
?>
<?
//세션 유저정보가져오기    
$sql = "select * from je_member where idx = '$useridx'";
$result = mysql_query($sql,$connect);

$row=mysql_fetch_array($result);
$userac = $row[ac]; //유저 가입 승인여부
$username = $row[name]; //유저 이름
$userlevel = $row[level]; //유저 레벨
?>