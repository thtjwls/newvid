<?
include "../lib/session.php";
include "../lib/dbconnect.php";
?>
<meta charset="utf-8" />
<?
$mod = $_GET["mod"];
$idx = $_REQUEST["idx"];
$viewQuery = "select * from pp_photo where idx='$idx' and cate='view'";
$viewResult = mysql_query($viewQuery,$connect);
$row = mysql_fetch_array($viewResult);
$title = $row[title];
$comment = $row[writer_comment];
$image = $row[image];
$viewidx = $row[idx];
$viewNick = $row[writer];

//세션으로 유저 닉네임 정보 획득
    $userQuery = "select nick from pp_member where idx='$useridx'";
    $userResult = mysql_query($userQuery,$connect);
    $memberNickrow = mysql_fetch_array($userResult);
    $memberNick = $memberNickrow[nick];
    //세션으로 유저 닉네임 정보 획득 끝
?>
<p id="title">
    <?=$title?>    
</p>
<p id="comment">
    <?=$comment?>
</p>
<img src="photo/<?=$image?>" alt="" id="image" />
<input type="hidden" value="<?=$viewNick?>" id="ph_img_nick" />
<input type="hidden" value="<?=$idx?>" id="viewidx" name="viewRepleIdx" />
<div id="reple_list_wrap">
    <table cellpadding="0" cellspacing="0">
        <colgroup>
            <col width="10%;"/>
            <col width="90%;"/>
        </colgroup>
        <?
    $photoRepleCntQuery ="select count(idx) from pp_photo where reple_idx='$idx' and cate='reple'";
    $photoRepleCntResult = mysql_query($photoRepleCntQuery,$connect);
    $photoRepleCnt = mysql_result($photoRepleCntResult,0,0); //리플카운트

    //리플목록 획득
    $photoRepleQuery ="select * from pp_photo where reple_idx='$idx' and cate='reple' order by idx desc";
    $photoRepleResult = mysql_query($photoRepleQuery,$connect);

    while($re_row=mysql_fetch_array($photoRepleResult)) {
        $re_writer = $re_row[writer];
        $re_comment = $re_row[writer_comment];
        $re_regist_day = $re_row[regist_day];
        $re_idx = $re_row[idx];
        ?>
        <tr>
            <th class="reple_writer_name">
                <?=$re_writer?>                
            </th>
            <th class="reple_regist_day">
                <?=$re_regist_day?>
                <?
        if($memberNick == $re_writer) {
                ?>
                <button id="ph_reple_delete" onclick="repleDelet(<?=$re_idx?>)">삭제</button>                
            <?
        }
            ?>                
            </th>
        </tr>
        <tr>
            <td colspan="2" class="re_comment">
                <?=$re_comment?>
            </td>
        </tr>        
        <?
    } //리플목록 끝
        ?>
    </table>
</div>
<?
    //insert mod

    /*
     * idx,reple_idx,title,cate,writer
     * image,writer_comment,regist_day
     *
     */
     

    if(!$memberNick || $memberNick == "") {
        $memberNick = "손님";
    }
   
    $re_comment = $_REQUEST["pp_photo_reple"];
    $regist_day = date("Y-m-d H:i:s");
    $viewRepleIdx = $_REQUEST["viewRepleIdx"];

    if($mod=="insert") {
        $phInsertQuery = "insert into pp_photo (reple_idx,cate,writer,writer_comment,regist_day) values ";
        $phInsertQuery = $phInsertQuery."('$viewRepleIdx','reple','$memberNick','$re_comment','$regist_day')";
        $phInsertResult = mysql_query($phInsertQuery,$connect);
    }

    if($mod == "delete") {
        $phRepleDelQuery = "delete from pp_photo where idx = $idx";
        $phRepleDelResult = mysql_query($phRepleDelQuery,$connect);
    }
?>