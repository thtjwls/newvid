<?
include "../lib/dbconnect.php";

$mod = $_REQUEST["mod"];
$idx = $_REQUEST["idx"];

if($mod = "del") {
    $sql = "delete from je_gian where idx = '$idx'";
    $result = mysql_query($sql,$connect);

    if(!$result) {
        echo "false";        
    } else {
        echo "true";        
    }
}
?>