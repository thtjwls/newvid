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
		window.alert('���μ��� �������ֽñ� �ٶ��ϴ�!');
		history.go(-1);
		</script>
			");
}
if($approve == 1)
{
	echo("
		<script>
		window.alert('�������� �������ֽñ� �ٶ��ϴ�!');
		history.go(-1);
		</script>
			");
}
if($viewer == 1) 
{
	echo("
		<script>
		window.alert('�������� ������ �ֽñ� �ٶ��ϴ�.�������� �����ô� <�����ξ���>�� �����ϼ���!');
		history.go(-1);
		</script>
			");
} 

if($fromdate=="")
{
	echo("
		<script>
		window.alert('�ް������� �Է��� �����ϴ�!');
		history.go(-1);
		</script>
			");
}
if($todate=="")
{
	echo("
		<script>
		window.alert('�ް� ������ ��¥�� �����ϴ�!');
		history.go(-1);
		</script>
			");
}
if($totalsleep=="")
{
	echo("
		<script>
		window.alert('�����ϼ��� �����ϴ�!');
		history.go(-1);
		</script>
			");
}
if($totalday=="")
{
	echo("
		<script>
		window.alert('�ް��ϼ��� �����ϴ�!');
		history.go(-1);
		</script>
			");
}
if($caution=="")
{
	echo("
		<script>
		window.alert('�ް������� �ݵ�� �Է��Ͻñ� �ٶ��ϴ�!');
		history.go(-1);
		</script>
			");
}
if($login==$approve)
{
	echo("
		<script>
		window.alert('�ڽſ��� ���縦 ��û�Ѵٴ°��� ���� �ʵ˴ϴ�!');
		history.go(-1);
		</script>
			");
}
if($login==$viewer)
{
	echo("
		<script>
		window.alert('��� �ڽſ��� ���並 ��û�Ҽ� �ֽ��ϱ�?');
		history.go(-1);
		</script>
			");
}
if($approve==$viewer)
{
	echo("
		<script>
		window.alert('�����ΰ� �������� ���� �� �ְڽ��ϱ�?');
		history.go(-1);
		</script>
			");
}

$s1=mysql_query("select level from $table_name_1 where id='$approve'", $con);
if(!$s1)
{
	echo("
		<script>
		window.alert('DB select error in member(resortdoc1.php)!');
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
		window.alert('DB select error in member(resortdoc1.php)!');
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
		window.alert('�������� �ٽ� �����Ͻʽÿ�!(��ź��� ������ ���ų� �����ϴ�)');
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
			window.alert('�������� �ٽ� �����Ͻʽÿ�!(��ź��� ������ ���ų� �����ϴ�)');
			history.go(-1);
			</script>
				");
	}
	if($r1[level] <= $r2[level])
	{
		echo("
			<script>
			window.alert('�������� ������ �����κ��� ���ų� ���� �� �����ϴ�!');
			history.go(-1);
			</script>
				");
	}
}
?>

<html>
<head>
<title>�����ۼ� �� �߼�</title>
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
	if(confirm("��⹮���� ���������� �����ϰڽ��ϱ�?")) 
				document.form.submit();
	return;
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
                    	<img src="appoint1.gif" align="left" width="64" height="64" border="0">��ſ� �ް���ȹ�� �Ǳ� �ٶ��ϴ�.
                    	�ް� ��ȹ�� �ۼ��� �Ⱓ�� ��Ȯ�� ����� �ֽñ� �ٶ��ϴ�. �Ⱓ�� ��Ȯ���� �����ô� �ݼ��� �Ǵ°��� Ȯ���ϸ� 
                    	�׷��� �Ǿ����� ��ȹ�� ������ ������ ��찡 �����ϴ�. �� �׸� �Է��� ��Ȯ�� �� �ֽñ� �ٶ��ϴ�.
                        </td></tr></table>
                    </td>
                </tr>
            </table>
            &nbsp;<br>
        
            
            
            
            <table border="0" cellpadding="0" cellspacing="0" bgcolor="#B4B6F4">
                <tr>
                    <td width="162" height="30"><p><font color="white"><b>&nbsp;�ް���ȹ�� Cover</b></font></td>
                </tr>
            </table> 
            <table border="0" cellpadding="0" cellspacing="1" bgcolor="#B4B6F4"> 
                <tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>�߼۹�����</td>
                    <td width="469" height="21" bgcolor="white">
					
					<form name="form" method="post" action=resortsave.php>
					<?
						$sel1=mysql_query("select * from $table_name_1 where id='$approve'", $con);
						if(!$sel1)
						{
							echo("
								<script>
								window.alert('DB select error in member(resortsave.php)!');
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
									window.alert('DB select error in member(resortsave.php)!');
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
							$viewer="�����ξ���";
							$to_id=$row1[id];
						}
					?>
                    	&nbsp;<?echo$docname;?><input type=hidden name=docname value="<?echo$docname;?>">
                    </td>
                </tr>
                <tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>�����ۼ���</td>
                    <td width="469" height="21" align="left" bgcolor="white">
                         &nbsp;<?echo$from_part;?><input type=hidden name=from_part value='<?echo$from_part;?>'>
				</tr>
				<tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>&nbsp;������</td>
                    <td width="469" height="21" align="left" bgcolor="white"><p>
                    	<? 
							echo("
                    	&nbsp;$approve<input type=hidden name=approve value='$approve'>
								");
						?>
                    </td>
					</tr>
					<tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>������</td>
                    <td width="469" height="21" align="left" bgcolor="white"><p>
						<?
							echo("
                    		&nbsp;$viewer<input type=hidden name=viewer value='$viewer'>
								");
						?>
                  		
                    </td>

                </tr>
                <tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>�ۼ���</td>
                    <td width="469" height="21" colspan="5" bgcolor="white">
                    	&nbsp;<? $sdate=date("Y.m.d(h:i:s)"); echo$sdate;?>
						           <input type=hidden name=sdate value=<?echo$sdate;?>>

                    </td>
                </tr>
                <tr>
                    <td width="91" height="27" align="center" bgcolor="#E5E7FF"><p>�޸��ۼ�</td>
                    <td width="469" height="27" colspan="5" bgcolor="white"><p>
                    	<table border="0" cellpadding="7" cellspacing="0" width=100%><tr><td>
                    	<?echo$memo?><input type=hidden name=memo value="<?echo$memo?>">
                    	</td></tr></table>
                    </td>
                </tr>
            </table>
            <br>
            
            
            <!----- �ް� ��ȹ�� ���� --->
            <table border="0" cellpadding="0" cellspacing="0" bgcolor="#B4B6F4">
                <tr>
                    <td width="162" height="30"><p><font color="white"><b>&nbsp;�ް���ȹ��</b></font></td>
                </tr>
            </table> 
            <table border="0" cellpadding="0" cellspacing="1" bgcolor="#B4B6F4"> 
                <tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>�ް��Ⱓ</td>
                    <td width="469" height="21" colspan="3" bgcolor="white">
                    	&nbsp;<?echo$fromdate;?><input type=hidden name=fromdate value="<?echo$fromdate;?>">����
                    	&nbsp;<?echo$todate;?><input type=hidden name=todate value="<?echo$todate;?>">����
                    </td>
                </tr>
                <tr>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>�ް��ϼ�</td>
                    <td width="189" height="21" bgcolor="white">
                    	&nbsp;<?echo$totalsleep;?><input type=hidden name=totalsleep value="<?echo$totalsleep;?>">��
                    	&nbsp;<?echo$totalday;?><input type=hidden name=totalday value="<?echo$totalday;?>">��
                    </td>
                    <td width="91" height="21" align="center" bgcolor="#E5E7FF"><p>�ް�����</td>
                    <td width="189" height="21" bgcolor="white">
                    	&nbsp;<?echo$context;?><input type=hidden name=context value="<?echo$context;?>">
                    </td>
                </tr>
                <tr>
                    <td width="91" height="27" align="center" bgcolor="#E5E7FF"><p>�ް�����</td>
                    <td width="469" height="27" colspan="3" bgcolor="white"><p>
                    	<table border="0" cellpadding="7" cellspacing="0" width=100%><tr><td>
                    	<?echo$caution;?><input type=hidden name=caution value="<?echo$caution;?>">
                    	</td></tr></table>
                    </td>
                </tr>
                
            </table>
            	<br>
            	<center>
            	<a href="" onClick="CheckValues(); return false;">������� ��</a><br>&nbsp;<br></center>
				<input type=hidden name=to_id value='<?echo$to_id;?>'>
            </form>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560" align="center" valign="top"><p>
        [<a href=<?echo("$main_frame");?>>ó������</a>]
	[<a href='javascript:history.go(-1);' name=button>�ڷ�</a>]
<br><hr size="1" width="90%">
            </td>
    </tr>
</table>
            
            
     </td></tr>
      
</table>
</body>
</html>