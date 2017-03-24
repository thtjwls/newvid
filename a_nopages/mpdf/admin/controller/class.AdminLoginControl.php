<?
include_once("../php/class.AdminLogin.php");

$c = new AdminLogin;
$table = "dy_user";
$INPUT_ID = $_REQUEST["id"];
$INPUT_PASS = $_REQUEST["pass"];

$c->Login($table,$INPUT_ID,$INPUT_PASS);
?>