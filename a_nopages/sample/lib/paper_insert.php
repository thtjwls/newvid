<? include "session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<meta charset="utf-8">
<?
	$mod=$_GET["mod"];
	$pa_subject = $_POST["tx_trex_subject"]; //문서제목
    $pa_content = $_POST["content"];
	$file	=$_FILE["file"];
	$username = $username; // 작성자 (세션에서 가져옴)
	$userbuse = $userbuse; //작성자 부서 (세션에서 가져옴)
	$regist_day	=date("Y-m-d H:i:s");; // 현재시간
	$sta	=$_POST["sta"]; //현재상태
	//결제저장시 결제라인
	$app1	=$_POST["app1"];
	$app2	=$_POST["app2"];
	$app3	=$_POST["app3"];
	$app4	=$_POST["app4"];
	$app5	=$_POST["app5"];
	$app6	=$_POST["app6"];
	$app7	=$_POST["app7"];
	$app8	=$_POST["app8"];

	
	
	
if($mod=="paper_save"){
	$sql="insert into pa_paper (pa_title,pa_public,pa_writer,pa_buse,pa_content,regist_day,pa_file,pa_status,app8,app7,app6,app5,app4,app3,app2,app1)";
	//예제
	//공개옵션 : 공개 1 비공개 0
	//현재상태 0: 일반문서, 1: 결제대기중 , 2: 결제완료, 3:반려
	//보낼 부서 : 한글
	//저장옵션 : 1 -> 내문서저장 2-> 결제문서 저장 3-> 양식저장 4->기타
	//현재상태가 0(일반문서) 일경우 각부 간부결제 default 0 
	//결제문서로 저장시 현재상태 = 1 -> 결제대기중 , 결제라인 중 한명만 승인 or 반려시 2 ->진행중 ,각부서 app 항목 값 = 3 일경우( 승인 ) 값이 4 일경우( 반려 )
	$sql=$sql." value (";
    $sql=$sql."'$pa_subject',"; //제목
    $sql=$sql."'0',"; //공개옵션 0:비공개 1:공개
    $sql=$sql."'$username',"; //작성자(세션)
    $sql=$sql."'$userbuse',"; //작성부서 (세션)
    $sql=$sql."'$pa_content',"; //작성내용 (HTML 형식으로 다음에디터에서 가져옴)
    $sql=$sql."'$regist_day',"; //작성날짜
    $sql=$sql."'$file',"; //첨부파일
    $sql=$sql."'$sta',"; //현재상태 0:내문서 1:결재대기 2:결재완료 3:결재반려
    $sql=$sql."'$app8','$app7','$app6','$app5','$app4','$app3','$app2','$app1')"; //각 직급
    $result=mysql_query($sql,$connect);
    echo "sql :" .$sql;
    if(!$result){ ?>
        <script>
            alert("일반문서저장에 실패하였습니다.\n문제가 지속 될 경우 관리자에게 문의하세요.");
            //history.go(-1);
        </script>
        <?
    } else { ?>
        <script>
            alert("저장되었습니다.");
            history.go(-1);
        </script>
    <? }
} else if($mod=="approve_save"){
    echo"<script>alert('결제라인저장');</script>";
    $sql="insert into pa_paper (pa_title,pa_public,pa_writer,pa_buse,pa_content,regist_day,pa_file,pa_status,app8,app7,app6,app5,app4,app3,app2,app1)";
    $sql=$sql." value (";
    $sql=$sql."'$pa_subject',"; //제목
    $sql=$sql."'0',"; //공개옵션 0:비공개 1:공개
    $sql=$sql."'$username',"; //작성자(세션)
    $sql=$sql."'$userbuse',"; //작성부서 (세션)
    $sql=$sql."'$pa_content',"; //작성내용 (HTML 형식으로 다음에디터에서 가져옴)
    $sql=$sql."'$regist_day',"; //작성날짜
    $sql=$sql."'$file',"; //첨부파일
    $sql=$sql."'$sta',"; //현재상태 0:내문서 1:결재대기 2:결재완료 3:결재반려
    $sql=$sql."'$app8','$app7','$app6','$app5','$app4','$app3','$app2','$app1')"; //각 직급
    $result=mysql_query($sql,$connect);
    if(!$result){
        ?>
    <script>
        alert("저장에 실패하였습니다.\n문제가 지속 될 경우 관리자에게 문의하세요.");
    </script>
<?
    } else { ?>
    <script>
        alert("저장되었습니다.");
        history.go(-1);
    </script>    
    <?
    }
}
?>