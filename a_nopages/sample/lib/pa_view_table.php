<? include "db/dbconnect.php"; ?>
<? include "session.php"; ?>
<?

?>

<div class="view_table">
    <table cellpadding="0" cellspacing="0">
        <colgroup>
            <col width="40px" />
            <col width="40px" />
            <col width="350px" />
            <col width="200px" />
            <col width="150px" />
            <col width="150px" />
            <col width="150px" />
            <col width="200px" />
            <col width="150px" />
            <col width="50px" />
        </colgroup>
        <thead>
        <th>
            번호
        </th>
        <th>
            선택
        </th>
        <th>
            문서제목
        </th>
        <th>
            공개옵션및결재선
        </th>
        <th>
            부서명
        </th>
        <th>
            작성자
        </th>
        <th>
            입력날짜
        </th>
        <th>
            첨부
        </th>
        <th>
            현황
        </th>
        <th>
            인쇄
        </th>
        </thead>
        <tbody>
<?

$page	=$_GET["page"]; //페이지의 종류		


$sql="select * from pa_paper where pa_writer='$username' order by idx desc";
$result=mysql_query($sql,$connect);

$scale = 10; //표시될 레코드의 갯수
$page_num = 5; //하나의 레코드 그룹을 표현할 페이지 갯수
$query="select count(idx) from pa_paper where pa_writer='$username'";

$query_result=mysql_query($query,$connect);

$total_record=mysql_result($query_result,0,0); //전체 레코드 수

if(!$page_record)
{
	$page_record=1; //현재페이지 넘버
}
$total_page	=ceil($total_record/$scale); //전체 페이지 갯수
$start_page	=((ceil($page_record/$page_num)-1)*$page_num)+1; //시작페이지 계산
$end_page	=$start_page+$page_num-1; //끝페이지 계산
if($end_page >= $total_page){$end_page=$total_page;}; //$end_page가 $total_page 보다 크거나 같을 때 $end_page 와 $total_page 는 같음
$next_page	= $end_page+1;
$before_page = $start_page-1;
$start=($page_record - 1) * $scale;

$board_num=$total_record-$scale*($page_record-1); //페이지 인덱스 번호



	
for($i=$start; $i<$start+$scale && $i<$total_record; $i++){
	
	mysql_data_seek($result,$i);
	$row=mysql_fetch_array($result);
	$idx=$row[idx];	
	$pa_title=$row[pa_title];
	$pa_public=$row[pa_public];		
	$pa_writer=$row[pa_writer];
	$pa_buse=$row[pa_buse];
	$pa_content=$row[pa_content];
	$pa_file=$row[pa_file];
	$pa_status=$row[pa_status];
	switch($pa_status){
		case 0 : $pa_status="일반문서"; break;
		case 1 : $pa_status="결재대기"; break;
		case 2 : $pa_status="결재완료"; break;
		case 3 : $pa_status="결재반려"; break;		
	}	
	
	//현재 날짜 와 기록 날짜 비교
	if(substr($row[regist_day],0,10) == substr(date("Y-m-d"),0,10)){
		$regist_day = substr($row[regist_day],10,6);
	} else {
		$regist_day = substr($row[regist_day],0,10);
	} 
	
	$app1=$row[app1];
	$app2=$row[app2];
	$app3=$row[app3];
	$app4=$row[app4];
	$app5=$row[app5];
	$app6=$row[app6];	
	$app7=$row[app7];
	$app8=$row[app8];
	
	if($app1 == 2 || $app2 == 2 || $app3 == 2 || $app4 == 2 || $app5 == 2 || $app6 == 2 || $app7 == 2 || $app8 == 2){ $pa_status = "결제진행중"; }	
	
		
	if($app1 != 0 || $app2 != 0 || $app3 != 0 ||  $app4 != 0 || $app5 != 0 || $app6 != 0 || $app7 != 0 || $app8 != 0) {
		$pa_public = "";
	} else if($pa_public == 0) {
		$pa_public = "비공개문서";
	}
	
	if($app1 != 0){ $pa_public = $pa_public." 사원 "; }
	if($app2 != 0){ $pa_public = $pa_public." 대리 "; }
	if($app3 != 0){ $pa_public = $pa_public." 과장 "; }
	if($app4 != 0){ $pa_public = $pa_public." 차장 "; }
	if($app5 != 0){ $pa_public = $pa_public." 부장 "; }
	if($app6 != 0){ $pa_public = $pa_public." 국장 "; }
	if($app7 != 0){ $pa_public = $pa_public." 본부장 "; }
	if($app8 != 0){ $pa_public = $pa_public." 대표이사 "; }
		
	
?>
<tr>
<td>
<?=$board_num?>
</td>
<td>
<input type="checkbox" />
</td>		
<td>
<a href="?page=page1&mod=paper_view&idx=<?=$idx?>"><?=$pa_title?></a>
		</td>
		<td>
			<?=$pa_public?>
		</td>
		<td>
			<?=$pa_buse?>
		</td>
		<td>
			<?=$pa_writer?>
		</td>
		<td>
			<?=$regist_day?>
		</td>
		<td>
			<?=$pa_file?>
		</td>
		<td>
			<?=$pa_status?>				
		</td>
		<td>
			<button>인쇄</button>
		</td>
	</tr>
<?	
$board_num--;
}
?>
        </tbody>
    </table>
</div>
