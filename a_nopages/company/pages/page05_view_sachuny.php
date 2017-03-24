<? include "../lib/header.html"; ?>
<? include "../db/dbconnect.php"; ?>
    <?
    $idx=$_GET["idx"];
    $page=$_GET["page"];

    $sql="select * from it_notice where idx=$idx";
    $result=mysql_query($sql,$connect);
    
    $row=mysql_fetch_array($result);
    $title=$row[title];
    $contents=$row[contents];
    $writer=$row[writer];
    $status=$row[status];
    $regist_day=$row[regist_day];
    ?>
<script type="text/javascript">
	function pagings(objPageNum){
		
		var pageNum = objPageNum;
		$("#bbs_list").load("bbs_list.php?page="+pageNum);
	}
</script>


<div class="page05-view-title-h3">
    <h3>
        채용공고
    </h3>
</div>
<table cellpadding="2" cellspacing="0" id="page05_view_table" class="page05_view_table">
    <tr>
        <th height="30px;" width="10%">
            제목
        </th>
        <td width="70%">
            <?=$title?>
        </td>
        <th width="10%">
            작성자
        </th>
        <td width="10%">
            <?=$writer?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <?=$contents?>
        </td>
    </tr>    
</table>

<!--하단 게시판 호출-->
<div id="bbs_list">
	<? include "bbs_list.php"; ?>
</div>
<!--하단 게시판 호출 끝-->
<? include "../lib/footer.html"; ?>

