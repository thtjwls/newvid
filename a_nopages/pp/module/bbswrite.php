<?
include "../lib/session.php";
include "../lib/dbconnect.php";
?>
<meta charset="utf-8"/>
<?
/* 세션idx값으로 유저 닉네임정보 획득 */
$userQuery = "select nick from pp_member where idx='$useridx'";
$userResult = mysql_query($userQuery,$connect);
$memberNickrow = mysql_fetch_array($userResult);
$memberNick = $memberNickrow[nick];


$mod=$_REQUEST["mod"];
$bbstitle = $_REQUEST["bbstitle"];
$bbscontents = $_REQUEST["ir1"];
$regist_day = date("Y-m-d H:i:s");
$regist_ip = $_SERVER["REMOTE_ADDR"];
$bbsIdx = $_REQUEST["idx"];


if($mod == "write") {
    $bbswriteQuery = "insert into pp_bbs ";
    $bbswriteQuery = $bbswriteQuery."(cate,title,contents,writer,view,regist_day,regist_ip) value ";
    $bbswriteQuery = $bbswriteQuery."('board','$bbstitle','$bbscontents','$memberNick','0','$regist_day','$regist_ip')";
    $bbswriteResult = mysql_query($bbswriteQuery,$connect);

    if(!$bbswriteResult) {
        echo "bbswriteQuery :" .$bbswriteQuery;
?>
<script>
    alert("등록에 실패하였습니다.\n문제가 지속 될 경우 관리자에게 문의하세요.");
    history.go(-1);
</script>
        <?
    } else {
        ?>
<script>
    alert("등록되었습니다.");
    location.href = "../index.php?tabs=bbs";
</script>
        <?
    }
} else if ($mod == "modify") {
    $bbsModifyQuery = "update pp_bbs set title='$bbstitle', contents='$bbscontents' where idx='$bbsIdx'";
    $bbsModifyResult = mysql_query($bbsModifyQuery,$connect);

    if(!$bbsModifyResult) {
        ?>
<script>
    alert("수정에 실패하였습니다. 잠시 후 다시 시도해주세요.\n문제가 지속되면 관리자에게 문의하십시오.");
    history.go(-1);
</script>
        <?
    } else {
        echo("<script>
        alert('수정되었습니다.');
        location.href=('../?tabs=bbsView&idx=$bbsIdx');
        </script>");
    }
}
?>