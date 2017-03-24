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
function Chkok(index, docname, makeuser, makedate, sign)
{
	if (sign == 1) {
		
		if(confirm("[검토승인]\n\n문서명: "+docname+"\n작성자: "+makeuser+"\n작성일: "+makedate+"\n\n검토승인을 하시겠습니까?")) {
			location.replace("chkdoc.php?index="+index+"&sign=1");
		}
	} else {
		if(confirm("[검토반려]\n\n문서명: "+docname+"\n작성자: "+makeuser+"\n작성일: "+makedate+"\n\n검토반려를 하시겠습니까?")) {
			location.replace("chkdoc.php?index="+index+"&sign=0");
		}
	}
	return false;
}

function Acceptok(index, docname, makeuser, makedate, sign)
{

	if (sign == 1) {
		if(confirm("[최종결재승인]\n\n문서명: "+docname+"\n작성자: "+makeuser+"\n작성일: "+makedate+"\n\n최종결재승인을 하시겠습니까?")) {
			location.replace("acceptdoc.php?index="+index+"&sign=1");
		}
	} else {
		if(confirm("[최종결재반려]\n\n문서명: "+docname+"\n작성자: "+makeuser+"\n작성일: "+makedate+"\n\n최종결재반려를 하시겠습니까?")) {
			location.replace("acceptdoc.php?index="+index+"&sign=0");
		}
	}
	return false;
}
function gabage_in(flag, seq_num)
{
	var go='gabage.php?flag='+flag+'&seq_num='+seq_num;
	if(confirm("휴지통은 단지 리스트에서 보이지 않을뿐 영구 삭제되는 것은 아닙니다.\n이후 복구를 원하시면 관리자에게 문의하시기 바랍니다!\n\n휴지통에 넣겠습니까?")) 
	{
			location.replace(go);
	}
}

-->
</SCRIPT>

</head>

