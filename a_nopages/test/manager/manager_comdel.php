<? include "../lib/session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<meta charset="utf-8">
<?
  $idx=$_GET["idx"];

  $sql="delete from board where idx='$idx'";
  $result=mysql_query($sql,$connect);
?>
<script>
  alert("삭제 완료 되었습니다.");
  history.go(-1);
</script>
