<meta charset="utf-8" />
<?
//로그인이 된 가정
$idx = '2';

$sql="select * from members where idx='$idx'";
$result=mysql_query($sql,$connect);




$row=mysql_fetch_array($result);
$id=$row[id];
$name=$row[name];
$buse=$row[buse];
$level=$row[level];
$join_date=$row[join_date];
$com_tel=$row[com_tel];

if($level=='1') {
    $level_code ='사원';
}else if($level=='2') {
    $level_code = '대리';
}else if($level=='3') {
    $level_code = '과장';
}else if($level=='4') {
    $level_code = '차장';
}else if($level=='5') {
    $level_code = '부장';
}else if($level=='6') {
    $level_code = '국장';
}else if($level=='7') {
    $level_code = '실장';
}else if($level=='8') {
    $level_code = '본부장';
}else if($level=='9') {
    $level_code = '이사';
}else if($level=='10') {
    $level_code = '감사';
}else if($level=='11') {
    $level_code = '사장';
}else if($level=='12') {
    $level_code = '회장';
}

if($buse=='01') {
    $buse_code = '경영기획실';
}

//각 HTML 페이지에서 insert 또는 preview 로 데이터 전송

    $writer_id=$_POST["writer_id"]; //문서를 작성한 아이디
    $writer_name=$_POST["writer_name"]; //문서를 작성한 이름
    $writer_buse=$_POST["writer_buse"]; //문서를 작성한 부서
    $writer_tel=$_POST["writer_tel"]; //문서를 작성한 부서의 내선번호
    $buse_own=$_POST["buse_own"]; //현재 문서를 소유한 부서
    $regi_day=$_POST["regi_day"]; //문서를 저장한 시간
    $regi_day=substr($regi_day,10);
    $regist_day=date("Y.m.d H:i:s"); // 실제시간
    $cate=$_POST["cate"]; //문서의 이름
    $write_day=$_POST["regi_day"];

    //결제레벨



    //참조 1~5
    $refer1=$_POST["refer1"];
    $refer2=$_POST["refer2"];
    $refer3=$_POST["refer3"];
    $refer4=$_POST["refer4"];
    $refer5=$_POST["refer5"];

    //각 항목
    $docu_01=$_POST['docu_01'];
    $docu_02=$_POST['docu_02'];
    $docu_03=$_POST['docu_03'];
    $docu_04=$_POST['docu_04'];
    $docu_05=$_POST['docu_05'];
    $docu_06=$_POST['docu_06'];
    $docu_07=$_POST['docu_07'];
    $docu_08=$_POST['docu_08'];
    $docu_09=$_POST['docu_09'];
    $docu_10=$_POST['docu_10'];
    $docu_11=$_POST['docu_11'];
    $docu_12=$_POST['docu_12'];
    $docu_13=$_POST['docu_13'];
    $docu_14=$_POST['docu_14'];
    $docu_15=$_POST['docu_15'];
    $docu_16=$_POST['docu_16'];
    $docu_17=$_POST['docu_17'];
    $docu_18=$_POST['docu_18'];
    $docu_19=$_POST['docu_19'];
    $docu_20=$_POST['docu_20'];
    $docu_21=$_POST['docu_21'];
    $docu_22=$_POST['docu_22'];
    $docu_23=$_POST['docu_23'];
    $docu_24=$_POST['docu_24'];
    $docu_25=$_POST['docu_25'];
    $docu_26=$_POST['docu_26'];
    $docu_27=$_POST['docu_27'];
    $docu_28=$_POST['docu_28'];
    $docu_29=$_POST['docu_29'];
    $docu_30=$_POST['docu_30'];
    $docu_31=$_POST['docu_31'];
    $docu_32=$_POST['docu_32'];
    $docu_33=$_POST['docu_33'];
    $docu_34=$_POST['docu_34'];
    $docu_35=$_POST['docu_35'];
    $docu_36=$_POST['docu_36'];
    $docu_37=$_POST['docu_37'];
    $docu_38=$_POST['docu_38'];
    $docu_39=$_POST['docu_39'];
    $docu_40=$_POST['docu_40'];

    $mode=$_POST["mode"];
?>