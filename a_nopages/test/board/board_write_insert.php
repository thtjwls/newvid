<?
include "../lib/session.php";
include "../db/dbconnect.php" ?>
<meta charset="utf-8">
<?
	ini_set("upload_max_filesize","20M");  //용량 20메가로 제한
	ini_set("post_max_size","20M"); //post 방식으로 넘길때 파일사이즈
	ini_set("file_uploads","On");	//파일업로드 허용
	ini_set("upload_max_filesize","20M");	//최대 업로드 파일 사이즈
	ini_set("max_execution_time","300"); //최대 실행시간
	ini_set("memory_limit","20M"); //?

	$subject	=$_POST["write_subject"];
	$contents	=$_POST["write_contents"];
	$regist_day	=date("Y-m-d H:i:s");
	$file1		=$_FILES[file1][name];

	if($file1 != ""){

	$save_dir	="../file/";					//파일을 저장할 디렉토리명
	$file1		=date("YmdHis")."_".$file1;	//저장할 파일 가공
	$dest		=$save_dir . $file1;

	if(!move_uploaded_file($_FILES[file1][tmp_name],$dest)){
	
		die("저장실패");
	}
	}

	
	$sql="insert into board";
	$sql= $sql."(cate,subject,contents,nick,hit,file1,file2,file3,regist_day) value";
	$sql= $sql."('board','$subject','$contents','$usernick',0,'$file1','$file2','$file3','$regist_day')";

	$result=mysql_query($sql,$connect);
		
	
	echo "<script>
		alert('저장되었습니다.');
		location.href='http://thtjwls.dothome.co.kr/test/board/board_list.php';
	</script>";
?>