<?
include "lib/dbconnect.php";

function bbs() {
    echo "<meta charset='utf-8'>";
    global $connect;

    $find = $_GET["find"];
    $search = $_GET["search"];
    $page = $_GET["page"];
    $tabs = $_REQUEST["tabs"];

    if(!$page) {
        $page = 1;
    }

    $scale = 10;
    $pageNum = 5;


    if($search == "" || !$search) { //검색없음
        $sql = "select idx,cate,title,writer,view,regist_day from pp_bbs where cate='board' order by idx desc";
        $totalQuery = "select count(idx) from pp_bbs where cate='board'";        
    } else { //검색있음
        //$sql = "select idx,cate,title,writer,view,regist_day from pp_bbs where cate='board' order by idx desc";
        //$totalQuery = "select count(idx) from pp_bbs";
    }
        $result = mysql_query($sql,$connect);
        $totalResult = mysql_query($totalQuery,$connect);
        $totalRecord = mysql_result($totalResult,0,0);

        $totalPage = ceil($totalRecord/$scale); //전체 페이지
        $startPage = ((ceil($page/$pageNum)-1)*$pageNum)+1;
        $endPage   = $startPage+$pageNum-1; //끝페이지
        if($endPage >= $totalPage){$endPage=$totalPage;};
        $nextPage = $endPage + 1;
        $beforePage = $startPage -1;
?>
<table cellpadding="0" cellspacing="0" class="pp_bbs" border="0">
    <caption>
        자유게시판
    </caption>
    <colgroup>
        <col width="10%" />
        <col width="50%" />
        <col width="10%" />
        <col width="10%" />
        <col width="10%" />
    </colgroup>
    <thead>
        <tr>
            <th>
                번호
            </th>
            <th class="pp_title pp_th_title">
                제목
            </th>
            <th>
                작성자
            </th>
            <th>
                작성일
            </th>
            <th>
                조회수
            </th>
        </tr>
    </thead>
    <tbody id="bbsInnerViewListe">
        <?
    $start = ($page - 1) * $scale;
    $board_num=$totalRecord-$scale*($page-1); //페이지 인덱스 번호


        for($i=$start; $i<$start+$scale && $i<$totalRecord; $i++) {

            mysql_data_seek($result,$i);
            $row=mysql_fetch_array($result);
            $idx = $row[idx];
            $cate = $row[cate];
            $title = $row[title];
            $writer = $row[writer];
            $view = $row[view];
            $today = date("Y-m-d");
            $regist_day = $row[regist_day];
            if(substr($regist_day,0,10) == $today){
                $regist_day = substr($regist_day,10,6);
            } else {
                $regist_day = substr($regist_day,0,10);
            }
            $repleTotalQuery = "select count(idx) from pp_bbs where cate = 'comment' and comment_idx='$idx'";
            $repleTotalResult = mysql_query($repleTotalQuery,$connect);
            $repleCnt = mysql_result($repleTotalResult,0,0); //리플 갯수 획득
        ?>
        <tr>
            <td>
                <?=$board_num?>
            </td>
            <td class="pp_title pp_td_title">
                <a href="?tabs=bbsView&idx=<?=$idx?>">
                    <?=$title?> &nbsp;[<?=$repleCnt?>]
                </a>
            </td>
            <td>
                <?=$writer?>
            </td>
            <td>
                <?=$regist_day?>
            </td>
            <td>
                <?=$view?>
            </td>
        </tr>
        <?
            $board_num--;
        }
        ?>
        <tr class="pp_bbs_paging_tr">
            <td colspan="5">
                <?
                if($page != 1) {
                ?>
                <a href="?tabs=bbs&page=<?=$beforePage?>">◁ 이전</a>
                <?
                }
                for($i=$startPage; $i <=$endPage; $i++) {
                    if($page == $i) {
                ?>
                <?=$i?>
                <?
                    }else {
                ?>
                <a href="?tabs=bbs&page=<?=$i?>">
                    <?=$i?>
                </a>
                <?
                    }
                }
                if($page < $totalPage) {
                ?>
                <a href="?tabs=bbs&page=<?=$endPage?>">다음 ▷</a>
                <?
                }
                ?>
            </td>
        </tr>
    </tbody>
</table>
    <?
}//bbs function end
?>

<div class="bbs_board" id="bbs_board">
    <? bbs(); ?>
</div>