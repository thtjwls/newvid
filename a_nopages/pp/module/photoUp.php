<?
include "../lib/session.php";
include "../lib/dbconnect.php";
?>
<meta charset="utf-8"/>
<?


ini_set("upload_max_filesize","20M");  //용량 20메가로 제한
ini_set("post_max_size","20M"); //post 방식으로 넘길때 파일사이즈
ini_set("file_uploads","On");	//파일업로드 허용
ini_set("upload_max_filesize","20M");	//최대 업로드 파일 사이즈
ini_set("max_execution_time","300"); //최대 실행시간
ini_set("memory_limit","20M"); //?


//user 정보 획득
$usernickQuery = "select nick from pp_member where idx ='$useridx'";
$usernickResult = mysql_query($usernickQuery,$connect);
$userrow = mysql_fetch_array($usernickResult);
$usernick = $userrow[nick];

$mod = $_REQUEST["mod"];
$title = $_REQUEST["title"];
$filename = $_FILES["image"]["name"];
$filetype = $_FILES["image"]["type"];
$filesize = $_FILES["image"]["size"];
$accessType = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');

$filetmpname = $_FILES["image"]["tmp_name"];
$fileerror = $_FILES["image"]["error"];
$upload_date = date("YmdHis");
$UpFileName = $upload_date."_".$filename;

$comment = $_REQUEST["writer_comment"];
$regist_day = date("Y-m-d H:i:s");



if($mod == "insert") {
    if(in_array($filetype,$accessType)) { //파일 타입이 올바른 이미지 형식인지 검증
        if(move_uploaded_file($filetmpname,"../photo/".$UpFileName)) {
            $photoQuery = "insert into pp_photo (";
            $photoQuery = $photoQuery."title,cate,writer,image,writer_comment,regist_day) value (";
            $photoQuery = $photoQuery."'$title','view','$usernick','$UpFileName','$comment','$regist_day')";
            $photoResult = mysql_query($photoQuery,$connect);

            if(!$photoResult) {
?>
<script>
    alert("저장에 실패하였습니다. 잠시 후 다시 시도해 주세요.\n문제가 지속되면관리자에게 문의하세요.");
    history.go(-1);
</script>
                <?
            } else {
                ?>
<script>
    alert("저장되었습니다.");
    location.href = "../?tabs=photo";
</script>
                <?
            }
        } else {
?>
<script>
    alert("파일업로드에 실패하였습니다. 잠시 후 다시 시도해 주세요.\n문제가 지속되면 관리자에게 문의하세요.");
    history.go(-1);
</script>
<?
        }
    } else {
?>
<script>
    alert("이미지 파일을 첨부 해 주세요!!");
</script>
<?
    } 
}





?>