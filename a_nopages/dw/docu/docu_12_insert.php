<? include "../DB/dbconnect.php";?><!--DB 커텍터-->
<? include "../docu/Module/php/docu_module.php"; ?><!-- 프로그래밍을 위한 변수-->
<meta charset="utf-8" />
<?
$buse_code      =$_POST["buse"];
$level          =$_POST["level"];
$name           =$_POST["name"];
$docu_buse_code =$_POST["docu_buse_code"];
$docu_A_12_01   =$_POST["docu_A_12_01"];
$docu_A_12_02   =$_POST["docu_A_12_02"];
$docu_A_12_03   =$_POST["docu_A_12_03"];
$docu_A_12_04   =$_POST["docu_A_12_04"];
$docu_A_12_05   =$_POST["docu_A_12_05"];
$docu_A_12_06   =$_POST["docu_A_12_06"];
$docu_A_12_07   =$_POST["docu_A_12_07"];
$docu_A_12_08   =$_POST["docu_A_12_08"];
$docu_A_12_09   =$_POST["docu_A_12_09"];
$docu_A_12_10   =$_POST["docu_A_12_10"];
$docu_A_12_11   =$_POST["docu_A_12_11"];
$docu_A_12_12   =$_POST["docu_A_12_12"];
$docu_A_12_13   =$_POST["docu_A_12_13"];
$docu_A_12_14   =$_POST["docu_A_12_14"];
$docu_A_12_15   =$_POST["docu_A_12_15"];
$docu_A_12_16   =$_POST["docu_A_12_16"];
$docu_A_12_17   =$_POST["docu_A_12_17"];
$docu_A_12_18   =$_POST["docu_A_12_18"];
$docu_A_12_19   =$_POST["docu_A_12_19"];
$docu_A_12_20   =$_POST["docu_A_12_20"];
$docu_A_12_21   =$_POST["docu_A_12_21"];
$docu_A_12_22   =$_POST["docu_A_12_22"];
$docu_A_12_23   =$_POST["docu_A_12_23"];
$docu_A_12_24   =$_POST["docu_A_12_24"];
$docu_A_12_25   =$_POST["docu_A_12_25"];
$docu_A_12_26   =$_POST["docu_A_12_26"];
$docu_A_12_27   =$_POST["docu_A_12_27"];
$docu_A_12_28   =$_POST["docu_A_12_28"];
$docu_A_12_29   =$_POST["docu_A_12_29"];
$docu_A_12_30   =$_POST["docu_A_12_30"];
$docu_A_12_31   =$_POST["docu_A_12_31"];
$docu_A_12_32   =$_POST["docu_A_12_32"];

// DB 의 필드 부분
$dbcol="";
$z="";
for( $i=1; $i < 33 ; $i++ ){

    //$i가 10보다 작을 때
    if($i<10) { $z = "0".$i;} else {$z = $i;}

    if ($dbcol == "") {
        $dbcol ="docu_A_12_". $z;
    }
    else {
        $dbcol = $dbcol.","."docu_A_12_". $z;
    }
}
//DB 필드 생성 완료.

//DB 레코드 부분
$record="";
$y="";
for( $i=1; $i < 33 ; $i++ ){

    //$i가 10보다 작을 때
    if($i<10) { $y = "0".$i;} else {$y = $i;}

    if ($record == "") {
        $record = "'". ${"docu_A_12_". $y} ."'";
    }
    else {
        $record = $record.", '".${"docu_A_12_". $y} ."'";
    }

}
//DB 레코드 생성 완료

$sql = "insert into documents (company,docu_buse_code,docu_name,docu_date,docu_cate,";
$sql = $sql.$dbcol.")";
$sql = $sql." values ('$name','$regi_date','$docu_buse_code','인천일보','출장신청서',";
$sql=$sql.$record;
$sql=$sql.")";
$result=mysql_query($sql,$connect);
echo "sql : $sql";

if(!$result){
?>
<script>
    alert("서버에 문제가 생겨 등록되지 않습니다. \n문제가 지속 될 경우 관리자에게 문의하세요.");
</script>
<?
} else {
    ?>
<script>
    alert("등록이 완료되었습니다.");
</script>
<?
}
?>
