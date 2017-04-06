<?
include "../lib/session.php";
include "../lib/dbconnect.php";

$je_com=$_REQUEST[je_com];
$je_name=$_REQUEST[je_name];
$je_serial=$_REQUEST[je_serial];
$je_ibgo=$_REQUEST[je_ibgo];
$je_sou=$_REQUEST[je_sou];
$je_acmember=$username; //세션에서 가져옴
$je_regidate = date("Y-m-d H:i:s");
$je_number=$_REQUEST[je_number];
$je_cost=$_REQUEST[je_cost];
$je_sta=$_REQUEST[je_sta];

$je_insert_qry = "insert into je_jego (je_com,je_name,je_serial,je_ibgo,je_sou,je_acmember,je_regidate,je_number,je_cost,je_sta) values ";
$je_insert_qry = $je_insert_qry."('$je_com','$je_name','$je_serial','$je_ibgo','$je_sou','$je_acmember','$je_regidate','$je_number','$je_cost','$je_sta')";

$je_insert_result = mysql_query($je_insert_qry,$connect);

if(!$je_insert_result) {
    echo"error";
} else {
    echo"success";
}
?>