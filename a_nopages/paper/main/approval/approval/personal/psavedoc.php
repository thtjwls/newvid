<?

session_cache_limiter("");
session_start();
include "message_config.php";
include "lib.php";
include "config.php";
include "connection.php";
include "function.php";

$login=$login_id;
$user=$user_name;
$part=$comp_part;
$rank=$comp_rank;

$upload_dir = "../../../upload";
if(!($tp=opendir($upload_dir))) die("$upload_dir�� �� �� �����ϴ�.");
while($t_file = readdir($tp))
$t_filenames[]= $t_file;
sort($t_filenames);

for($i=0; $i<count($t_filenames); $i++)
{
	if($t_filenames[$i] != '.' && $t_filenames[$i] != '..')
	{
		$t_name=$t_filenames[$i];
		if($personalfile_name == $t_name)
		{
			echo("
				<script>
				window.alert('�����̸��� ������ �̹� �����մϴ�. �����̸��� �����Ͻʽÿ�!');
				history.go(-1);
				</script>
					");
				exit;
		}
	}
}


if(!copy($personalfile, "$upload_dir/$personalfile_name"))
{ 
	echo("
		<script>
		window.alert('���� ���ε� ����!');
	history.go(-1);
		</script>
		");
	exit;
}

$html_code=
"
<html>
<head>
<style>
			table,td,tr,BODY,input,DIV,form,TEXTAREA,center,option,pre,blockquote {font-size:9pt; font-family:tahoma,verdana,����; color:black}
			SELECT{font-size:9pt;}
			A:link    {color:blue;text-decoration:none;}
			A:visited {color:blue;text-decoration:none;}
			A:active  {color:blue;text-decoration:none;}
			A:hover  {color:red;text-decoration:underline}

			.input {border:solid 1;background-color:white;}
			.submit {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:white;background-color:black; height=18px}
			.submit2 {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:black;background-color:#88c4ff; height=18px}
</style>
</head>
<body bgcolor='white' text='black' link='blue' vlink='purple' alink='red'>
	<br>
<table border='0' cellpadding='5' cellspacing='5' bgcolor='#B4B6F4'>
             <tr>
                    <td width='162' height='30'><p><font color='white'><b>&nbsp;�����ۼ����� Cover</b></font></td>
                </tr>
            </table> 
            <table border='0' cellpadding='0' cellspacing='1' bgcolor='#B4B6F4'> 
                <tr>
                    <td width='91' height='21' align='center' bgcolor='#E5E7FF'><p>�߼۹�����</td>
                    <td width='469' height='21' colspan='5' bgcolor='white'>
                    	&nbsp;".$docname."
                    </td>
                </tr>
                <tr>
                    <td width='91' height='21' align='center' bgcolor='#E5E7FF'><p>�����ۼ���</td>
                    <td width='469' height='21' align='left' bgcolor='white'>
                         &nbsp;".$user."</td>
				</tr>
				<tr>
                    <td width='91' height='21' align='center' bgcolor='#E5E7FF'><p>&nbsp;������</td>
                    <td width='469' height='21' align='left' bgcolor='white'><p>
                    	&nbsp;".$approve."</td>
				</tr>
				<tr>
                    <td width='91' height='21' align='center' bgcolor='#E5E7FF'><p>������</td>
                    <td width='469' height='21' align='left' bgcolor='white'><p>
                    		&nbsp;".$viewer."
                    </td>
                </tr>
                <tr>
                    <td width='91' height='21' align='center' bgcolor='#E5E7FF'><p>÷�ι���</td>
                    <td width='469' height='21' colspan='5' bgcolor='white'>
                    	&nbsp;<a href='upload/".$personalfile_name."' target='self'><b>".$personalfile_name."<b></td>
                </tr>
                <tr>
                    <td width='91' height='21' align='center' bgcolor='#E5E7FF'><p>�ۼ���</td>
                    <td width='469' height='21' colspan='5' bgcolor='white'>
                    	&nbsp;".$sdate."                    </td>
                </tr>
                <tr>
                    <td width='91' height='27' align='center' bgcolor='#E5E7FF'><p>�޸�</td>
                    <td width='469' height='27' colspan='5' bgcolor='white'><p>
                    	<table border='0' cellpadding='7' cellspacing='0' width=100%><tr><td>
                    	".$memo."
                    	</td></tr></table>
                    </td>
                </tr>
            </table>
</body>
</html>
";
$date_copy = $sdate;
$sdate = ereg_replace(":", ".", $sdate);

$approve_dir = "../../../approve";
$filename=$login.".".$sdate.".htm";
if($html==0) $html_code = htmlspecialchars($html_code);
	
if(eregi("<script",$html_code)) $html_code = htmlspecialchars($html_code);

$html_code = stripslashes($html_code);
$html_code = str_replace("|",":",$html_code);
$html_code = str_replace("<a","<a target=_new",$html_code);

if(data_write("$approve_dir/$filename","w",$html_code)) Error ("�����Է� �Ǵ� �۹̼� ����!");

$ctime = time();

$insert = mysql_query("insert into $table_name_2 values('', '$login', '$from_part', '$approve', '$viewer', '$to_id', '$docname', '$memo', '$filename', '$personalfile_name', '$ctime', '$sdate', '', '', '', '', '', '', '$viewer', '')", $con);
if(!$insert)
{
	echo("
		<script>
		window.alert('DB insert error in approve (psavedoc.php)!');
		history.go(-1);
		</script>
			");
		exit;
}

echo("
<script>
window.alert('���簡 ���۵Ǿ����ϴ�. ����� ��ٸ��ʽÿ�!');
</script>
");
move_url('../selectform.php');
exit;
?>

?>
