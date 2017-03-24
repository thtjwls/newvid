<?
$vConnect = mysql_connect("localhost","thtjwls","ekdP0919!") or die ("vConnect False..!");
mysql_select_db("thtjwls");

$agent = $_SERVER['HTTP_USER_AGENT'];
$device = '';

if(strpos($agent,'Window') == true) {
    $device = 'Window';
} else if (strpos($agent,'Android') == true) {
    $insertAgent = 'Android';
} else if (strpos($agent,'iPhone') == true) {
    $device = 'iPhone';
} else {
    $device = 'unKnown';
}

$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d H:i:s');

//create table mpdf_view (ip varchar(50),device varchar(50), date varchar(30))

$query = "insert into mpdf_view (ip,device,date) values ('".$ip."','".$device."','".$date."')";
$result = mysql_query($query,$vConnect);
?>