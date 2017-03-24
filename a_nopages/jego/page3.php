<? include "header.php";?>
<? include "interface.php";?>
<div id="page3_BBS_div" class="page_load_div">
    <div class="search">
        <form action="" method="post" id="page2_search_form" autocomplete="off">
            <select name="scale" id="scaleSize" style="padding:5px 12px;">
                <option value="10" onclick="page3Scale(10);">10개</option>
                <option value="30" onclick="page3Scale(30);">30개</option>
                <option value="50" onclick="page3Scale(50);">50개</option>
                <option value="all" onclick="page3Scale(all)">전체</option>
            </select>          
            <input type="text" value="" id="search" name="search" placeholder="검색어를 입력하세요." />            
            <input type="button" value="검색" id="search_submit" onclick="page3ListSearch();" />
            <input type="button" value="전체" onclick="page3ListFull();" />
            <a href="#" id="ExportExcelBtnPage3" class="ExportExcelBtnClass" download="">
                <img src="img/excel-icon.png" height="20px;" alt="" />
            </a>
        </form>
    </div>
    <table id="page3_BBS_Table" class="tableFormat excelFormat" cellpadding="0" cellspacing="0">
        <caption class="table_caption">
            기안현황
        </caption>
        <colgroup>
            <col width="16%;" />
            <col width="14.0%;" />
            <col width="11.0%;" />
            <col width="11.0%;" />
            <col width="11.0%;" />
            <col width="11.0%;" />
            <col width="11.0%;" />
            <col width="8.0%;" />
            <col width="5%">
        </colgroup>
        <?
        /* 기안테이블 필드
         * idx(고유iD)
         * title(제목)
         * contents(내용)
         * regidate(작성일)
         * regimember(기안책임자)
         * reqBuse(요청부서)
         * reqCoat (요청금액)
         * sta(상태) 0 = 제출(대기) , 1 = 완료, 2 = 반려
         * fanalDate (최종수정일)
         * fanalMember (최종수정자)
         */
        $page = $_REQUEST["page"];
        $search = $_REQUEST["search"];
        $scale = $_REQUEST["scale"];
        ?>
        <tr>
            <th>
                제목
            </th>
            <th>
                작성일
            </th>
            <th>
                기안책임자
            </th>
            <th>
                요청부서
            </th>
            <th>
                요청금액
            </th>            
            <th>
                최종수정일
            </th>
            <th>
                최종수정자
            </th>
            <th>
                상태
            </th>
            <th>

            </th>
        </tr>        
        <?
            /* 페이징 로직 */

            $pageNum = 10; //한페이지 블럭
            if( $page=="" || !$page ) $page = 1;
            if ( $scale == "" || !$scale ) $scale = 10; //페이지 리스트 갯수

        /* 전체 레코드 그룹 갯수 추출 */
            if($search == "" || !$search) {
                $totalCnt_Q = "select count(idx) from je_gian";
            } else {
                $totalCnt_Q = "select count(idx) from je_gian where title like '%$search%'";
                $totalCnt_Q .= " or content like '%$search%'";
                $totalCnt_Q .= " or regidate like '%$search%'";
                $totalCnt_Q .= " or regimember like '&$search%'";
                $totalCnt_Q .= " or reqBuse like '&$search%'";
                $totalCnt_Q .= " or reqCoat like '&$search%'";
                $totalCnt_Q .= " or sta like '&$search%'";
                $totalCnt_Q .= " or finalDate like '&$search%'";
                $totalCnt_Q .= " or finalMember like '&$search%'";
            }

            $totalCnt_R = mysql_query($totalCnt_Q,$connect);
            $totalCnt = mysql_result($totalCnt_R,0,0);

            if($scale == "all") $scale = $totalCnt;

            $totalPageNum = ceil($totalCnt/$pageNum);
            /* 전체 레코드 그룹 갯수 추출 끝 */

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
            $limitSetPrev = ($page*$scale) - $scale + 1;
            /* 페이징 로직 끝 */


            /* 데이터 추출 쿼리 */

            if($search == "" || !$search) {
                $gian_Q = "select * from je_gian order by idx desc limit ".$limitSetPrev.", ".$scale;
            } else {
                $gian_Q = "select * from je_gian where ";
                $gian_Q .= "title like '%$search%'";
                $gian_Q .= "or content like '%$search%'";
                $gian_Q .= "or regidate like '%$search%'";
                $gian_Q .= "or regimember like '%$search%'";
                $gian_Q .= "or reqBuse like '%$search%'";
                $gian_Q .= "or reqCoat like '%$search%'";
                $gian_Q .= "or sta like '%$search%'";
                $gian_Q .= "or finalDate like '%$search%'";
                $gian_Q .= "or finalMember like '%$search%'";
                $gian_Q .=" order by idx desc limit ".$limitSetPrev.", ".$scale;
            }

            //echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$gian_Q;

            /* 데이터 추출 쿼리 끝 */

            $gian_R = mysql_query($gian_Q,$connect);
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$gian_Q;

            while($gian = mysql_fetch_array($gian_R)) {
                $idx = $gian[idx];
                $title = $gian[title];
                $content = $gian[content];
                $regidate = $gian[regidate];
                $regimember = $gian[regimember];
                $reqBuse = $gian[reqBuse];
                $reqCoat = $gian[reqCoat];
                $sta = $gian[sta];
                $finalDate = $gian[finalDate];
                $finalMember = $gian[finalMember];

               switch ($sta){
                   case 1 :
                       $sta = "제출";
                       break;
                   case 2 :
                       $sta = "결제";
                       break;
                   case 3 :
                       $sta = "반려";
                       break;
               }

                //view
                $str = "";
                $str .= "<tr>";
                $str .= "<td>".$title."</td>";
                $str .= "<td>".$regidate."</td>";
                $str .= "<td>".$regimember."</td>";
                $str .= "<td>".$reqBuse."</td>";
                $str .= "<td>".$reqCoat."</td>";
                $str .= "<td>".$finalDate."</td>";
                $str .= "<td>".$finalMember."</td>";
                $str .= "<td>".$sta."</td>";
                $str .="<td><a onclick='page3Del($idx);'>삭제</a></td>";
                $str .= "</tr>";

                echo $str;
            }
        ?>        
    </table>
    
    <? //paging View
    $searchDataUrl = "&search=".$search;

    $string = "";
    $string .="<div class='pagingView'>";
    $string .="<ul>";
    $string .="<li class='pagingArrow'><a href='?page=$prevPage&scale=$scale'><img src='img/arrow-L.png' alt='이전'></a></li>";
    
    for($i = $startPage; $i < $endPage+1; $i++){
        if($i == $page) {
            $string .="<li class='activePaging'><a>".$i."</a></li>";
            continue;
        }
        $string .="<li><a href='?page=".$i.$searchDataUrl."&scale=$scale'>".$i."</a></li>";
    }
    $string .="<li class='pagingArrow'><a href='?page=".$nextPage.$searchDataUrl."&scale=$scale'><img src='img/arrow-R.png' alt='다음'></a></li>";
    $string .="</ul>";
    $string .="</div>";
    echo "$string"; //paging View End    
    ?>    
</div>
<? include "footer.php";?>