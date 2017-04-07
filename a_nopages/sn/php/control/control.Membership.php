<?
include_once("../class/class.Membership.php");
include_once("../class/class.Database.php");

$Membership = new Membership("sn_member_tbl");

$chk_mod = $_REQUEST["chk_mod"];

$Membership->member_name = isset($_REQUEST["member_name"]) ? $_REQUEST["member_name"] : false;
$Membership->member_id = isset($_REQUEST["member_id"]) ? $_REQUEST["member_id"] : false;
$Membership->member_pass = isset($_REQUEST["member_pass"]) ? password_hash($_REQUEST["member_pass"],PASSWORD_BCRYPT) : false;
$Membership->member_buse = isset($_REQUEST["member_buse"]) ? $_REQUEST["member_buse"] : false;
$Membership->member_email = isset($_REQUEST["member_email"]) ? $_REQUEST["member_email"] : false;
$Membership->member_hp = isset($_REQUEST["member_hp"]) ? $_REQUEST["member_hp"] : false;
$Membership->member_tel = isset($_REQUEST["member_tel"]) ? $_REQUEST["member_tel"] : false;



/* 로그인 변수 */
$Membership->member_id_string = ($_REQUEST["hidden_login_member_id"]) ? $_REQUEST["hidden_login_member_id"] : false;
$Membership->member_pass_string = isset($_REQUEST["hidden_login_member_pass"]) ? $_REQUEST["hidden_login_member_pass"] : false;


switch ($chk_mod) {
    case "id_chk" :
        print($Membership->id_chk());
        break;
    case "membershipInsert" :
        print($Membership->member_insert());
        break;
    case "memberLogin" :        
        print($Membership->member_login_id_chk());
        break;
    default :
        break;
}
?>