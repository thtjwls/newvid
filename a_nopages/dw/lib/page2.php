<? include "page_2_inmenu.php"; ?>
<div class="in_contents_wrap page2_contents">
    <h2 class="page2_title">대시보드</h2>
    <?
    $cnt_query="select count(idx) from documents";
    $cnt_result=mysql_query($cnt_query,$connect);
    $docu_cnt=mysql_result($cnt_result,0,0);
    ?>
    <p class="cnt_header">2016년 6월 22일 부터 총 <?=$docu_cnt?>개의 문서가 저장되었습니다.</p>
    
    <p class="docu_list_view">문서 목록 보기</p>
</div>