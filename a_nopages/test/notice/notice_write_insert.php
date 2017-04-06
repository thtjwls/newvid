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



	
//	$file		=$_POST["photo"];
/*	$file		=$_FILES["photo"]["name"];
	$type		=$_FILES["photo"]["type"]; //date("YmdHs")."^".$file;
	$tmp_name	=$_FILES["photo"]["tmp_name"];
	$size		=$_FILES["photo"]["size"];*/


	$file1		=$_FILES["file1"]["name"];
	$file2		=$_FILES["file2"]["name"];
	$file3		=$_FILES["file3"]["name"];
	
	$uploaddir		="/host/home2/thtjwls/html/test/img/"; //파일이 저장될 경로
	$uploadfile1	=$uploaddir . basename($_FILES["file1"]["name"]); //파일의 저장될 이름
	$rename1		=substr($uploadfile1,34);	//$uploadfile 의 앞 34자리 이름 자름(경로)
	$filerename1	=date("YmdHis")."^".$rename1;	//YYYYmmddHHiiss^파일이름

	$uploadfile2	=$uploaddir . basename($_FILES["file2"]["name"]); //파일의 저장될 이름
	$rename2		=substr($uploadfile2,34);	//$uploadfile 의 앞 34자리 이름 자름(경로)
	$filerename2	=date("YmdHis")."^".$rename2;	//YYYYmmddHHiiss^파일이름

	$uploadfile3	=$uploaddir . basename($_FILES["file3"]["name"]); //파일의 저장될 이름
	$rename3		=substr($uploadfile3,34);	//$uploadfile 의 앞 34자리 이름 자름(경로)
	$filerename3	=date("YmdHis")."^".$rename3;	//YYYYmmddHHiiss^파일이름



	/*디버깅
	echo "<pre>";
	if(move_uploaded_file($_FILES['photo']['tmp_name'],$uploadfile)){
		echo "파일이 유효하고,성공적으로 업로드 되었습니다.";
		echo "filerename :" .$filerename;
	} else {
		echo "공격의 가능성이 있는 파일입니다.";
	}
	echo "디버깅 정보입니다. :";
	print_r($_FILES);
	echo "</pre>";
	*/
	
	/*
	이미지 사이즈 구하는 함수
	$imgsize	=getimagesize($uploadfile);	
	$imgwidth	=$imgsize[0];
	$imgheight	=$imgsize[1];
	*/
	

	/*변수검증
	echo "<br>";
	print_r($imgsize);
	echo "<br>";
	echo "imgWidth :".$imgWidth;
	echo "<br>";
	echo "imgHeight :".$imgHeight;
	echo "<br>";
	echo "uploaddir :" .$uploaddir;
	echo "<br>";
	echo "uploadfile :" .$uploadfile;
	echo "<br>";
	echo "rename	:" .$rename;
	echo "<br>";
	echo "filerename :" .$filerename;
	echo "<br>";
	echo "fname :" .$fname;
	echo "<br>";
	echo "files :" .$_FILES['photo']['tmp_name'];
	*/
	


	

	

	$sql="insert into board";
	$sql= $sql."(cate,subject,contents,nick,hit,file1,file2,file3,regist_day) value";
	$sql= $sql."('notice','$subject','$contents','$usernick',0,'$file1','$file2','$file3','$regist_day')";

	$result=mysql_query($sql,$connect);
		
	
	echo "<script>
		alert('저장되었습니다.');
		location.href='http://thtjwls.dothome.co.kr/test/notice/notice_list.php';
	</script>";
?>