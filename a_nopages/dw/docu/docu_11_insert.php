<? include "../db/dbconnect.php";?><!--DB 커텍터-->
<? include "Module/php/docu_module.php"; ?>
<meta charset="utf-8"/>
<?


$regi_date=$_POST["regi_date"];
$name     =$_POST["name"];
$docu_buse_code =$_POST["docu_buse_code"];
$docu_A_11_01   =$_POST["docu_A_11_01"]; //품명
$docu_A_11_02   =$_POST["docu_A_11_02"]; //수량
$docu_A_11_03   =$_POST["docu_A_11_03"]; //용도
$docu_A_11_04   =$_POST["docu_A_11_04"]; //단가
$docu_A_11_05   =$_POST["docu_A_11_05"]; //금액
$docu_A_11_06   =$_POST["docu_A_11_06"]; //비고
$docu_A_11_07   =$_POST["docu_A_11_07"]; //Line_2
$docu_A_11_08   =$_POST["docu_A_11_08"];
$docu_A_11_09   =$_POST["docu_A_11_09"];
$docu_A_11_10   =$_POST["docu_A_11_10"];
$docu_A_11_11   =$_POST["docu_A_11_11"];
$docu_A_11_12   =$_POST["docu_A_11_12"];
$docu_A_11_13   =$_POST["docu_A_11_13"]; //Line_3
$docu_A_11_14   =$_POST["docu_A_11_14"];
$docu_A_11_15   =$_POST["docu_A_11_15"];
$docu_A_11_16   =$_POST["docu_A_11_16"];
$docu_A_11_17   =$_POST["docu_A_11_17"];
$docu_A_11_18   =$_POST["docu_A_11_18"];
$docu_A_11_19   =$_POST["docu_A_11_19"];
$docu_A_11_20   =$_POST["docu_A_11_20"];
$docu_A_11_21   =$_POST["docu_A_11_21"];
$docu_A_11_22   =$_POST["docu_A_11_22"];
$docu_A_11_23   =$_POST["docu_A_11_23"];
$docu_A_11_24   =$_POST["docu_A_11_24"];
$docu_A_11_25   =$_POST["docu_A_11_25"];
$docu_A_11_26   =$_POST["docu_A_11_26"];
$docu_A_11_27   =$_POST["docu_A_11_27"];
$docu_A_11_28   =$_POST["docu_A_11_28"];
$docu_A_11_29   =$_POST["docu_A_11_29"];
$docu_A_11_30   =$_POST["docu_A_11_30"];
$docu_A_11_31   =$_POST["docu_A_11_31"];
$docu_A_11_32   =$_POST["docu_A_11_32"];
$docu_A_11_33   =$_POST["docu_A_11_33"];
$docu_A_11_34   =$_POST["docu_A_11_34"];
$docu_A_11_35   =$_POST["docu_A_11_35"];
$docu_A_11_36   =$_POST["docu_A_11_36"];

// DB 의 필드 부분
$dbcol="";
$z="";
for( $i=1; $i < 37 ; $i++ ){

    //$i가 10보다 작을 때
    if($i<10) { $z = "0".$i;} else {$z = $i;}

    if ($dbcol == "") {
        $dbcol ="docu_A_11_". $z;
    }
    else {
        $dbcol = $dbcol.","."docu_A_11_". $z;
    }
}
//DB 필드 생성 완료.

//DB 레코드 부분
$record="";
$y="";
for( $i=1; $i < 37 ; $i++ ){

    //$i가 10보다 작을 때
    if($i<10) { $y = "0".$i;} else {$y = $i;}

    if ($record == "") {
        $record = "'". ${"docu_A_11_". $y} ."'";
    }
    else {
        $record = $record.", '".${"docu_A_11_". $y} ."'";
    }

}
//DB 레코드 생성 완료

$sql="insert into documents (docu_name,docu_date,docu_buse_code,company,docu_cate,docu_self_tel,";
$sql=$sql.$dbcol;
$sql=$sql.")";
$sql=$sql." values ('$name','$regi_date','$docu_buse_code','인천일보','물품신청서','$com_tel',";
$sql=$sql.$record;
$sql=$sql.")";
$result=mysql_query($sql,$connect);

echo "sql : $sql";


?>
<script>
  alert("등록됨");
  // history.go(-1);
</script>