<?
session_cache_limiter("");
session_start();

include "config.php";
include "connection.php";

$login=$login_id;
$user=$user_name;
$part=$comp_part;
$rank=$comp_rank;

$from_part=$user."(".$part."-".$rank.")";

?>

<html>
<head>
<title>문서작성 및 발송</title>
<SCRIPT LANGUAGE="JavaScript">
<!--
function CheckSpaces(strValue) {
	var flag=true;

	if (strValue!="") {
		for (var i=0; i < strValue.length; i++) {
			if (strValue.charAt(i) != " ") {
				flag=false;
				break;
			}
		}
	}
	return flag;
}

function CheckValues()
{
 	if(confirm("다음단계로 넘어 가시겠습니까?")) 
	{
			document.form.submit();
	}
	return;
}
function reload_1(part_name)
{
	var go='resortdoc.php?flag=1&part_name='+part_name;
		location.replace(go);
}
function reload_2(approve_id)
{
	var go='resortdoc.php?flag=2&approve='+approve_id;
		location.replace(go);
}
function reload_3(part_name2, approve)
{
	var go='resortdoc.php?flag=3&part_name2='+part_name2+'&approve='+approve;
		location.replace(go);
}

//-->
</SCRIPT>
<link rel="stylesheet" type="text/css" href="../../allstyle.css">
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">

