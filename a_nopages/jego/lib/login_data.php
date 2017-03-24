<?
include "session.php";
include "dbconnect.php";

$mod = $_REQUEST["mod"];
$login_id = $_REQUEST["id"];
$login_pass = $_REQUEST["pass"];

if($mod == "login") {
    indexLogin();
}

function indexLogin() {
    global $connect;
    global $login_id;
    global $login_pass;

    $loginIdCntQuery = "select count(idx) from je_member where id='$login_id'";
    $loginIdCntResult = mysql_query($loginIdCntQuery,$connect);
    $loginIdCnt = mysql_result($loginIdCntResult,0,0);

    if($loginIdCnt == 0) {
        echo "id or pass Database is not search :" .$login_id;
    } else {
        $loginQuery = "select idx,id,pass from je_member where id='$login_id'";
        $loginResult = mysql_query($loginQuery,$connect);
        $loginRow = mysql_fetch_array($loginResult);
        $db_id = $loginRow[id];
        $db_pass = $loginRow[pass];
        $db_idx = $loginRow[idx];
        $db_ac = $loginRow[ac];

        if($login_pass == $db_pass) {
            $_SESSION['useridx']=$db_idx;
            echo "connect";
        } else if ($db_ac == 0) {
            echo "err0";
        } else {
            //로그인 실패
            echo "err1";
        }
    }
}
?>