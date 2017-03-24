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
	if(confirm("휴지통은 단지 리스트에서 보이지 않을뿐 영구 삭제되는 것은 아닙니다.\n이후 복구를 원하시면 관리자에게 문의하시기 바랍니다!\n\n휴지통에 넣겠습니까?")) 
	{
			location.replace(go);
	}
}

function remake()
{
	if(confirm("현재 버전에서는 아직 편집기능이 준비되지 않았습니다.\n따라사 다시 작성해야 하는 불편함이 있습니다.\n\n다시 작성하시겠습니까?")) 
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
    <!------- 검토할 문서 목록 --------->
    <tr>
        
        <td width="710"  valign="top" align=left>
        
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#88c4ff">
    <tr>
        <td width="162" height="33" ><p><font color="white"><b>&nbsp;작성한 결재 리스트</b></font></td>
    </tr>
</table>
<br>
        <center>
        <table border=0 cellpadding="0" cellspacing="1" bgcolor=#88c4ff width=710>
        <tr height=24>
        
        	<td align=center style="color:white;">번호</td>

			<td align=center style="color:white;">문서명</td>
 
			<td align=center style="color:white;">검토인</td>
        	
        	<td align=center style="color:white;">결재인</td>
        	
        	<td align=center style="color:white;">작성일</td>

			<td align=center style="color:white;">검토일</td>

			<td align=center style="color:white;">결재일</td>

        	<td align=center style="color:white;">CHECK</td>

			<td align=center style="color:white;">기능</td>
        
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
									<a href='#' title='$row[etc_memo]'><font color=red>검토중</font></a>
									</td>
									");
							}
							else if($row[ok_flag] == 0 && $row[return_flag] == 2)
							{
								$b++;
								echo("
									<a href='#' title='$row[etc_memo]'><font color=red>최종결재중</font></a>
									</td>
									");
							}
							else if($row[ok_flag] == 0 && $row[return_flag] == 3)
							{
								$c++;
								echo("
									<a href='#' title='$row[etc_memo]'><font color=red>상위검토중</font></a>
									</td>
									");
							}
							else if($row[ok_flag] == 1 && $row[return_flag] == 5)
							{
								$d++;
								echo("
        							<a href='#' title='$row[etc_memo]'><font color=red>최종승인됨</font></a>
									");
							}
							else if($row[ok_flag] == 1 && $row[return_flag] == 4)
							{
								$e++;
								echo("
									<a href='#' title='$row[etc_memo]'><font color=gray>최종반려됨</font></a>
									");
							}
							else if($row[ok_flag] == 0 && $row[return_flag] == 1)
							{
								$f++;
								echo("
									<a href='#' title='$row[etc_memo]'><font color=gray>검토반려됨</font></a>
									");
							}
							else
							{
								$h++;
								echo("
									<a href='#' title='$row[etc_memo]'><font color=gray>결재완료!</font></a>
									");
							}

							echo("
        			</td>
        			<td bgcolor=white align=center width=40 style='font-size: 12px;'>
								");
							if(($row[ok_flag] == 0) && (($row[return_flag] == 0) || ($row[return_flag] == 2) || ($row[return_flag] == 3)))
							{
								echo("
									<font color=gray>결재중</font>
									</td>
									");
							}
							else if($row[ok_flag] == 1 && $row[return_flag] == 5)
							{
								?>
        							<a href="javascript:gabage_in(1, '<?echo$row[seq_num]?>');">휴지통</a>
								<?
							}
							else if(($row[ok_flag] == 0) && (($row[return_flag] == 1) || ($row[return_flag] == 4)))
							{
								echo("
									<a href='javascript:remake();'>재작성</a>
									");
							}
							else
							{
								?>
        							<a href="javascript:gabage_in(1, '<?echo$row[seq_num]?>');">휴지통</a>
								<?
							}

				}
			}
				?>
        			
        </table>
		<table>
			<tr bgcolor=white>
		        <td valign=bottom><p align=center >검토중 <font color=red><?echo$a;?></font> | 최종결재중 <font color=red><?echo$b;?></font> | 상위검토중 <font color=red><?echo$c;?></font> | 승인됨 <font color=red><?echo$d;?></font> | 최종반려됨 <font color=red><?echo$e;?></font> | 검토반려됨 <font color=red><?echo$f;?></font> | 결재완료! <font color=red><?echo$h;?></font><td>
			</tr>
		</table>
        </center>
        
        </td>
    </tr>
</table></td></tr></table></div>

</body>
</html>