&nbsp;<br> 
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="15">&nbsp;</td>
        <td>
             
             <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="560" height="71">
                    	<table border="0" cellpadding="4" cellspacing="1" bgcolor="#B4B6F4"><tr><td bgcolor=white>
                    	<img src="appoint1.gif" align="left" width="64" height="64" border="0">즐거운 휴가계획이 되길 바랍니다.
                    	휴가 계획서 작성시 기간을 정확히 명시해 주시기 바랍니다. 기간이 정확하지 않을시는 반송이 되는것은 확실하며 
                    	그렇게 되었을시 계획에 차질이 빛어지 경우가 높습니다. 각 항목별 입력을 정확히 해 주시기 바랍니다.
                        </td></tr></table>
                    </td>
                </tr>
            </table>
            &nbsp;<br>
        
            
            
            
            <table border="0" cellpadding="0" cellspacing="0" bgcolor="#B4B6F4">
                <tr>
                    <td width="162" height="30"><p><font color="white"><b>&nbsp;휴가계획서 Cover</b></font></td>
                </tr>
            </table> 
            <table border="0" cellpadding="0" cellspacing="1" bgcolor="#B4B6F4"> 
                <tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>발송문서명</td>
                    <td width="467" height="21" colspan="2" bgcolor="white">
					
					<form name="form" method="post" action=resortdoc1.php>
                    	&nbsp;휴가계획서<input type=hidden name=docname value="휴가계획서">
                    </td>
                </tr>
                <tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>문서작성자</td>
                    <td width="467" height="21" align="left" bgcolor="white"  colspan="2">
                         &nbsp;<?echo("$from_part
						 <input type='hidden' name='from_part' value='$from_part'>
						 ");
						 ?>
					</td>
				</tr>
				<tr>
				    <td width="91" height="21" align="center" bgcolor="#E5E7FF" class=mid><p>&nbsp;결재인선택</td>
                    <td height="21" align="left" bgcolor="white" class=mid><p>
                    	<select name='approval' style='font-family:굴림; font-size:13px;' onchange="reload_1(window.document.form.approval.options[selectedIndex].value);">
                        	<option selected value='0'>담당부서선택</option>
						<?
						
						$select1 = mysql_query("select comp_part from $table_name_1 group by comp_part", $con);

						if(!$select1)
						{
							 echo("<script>
								window.alert('DB select error in $table_name_1');
								history.go(-1);
								</script>
									");
						 }

						while($row1=mysql_fetch_array($select1))
						{
							echo("
							<option value='$row1[comp_part]'>$row1[comp_part]</option>
            					");
						}
						?>
                        </select>
                    </td>
					<?
					if($flag==0)
					{
						echo("
					 <td bgcolor='white' align=left class=mid width=267>
							</td>
							");
					}
					else if($flag==1)
					{
					?>
						<td bgcolor='white' align=left class=mid width=267>
						 <select name='approval2' style='font-family:굴림; font-size:13px;' onchange="reload_2(window.document.form.approval2.options[selectedIndex].value);">
												<option value='1'>결재인선택</option>

					<?		
						$sel1 = mysql_query("select id, name, comp_rank from $table_name_1 where comp_part='$part_name' order by name", $con);
						if(!$sel1)
						{
							 echo("<script>
								window.alert('DB select error in $table_name_1');
								history.go(-1);
								</script>
									");
						 }

												while($ro1=mysql_fetch_array($sel1))
												{
													echo("
													<option value='$ro1[id]'>$ro1[comp_rank]-$ro1[name]</option>
														");
													
						
												}

						echo("
						</select>
							<input type=hidden name=approve value='$approve'>
						</td>
						");
					}
					else if($flag==2 || $flag==3)
					{
						$sel2 = mysql_query("select name, comp_rank from $table_name_1 where id='$approve'", $con);
						if(!$sel2)
						{
							 echo("<script>
								window.alert('DB select error in $table_name_1');
								history.go(-1);
								</script>
									");
						 }
						$ro2=mysql_fetch_array($sel2);
						echo("
						<td bgcolor='white' align=left class=mid width=267>
						<select name='approve'>
						<option value='$approve' selected>$ro2[comp_rank]-$ro2[name]</option>
						</select>
						</td>
							");
					}
					?>
					</tr>
					<tr>

                    <td width="91" height="21" align="center" bgcolor="#E5E7FF" class=mid><p>검토인선택</td>
					<?
					if($flag==0 || $flag==1)
					{
						echo("
						<td height='21' align='left' bgcolor='white' class=mid><p>
						</td>
	                    <td height='21' align='left' bgcolor='white' class=mid><p>
						</td>
							");
					}
					else if($flag==2)
					{
						?>
						<td height="21" align="left" bgcolor="white" class=mid><p>
                    	<select name='viewers' style='font-family:굴림; font-size:13px;' onchange="reload_3(window.document.form.viewers.options[selectedIndex].value, '<?echo$approve?>');">
                        	<option selected value='0'>담당부서선택</option>
						<?
						
						$select2 = mysql_query("select comp_part from $table_name_1 group by comp_part", $con);

						if(!$select2)
						{
							 echo("<script>
								window.alert('DB select error in $table_name_1');
								history.go(-1);
								</script>
									");
						 }

						while($row2=mysql_fetch_array($select2))
						{
							echo("
							<option value='$row2[comp_part]'>$row2[comp_part]</option>
            					");
						}
						echo("
                        </select>
						</td>
						<td bgcolor='white' align=left class=mid width=267>
						</td>
							");
					}
					else if($flag==3)
					{
						?>
						<td height="21" align="left" bgcolor="white" class=mid><p>
                    	<select name='viewers' style='font-family:굴림; font-size:13px;' onchange="reload_3(window.document.form.viewers.options[selectedIndex].value, '<?echo$approve?>');">
                        	<option selected value='0'>담당부서선택</option>
						<?
						
						$select2 = mysql_query("select comp_part from $table_name_1 group by comp_part", $con);

						if(!$select2)
						{
							 echo("<script>
								window.alert('DB select error in $table_name_1');
								history.go(-1);
								</script>
									");
						 }

						while($row2=mysql_fetch_array($select2))
						{
							echo("
							<option value='$row2[comp_part]'>$row2[comp_part]</option>
            					");
						}
						echo("
                        </select>
						</td>

						<td height='21' align='left' bgcolor='white' class=mid><p>
                    		<select name='viewer' style='font-family:굴림; font-size:13px;'>
                        	<option selected value='1'>검토인선택</option>
                        	<option value='2'>검토인없음</option>
							");
						$s = mysql_query("select id, name, comp_rank from $table_name_1 where comp_part='$part_name2' order by name", $con);
						if(!$s)
						{
							 echo("<script>
								window.alert('DB select error in $table_name_1');
								history.go(-1);
								</script>
									");
						 }
						while($r=mysql_fetch_array($s))
						{
								echo("
									<option value=$r[id]>$r[comp_rank]-$r[name]</option>
								");
						}
					}
						?>
                        	
                        </select>
                    </td>
				</tr>
                <tr>
                    <td width="91" height="27" align="center" bgcolor="#E5E7FF"><p>메모작성</td>
                    <td width="89" height="27" colspan="5" bgcolor="white" colspan="4"><p><textarea
                         name="memo" rows="3" cols="63" style="font-family:굴림; font-size:13px;"></textarea></td>
                </tr>
            </table>
            <br>
            
            
            <!----- 휴가 계획서 본문 --->
            <table border="0" cellpadding="0" cellspacing="0" bgcolor="#B4B6F4">
                <tr>
                    <td width="162" height="30"><p><font color="white"><b>&nbsp;휴가계획서</b></font></td>
                </tr>
            </table> 
            <table border="0" cellpadding="0" cellspacing="1" bgcolor="#B4B6F4"> 
                <tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>휴가기간</td>
                    <td width="469" height="21" colspan="5" bgcolor="white">
                    	&nbsp;<input size=15 type=text name=fromdate style="font-family:굴림; font-size:13px;border: none; border-bottom: 3px navy double;text-align: center;"> 부터 <input size=15 type=text name=todate style="font-family:굴림; font-size:13px;border: none; border-bottom: 3px navy double;text-align: center;"> 까지
                    </td>
                </tr>
                <tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>휴가일수</td>
                    <td width="469" height="21" colspan="5" bgcolor="white">
                    	&nbsp;<input size=4 type=text name=totalsleep style="font-family:굴림; font-size:13px;border: none; border-bottom: 3px navy double; text-align: center;"> 박 <input size=4 type=text name=totalday style="font-family:굴림; font-size:13px;border: none; border-bottom: 3px navy double;text-align: center;"> 일
                    </td>
                </tr>
                <tr>
                    <td width="91" height="27" align="center" bgcolor="#E5E7FF"><p>휴가사유</td>
                    <td width="89" height="27" colspan="5" bgcolor="white"><p><textarea
                         name="caution" rows="5" cols="63" style="font-family:굴림; font-size:13px;"></textarea></td>
                </tr>
                <tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>휴가종류</td>
                    <td width="469" height="21" colspan="5" bgcolor="white">
                    	&nbsp;<input type="radio" name="context" value="월차" checked style="font-family:굴림; font-size:13px;">월차 
                        &nbsp;<input type="radio" name="context" value="년차" style="font-family:굴림; font-size:13px;">년차
                        &nbsp;<input type="radio" name="context" value="정기휴가" style="font-family:굴림; font-size:13px;">정기휴가
                        &nbsp;<input type="radio" name="context" value="생리휴가" style="font-family:굴림; font-size:13px;">생리휴가
                        &nbsp;<input type="radio" name="context" value="예비군훈련" style="font-family:굴림; font-size:13px;">예비군훈련
                    </td>
                </tr>
            </table>
            <br>
            <center>
            <a href="" onClick="CheckValues(); return false;">다음 ▶</a><br>&nbsp;<br></center>
			<input type=hidden name=flag value='<?echo$flag?>'>
			<input type=hidden name=approve value='<?echo$approve?>'>
			</form>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560" align="center" valign="top"><p>
        [<a href=<?echo("$main_frame");?>>처음으로</a>]
	[<a href='javascript:history.go(-1);' name=button>뒤로</a>]
<br><hr size="1" width="90%">
            </td>
    </tr>
</table>
            
            
     </td></tr>
      
</table>
</body>
</html>