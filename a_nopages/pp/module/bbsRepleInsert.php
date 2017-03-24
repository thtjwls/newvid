<?
include "../lib/session.php";
include "../lib/dbconnect.php";
?>
<?
$bbsidx = $_REQUEST["idx"];
$bbsReple = $_REQUEST["bbsReple"];
$regist_day = date("Y-m-d H:i:s");
$regist_ip = $_SERVER["REMOTE_ADDR"];
//user 정보 획득
$memberNickQuery = "select nick from pp_member where idx='$useridx'";
$memberNickResult = mysql_query($memberNickQuery,$connect);
$memberNickRow = mysql_fetch_array($memberNickResult);

$memberNick = $memberNickRow[nick]; //유저 닉네임 정보

    $bbsRepleInsertQuery = "insert into pp_bbs (comment_idx,cate,contents,writer,regist_day,regist_ip) values ";
    $bbsRepleInsertQuery = $bbsRepleInsertQuery."('$bbsidx','comment','$bbsReple','$memberNick','$regist_day','$regist_ip')";
    $bbsRepleInsertResult = mysql_query($bbsRepleInsertQuery,$connect);    
?>