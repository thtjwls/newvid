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

if($flag!=1)
{
	$fp = fopen("global.cgi","w");
	flock($fp,2);	
		
	$data = $docname;
	fwrite($fp,$data);
	fclose($fp);
}
$fr = fopen("global.cgi","r");
$data=fread($fr,filesize("global.cgi"));
$docname=$data;
fclose($fr);

?>
<html>
<head>
<title>�����ۼ� �� �߼�</title>
<SCRIPT LANGUAGE="JavaScript">
<!--
function CheckSpaces(strValue) 
{
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

      	if(confirm("�����ܰ�� �Ѿ� ���ðڽ��ϱ�?")) 
		{
		document.form.submit();
		}
	return;
}

function reload_1(part_name)
{
	var go='pmakedoc.php?flag=1&part_name='+part_name;
		location.replace(go);
}
function reload_2(approve_id, docname)
{
	var go='pmakedoc.php?flag=2&approve='+approve_id+'&docname='+docname;
		location.replace(go);
}
function reload_3(part_name2, approve, docname)
{
	var go='pmakedoc.php?flag=3&part_name2='+part_name2+'&approve='+approve+'&docname='+docname;
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
        <td><table border="0" cellpadding="0" cellspacing="0" bgcolor="#8295C0">
                <tr>
                    <td width="162" height="30"><p><font color="white"><b>&nbsp;�����ۼ����� 
                        �����</b></font></td>
                </tr>
            </table> 
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="600" height="71">
                    	<table border="0" cellpadding="4" cellspacing="1" bgcolor="#8295C0"><tr><td bgcolor=white>
                    	<img src="appoint1.gif" align="left" width="64" height="64" border="0"> 
                        �������� �ʴ� �������� �⺻������ �Բ� �ۼ��Ͽ� 
                        Attach ���Ѽ� ����߼��� �ϴ� ����Դϴ�.  
                        ����ũ�μ���Ʈ���� IE(Internet Explore)�� �⺻���� �Ͽ����Ƿ� 
                        �����ϸ� Word�� Power Point �� Excel�� ����Ͽ� �߼��ϴ� 
                        ���� ȭ�鿡�� ��ٷ� Viewing�� �����ϰ� ����ϴ�. �̿� 
                        ���� ������ <a href="mailto:<?echo$admin_mail?>"><?echo$admin_mail?></a>���� 
                        �����ֽñ� �ٶ��ϴ�.
                        </td></tr></table>
                    </td>
                </tr>
            </table>
            &nbsp;<br> 
            <table border="0" cellpadding="0" cellspacing="1" bgcolor="#B4B6F4" width="600">
                <tr>
                    <td width="600" height="28"><p><font color="white"><b>�����ۼ����� 
                        �����</b></font></td>
                </tr>
					<form name="form" method="post" action=pmakedoc2.php >
                <tr>
                    <td width="120" height="21" align="center" bgcolor="#E5E7FF"><p>�߼۹�����</td>
                    <td width="480" height="21" align="left" bgcolor="white" colspan="2">
                         &nbsp;<?echo$docname;?><input type=hidden name=docname value='<?echo$docname;?>'>
					</td>
				</tr>
                <tr>
                    <td width="120" height="21" align="center" bgcolor="#E5E7FF"><p>�����ۼ���</td>
                    <td width="480" height="21" align="left" bgcolor="white" colspan="2">
                         &nbsp;<?echo("$from_part
						 <input type='hidden' name='from_part' value='$from_part'>
						 ");?>
					</td>
				</tr>
				<tr>
				    <td width="91" height="21" align="center" bgcolor="#E5E7FF" class=mid><p>&nbsp;�����μ���</td>
                    <td height="21" align="left" bgcolor="white" class=mid><p>
                    	<select name='approval' style='font-family:����; font-size:13px;' onchange="reload_1(window.document.form.approval.options[selectedIndex].value);">
                        	<option selected value='0'>���μ�����</option>
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
						 <select name='approval2' style='font-family:����; font-size:13px;' onchange="reload_2(window.document.form.approval2.options[selectedIndex].value, '<?echo$docname?>');">
												<option value='1'>�����μ���</option>

					<?		
						$sel1 = mysql_query("select id, name, comp_rank from $table_name_1 where comp_part='$part_name' order by comp_rank", $con);
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

                    <td width="91" height="21" align="center" bgcolor="#E5E7FF" class=mid><p>�����μ���</td>
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
                    	<select name='viewers' style='font-family:����; font-size:13px;' onchange="reload_3(window.document.form.viewers.options[selectedIndex].value, '<?echo$approve?>', '<?echo$docname?>');">
                        	<option selected value='0'>���μ�����</option>
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
                    	<select name='viewers' style='font-family:����; font-size:13px;' onchange="reload_3(window.document.form.viewers.options[selectedIndex].value, '<?echo$approve?>', '<?echo$docname?>');">
                        	<option selected value='0'>���μ�����</option>
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
                    		<select name='viewer' style='font-family:����; font-size:13px;'>
                        	<option selected value='1'>�����μ���</option>
                        	<option value='2'>�����ξ���</option>
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
                    <td width="120" height="27" align="center" bgcolor="#E5E7FF"><p>�޸��ۼ�</td>
                    <td width="150" height="27" colspan="4" bgcolor="white"><p><textarea
                         name="memo" rows="5" cols="63" style="font-family:����; font-size:13px;"></textarea></td>
                </tr>
            </table>
            <br>
            <center>
            <a href="" onClick="CheckValues(); return false;">���� ��</a><br></center>
			<input type=hidden name=flag value='<?echo$flag?>'>
			<input type=hidden name=approve value='<?echo$approve?>'>
			<input type=hidden name=approve value='<?echo$approve?>'>
			</form>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560" align="center" valign="top"><p>
        [<a href=<?echo("$main_frame");?>>ó������</a>]
	[<a href="javascript:history.go(-1);" name=button>�ڷ�</a>]
<br><hr size="1" width="90%">
            </td>
    </tr>
</table>
            </td>
    </tr>
</table>
</body>
</html>