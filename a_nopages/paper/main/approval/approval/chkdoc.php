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
<script language="JavaScript">
<!--
// �̹��� ��ȭ
image_buffer = new Array;
image_buffer[0] = new Array;
image_buffer[1] = new Array;
for(i = 0; i < 2; i++)
	for(j = 0; j < 3; j++)
		image_buffer[i][j] = new Image;
image_buffer[0][0].src = "button01.gif";
image_buffer[1][0].src = "button01j.gif";
image_buffer[0][1].src = "button02.gif";
image_buffer[1][1].src = "button02j.gif";
image_buffer[0][2].src = "button04.gif";
image_buffer[1][2].src = "button04j.gif";


function change_image(obj, type, toggle)
{
	obj.src = image_buffer[toggle][type].src;
	return true;
}

function onclick_accept(form)
{

	form.submit();	 
	return true;
}
function reload_1(part_name, index, etc_memo)
{
	var go='chkdoc.php?sign=1&part_name='+part_name+'&index='+index+'&etc_memo='+etc_memo;
		location.replace(go);
}



-->
</SCRIPT>

</head>

<body link="#3366cc" alink="#3366cc"> 
<p align="left">
<div align="left">

<table border="0" cellpadding="0" cellspacing="0" width=900>
<tr>
	<td width=10 >&nbsp;</td>
	<td align=left>
	
	
	
    		<table border=0 cellpadding="0" cellspacing="0" >
    		<!------- ������ ���� ��� --------->
    		<tr>
        
        		<td width="500"  valign="top" align=center>
        		<!---- ������ ���÷��� �ϰ� �޸� �Է� �޴´�. -->
        		<? $select = mysql_query("SELECT * FROM $table_name_2 WHERE seq_num=$index", $con);
        			if(!$select)
					{
						echo("
							<script>
							window.alert('DB select error in approve(chkdoc.php)!');
							history.go(-1);
							</script>
							");
						exit;
					}
					$row=mysql_fetch_array($select)
				?>
        			<table border=0 cellpadding="0" cellspacing="0"><tr>
        			<td align=left><img src=title11.gif></td>
        			</tr>
        			<? IF($sign == 1)
					{
					?>
        			<!-- ������� -->
        			<tr>
        			<td>
        				�Ʒ��� ���� ������ ��������� �ϼ̽��ϴ�. ���ε� ������ ��������� �ϽǶ� ������ �޸� �����ֽø� ���������ڰ�
        				������ ������ �����Ҷ� ���� �Ǹ�, ���� ���μ����� ������ �Ǿ� ����ȿ���� ������ �ü� �ֽ��ϴ�. ����, �ʿ� �����ÿ���
        				�ۼ����� �����ŵ� �˴ϴ�. <br> <br>
						
					<form name=form1 method=post action=actionchk.php>
        				<table border=0 cellpadding="0" cellspacing="1" bgcolor=EFA000 width=500>
        				<tr height=20><td style="color:white;" align=center>Ȯ�μ���</td><td bgcolor=white style="color:blue;">&nbsp;���並 �����մϴ�!</td></tr>
        				<tr height=20><td style="color:white;" align=center>������</td><td bgcolor=white>&nbsp;<?echo$row[docname]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>�ۼ���</td><td bgcolor=white>&nbsp;<?echo$row[from_part]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>�ۼ���</td><td bgcolor=white>&nbsp;<?echo$row[sdate]?></td></tr>
        				</table>
        				<input type=hidden name=sign value=1>
        				<input type=hidden name=index value=<?echo$index?>>

        			</td>
        			</tr>
        			<tr>
        			<td>
							<br>
        				���� �� �ٸ� �����ο��� �� ���� ������ �Ƿ��Ͻ� ��쿡 �Ʒ��� ����Ʈ���� �����Ͻñ� �ٶ��ϴ�. ���õ� �������� ���� �ÿ��� �ڵ����� �����ο��� ���۵˴ϴ�. <br> <br>
        				<table border=0 cellpadding="0" cellspacing="1" bgcolor=EFA000>
        				<tr height=20>
						<td width="91" height="21" align="center" bgcolor="#E5E7FF" class=mid><p>�����μ���</td>

						<td height="21" align="left" bgcolor="white" class=mid><p>
                    	<select name='viewers' style='font-family:����; font-size:13px;' onchange="reload_1(window.document.form1.viewers.options[selectedIndex].value, '<?echo$index?>');">
                        	<option selected value='0'>���μ�����</option>
						<?
						
						$select = mysql_query("select comp_part from $table_name_1 group by comp_part", $con);

						if(!$select)
						{
							 echo("<script>
								window.alert('DB select error in $table_name_1');
								history.go(-1);
								</script>
									");
						 }

						while($row=mysql_fetch_array($select))
						{
							echo("
							<option value='$row[comp_part]'>$row[comp_part]</option>
            					");
						}
						echo("
                        </select>
						</td>

						<td height='21' align='left' bgcolor='white' class=mid><p>
                    		<select name='to_id' style='font-family:����; font-size:13px;'>
                        	<option selected value='1'>�����μ���</option>
							");
						$s = mysql_query("select id, name, comp_rank from $table_name_1 where comp_part='$part_name' order by name", $con);
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
						?>
                        	
                        </select>
                    </td>

                    </tr>
       				</table>
						<br>
        				<table border=0 cellpadding="0" cellspacing="1" bgcolor=EFA000 width=500 align=left>
        				<tr><td style="color:white;" align=center>�޸��ۼ�</td><td bgcolor=white>
        				<textarea name="etc_memo" rows="5" cols="60" style="font-family:����; font-size:13px;"></textarea></td></tr>
							</table>

        			<!-- ������� -->
        			<? 
					}
					ELSE
					{
					?>
        			<!-- ����ݷ� -->
        			<tr>
        			<td>
        				�Ʒ��� ���� ������ ����ݷ��� �ϼ̽��ϴ�. �������� �޸� ��� �����ø� �ۼ��ڰ� ���Ӱ� �ۼ��Ҷ�
        				������ �ǹǷ� �޸� �ۼ� �Ͻô� ���� ������ ȿ���� �ֽǼ� �ֽ��ϴ�. �ݷ������� �ݵ�� �����Ͻñ� �ٶ��ϴ�. <br> <br><form name=form1 method=post action=actionchk.php>
        				<table border=0 cellpadding="0" cellspacing="1" bgcolor=EFA000>
        				<tr height=20><td style="color:white;" align=center>Ȯ�μ���</td><td bgcolor=white style="color:red;">&nbsp;������ �ݷ��մϴ�!</td></tr>
        				<tr height=20><td style="color:white;" align=center>������</td><td bgcolor=white>&nbsp;<?echo$row[docname]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>�ۼ���</td><td bgcolor=white>&nbsp;<?echo$row[from_part]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>�ۼ���</td><td bgcolor=white>&nbsp;<?echo$row[sdate]?></td></tr>
        				<tr><td style="color:white;" align=center>�޸��ۼ�</td><td bgcolor=white>
        				<textarea name="etc_memo2" rows="5" cols="60" style="font-family:����; font-size:13px;"></textarea></td></tr>
        				</table>
        				<input type=hidden name=sign value=0>
        				<input type=hidden name=index value=<?echo$index?>>
        			</td>
        			</tr>
        			<!-- ����ݷ� -->
        			<?}?>

        			</table>  
        			
        			<br>
        			
        			<center>
        			<?IF($sign == 1)
					{
					?>
        			<a href="javascript:onclick_accept(document.form1)" onMouseOver="change_image(img_button01, 0, 1);" onMouseOut="change_image(img_button01, 0, 0);"><img name=img_button01 src=button01.gif border=0></a>
        			&nbsp;<a href="" onclick="form1.reset(); return false;" onMouseOver="change_image(img_button02, 1, 1);" onMouseOut="change_image(img_button02, 1, 0);"><img name=img_button02 src=button02.gif border=0></a>
        			<?
					}
					ELSE
					{
					?>
        			<a href="javascript:onclick_accept(document.form1)" onMouseOver="change_image(img_button03, 2, 1);" onMouseOut="change_image(img_button03, 2, 0);"><img name=img_button03 src=button04.gif border=0></a>
        			&nbsp;<a href="" onclick="form1.reset(); return false;" onMouseOver="change_image(img_button02, 1, 1);" onMouseOut="change_image(img_button02, 1, 0);"><img name=img_button02 src=button02.gif border=0></a>
        			<?}?>
        			</center>
        			</form>
        
        		</td>
    		</tr>
	</table>
	<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560" align="center" valign="top"><p>
        [<a href=<?echo("$main_frame");?>>ó������</a>]
	[<a href='javascript:history.go(-1);' name=button>�ڷ�</a>]
<br><hr size="1" width="70%">
            </td>
    </tr>
</table>

	</td>
</tr>
</table>
</div>

</body>
</html>