<body link="#3366cc" alink="#3366cc"> 
<p align="left">
<div align="left"><table border="0" cellpadding="0" cellspacing="0" width=900><tr><td width=10 >&nbsp;</td><td align=left>
	
	
	
    <table border=0 cellpadding="0" cellspacing="0" >
    <!------- 검토할 문서 목록 --------->
    <tr>
        
        <td width="710"  valign="top" align=center>
        
		<table border=0 cellpadding="0" cellspacing="0" width=710><tr>
        <td align=left><img src=title11.gif></td>
        </tr></table>
        <center>
        <table border=0 cellpadding="0" cellspacing="1" bgcolor=EFA000 width=710>
        <tr height=24>
        
        	<td align=center style="color:white;">번호</td>

			<td align=center style="color:white;">문서명</td>

			<td align=center style="color:white;">작성인</td>
        	
        	<td align=center style="color:white;">결재인</td>
        	
        	<td align=center style="color:white;">작성일</td>

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
			$g=0;
			$l=0;
			while($row=mysql_fetch_array($select))
			{
				for($i=0;$i<($row[view_cnt]+1);$i++)
				{
					$list = explode("<br>", $row[view_list]);
					$ttt=$list[$i];
					$view_list = explode("(", $ttt);
					$zzz=$view_list[0];
					if(($row[viewer] != "검토인없음") && ($user_name==$zzz) && ($row[ok_flag] != 4))
					{
						$l++;
						echo("
						<tr height=22>
						<td bgcolor=white align=center width=25>$l</td>
						<td bgcolor=white align=center><a href='../../approve_detail2.php?content=$row[filename]'>$row[docname]</a></td>
						<td bgcolor=white align=center width=150><a href='#' title='$row[memo]'>$row[from_part]</a></td>
						<td bgcolor=white align=center width=150 style='font-size: 12px;'>$row[approve]</td>
						<td bgcolor=white align=center width=80 style='font-size: 12px;'>$row[sdate]</td>
						<td bgcolor=white align=center width=60>
						");
								if((($row[return_flag] == 0) || ($row[return_flag] == 3)) && ($i == $row[view_cnt]))
								{ 
									echo("<font color=red>검토대기중</font>");
								}
								else if(($row[view_cnt] == 0) && ($ttt != $row[viewer]))
								{
									echo("<font color=red>검토대기중</font>");
								}
								else
								{
									$g++;
									?>
										<a href="javascript:gabage_in(2, '<?echo$row[seq_num]?>');"><font color=gray>검토완료<br>휴지통</font></a>
									<?
								}
								echo("
						</td>
						<td bgcolor=white align=center width=60 style='font-size: 12px;'>
									");
								if((($row[return_flag] == 0) || ($row[return_flag] == 3)) && ($i == $row[view_cnt]))
								{
									$a++;
									?>
									
						<a href='' onclick="Chkok('<?echo$row[seq_num]?>', '<?echo$row[docname]?>', '<?echo$row[from_part]?>','<?echo$row[sdate]?>', 1); return false;">승인</a>|<a href='' onclick="Chkok('<?echo$row[seq_num]?>', '<?echo$row[docname]?>', '<?echo$row[from_part]?>','<?echo$row[sdate]?>', 0); return false;">반려</a>
						</td>
								
									<?
								}
								else if(($row[view_cnt] == 0) && ($ttt != $row[viewer]))
								{
									$a++;
									?>
									
						<a href='' onclick="Chkok('<?echo$row[seq_num]?>', '<?echo$row[docname]?>', '<?echo$row[from_part]?>','<?echo$row[sdate]?>', 1); return false;">승인</a>|<a href='' onclick="Chkok('<?echo$row[seq_num]?>', '<?echo$row[docname]?>', '<?echo$row[from_part]?>','<?echo$row[sdate]?>', 0); return false;">반려</a>
						</td>
								
									<?
								}
								else if($row[return_flag] == 1)
								{
									$b++;
									echo("
										<a href='#' title='$row[etc_memo]'><font color=gray>검토반려함</font></a>
										");
								}
								else if($row[return_flag] == 2)
								{
									$c++;
									echo("
										<a href='#' title='$row[etc_memo]'><font color=gray>검토승인함</font></a>
										");
								}
								else if($row[return_flag] == 3)
								{
									$d++;
									echo("
										<a href='#' title='$row[etc_memo]'><font color=gray>검토전송함</font></a>
										");
								}
								else if($row[return_flag] == 4)
								{
									$e++;
									echo("
										<a href='#' title='$row[etc_memo]'><font color=gray>승인반려됨</font></a>
										");
								}
								else if($row[return_flag] == 5)
								{
									$f++;
									echo("
										<a href='#' title='$row[etc_memo]'><font color=gray>최종승인됨</font></a>
										");
								}
								
								echo("
						</td>
							</tr>
							");
					}
				}
			}
			?>
			
        </table>
		<table>
			<tr bgcolor=white>
		        <td valign=bottom><p align=center >검토대기 <font color=red><?echo$a;?></font> | 검토완료 <font color=red><?echo$a;?></font> | 검토반려 <font color=red><?echo$b;?></font> | 검토승인 <font color=red><?echo$c;?></font> | 검토전송 <font color=red><?echo$d;?></font> | 승인반려 <font color=red><?echo$e;?></font> | 최종승인 <font color=red><?echo$f;?></font></font>
										<td>
			</tr>
		</table>
        </center>

        </tr>
        <!------- 결재할 문서 목록 --------->
        <tr>
        
        <td width="710"  valign="top" align=center>
        
<table border=0 cellpadding="0" cellspacing="0" width=710><tr>
        <td align=left ><img src=title22.gif></td>
        </tr></table>
        <center>
        <table border=0 cellpadding="0" cellspacing="1" bgcolor=60B030 width=710>
        <tr height=24>
        
        	<td align=center style="color:white;">번호</td>

			<td align=center style="color:white;">문서명</td>
 
			<td align=center style="color:white;">작성인</td>
        	
        	<td align=center style="color:white;">검토인</td>
        	
        	<td align=center style="color:white;">작성일</td>

			<td align=center style="color:white;">검토일</td>

        	<td align=center style="color:white;">CHECK</td>

			<td align=center style="color:white;">기능</td>
        
        </tr>
			<?
			$select2=mysql_query("select * from $table_name_2", $con);
			if(!$select2)
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
			$k=0;
			$l=0;

			while($row2=mysql_fetch_array($select2))
			{
				$approve = explode("(", $row2[approve]);


			//while($row2=mysql_fetch_array($select2))
			//{
				if((($user_name == $approve[0]) && ($row2[ok_flag] != 5)) && (($row2[return_flag] == 2) || ($row2[return_flag] == 4) || ($row2[return_flag] == 5) || ($row2[viewer] == "검토인없음")))
				{
					$l++;
							echo("
	        		<tr height=22>
        			<td bgcolor=white align=center width=25>$l</td>
        			<td bgcolor=white align=center><a href='../../approve_detail2.php?content=$row2[filename]'>$row2[docname]</a></td>
        			<td bgcolor=white align=center width=150><a href='#' title='$row2[memo]' length=20>$row2[from_part]</a></td>
        			<td bgcolor=white align=center width=150>$row2[view_list]</td>
        			<td bgcolor=white align=center width=80 style='font-size: 12px;'>$row2[sdate]</td>
        			<td bgcolor=white align=center width=80 style='font-size: 12px;'>$row2[mdate]</td>
	       			<td bgcolor=white align=center width=60>
					");
							if($row2[ok_flag] == 0)
							{ 
								$j++;
								echo("<font color=red>결재대기중</font>");
							}
							else
							{
								$k++;
									?>
										<a href="javascript:gabage_in(3, '<?echo$row2[seq_num]?>');"><font color=gray>결재완료<br>휴지통</font></a>
									<?
							}
							echo("
        			</td>
        			<td bgcolor=white align=center width=60 style='font-size: 12px;'>
								");
							if($row2[ok_flag] == 0)
							{
								$a++;
								?>
								
        			<a href='' onclick="Acceptok('<?echo$row2[seq_num]?>', '<?echo$row2[docname]?>', '<?echo$row2[from_part]?>','<?echo$row2[sdate]?>', 1); return false;">승인</a>|<a href='' onclick="Acceptok('<?echo$row2[seq_num]?>', '<?echo$row2[docname]?>', '<?echo$row2[from_part]?>','<?echo$row2[sdate]?>', 0); return false;">반려</a>
        			</td>
									
							<?
							}
							else
							{
								if($row2[return_flag] == 5)
								{
									$b++;
									echo("
        								<a href='#' title='$row2[etc_memo]'><font color=gray>승인함</font></a>
										");
								}
								else
								{
									$c++;
									echo("
										<a href='#' title='$row2[etc_memo]'><font color=gray>반려함</font></a>
										");
								}
							}
				}
			}
				?>
        			
        </table>
		<table>
			<tr bgcolor=white>
		        <td valign=bottom><p align=center >결재대기 <font color=red><?echo$a;?></font> | 결재완료 <font color=red><?echo$k;?></font> | 승인 <font color=red><?echo$b;?></font> | 반려 <font color=red><?echo$c;?></font><td>
			</tr>
		</table>
        </center>
        
        </td>
    </tr>
</table></td></tr></table></div>

</body>
</html>