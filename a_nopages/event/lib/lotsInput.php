<?
include "../lib/dbconnect.php";
?>
<?
$idx = $_REQUEST["idx"];
$mod = $_REQUEST["mod"];
$name = $_REQUEST["name"];
$tel = $_REQUEST["tel1"]."-".$_REQUEST["tel2"]."-".$_REQUEST["tel3"];
$lotsNum = $_REQUEST["num"];

//lotsNum = 2; //당첨자수
//echo "index tel :" .$tel;

switch($mod) {
    case "confirm" :
        $lotsQuery = "select count(*) from lots where tel='$tel'";
        $lotsResult = mysql_query($lotsQuery,$connect);
        $lotsCnt = mysql_result($lotsResult,0,0);

        if($lotsCnt != 0) {
            echo "telFalse";
            //echo "<br>$name";
        } else {
            echo "telTrue";
            //echo "<br>$name";
        }

        break;
    case "insert" :
        $lotsInsertQuery = "insert into lots (name,tel) values ('$name','$tel')";
        $lotsInsertResult = mysql_query($lotsInsertQuery,$connect);

        if($lotsInsertResult) {
            echo "insertSuccess";
        } else {
            echo "insertFailed";
        }

        break;
    case "del" :
        $lotsDelQuery = "delete from lots where idx='$idx'";
        $lotsDelResult = mysql_query($lotsDelQuery,$connect);

        if($lotsDelResult){
            echo "delSuccess";
        } else {
            echo "delFailed";
        }

        break;

    case "lotsAct" :
        lotsAct($lotsNum);
        break;

    case "clear" :
        clear();
        break;

    default :
        break;
}

function lotsAct($lotsNum) {
    //echo "<meta charset='utf-8'";
    global $connect;

    $lotsActCntQ = "select count(idx) from lots";
    $lotsActCtnR = mysql_query($lotsActCntQ,$connect);
    $lotsActNum = mysql_result($lotsActCtnR,0,0); //전체 참여자

    $lotsActQ = "select * from lots";
    $lotsActR = mysql_query($lotsActQ,$connect);

    //배열을 순서대로 저장

    for($i=0;$i<$lotsActNum;$i++){
        $row = mysql_fetch_assoc($lotsActR); //DB에서 idx 추출
        $id[$i] = "<td>".$row[name]."</td><td>".$row[tel]."</td>"; //idx 값을 배열값에 담음
    }

    //배열 키 섞음 idx 값 다시저장
    shuffle($id);

    //배열 다시출력
    $str ="";
    for($i=0;$i<$lotsNum;$i++){
        $str .="<tr>";
        $str .="$id[$i]";
        $str .="</tr>";
    }
    echo "$str";
}

function clear() {
    global $connect;

    $lotsClearQ = "delete from lots";
    $lotsClearR = mysql_query($lotsClearQ,$connect);
    
}
?>