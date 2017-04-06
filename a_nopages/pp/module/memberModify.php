<?
include "lib/session.php";
//include "lib/dbconnect.php";
?>

<?
$memberModifyQuery = "select * from pp_member where idx='$useridx'";
$memberModifyResult = mysql_query($memberModifyQuery,$connect);
$memberRow = mysql_fetch_array($memberModifyResult);

$membername = $memberRow[name];
$memberid = $memberRow[id];
$membernick = $memberRow[nick];
$memberpostnum = $memberRow[post_num];
$memberaddress = $memberRow[address];
$memberinneraddress = $memberRow[inner_address];
$membertel = explode("-",$memberRow[tel]);
$membertel1 = $membertel[0];
$membertel2 = $membertel[1];
$membertel3 = $membertel[2];
$memberetc = $memberRow[etc];
?>