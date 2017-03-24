<?

include_once("../php/include.php");

$db = new Database;
$connect = $db->connect;

$pass = password_hash("1234",PASSWORD_DEFAULT);
$day = date("Y-m-d H:i:s");

$sql = "insert into co_user (name,id,pass,buse,registDay,tel,access) values ";
$sql .= "('이지훈','admin','$pass','온라인뉴스부','$day','010-9003-6094',1)";
$result = mysql_query($sql,$connect);

if(!$result) {
    echo "ERR...!";
} else {
    echo "SUCCESS...!";
}

?>