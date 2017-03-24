<?
include_once("../lib/dbconnect.php");

$buse = $_POST["applyPart"];
$name = $_POST["applyName"];
$train = $_POST["selectRe"];
$sDate = $_POST["useDate"];
$nDate = $_POST["useEndDate"];

$sql = "insert into train (";
$sql .= "buse,name,train,sDate,eDate) values ";
$sql .="('$buse','$name','$train','$sDate','$nDate')";
$result = mysql_query($sql,$connect);

if(!$result) {
    echo "error...!";
} else {
    echo "<script>alert('Save...!');</script>";    
    echo "<script>location.href='../admin/'</script>";
}
?>