<? include "../lib/session.php"; ?>
<? include "../lib/header.php"; ?>
<? include "../db/dbconnect.php"; ?>
<?
$level_query = "select level from it_user where idx='$useridx'";
$level_result = mysql_query($level_query,$connect);
$level_row = mysql_fetch_array($level_result);
$userlevel = $level_row[level];    //유저 자격증명 

if($userlevel > 3 ) {
    $view_path = "modify";
} else {
    $view_path = "view";
}
?>
<div class="page05sec_wrap">
    <!--<img src="../img/employe.png" alt="" />-->
    <div class="em_wrap">
        <h3>
            채용공고
        </h3>
        <p>
            인천일보와 함께 꿈을<br />
            <b>
                키워나갈
                <span>역량있는 인재</span>를 모집합니다.
            </b>
        </p>
    </div>
    <?
        $cnt_query="select count(idx) from it_notice where status='1' or status='3'";
        $cnt_result=mysql_query($cnt_query,$connect);
        $cnt = mysql_result($cnt_result,0,0);
    ?>
    <div class="cnt_text">
        <? if($cnt > 0){ ?>
        <p>진행중인 채용공고가 <b><?=$cnt?></b>개 있습니다.</p>
        <? } else { ?>
        <p>진행중인 채용공고가 없습니다.</p>
        <? }?>
    </div>
    <table cellpadding="10" cellspacing="0" class="page05_table">
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
                $page=$_GET["page"];
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
                    등록된 채용공고가 없습니다.
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
                        $regist_day = substr($row[regist_day],0,10);
                        $view = $row[view];
                        $status = $row[status];
                        if($status == "1") {
                            $status = "<p style='color:#e54643;'>모집중</p>";
                        } else if ($status == "2") {
                            $status = "<p style='color:#949495;'>채용마감</p>";
                        } else if ($status == "3") {
                            $status = "<p style='color:#3e3a39;'>상시채용</p>";
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

            <?
  $board_num--;
                    }
                }
            ?>
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
                    echo("<a href='?page=$i'><span id='now_page'>$i</span></a>");
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
</div>

<? include "../lib/footer.html"; ?>