<?
include "lib/session.php";
include "lib/dbconnect.php";
?>

<?
/* 호출은 이런 형식으로 하면 됨
$b = new d();
$b -> login_check();
 */
//채팅 테이블 pp_chat_room (ChatUser int not null) default 0


if(!$useridx || $useridx == "" ) {
    //setcookie("pp_chat",date("Ymd")."$useridx", 0);
}

class db_table {
    function db_create_table() { //로그인 체크 함수
        $sql = "create table pp_chat (";
        $sql = $sql."idx int not null auto_increment primary key, nick varchar(20) not null, regist_day varchar(30) not null)";
        $result = mysql_query($sql,$connect);
    }

    function db_delete_table() {
        $sql = "drop table pp_chat";
        $result = mysql_query($sql,$connect);
    }
}

//쿠키 생성여부 검증


//최초 유저 입장시
$roomsetQuery = "update pp_chat_room set UserCnt=UserCnt+1";
$roomsetRresult = mysql_query($roomsetQuery,$connect);

echo "cookie :" .$_COOKIE[pp_chat];


?>