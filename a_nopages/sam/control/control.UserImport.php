<?
include_once("../import/import.php");

$control = $_GET["control"];

$d = new UserImport;
$d->se_idx = $_SESSION["sidx"];
$d->ad_NAME = $_REQUEST["ad_NAME"];
$d->ad_ID = $_REQUEST["ad_ID"];
$d->ad_PASS = password_hash($_REQUEST["ad_PASS"],PASSWORD_DEFAULT);
$d->ad_TEL = $_REQUEST["ad_TEL"];
$d->ad_Email = $_REQUEST["ad_Email"];
$d->ad_POST_NUM = $_REQUEST["ad_POST_NUM"];
$d->ad_ADDRESS = $_REQUEST["ad_ADDRESS"];
$d->ad_DETAIL_ADDRESS = $_REQUEST["ad_DETAIL_ADDRESS"];
$d->regist_day = date("Y-m-d H:i:s");
$d->regist_ip = $_SERVER['REMOTE_ADDR'];

switch($control) {
    case "idChk" :
        echo $d->idChk();
        break;
    case "AddUser" :
        echo $d->memberInsert();
        break;
    case "modiUser" :
        echo $d->modify();
        break;
    case "id_search_User" :
        print($d->ids_search());
        break;
    case "pass_search_User" :
        print($d->pss_search());
        break;
    case "passChangeUser" :
        print($d->passChangeUser());
        break;
    default :
        break;
}


?>