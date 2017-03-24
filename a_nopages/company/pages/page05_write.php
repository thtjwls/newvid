<? include "../lib/header.php"; ?>
<? include "../db/dbconnect.php"; ?>
<?
$mod=$_GET["mod"];
$title = $_POST["title"];
$content = $_POST["ir1"];
$regist_day = date("Y-m-d H:i:s");
$status=$_POST["status"];
if($mod == "insert") {
    $sql="insert into it_notice (title,contents,writer,regist_day,status,view) values ('$title','$content','인사팀','$regist_day','$status','0')";
    $result=mysql_query($sql,$connect);
    if(!$result) {
?>
<script>
    alert("등록에 실패하였습니다. 잠시후 다시시도해주세요.\n문제가 지속될 경우 관리자에게 문의하세요.");
    history.go(-1);
</script>
<?
    }else{
?>
<script>
    alert("공고가 성공적으로 등록되었습니다.");
    location.href = "page05_sec2.php";
</script>
<?
    }
}
?>
<div class="page05-view-title-h3">
    <h3>
        채용공고 등록
    </h3>
</div>
<div id="writer-se2-editor-div">
    <form name="page05_write_form" id="write_form" action="page05_write.php?mod=insert" method="post">
        <div id="se2-editor-cus-title">
            <table cellpadding="5" cellspacing="0">
                <tr>
                    <th>
                        제목
                    </th>
                    <td>
                        <input type="text" value="" name="title" id="page05_title" />
                    </td>
                    <td>
                        <select name="status">
                            <option value="1">모집공고</option>
                            <option value="2">마감공고</option>
                            <option value="3">상시채용</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div id="editor-text-area-cus">
            <textarea name="ir1" id="ir1" rows="10" cols="100" style="width:1198px; height:412px; display:none;"></textarea>

            <input type="button" value="등록" id="form_submit" onclick="content_result();" />

            <script type="text/javascript">
                var oEditors = [];
                nhn.husky.EZCreator.createInIFrame({
                    oAppRef: oEditors,
                    elPlaceHolder: "ir1",
                    sSkinURI: "../pages/SmartEditor2Skin.html",
                    fCreator: "createSEditor2"
                });

                // ‘저장’ 버튼을 누르는 등 저장을 위한 액션을 했을 때 submitContents가 호출된다고 가정한다.
                function content_result() {
                    // 에디터의 내용이 textarea에 적용된다.
                    oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
                    var title = document.getElementById("page05_title");
                    var content = document.getElementById("ir1");
                    // 에디터의 내용에 대한 값 검증은 이곳에서
                    // document.getElementById("ir1").value를 이용해서 처리한다.
                    try {
                        elClickedObj.form.submit();
                    } catch (e) {
                        if (title.value == "") {
                            alert("제목을 입력 해주세요.");
                            title.focus();
                        } else if (content.value == "<p>&nbsp;</p>") {
                            alert("내용을 입력 해주세요.");
                        } else {
                            var input = confirm("공고를 등록 하시겠습니까?");
                            if (input == false) {
                                return false;
                            } else {
                                document.getElementById("write_form").submit();
                            }
                        }
                    }
                }
            </script>
        </div>
    </form>
</div>
<? include "../lib/footer.html"; ?>