<meta charset="utf-8">
<?
	include "../db/dbconnect.php";

	//변수 설정은 왠만하면 라인을 마춰 주는 편이 보기도 좋고 구분하기 좋음
	$name	=$_POST["name"];
	$id		=$_POST["id"];
	$pass	=$_POST["pass"];
	$nick	=$_POST["nick"];
	$email1	=$_POST["email1"];
	$email2	=$_POST["email2"];
	$email	=$email1."@".$email2;
	$address=$_POST["address"];
	$hp1	=$_POST["hp1"];
	$hp2	=$_POST["hp2"];
	$hp3	=$_POST["hp3"];
	$hp		=$hp1."-".$hp2."-".$hp3;
	
	//Insert 쿼리문은 아래 같이 구분해서 써주면 나중에 값 비교라든지 이런것에 더 좋음, insert 되는 값들이 몇개 없다면 한줄로 써도 상관 없지만
	//나중에 값들이 많아지면 한줄로 쓰게 되면 필드 값이랑 변수랑 비교하기 힘들어지니까
	$sql="insert into users ";
	$sql= $sql." (name,id,pass,nick,email,address,hp) value ";
	$sql= $sql." ('$name','$id','$pass','$nick','$email','$address','$hp')";
	$result=mysql_query($sql,$connect);

	echo "
		<script>
			alert('가입이 정상적으로 완료 되었습니다. 로그인 후 사용 해 주세요.');
			location.href='http://thtjwls.dothome.co.kr/test/index.php';
		</script>
	";
?>