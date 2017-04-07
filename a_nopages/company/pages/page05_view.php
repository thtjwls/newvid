<? include "../lib/session.php"; ?>
<? include "../lib/header.php"; ?>
<? include "../db/dbconnect.php"; ?>
<?
$level_query = "select level from it_user where idx='$useridx'";
$level_result = mysql_query($level_query,$connect);
$level_row = mysql_fetch_array($level_result);
$userlevel = $level_row[level];    //유저 자격증명
$idx=$_GET["idx"];
$page=$_GET["page"];
$sql="select * from it_notice where idx=$idx";
$result=mysql_query($sql,$connect);
$row=mysql_fetch_array($result);
$title=$row[title];
$contents=$row[contents];
$writer=$row[writer];
$status=$row[status];
$regist_day=substr($row[regist_day],0,10);
?>
<script type="text/javascript">
    function pagings(objPageNum) {

        var pageNum = objPageNum;
        $("#bbs_list").load("bbs_list.php?page=" + pageNum);
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
        <td colspan="4" id="contents">
            <?=$contents?>
        </td>
    </tr>
</table>
<?
if($userlevel == 10 ) {
?>
<div class="modify_box">
    <input type="button" value="공고삭제" onclick="notice_delete(<?=$idx?>);" />
    <a href="page05_modify.php?idx=<?=$idx?>">
        <input type="button" value="공고수정" id="modify_btn" />
    </a>
</div>
<?
}
?>

<!--하단 게시판 호출-->
<div id="bbs_list">
    <? include "bbs_list.php"; ?>
</div>
<!--하단 게시판 호출 끝-->
<? include "../lib/footer.html"; ?>