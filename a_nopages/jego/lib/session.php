<?
 SESSION_START();
   $useridx = $_SESSION['useridx'];
   include "dbconnect.php";
?>
<?
//���� ����������������    
$sql = "select * from je_member where idx = '$useridx'";
$result = mysql_query($sql,$connect);

$row=mysql_fetch_array($result);
$userac = $row[ac]; //���� ���� ���ο���
$username = $row[name]; //���� �̸�
$userlevel = $row[level]; //���� ����
?>