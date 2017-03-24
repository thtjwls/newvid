<? include "../lib/session.php"; ?>
<?
include "../db/dbconnect.php";

$page=$_GET["page"];
$level_query = "select level from it_user where idx='$useridx'";
$level_result = mysql_query($level_query,$connect);
$level_row = mysql_fetch_array($level_result);
$userlevel = $level_row[level];    //유저 자격증명 
?>

<table cellpadding="10" cellspacing="0" class="page05_table page05-view-inner-talbe">
            <colgroup>
                <col width="10%"></col>
                <col width="50%"></col>
                <col width="10%"></col>
                <col width="20%"></col>
                <col width="20%"></col>
            </colgroup>
            <thead>
                <tr>
                    <th>
                        공고번호
                    </th>
                    <th>
                        제목
                    </th>
                    <th>
                        작성자
                    </th>
                    <th>
                        작성일
                    </th>
                    <th>
                        채용상태
                    </th>
                </tr>
            </thead>
            <tbody>
                <?
                if(!$page)
                {
					$page=1;
                }

                $query="select count(idx) from it_notice"; //board_list 레코드 계산
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

                if($total_record == 0){
                ?>
                <tr>
                    <td colspan="5">
                        현재 진행중인 채용공고가 없습니다.
                    </td>
                </tr>
            
            <?
                } else {
                    $sql = "select * from it_notice order by idx desc";
                    $result = mysql_query($sql,$connect);
                    
                    for($i=$start; $i<$start+$scale && $i<$total_record; $i++){
                        mysql_data_seek($result,$i);
                        $row=mysql_fetch_array($result);

                        $idx = $row[idx];
                        $title = $row[title];
                        $writer = $row[writer];
                        $regist_day = $row[regist_day];
                        $view = $row[view];
                        $status = $row[status];
                        if($status == "1") {
                            $status = "<p style='color:#204fea;'>모집중</p>";
                        } else if ($status == "2") {
                            $status = "<p style='color:#d13232;'>채용마감</p>";
                        } else if ($status == "3") {
                            $status = "<p style='color:#45f348;'>상시채용</p>";
                        }
            ?>
                <tr>
                    <td>
                        <?=$board_num?>
                    </td>
                    <td id="page05_title">
                        <a href="../pages/page05_view.php?idx=<?=$idx?>"><?=$title?></a>                        
                    </td>
                    <td>
                        <?=$writer?>
                    </td>
                    <td>
                        <?=$regist_day?>
                    </td>
                    <td>
                        <?=$status?>
                    </td>
                </tr>
                
            <?  $board_num--;
                    }
                } ?>
            </tbody>
            <?
            //페이징 출력
            if($page==1){
                echo ("<tr><td colspan=5 id='paging'><span class='paging_num'>◀ 이전</span>");
            }else{
                echo ("<tr><td colspan=5 id='paging'><a href='?page=$before_page'><span class='paging_num'>◀ 이전</span></a>");
            }

            for($i=$start_page; $i<=$end_page; $i++){
                if($page == $i){
                    echo("<span id='now_page'>$i</span>");
                }else{
                    echo("<a href='#home' onclick=pagings('$i')><span id='now_page'>$i</span></a>");
                }
            }
            if($page < $total_page){
				echo("<a href='?page=$end_page'><span class='paging_num'>다음 ▶</span></a></tr>");
            }else{
                echo("<span class='paging_num'>다음 ▶</span></tr>");
            }
            //페이징 출력 끝
            ?>
        </table>
<div class="page05-nevi-btn">
        
<?
if($userlevel > 2 ) {
?>
    <input type="button" value="공고등록" id="write_btn" />       
    <?
}
    ?>
    <input type="button" value="목록" onclick="location.href='page05_sec2.php';" /><br />     
</div>