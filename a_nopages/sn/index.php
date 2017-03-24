
<? include_once("pages/header.php"); ?>
<?
$Database = new Database;

$pagePATH = "../sn/pages/";

$setPage = isset($_GET["setPage"]) ? $_GET["setPage"] : print("<script>location.href = '/sn/?setPage=page01';</script>");

switch ($setPage) {
    case "modWrite" :
        include_once($_SERVER["DOCUMENT_ROOT"]."/sn/se2/write.php");
        break;
    case "membershipView" :
        include_once($pagePATH."users/membershipView.php");
        break;
    case "membershipAddSuccess" :
        include_once($pagePATH."users/membershipAddSuccess.php");
        break;
    case "page01" :
        include_once($pagePATH."view/page01.php");
        break;
    case "page02" :
        include_once($pagePATH."view/page02.php");
        break;
    default :
        break;
}

?>
<? include_once("pages/footer.php"); ?>