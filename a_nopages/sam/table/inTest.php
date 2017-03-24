<meta charset="utf-8" />
<?
$connect = mysql_connect("localhost","thtjwls","ekdP0919!") or die("");
mysql_select_db("thtjwls");
mysql_query("set names utf-8",$connect);

$pass = password_hash("1234",PASSWORD_DEFAULT);
$regist_day = date("Y-m-d H:i:s");
$regist_ip = $_SERVER['REMOTE_ADDR'];

$sql = "insert into sam_user_tbl (";
$sql .= "ad_NAME,ad_ID,ad_PASS,ad_TEL,ad_Email,ad_POST_NUM,ad_ADDRESS,ad_DETAIL_ADDRESS,regist_day,regist_ip,user_type) values ";
$sql .= "('이지훈','admin','$pass','010-9003-6094','thtjwls@naver.com','40524','인천일보 사옥','2층 온라인뉴스부','$regist_day','$regist_ip',0)";
$result = mysql_query($sql,$connect);

($result) ? print("YES") : print("NO : ".$sql);

/*
    기본 테이블 sam_user_tbl

    ad_idx
    ad_NAME
    ad_ID
    ad_PASS
    ad_TEL
    ad_Email
    ad_POST_NUM
    ad_ADDRESS
    ad_DETAIL_ADDRESS
    regist_day
    regist_ip
    level
    ad_user_type
*/
?>