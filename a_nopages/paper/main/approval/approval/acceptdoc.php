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
image_buffer[0][0].src = "button03.gif";
image_buffer[1][0].src = "button03j.gif";
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
        			<td align=left><img src=title22.gif></td>
        			</tr>
        			<? IF($sign == 1)
					{
						?>
        			<!-- ������� -->
        			<tr>
        			<td>
        				�Ʒ��� ������ �������� �ϼ̽��ϴ�. �������ε� ������ ���������Կ� �ڵ����� ����˴ϴ�.
        				���������Կ� ����Ǵ� ������ ����� ��ο��� ������ �ǹǷ� �ǵ����̸� �޸� �־��ֽô� ����
        				������ �����ϴ� �е鿢 ������ �ټ��� �ֽ��ϴ�. �޸� �ۼ����� �����ŵ� �����մϴ�.
        				<br> <br>
						
					<form name=form1 method=post action=actionaccept.php>
        				<table border=0 cellpadding="0" cellspacing="1" bgcolor=60B030>
        				<tr height=20><td style="color:white;" align=center>Ȯ�μ���</td><td bgcolor=white style="color:blue;">&nbsp;���������մϴ�!</td></tr>
        				<tr height=20><td style="color:white;" align=center>������</td><td bgcolor=white>&nbsp;<?echo$row[docname]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>�ۼ���</td><td bgcolor=white>&nbsp;<?echo$row[from_part]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>�ۼ���</td><td bgcolor=white>&nbsp;<?echo$row[sdate]?></td></tr>
        				<tr><td style="color:white;" align=center>�޸��ۼ�</td><td bgcolor=white>
        				<textarea name="approvememo" rows="5" cols="60" style="font-family:����; font-size:13px;"></textarea></td></tr>
        				</table>
        				<input type=hidden name=sign value=1>
        				<input type=hidden name=index value=<?echo$index?>>
        			</td>
        			</tr>
        			<!-- ������� -->
        			<?
					}
					ELSE
					{
						?>
        			<!-- ����ݷ� -->
        			<tr>
        			<td>
        				�Ʒ��� ������ �ݷ��ϼ̽��ϴ�. �������� �޸� ��� �����ø� �ۼ��ڰ� ���Ӱ� �ۼ��Ҷ�
        				������ �ǹǷ� �޸� �ۼ��Ͻô� ���� ������ ȿ���� �ֽǼ� �ֽ��ϴ�. �ݷ������� �ݵ�� �����Ͻñ� �ٶ��ϴ�. <br> <br>
						
					<form name=form1 method=post action=actionaccept.php>
        				<table border=0 cellpadding="0" cellspacing="1" bgcolor=60B030>
        				<tr height=20><td style="color:white;" align=center>Ȯ�μ���</td><td bgcolor=white style="color:red;">&nbsp;������ �ݷ��մϴ�!</td></tr>
        				<tr height=20><td style="color:white;" align=center>������</td><td bgcolor=white>&nbsp;<?echo$row[docname]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>�ۼ���</td><td bgcolor=white>&nbsp;<?echo$row[from_part]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>�ۼ���</td><td bgcolor=white>&nbsp;<?echo$row[sdate]?></td></tr>
						<?/*
        				<tr height=20><td style="color:white;" align=center>���û���</td><td bgcolor=white>&nbsp;���� �����ڿ��� ����並 �Ƿ��Ͻðڽ��ϱ�?&nbsp;&nbsp;&nbsp;��<input type=radio name=chk value=1>�ƴϿ�<input type=radio name=chk value=0 checked></td></tr>
						*/?>
        				<tr><td style="color:white;" align=center>�޸��ۼ�</td><td bgcolor=white>
        				<textarea name="approvememo2" rows="5" cols="60" style="font-family:����; font-size:13px;"></textarea></td></tr>
        				</table>
        				<input type=hidden name=sign value=0>
        				<input type=hidden name=index value=<?echo$index?>>
        			</td>
        			</tr>
        			<!-- ����ݷ� -->
        			<?
					}
					?>
        			</table>  
        			
        			<br>
        			<center>
        			<? IF($sign == 1)
					{
						?>
        			<a href="javascript:onclick_accept(document.form1)" onMouseOver="change_image(img_button01, 0, 1);" onMouseOut="change_image(img_button01, 0, 0);"><img name=img_button01 src=button03.gif border=0></a>
        			&nbsp;<a href="" onclick="form1.reset(); return false;" onMouseOver="change_image(img_button02, 1, 1);" onMouseOut="change_image(img_button02, 1, 0);"><img name=img_button02 src=button02.gif border=0></a>
        			<?
					}
					ELSE
					{
						?>
        			<a href="javascript:onclick_accept(document.form1)" onMouseOver="change_image(img_button03, 2, 1);" onMouseOut="change_image(img_button03, 2, 0);"><img name=img_button03 src=button04.gif border=0></a>
        			&nbsp;<a href="" onclick="form1.reset(); return false;" onMouseOver="change_image(img_button02, 1, 1);" onMouseOut="change_image(img_button02, 1, 0);"><img name=img_button02 src=button02.gif border=0></a>
        			<?
					}
					?>
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