<?
session_cache_limiter("");
session_start();

$login=$login_id;
$user=$user_name;
$part=$comp_part;
$rank=$comp_rank;

include "config.php";
include "connection.php";
?>

<html>
<head>
<LINK REL="stylesheet" TYPE="text/css" HREF="../allstyle.css">

<SCRIPT LANGUAGE="JavaScript">
<!--
function gabage_in(flag, seq_num)
{
	var go='gabage.php?flag='+flag+'&seq_num='+seq_num;
	if(confirm("�������� ���� ����Ʈ���� ������ ������ ���� �����Ǵ� ���� �ƴմϴ�.\n���� ������ ���Ͻø� �����ڿ��� �����Ͻñ� �ٶ��ϴ�!\n\n�����뿡 �ְڽ��ϱ�?")) 
	{
			location.replace(go);
	}
}

function remake()
{
	if(confirm("���� ���������� ���� ��������� �غ���� �ʾҽ��ϴ�.\n����� �ٽ� �ۼ��ؾ� �ϴ� �������� �ֽ��ϴ�.\n\n�ٽ� �ۼ��Ͻðڽ��ϱ�?")) 
	{
			location.replace("selectform.php");
	}
}
-->
</SCRIPT>

</head>

<body link="#3366cc" alink="#3366cc"> 
<p align="left">
<div align="left"><table border="0" cellpadding="0" cellspacing="0" width=900><tr><td width=10 >&nbsp;</td><td align=left>
<br>	
	
	
    <table border=0 cellpadding="0" cellspacing="0" >
    <!------- ������ ���� ��� --------->
    <tr>
        
        <td width="710"  valign="top" align=left>
        
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#88c4ff">
    <tr>
        <td width="162" height="33" ><p><font color="white"><b>&nbsp;�ۼ��� ���� ����Ʈ</b></font></td>
    </tr>
</table>
<br>
        <center>
        <table border=0 cellpadding="0" cellspacing="1" bgcolor=#88c4ff width=710>
        <tr height=24>
        
        	<td align=center style="color:white;">��ȣ</td>

			<td align=center style="color:white;">������</td>
 
			<td align=center style="color:white;">������</td>
        	
        	<td align=center style="color:white;">������</td>
        	
        	<td align=center style="color:white;">�ۼ���</td>

			<td align=center style="color:white;">������</td>

			<td align=center style="color:white;">������</td>

        	<td align=center style="color:white;">CHECK</td>

			<td align=center style="color:white;">���</td>
        
        </tr>
			<?
			$select=mysql_query("select * from $table_name_2", $con);
			if(!$select)
			{
				echo("
					<script>
					window.alert('DB select error in approve(getdoc.php)!');
					history.go(-1);
					</script>
					");
				exit;
			}
			$a=0;
			$b=0;
			$c=0;
			$d=0;
			$e=0;
			$f=0;
			$h=0;

			$l=0;
			while($row=mysql_fetch_array($select))
			{
				$from_part = explode("(", $row[from_part]);

				if(($user_name == $from_part[0]) && ($row[ok_flag] != 3))
				{
					$l++;
							echo("
	        		<tr height=22>
        			<td bgcolor=white align=center width=25>$l</td>
        			<td bgcolor=white align=center><a href='../../approve_detail2.php?content=$row[filename]'>$row[docname]</a></td>
        			<td bgcolor=white align=center width=140>$row[view_list]</a></td>
        			<td bgcolor=white align=center width=140>$row[approve]</td>
        			<td bgcolor=white align=center width=70 style='font-size: 12px;'>$row[sdate]</td>
        			<td bgcolor=white align=center width=70 style='font-size: 12px;'>$row[mdate]</td>
        			<td bgcolor=white align=center width=70 style='font-size: 12px;'>$row[edate]</td>
	       			<td bgcolor=white align=center width=60>
					");
							if($row[ok_flag] == 0 && $row[return_flag] == 0)
							{
								$a++;
								echo("
									<a href='#' title='$row[etc_memo]'><font color=red>������</font></a>
									</td>
									");
							}
							else if($row[ok_flag] == 0 && $row[return_flag] == 2)
							{
								$b++;
								echo("
									<a href='#' title='$row[etc_memo]'><font color=red>����������</font></a>
									</td>
									");
							}
							else if($row[ok_flag] == 0 && $row[return_flag] == 3)
							{
								$c++;
								echo("
									<a href='#' title='$row[etc_memo]'><font color=red>����������</font></a>
									</td>
									");
							}
							else if($row[ok_flag] == 1 && $row[return_flag] == 5)
							{
								$d++;
								echo("
        							<a href='#' title='$row[etc_memo]'><font color=red>�������ε�</font></a>
									");
							}
							else if($row[ok_flag] == 1 && $row[return_flag] == 4)
							{
								$e++;
								echo("
									<a href='#' title='$row[etc_memo]'><font color=gray>�����ݷ���</font></a>
									");
							}
							else if($row[ok_flag] == 0 && $row[return_flag] == 1)
							{
								$f++;
								echo("
									<a href='#' title='$row[etc_memo]'><font color=gray>����ݷ���</font></a>
									");
							}
							else
							{
								$h++;
								echo("
									<a href='#' title='$row[etc_memo]'><font color=gray>����Ϸ�!</font></a>
									");
							}

							echo("
        			</td>
        			<td bgcolor=white align=center width=40 style='font-size: 12px;'>
								");
							if(($row[ok_flag] == 0) && (($row[return_flag] == 0) || ($row[return_flag] == 2) || ($row[return_flag] == 3)))
							{
								echo("
									<font color=gray>������</font>
									</td>
									");
							}
							else if($row[ok_flag] == 1 && $row[return_flag] == 5)
							{
								?>
        							<a href="javascript:gabage_in(1, '<?echo$row[seq_num]?>');">������</a>
								<?
							}
							else if(($row[ok_flag] == 0) && (($row[return_flag] == 1) || ($row[return_flag] == 4)))
							{
								echo("
									<a href='javascript:remake();'>���ۼ�</a>
									");
							}
							else
							{
								?>
        							<a href="javascript:gabage_in(1, '<?echo$row[seq_num]?>');">������</a>
								<?
							}

				}
			}
				?>
        			
        </table>
		<table>
			<tr bgcolor=white>
		        <td valign=bottom><p align=center >������ <font color=red><?echo$a;?></font> | ���������� <font color=red><?echo$b;?></font> | ���������� <font color=red><?echo$c;?></font> | ���ε� <font color=red><?echo$d;?></font> | �����ݷ��� <font color=red><?echo$e;?></font> | ����ݷ��� <font color=red><?echo$f;?></font> | ����Ϸ�! <font color=red><?echo$h;?></font><td>
			</tr>
		</table>
        </center>
        
        </td>
    </tr>
</table></td></tr></table></div>

</body>
</html>