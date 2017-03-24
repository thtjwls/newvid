<?
				$search	=$_POST["search"];
				$find	=$_POST["find"];

				if($sboard=="users"){
					$query="select count(*) from users";
				}else if($sboard=="board"){
					$query="select count(*) form board where cate='board'";
				}

				if($search==""){
					$sql="select * from board where cate='board' order by idx desc";
					$result=mysql_query($sql,$connect); // $search 가 없으면 전체글 목록 보기

				if(!$page)
				{
					$page=1;
				}

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
				} else {
					$sql="select * from board where $find like '%$search%' and cate='board' order by idx desc";
					$result=mysql_query($sql,$connect); //검색키워드 보기

					if(!$page)
					{
						$page=1;
					}
					//검색 레코드가 있을경우 페이징 재정의
					$query="select count(*) from board where $find like '%$search%' and cate='board'"; //board_list 레코드 계산
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
					//페이징 재정의 끝
				}
				?>

			<?

			$start=($page - 1) * $scale;
			$board_num=$total_record-$scale*($page-1); //페이지 인덱스 번호


			for($i=$start; $i<$start+$scale && $i<$total_record; $i++){ //리스트 출력

			mysql_data_seek($result,$i);

			?>
