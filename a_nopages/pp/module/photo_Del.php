<meta charset="utf-8" />
<?
include "../lib/dbconnect.php";

$idx = $_REQUEST["idx"];

$idxSelectQuery = "select * from pp_photo where idx = '$idx'";
$idxSelectResult = mysql_query($idxSelectQuery,$connect);
$selectRow = mysql_fetch_array($idxSelectResult);
$image = $selectRow[image];

$unfile = unlink("../photo/".$image); //파일삭제

$idxDeleteQuery = "delete from pp_photo where idx = '$idx' or reple_idx = '$idx'";
$idxDeleteResult = mysql_query($idxDeleteQuery,$connect);
if(!$idxDeleteResult || !$unfile) {
?>
<script>
    alert("삭제중 문제가 발생하였습니다. 잠시 후 다시 시도해 주세요.\n문제가 지속될 경우 관리자에게 문의하세요.010-9003-6094");
    history.go(-1);
</script>
<?
} else {
?>
<script>
    alert("삭제가 완료되었습니다.");
    history.go(-1);
</script>
    <?
}
?>