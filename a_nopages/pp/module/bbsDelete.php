<?
include "../lib/session.php";
include "../lib/dbconnect.php";
?>
<meta charset="utf-8"/>
<?

$idx = $_REQUEST["idx"];

$bbsDeleteQuery = "delete from pp_bbs where idx = '$idx'";
$bbsDeleteResult = mysql_query($bbsDeleteQuery,$connect);
if(!$bbsDeleteResult) {
?>
<script type="text/javascript">
    alert("삭제에 실패하였습니다. 잠시후 다시 시도해주세요.\n문제가 지속 될 경우 관리자에게 문의하세요.");
    history.go(-1);
</script>
    <?
} else {
    ?>
<script type="text/javascript">
    alert("삭제되었습니다.");
    location.href = "../index.php?tabs=bbs";
</script>
    <?
}
?>