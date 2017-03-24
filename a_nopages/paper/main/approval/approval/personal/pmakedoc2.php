<?
session_cache_limiter("");
session_start();

include "config.php";
include "connection.php";

$login=$login_id;
$user=$user_name;
$part=$comp_part;
$rank=$comp_rank;
$level=$comp_level;

if($flag==0)
{
	echo("
		<script>
		window.alert('담당부서를 선택해주시기 바랍니다!');
		history.go(-1);
		</script>
			");
}

if($approve==1)
{
	echo("
		<script>
		window.alert('결재인을 선택해주시기 바랍니다!');
		history.go(-1);
		</script>
			");
}

if($viewer==1) 
{
	echo("
		<script>
		window.alert('검토인를 선택해 주시기 바랍니다.검토인이 없을시는 <검토인없음>을 선택하세요!');
		history.go(-1);
		</script>
			");
} 
if($login==$approve)
{
	echo("
		<script>
		window.alert('자신에게 결재를 요청한다는것은 말도 않됩니다!');
		history.go(-1);
		</script>
			");
}
if($login==$viewer)
{
	echo("
		<script>
		window.alert('어떻게 자신에게 검토를 요청할수 있습니까?');
		history.go(-1);
		</script>
			");
}
if($approve==$viewer)
{
	echo("
		<script>
		window.alert('결재인과 검토인이 같을 수 있겠습니까?');
		history.go(-1);
		</script>
			");
}
$s1=mysql_query("select level from $table_name_1 where id='$approve'", $con);
if(!$s1)
{
	echo("
		<script>
		window.alert('DB select error in member(pmakedoc2.php)!');
		history.go(-1);
		</script>
		");
	exit;
}
$r1=mysql_fetch_array($s1);

$s2=mysql_query("select level from $table_name_1 where id='$viewer'", $con);
if(!$s2)
{
	echo("
		<script>
		window.alert('DB select error in member(pmakedoc2.php)!');
		history.go(-1);
		</script>
		");
	exit;
}
$r2=mysql_fetch_array($s2);

if($level >= $r1[level])
{
	echo("
		<script>
		window.alert('결재인을 다시 선택하십시오!(당신보다 직위가 같거나 낮습니다)');
		history.go(-1);
		</script>
			");
}
if($viewer!=2)
{
	if($level >= $r2[level])
	{
		echo("
			<script>
			window.alert('검토인을 다시 선택하십시오!(당신보다 직위가 같거나 낮습니다)');
			history.go(-1);
			</script>
				");
	}
	if($r1[level] <= $r2[level])
	{
		echo("
			<script>
			window.alert('검토인의 직위가 결재인보다 같거나 높을 수 없습니다!');
			history.go(-1);
			</script>
				");
	}
}

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
	var strFile=document.form.personalfile.value;

	if (strFile == "") 
	{
		alert("결재할 실제문서를 선택하지 않았습니다!\n문서를 선택해 주시기 바랍니다.");
		document.form.personalfile.focus();
	} 
	else 
	{
		if(confirm("상기문서의 결재절차를 수행하겠습니까?")) 
		{
			document.form.submit();
		}
	}
	return;
}
//-->
</SCRIPT>
<link rel="stylesheet" type="text/css" href="../../allstyle.css">
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">

&nbsp;<br> 
<table border="0" cellpadding="0" cellspacing="0" width=561>
    <tr>
        <td width="15">&nbsp;</td>
        <td><table border="0" cellpadding="0" cellspacing="0" bgcolor="#8295C0">
                <tr>
                    <td width="162" height="33"><p><font color="white"><b>&nbsp;개인작성문서 
                        만들기</b></font></td>
                </tr>
            </table> 
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                <td width="560" height="71">
                	<table border="0" cellpadding="4" cellspacing="1" bgcolor="#8295C0"><tr><td bgcolor=white>
                         <img src='appoint2.gif'
                         align='eft' width='64' height='64' border='0'><font color=red>실제로 검토할 문서를 선택해 주시기 바랍니다.</font> 
                         선택된 문서는 결재기간중에 관련자들만은 자유로운 관람이 가능합니다.
					</td></tr></table>
                </td>
                </tr>
            </table>
            &nbsp;<br> 
            <table border="0" cellpadding="0" cellspacing="1" bgcolor="#B4B6F4">
                <tr>
                    <td width="561" height="28"><p><font color="white"><b>개인작성문서 
                        만들기</b></font></td>
                </tr>
               		<form name='form' ENCTYPE='MULTIPART/FORM-DATA' method='POST' action='psavedoc.php'>
					<?
						$sel1=mysql_query("select * from $table_name_1 where id='$approve'", $con);
						if(!$sel1)
						{
							echo("
								<script>
								window.alert('DB select error in member(pmakedoc2.php)!');
								history.go(-1);
								</script>
								");
							exit;
						}
						$row1=mysql_fetch_array($sel1);
						$approve=$row1[name]."(".$row1[comp_part]."-".$row1[comp_rank].")";

						if($viewer!=2)
						{
							$sel2=mysql_query("select * from $table_name_1 where id='$viewer'", $con);
							if(!$sel2)
							{
								echo("
									<script>
									window.alert('DB select error in approve(resortsave.php)!');
									history.go(-1);
									</script>
									");
								exit;
							}
							$row2=mysql_fetch_array($sel2);
							$viewer=$row2[name]."(".$row2[comp_part]."-".$row2[comp_rank].")";
							$to_id=$row2[id];
						}
						else
						{
							$viewer="검토인없음";
							$to_id=$row1[id];
						}
					?>

                <tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>발송문서명</td>
                    <td width="470" height="21" align="left" bgcolor="white">
                         &nbsp;<?echo$docname;?><input type=hidden name=docname value=<?echo$docname;?>>
					</td>
				</tr>
                <tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>문서작성자</td>
                    <td width="470" height="21" align="left" bgcolor="white">
                         &nbsp;<?echo$from_part;?><input type=hidden name=from_part value='<?echo$from_part;?>'>
					</td>
				</tr>
				<tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>&nbsp;결재인</td>
                    <td width="470" height="21" align="left" bgcolor="white"><p>
                    	<? 
							echo("
                    	&nbsp;$approve<input type=hidden name=approve value='$approve'>
								");
						?>
                    </td>
				</tr>
				<tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>검토인</td>
                    <td width="470" height="21" align="left" bgcolor="white"><p>
						<?
							echo("
                    		&nbsp;$viewer<input type=hidden name=viewer value='$viewer'>
								");
						?>
                    </td>

                </tr>
                <tr>
                    <td width='91' height='21' align='center' bgcolor='#E5E7FF'><p><font color=red>문서선택</font></td>
                    <td height='21' colspan='5' bgcolor='white'><p>
                    &nbsp;<input type='file' name='personalfile' size='40' style='font-family:굴림; font-size:13px;'>
					<br>&nbsp;<font color=blue>문서명은 영문으로 중간에 공백이 없도록 해주시기 바랍니다.</font></td>
                </tr>
                <tr>
                    <td width='91' height='21' align='center' bgcolor='#E5E7FF'><p>작성일</td>
                    <td height='21' colspan='5' bgcolor='white'><p>
                    &nbsp;<? $sdate=date("Y.m.d(h:i:s)"); echo$sdate;?><input type=hidden name=sdate value='<?echo$sdate;?>'></td>
                </tr>
                <tr>
                    <td width="91" height="27" align="center" bgcolor="#E5E7FF"><p>메모작성</td>
                    <td height="27" colspan="5" bgcolor="white" align=center><p>
                    	<table border="0" cellpadding="7" cellspacing="0" width=100%><tr><td>
                    	<?echo$memo?><input type=hidden name=memo value="<?echo$memo?>">
                    	</td></tr></table>
                   	
                    </td>
                </tr>
            </table>
            	<br>
            	<center>
            	<a href='' onClick='CheckValues(); return false;'>결재시작 ▼</a><br>&nbsp;<br></center>
				<input type=hidden name=to_id value='<?echo$to_id;?>'>
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
            </td>
    </tr>
</table>
</body>
</html>