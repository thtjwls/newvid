<?	
include "../lib/session.php";
include "../db/dbconnect.php"; 

//게시판 하단 페이징 시작
$page=$_GET["page"];

if(!$page) {$page=1;}

$query="select count(*) from board where cate='board'"; //board_list 레코드 계산
$result_query=mysql_query($query,$connect);
$total_record=mysql_result($result_query,0,0);

$scale = 10; //한 페이지에 표시되는 레코드 갯수
$page_num = 5; //하나의 레코드 그룹을 표현할 페이지 갯수

$total_page	=ceil($total_record/$scale); //전체 페이지 갯수
$start_page	=((ceil($page/$page_num)-1)*$page_num)+1; //시작페이지 계산
$end_page	=$start_page+$page_num-1; //끝페이지 계산
if($end_page >= $total_page){$end_page=$total_page;}; //$end_page가 $total_page 보다 크거나 같을 때 $end_page 와 $total_page 는 같음
$next_page	= $end_page+1;
$before_page = $start_page-1;

$start=($page - 1) * $scale;
$board_num=$total_record-$scale*($page-1); //페이지 인덱스 번호
	
//페이징 끝


//검색부분 ---------------------------------------------------------------------------------------------------
$search	=$_POST["search"];
$find	=$_POST["find"];

if($search==""){
	$sql="select * from board where cate='board' order by idx desc"; 
	$result=mysql_query($sql,$connect); // $search 가 없으면 전체글 목록 보기
//} else {
	//$sql="select * from board where $find like '%$search%' order by idx desc";
	//$result=mysql_query($sql,$connect); //검색키워드 보기
//}
//검색부분 ---------------------------------------------------------------------------------------------------

?>
<!DOCTYPE html>
<html lang="ko">
<head>	
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://thtjwls.dothome.co.kr/test/css/board_list.css">
	<script>
		function idcheck(){
			var check = document.getElementById("sessionnick").value;

			if (check ==""){
				alert("로그인 후 이용 해주세요");
				window.open("http://thtjwls.dothome.co.kr/test/users/login.php","LOGIN","width=500,height=300,up=150,left=150");
			}
			else {
				location.href("http://thtjwls.dothome.co.kr/test/board/board_write.php");
			}
		}

		function searchsend(){
			opener.getElementById("searchclick").src="http://thtjwls.dothome.co.kr/test/";
		}
	</script>
</head>
<body>
	<table cellspacing="0" cellpadding="0" id="board_table">
		<caption>게시판</caption>
		<colgroup>
			<col width="5%">
			<col width="55%">
			<col width="15%">
			<col width="10%">
			<col width="15%">
		</colgroup>
		<thead>
			<tr>
				<th>번호</th>
				<th>제목</th>
				<th>닉네임</th>
				<th>조회수</th>
				<th>작성일</th>
			</tr>
		</thead>
		<tbody>
		<?
			for($i=$start; $i<$start+$scale && $i<$total_record; $i++){ //리스트 출력

			mysql_data_seek($result,$i);
			$row=mysql_fetch_array($result);

			$idx			=$row["idx"];
			$subject		=$row["subject"];
			$contents	=$row["contents"];
			$nick			=$row["nick"];
			$hit			=$row["hit"];
			$regist_day	=$row["regist_day"];

			//regust_day 날짜검사 시작.			
			$today   = date("Y-m-d");
			if(substr($row["regist_day"],0,10) == $today) {
				$regist_day=substr($row["regist_day"],11,9);
			} else {
				$regist_day=substr($row["regist_day"],0,10);
			}
			//regist_day 날짜검사 끝.
		?>
		<tr>
			<td><?=$board_num?></td>
			<td>
				<a href="http://thtjwls.dothome.co.kr/test/board/board_view.php?idx=<?=$idx?>">
					<?
						echo $subject;
						if($total_reple > 0) { echo "[".$total_reple."]"; }
					?>
				</a>
			</td>
			<td><?=$nick?></td>
			<td><?=$hit?></td>
			<td><?= $regist_day ?></td>
		</tr>
		<?
		$board_num--; //페이지 번호 증감연산
		}//리스트 출력 끝
		?>
		</tbody>
		<tfoot>
		<?
		//페이징 출력
			if($page==1){
				echo ("<tr id='paging'><td colspan=5><span>◀ 이전</span>");
			}else{
			echo ("<tr id='paging'><td colspan=5><a href='http://thtjwls.dothome.co.kr/test/board/board_list.php?page=$before_page'><span>◀ 이전</span></a>");
			}

			for($i=$start_page; $i<=$end_page; $i++){
				if($page == $i){
					echo("<span>$i</span>");
				}else{
					echo("<a href='http://thtjwls.dothome.co.kr/test/board/board_list.php?page=$i'><span>$i</span></a>");
				}
			}
			if($page < $total_page){
					echo("<a href='http://thtjwls.dothome.co.kr/test/board/board_list.php?page=$end_page'><span>다음 ▶</span></a></tr>");
			}else{
				echo("<span>다음 ▶</span></tr>");
			}
		//페이징 출력 끝
		?>
		</tfoot>
	</table>

	<form id="search_form" action="board_list.php" method="post">
		<select id="find" name="find">
			<option value="subject">제목</option>
			<option value="contents">내용</option>
			<option value="nick">닉네임</option>
		</select>
		<input type="text" id="search" name="search" value="<?=$search?>">
		<input type="image" id="searchclick" name="searchclick" value="search" onclick="searchsend(); return false;" src="http://thtjwls.dothome.co.kr/test/img/search.png" style="vertical-align: bottom;">
		<input type="hidden" id="sessionnick" name="sessionnick" value="<?=$usernick?>"> 
	</form>

	<div id="navi">
		<a href="#board_write" onclick="idcheck()" id="board_write"><img src="http://thtjwls.dothome.co.kr/test/img/write.png"></a>
		<a href="http://thtjwls.dothome.co.kr/test" target="_parent"><img src="http://thtjwls.dothome.co.kr/test/img/home.png"></a>
	</div>
</body>
</html>
