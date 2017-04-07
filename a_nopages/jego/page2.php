<? include "header.php";?>
<? include "interface.php";?>
<!--재고 현황-->
<?

//검색변수의 묶음
$search = $_REQUEST["search"];
$date1 = $_REQUEST["date1"];
$date2 = $_REQUEST["date2"];
$page = $_REQUEST["page"];
?>

<div id="page2_load_div" class="page_load_div">        
    <div class="search">
        <form action="" method="post" id="page2_search_form">
            <input type="text" value="" id="search" name="search" placeholder="검색어를 입력하세요." />
            <span style="font-size:12px;">날짜로 검색</span>
            <input type="text" value="" id="date1" name="date1" /> ~
            <input type="text" value="" id="date2" name="date2" />
            <input type="button" value="검색" id="search_submit" onclick="page2ListSearch();" />
            <input type="button" value="전체" onclick="page2ListFull();" />            
            <a href="#" id="ExportExcelBtn" download="">
                <img src="img/excel-icon.png" height="20px;" alt="" />
            </a>
        </form>                
    </div>           
    <div id="page2_modify_form">
        <form id="page2_modify_form_data" method="post" action="">
            <h2>
                재고수정
                <span>
                    <a onclick="page2_modify_close()" style="cursor:pointer;">
                        <img src="img/x-mark-512.png" width="20px;" alt="" />
                    </a>
                </span>
            </h2>
            <div id="page2_modify_data"></div>
            <div id="page2_modify_submit_div">
                <input type="button" value="수정" onclick="page2ModiDataFunc()"/>
            </div>
        </form>
    </div>
    <table cellpadding="0" cellspacing="0" id="jego_status" class="excelFormat">
        <caption class="table_caption">
            재고현황
        </caption>
        <thead>
            <tr>
                <th>거래처</th>
                <th>품명</th>
                <th>구분번호</th>
                <th>입고일</th>
                <th>소유자</th>
                <th>수량</th>
                <th>금액(원)</th>
                <th>총금액(원)</th>
                <th>상태</th>
                <th>최종수정자</th>
                <th>최종수정일</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="page2_view_date_sheet">
            <? page2_list_view() ?>
        </tbody>
    </table>
    <?
    pagingView();
        ?>
</div>


<?


