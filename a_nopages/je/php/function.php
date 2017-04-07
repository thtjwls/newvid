<?
include_once("../lib/session.php");
include_once("../lib/dbconnect.php");



$mod =  $_REQUEST["mod"];
$name = $_REQUEST["name"];
$date = $_REQUEST["registDay"];
$code = $_REQUEST["code"];
$coat = $_REQUEST["coat"];
$etc = $_REQUEST["etc"];
$cate = $_REQUEST["cate"];
$idx = $_REQUEST["idx"];
$dataIdx = $_REQUEST["dataIdx"];

switch($mod) {
    case "insert" :
        productInsertFunc();
        break;
    case "delete" :
        productDeleteFunc();
        break;
    case "modify" :
        productModifyViewFunc();
        break;
    case "modifyInsert" :
        productModifyInsertFunc();
        break;
}

function productDeleteFunc() {
    global $connect,$idx;

    $sql = "delete from j_table where idx = '$idx'";
    $result = mysql_query($sql,$connect);

    if(!$result) {
        echo "1";
    } else {
        echo "0";
    }
}




function productInsertFunc() {
    global $mod,$connect,
    $name,
    $date,
    $code,
    $coat,
    $etc,
    $cate;

    $sql = "insert into j_table (j_name,j_regidate,j_code,j_coat,j_etc,j_cate) value ";
    $sql .= "('$name','$date','$code','$coat','$etc','$cate')";
    $result = mysql_query($sql,$connect);

    if(!$result) {
        echo "1";
    } else if($result) {
        echo "0";
    } else {
        echo "2";
    }
}


function productModifyViewFunc() {
    global $mod,$connect,
    $name,
    $date,
    $code,
    $coat,
    $etc,
    $idx,
    $cate;

    $sql = "select * from j_table where idx= '$idx'";
    $result = mysql_query($sql,$connect);
    $row = mysql_fetch_assoc($result);
    
    print "<input type='hidden' id='udataidx' name='idx' value='".$row[idx]."' />";
    print "<input type='hidden' id='udata1' value='".$row[j_name]."' />";
    print "<input type='hidden' id='udata2' value='".$row[j_regidate]."' />";
    print "<input type='hidden' id='udata3' value='".$row[j_code]."' />";
    print "<input type='hidden' id='udata4' value='".$row[j_coat]."' />";
    print "<input type='hidden' id='udata5' value='".$row[j_etc]."' />";
    print "<input type='hidden' id='udata6' value='".$row[j_cate]."' />";    
    //print_r($row);

}

function productModifyInsertFunc() {
    global $mod,$connect,
    $name,
    $date,
    $code,
    $coat,
    $etc,
    $idx,
    $cate;

    $sql = "update j_table set j_name='$name', j_regidate='$date',j_code='$code',j_coat='$coat',j_etc='$etc',j_cate='$cate' where idx='$idx'";
    $result = mysql_query($sql,$connect);

    if(!$result) {
        echo ("1");
    } else if($result) {
        echo ("0");
    } else {
        echo ("2");
    }
}
?>

