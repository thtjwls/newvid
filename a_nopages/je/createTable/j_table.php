
<meta charset="utf-8"/>
<?
include_once ("../lib/dbconnect.php");
/* ===================================================
 * Table Right Ji.Hoon 2016.10.04
 * j_name = 품명
 * j_regidate = 입고일 ( 데이터 작성일 )
 * j_cate = 금액
 * j_etc = 비고
 * j_cate = 품목 , 소모품
 * ===================================================
 */

$sql = "create table j_table (";
$sql .= "idx int not null primary key auto_increment, ";
$sql .="j_name varchar(50) not null, ";
$sql .="j_regidate varchar(50) not null, ";
$sql .="j_code varchar(50) not null, ";
$sql .="j_coat int not null, ";
$sql .="j_etc TEXT not null, ";
$sql .="j_cate varchar(30) not null";
$sql .=")";
$result = mysql_query($sql,$connect);
if($result) {
    echo ("<script>alert('create Table .. !!');</script>");
} else {
    echo ("<script>alert('failed Table .. !!')</script>");
    echo ("<br>".$sql);
}
?>