<?
include_once ("../lib/session.php");
require("../lib/dbconnect.php");


$mod = $_REQUEST["mod"];
$id = $_REQUEST["id"];
$pass = password_hash($_REQUEST["pass"],PASSWORD_BCRYPT);
$loginPass = $_REQUEST["loginPass"];
$name = $_REQUEST["name"];
$company = $_REQUEST["company"];
$buse = $_REQUEST["buse"];
$tel = $_REQUEST["tel"];
$postNum = $_REQUEST["postNum"];
$addr = $_REQUEST["addr"];
$inAddr = $_REQUEST["inAddr"];
$level = 1;
$access = "false";
$registDay = date("Y-m-d H:i:s");



switch ($mod) {
    case "idCheck" :
        idCheck();
        break;
    case "insert" :
        userInsert();
        break;
    case "delete" :

        break;
    case "modify" :
        userModify();
        break;
    case "login" :
        userLogin();
        break;
    case "logout" :
        unset($_SESSION['useridx']);
        break;

}

function idCheck() {
    global $connect,$id;
    $sql = "select count(id) from j_user where id = '$id'";
    $result = mysql_query($sql,$connect);
    $idCnt = mysql_result($result,0,0);

    if($idCnt == 0 ){
        echo "true";
    } else {
        echo "false";
    }
}

function userInsert() {
    global $connect,$id,$mod,$pass,$name,$company,$buse,$tel,$postNum,$addr,$inAddr,$level,$access,$registDay;

    $sql = "insert into j_user (id,pass,name,company,buse,tel,postNum,address,in_address,level,access,registDay) values ";
    $sql .="('$id','$pass','$name','$company','$buse','$tel','$postNum','$addr','$inAddr','$level','$access','$registDay')";
    $result = mysql_query($sql,$connect);

    if(!$result) {
        echo "false";
    } else {
        echo "true";
    }
}

function userLogin() {
    global $mod,
    $id,
    $pass,
    $loginPass,
    $connect;

    $cntSql = "select count(id) from j_user where id='$id'";
    $cntResult = mysql_query($cntSql,$connect);
    $cnt = mysql_result($cntResult,0,0);

    if ($cnt == 0 ){
        echo "false";
    } else {
        $sql = "select idx,id,pass,access from j_user where id='$id'";
        $result = mysql_query($sql,$connect);
        $row = mysql_fetch_array($result);

        $db_pass = $row[pass];
        $useridx = $row[idx];
        $access = $row[access];

        if(!password_verify($loginPass,$db_pass)) {
            echo "false";

        } else if($access == "false") {
            echo "wait";

        } else {
            $_SESSION['useridx']=$useridx;
            echo "true";
        }
    }
}

function userModify() {
    global $connect,$id,$mod,$pass,$name,$company,$buse,$tel,$postNum,$addr,$inAddr,$level,$access,$registDay;

    $sql = "update j_user set pass = '$pass', company = '$company', buse = '$buse', tel = '$tel', postNum = '$postNum', address = '$addr', in_address = '$inAddr'";
    $result = mysql_query($sql,$connect);

    if(!$result) {
        echo "false";
    } else if ($result) {
        echo "true";
    }
}
?>