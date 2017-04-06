<? include "../lib/session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<meta charset="utf-8"/>
<?
$idx=$_GET["idx"];
$delete_access = "select level from it_user where idx='$useridx'";
$delete_result = mysql_query($delete_access,$connect);
$row=mysql_fetch_array($delete_result);
$access_level  = $row[level];
if(!$access_level || $access_level < 10) {
?>
<script>
    alert("잘못된 접근입니다.(session not found)");
    history.go(-1);
</script>
<?
} else {
    $sql="delete from it_notice where idx='$idx'";
    $result=mysql_query($sql,$connect);
}
if(!$result){
?>
<script>
    alert("삭제에 실패하였습니다. 잠시 후 다시 시도해주세요.\n문제가 지속될 경우 관리자에게 문의하십시오.");
</script>
    <?
} else {
    ?>
<script>
    alert("삭제가 완료되었습니다.");
    location.href = ("../pages/page05_sec2.php");
</script>
<?
}
?>