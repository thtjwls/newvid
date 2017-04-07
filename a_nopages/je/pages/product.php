<?
include_once ("lib/dbconnect.php");

$page = $_REQUEST["page"];
$scale =$_REQUEST["scale"];
$search = $_REQUEST["search"];
$pageNum = 10;
if($page == "" || !$page) $page = 1;
if($scale == "" || !$scale) $scale = 10;
//if($search == "" || !$search) unset($search);
if($search == "" || !$search) {
    $cntQ = "select count(*) from j_table";
} else {
    $cntQ = "select count(*) from j_table where j_name like '%$search%' or ";
    $cntQ .= "j_regidate like '%$search%' or ";
    $cntQ .= "j_code like '%$search%' or ";
    $cntQ .= "j_coat like '%$search%' or ";
    $cntQ .= "j_etc like '%$search%' or ";
    $cntQ .= "j_cate like '%$search%' ";
}

$cntR = mysql_query($cntQ,$connect);
$cnt = mysql_result($cntR,0,0);

//paging Start
$totalPageNum = ceil($cnt/$pageNum);
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
$limitSetPrev = ($page*$scale) - $scale;
//paging End

    if($search == "" || !$search) {
        $dataQ = "select * from j_table order by idx desc limit $limitSetPrev , $scale";
    } else {
        $dataQ = "select * from j_table where j_name like '%$search%' or ";
        $dataQ .= "j_regidate like '%$search%' or ";
        $dataQ .= "j_code like '%$search%' or ";
        $dataQ .= "j_coat like '%$search%' or ";
        $dataQ .= "j_etc like '%$search%' or ";
        $dataQ .= "j_cate like '%$search%' ";
        $dataQ .= "order by idx desc limit $limitSetPrev , $scale";
    }


$dataR = mysql_query($dataQ,$connect);
?>

<div id="cheet">
    <table id="cheetTable" cellpadding="0" cellspacing="0">
        <caption>
            PRODUCT
            <div class="searchDiv">
                <input type="search" value="" placeholder="검색어를 입력 하세요." id="searchData" name="searchData" />
                <input type="button" value="검색" onclick="search();" />
                <input type="button" value="전체보기" onclick="searchEmpty();" />
                <a href="#" id="ExportExcelBtn" download="">
                    <img src="img/excel-icon.png" height="20px;" alt="" />
                </a>
            </div>
<p class="productCntSupport">
    총 <?=$cnt?> 건
</p>

        </caption>        
        <colgroup>
            <col width="49px;" />
            <col width="196px;" />
            <col width="147px;" />
            <col width="147px;" />
            <col width="98px;" />
            <col width="196px;" />
            <col width="59px;"/>
            <col width="44px;"/>
            <col width="44px;" />
        </colgroup>
        <tr>
            <th>번호</th>
            <th>품명</th>
            <th>입고일</th>
            <th>분류코드</th>
            <th>금액</th>
            <th class="textSlice">비고</th>
            <th>분류</th>
            <th colspan="2"></th>
        </tr>
        <?
            if($cnt == 0 ) {
        ?>
        <tr>
            <td colspan="9" height="50px;">데이터가 없습니다.</td>
        </tr>
        <?
            } else {
                while($row=mysql_fetch_assoc($dataR)) {
                    $idx = $row[idx];
                    $j_name = $row[j_name];
                    $j_regidate = $row[j_regidate];
                    $j_code = $row[j_code];
                    $j_coat = $row[j_coat];
                    $j_etc = $row[j_etc];
                    $j_cate = $row[j_cate];
                    $str = "";
                    $str .="<tr>";
                    $str .="<td>".$idx."</td>";
                    $str .="<td>".$j_name."</td>";
                    $str .="<td>".$j_regidate."</td>";
                    $str .="<td title='$j_code'>".$j_code."</td>";
                    $str .="<td>".$j_coat." 원</td>";
                    $str .="<td title='$j_etc' class='textSlice'>".$j_etc."</td>";
                    $str .="<td>".$j_cate."</td>";
                    $str .="<td><a href='javascript:productModify($idx);'><img src='img/modify-img.png' alt='modimark' title='수정' class='modi-mark-img'></a></td>";
                    $str .="<td><a href='javascript:productRemove($idx);'><img src='img/x-mark.png' alt='xmark' title='삭제' class='x-mark-img'></a></td>";
                    $str .="</tr>";
                    echo $str;
                }
            }
        ?>
    </table>
    <div class="writeBtn">
        <?
        if($useridx == "" || !$useridx) {
            ?>

            <?
        } else {
            ?>
        <button onclick="productInsertFrom();">작성하기</button>
            <?
        }
        ?>        
    </div>
    <div id="pagingNum">
        <ul>
            <?
            for ($i = $startPage; $i <= $endPage; $i++) {
                $strp = "<li><a href='?page=$i&search=$search'>".$i."</a></li>";
                echo $strp;                
            }            
            ?>            
        </ul>
    </div>    
</div>
<div id="writeFormDiv">
    <form method="post" id="writeForm">
        <table cellpadding="0" cellspacing="0">
            <caption>
                <span id="captionTitle"></span>
                <div class="writeFormTitle">
                    <a href="javascript:productFromDel();">닫기</a>
                </div>
            </caption>
            <tr>
                <td>
                    <input type="text" value="" id="j_name" name="name" placeholder="품명" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" value="" id="j_date" name="registDay" placeholder="입고일" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" value="" id="j_code" name="code" placeholder="분류코드" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" value="" id="j_coat" name="coat" placeholder="금액" />
                </td>
            </tr>
            <tr>
                <td>
                    <textarea name="etc" id="j_etc" cols="65" rows="5" placeholder="비고"></textarea>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">
                    <label class="writeFormCheckLabel">
                        <input type="radio" value="비품" name="cate" checked/>비품
                    </label>
                    <label class="writeFormCheckLabel">
                        <input type="radio" value="소모품" name="cate" />소모품
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="button" id="wirteFormFootHend" value="작성완료" onclick="productWriteData();" />
                </td>
            </tr>
        </table>
        <input type="hidden" value="" name="dataIdx" id="writeFormIdx" />
    </form>
</div>
<div id="productHiddenData">

</div>