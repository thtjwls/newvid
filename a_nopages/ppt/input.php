<?
include "dbconnect.php";

$mod = $_GET["mod"];
$regiDay = $_REQUEST["regi_date"];
$startTime = $_REQUEST["start_time"];
$endTime = $_REQUEST["end_time"];
$Lidx = $_REQUEST["idx"];

//오전 오후 비교로직

switch($mod) {
    case "insert" :
        insertTime($regiDay,$startTime,$endTime);
        break;
    case "del" :
        $delQ = "delete from ppt";
        $delR = mysql_query($delQ,$connect);
        break;
    case "Ldel" :
        $ldelQ = "delete from ppt where idx = '$Lidx'";
        $ldelR = mysql_query($ldelQ,$connect);
}

function timeLose($t) {
    $t_Time = substr($t,6,7);

    $t_int = substr($t,0,5);
    $t_int = str_replace(":","",$t_int);

    if($t_Time == "PM") {
        $t_int = $t_int + 1200;
    }

    return $t_int;
}

//
//create table ppt (
//idx int not null primary key auto_increment,
//regist_day varchar(50) not null,
//start_time varchar(50) not null,
//end_time varchar(50) not null,
//t_lose varchar(20) not null)

function insertTime($a,$b,$c) {
    global $connect;
    global $startTime;
    global $endTime;

    $d = substr(timeLose($endTime) - timeLose($startTime),0,-2);

    $sql = "insert into ppt (regist_day,start_time,end_time,t_lose) values
            ('$a','$b','$c','$d')";
    $result = mysql_query($sql,$connect);

    if(!$result) {
        echo "insertFailed";
    } else {
        echo "insertOk";
    }
}
?>