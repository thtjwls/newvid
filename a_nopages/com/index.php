<?
SESSION_START();

$mod = $_GET["mod"];

(!$_SESSION["useridx"] || $_SESSION["useridx"] == "" ) ? $mod = "default" : $mod = $_GET["mod"];

switch ($mod) {
    case ($mod == "default") :        
        include_once("co_login.php");
        break;
    case ($mod == "main") :
        include_once("main.php");
        break;
    default :
        break;
}
?>