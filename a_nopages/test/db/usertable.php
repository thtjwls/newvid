<?
	include "dbconnect.php";
?>
<?
	$sql="create table users (no int not null auto_increment primary key, name char(10) not null, id char(20) not null, pass char(30) not null, nick char(20) not null, email char(30) not null, address char(50) not null, level int)";
	$con=mysql_query($sql,$connect);
	
	if(!con){
		echo "1";
	} else {
		echo "2";
	}
?>