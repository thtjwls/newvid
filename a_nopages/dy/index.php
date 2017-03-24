<? include_once ("header.php");?>

<?
//페이지 호출
$mod = $_GET["mod"];

switch ($mod) {
    case "main" :
        include_once("pages/main.php");
        break;
    default :
        include_once("pages/main.php");
        break;
}
?>
<!-- wrap 끝 -->
<? include_once ("footer.php");?>