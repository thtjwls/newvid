<?
include "../lib/dbconnect.php";

for($i = 0; $i < 200; $i++ ) {
    $sql = "insert into j_table (j_name,j_regidate,j_code,j_coat,j_etc,j_cate) values ";
    $sql .="('품목$i','20116-08-01','code-$i','40$i','비고없음','0')";
    //$result = mysql_query($sql,$connect);
}
?>