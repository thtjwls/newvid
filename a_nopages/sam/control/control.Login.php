<?
include_once("import.php");

$input_ID = $_REQUEST["input_ID"];
$input_PASS = $_REQUEST["input_PASS"];

$login = new Login;
$login->id = $input_ID;
$login->pass = $input_PASS;
$login->idChk();
?>