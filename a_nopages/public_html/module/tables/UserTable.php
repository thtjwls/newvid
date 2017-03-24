<?
require('../include.php');





switch ($_GET['mod']) {
	case 'CreateUserTable' :
		CreateUserTable();
		break;
	case 'TestUserTable' :
		TestUserTable();
		break;
	case 'showTables' :
		showTables();
		break;
	case 'php_info' :
		phpinfo();
		break;
	default :
		break;
}

//유저 테이블 생성
function CreateUserTable()
{
	$database = new Database;

	$sql = 'create table dev_members ';
	$sql .= '(Idxno int not null auto_increment primary key, Id varchar(30) not null, Password text not null, Level int not null, Access tinyint not null)';

	$result = mysql_query($sql,$database->connect());

	if ( ! $result ) {
		echo 'table 생성 실패';
		echo '<br>'.$sql;
		echo '<br> result : '.$result;
		echo '<br> connect : '.$database->connect();
	} else {
		echo 'table 생성 성공';
	}
	
}

//테스트 유저 생성
function TestUserTable()
{
	$database = new Database;
	$User = 'admin';
	$Password = hash('sha512','1234');
	$Level = 10;
	$Access = true;

	$sql = 'insert into dev_members ';
	$sql .= '(Id,Password,Level,Access) values ';
	$sql .= '("'.$User.'","'.$Password.'","'.$Level.'","'.$Access.'")';

	$result = mysql_query($sql,$database->connect());

	if ( ! $result ) {
		echo $User.' 아이디 생성 실패';
		echo '<br>'.$sql;
	} else {
		echo $User.' 아이디 생성 성공';
	}
}

//생성 된 테이블 확인
function showTables()
{
	$database = new Database;

	$sql = 'show tables';
	$result = mysql_query($sql,$database->connect());


	echo 'result :' .$result;
}
?>