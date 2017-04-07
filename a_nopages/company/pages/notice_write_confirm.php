<meta charset="utf-8" />
<?
$notice_write = $_POST["notice_write"];
if($notice_write == "itimes") {
    ?>
<script>
    location.href = "page05_write.php";
</script>
<?
} else {
?>
<script>
    alert("비밀번호가 맞지 않습니다.\n관리자에게 문의 해 주세요.");
    history.go(-1);
</script>
<?
}
?>