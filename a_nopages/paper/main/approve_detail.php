<?
session_start();
$login=$login_id;
$user=$user_name;

if(!$login) 
{
	echo" <script>
		window.alert('�α����ϼ���')
		history.go(-1)
		</script>
	";
	exit;
}

$datafile="approve/$content";
$fp=fopen($datafile,'r');
$data=fread($fp,filesize($datafile));
echo$data;
echo("
		<table border='0' cellpadding='5' cellspacing='5'>
        <tr>
        <td align=center width='550' height='30'><a href='javascript:window.close();'><img src=cancel.gif border=0></a>â�ݱ�</td>
        </tr>
        </table> 
		");

?>