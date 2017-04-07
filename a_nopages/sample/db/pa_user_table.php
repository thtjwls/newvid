<? include "dbconnect.php"; ?>
<meta charset="utf-8">
<?
	/*
		유저테이블
		idxno
		이름
		아이디
		비밀번호
		회사
		부서
		직급
		사이트직급
		가입날짜
		핸드폰번호
		내선번호
		이메일주소
	*/
	$sql="create table pa_user (idx int not null primary key auto_increment, name varchar(20) not null, id varchar(20) not null, pass varchar(50) not null, company varchar(20) not null, buse varchar(20) not null, level int not null, site_level int not null, regist_day varchar(30) not null, hp varchar(15) not null, cp varchar(15) not null, email varchar(30) not null)";
	$result=mysql_query($sql,$connect);
	
	if(!$result){
?>
	<script type="text/javascript">
		alert("테이블 생성에 실패했습니다. 데이터베이스 정보를 확인 해주세요.");	
	</script>
<?	} else { ?>
	<script type="text/javascript">
		alert("테이블을 정상적으로 생성했습니다.");
	</script>
<? } ?>