function page2_list_view() {
    //mysql data 출력 뷰
    global $connect;
    global $search;
    global $date1;
    global $date2;
    global $page;

    $scale = 10;
    $pageNum = 10;

    if($page == "" || !$page) $page = 1;

    //총 필요한 블럭
    /* 검색 레코드 분류 */
    if(($search == "" || !$search) && ($date1 == "" && $date2) || (!$search && !$date1 && !$date2)) {
        $totalCnt_Q = "select count(idx) from je_jego";
    } else if($search != "" && ($date1 == "" || $date2 == "")) {
        $totalCnt_Q = "select count(idx) from je_jego where je_com like '%$search%'
            or je_name like '%$search%'
            or je_serial like '%$search%'
            or je_ibgo like '%$search%'
            or je_sou like '%$search%'
            or je_acmember like '%$search%'
            or je_regidate like '%$search%'
            or je_number like '%$search%'
            or je_cost like '%$search%'
            or je_sta like '%$search%'
            ";
    } else if (($date1 != "" && $date2 != "") && (!$search || $search == "")) {
        $totalCnt_Q = "select count(idx) from je_jego where date_format(je_regidate,'%Y-%m-%d') >= '$date1'
            and date_format(je_regidate,'%Y-%m-%d') <= '$date2'
            ";
    } else if ($search != "" && $date1 != "" && $date2 != "") {
        $totalCnt_Q = "select count(idx) from je_jego where je_com like '%$search%'
            or je_name like '%$search%'
            or je_serial like '%$search%'
            or je_ibgo like '%$search%'
            or je_sou like '%$search%'
            or je_acmember like '%$search%'
            or je_regidate like '%$search%'
            or je_number like '%$search%'
            or je_cost like '%$search%'
            or je_sta like '%$search%'
            and date_format(je_regidate,'%Y-%m-%d') >= '$date1'
            and date_format(je_regidate,'%Y-%m-%d') <= '$date2'
            ";
    }
    /* 검색 레코드 분류  */


    $totalCnt_R = mysql_query($totalCnt_Q,$connect);

    $totalCnt = mysql_result($totalCnt_R,0,0);
    $totalPageNum = ceil($totalCnt/$scale); //전체 필요한 페이지 갯수

    global $startPage,$endPage,$nextPage,$prevPage;

    $startPage = (ceil($page/$pageNum)-1)*$pageNum+1;
    $endPage = $startPage+$pageNum-1;
    if($endPage >= $totalPageNum) $endPage = $totalPageNum;
    $nextPage = $endPage+1;
    
    if($nextPage > $totalPageNum) {
        $nextPage = $page;
    }

    $prevPage = $startPage-1;
    if($page <= 1) {
        $prevPage = $page;
    }
    $limitSet_prev = ($page*$scale) - $scale;

    $limitSet = "limit $limitSet_prev, $scale";



    //검색 모듈
    if(($search == "" || !$search) && ($date1 == "" && $date2) || (!$search && !$date1 && !$date2)) { //search 창 활성
        $page2_view_Query = "select * from je_jego order by idx desc $limitSet";
    } else if($search != "" && ($date1 == "" || $date2 == "")) {
        $page2_view_Query = "select * from je_jego where je_com like '%$search%'
            or je_name like '%$search%'
            or je_serial like '%$search%'
            or je_ibgo like '%$search%'
            or je_sou like '%$search%'
            or je_acmember like '%$search%'
            or je_regidate like '%$search%'
            or je_number like '%$search%'
            or je_cost like '%$search%'
            or je_sta like '%$search%'
            order by idx desc $limitSet";
    } else if (($date1 != "" && $date2 != "") && (!$search || $search == "")) {
        $page2_view_Query = "select * from je_jego where date_format(je_regidate,'%Y-%m-%d') >= '$date1'
            and date_format(je_regidate,'%Y-%m-%d') <= '$date2'
            order by je_regidate desc $limitSet";
    } else if ($search != "" && $date1 != "" && $date2 != "") {
        $page2_view_Query = "select * from je_jego where je_com like '%$search%'
            or je_name like '%$search%'
            or je_serial like '%$search%'
            or je_ibgo like '%$search%'
            or je_sou like '%$search%'
            or je_acmember like '%$search%'
            or je_regidate like '%$search%'
            or je_number like '%$search%'
            or je_cost like '%$search%'
            or je_sta like '%$search%'
            and date_format(je_regidate,'%Y-%m-%d') >= '$date1'
            and date_format(je_regidate,'%Y-%m-%d') <= '$date2'
            order by idx desc $limitSet";
    }

    $page2_view_Result = mysql_query($page2_view_Query,$connect);

    while($page2row = mysql_fetch_array($page2_view_Result)) {
    $idx = $page2row[idx];
    $je_com = $page2row[je_com];
    $je_name = $page2row[je_name];
    $je_serial = $page2row[je_serial];
    $je_ibgo = $page2row[je_ibgo];
    $je_sou = $page2row[je_sou];
    $je_number = $page2row[je_number];
    $je_cost = $page2row[je_cost];
    $je_cost_total = $je_number * $je_cost;
    $je_sta = $page2row[je_sta];

    $je_cost_format = number_format($je_cost);
    $je_cost_total_format = number_format($je_cost_total);

    if($je_sta == 1) {
        $je_sta = "양호";
    } else if ($je_sta == 2) {
        $je_sta = "불량";
    } else if ($je_sta == 3) {
        $je_sta = "파기";
    }



    $je_acmember = $page2row[je_acmember];
    $je_regidate = substr($page2row[je_regidate],0,16);

?>
<!-- HTML Wirte-->
<tr>
    <td>
        <?=$je_com?>
    </td>
    <td>
        <?=$je_name?>
    </td>
    <td>
        <?=$je_serial?>
    </td>
    <td>
        <?=$je_ibgo?>
    </td>
    <td>
        <?=$je_sou?>
    </td>
    <td>
        <?=$je_number?>
    </td>
    <td>
        <?=$je_cost_format?>
    </td>
    <td>
        <?=$je_cost_total_format?>
    </td>
    <td>
        <?=$je_sta?>
    </td>
    <td>
        <?=$je_acmember?>
    </td>
    <td>
        <?=$je_regidate?>
    </td>
    <td>
        <a href="#" onclick="page2_list_del(<?=$idx?>);">
            <img src="img/x-mark-512.png" alt="삭제" title="삭제" width="20px;"/>
        </a>
        <a href="#" onclick="page2_list_modify(<?=$idx?>);">
            <img src="img/Pencil-icon1.png" alt="수정" title="수정" width="20px"/>
        </a>
    </td>
</tr>
<!-- HTML Write End-->
<?

    } //function While end

} //function page2_list_view() end

function pagingView() {
    //paging View
    global $startPage;
    global $endPage;
    global $nextPage,$prevPage,$page,$search,$date1,$date2;
    
    $searchDataUrl = "&search=".$search."&date1=".$date1."&date2=".$date2;

    $str = "";
    $str .="<div class='pagingView'>";
    $str .="<ul>";
    $str .="<li class='pagingArrow'><a href='?page=$prevPage'><img src='img/arrow-L.png' alt='이전'></a></li>";
    for($i = $startPage; $i < $endPage+1; $i++){
        if($i == $page) {
            $str .="<li class='activePaging'><a>".$i."</a></li>";
            continue;
        }
        $str .="<li><a href='?page=".$i.$searchDataUrl."'>".$i."</a></li>";
    }
    $str .="<li class='pagingArrow'><a href='?page=".$nextPage.$searchDataUrl."'><img src='img/arrow-R.png' alt='다음'></a></li>";
    $str .="</ul>";
    $str .="</div>";
    echo "$str";
    //paging View End
}
?>
<? include "footer.php";?>