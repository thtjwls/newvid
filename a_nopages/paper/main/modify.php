<?

session_start();

include "config.php" ;
include "lib.php";
include "connection.php";

$login=$login_id;
if(!$login)
{
	Error('�α��� �Ͻñ�ٶ��ϴ�.');
	exit;
}
$select =mysql_query("select * from $table_name_1 where id='$login'", $con);
if(!$select)
{
	echo("
		<script>
		window.alert('DB select error in $table_name_1');
		window.close();
		</script>;
		");
}
$row=mysql_fetch_array($select);


if(empty($mode))
{
	echo"
<html>
<title>ȸ����������</title>
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
<body bgcolor=$bgcolor>
<div align=center>
<table border=0 width=100% height=70%><tr><td align=center valign=middle>
	<table border=0>
		<form action=$PHP_SELF?mode=login method=post name=modify_login>
		<tr>
		<td align=center colspan=2><b>ȸ������ ������ �����ϰ� ��ȣ�ϱ� ���� <br> �α����� �ѹ� �� �ϼž��մϴ�. </b></td>
		</tr>
		<tr>
		<td align=right><font color=$font_color>$id_name</font></td>
		<td align=center><input type=text name=id class=input size=20 maxlength=20></td>
		</tr>
		<tr>
		<td align=right><font color=$font_color>$pass_name</font></td>
		<td align=center><input type=password name=password class=input size=20 maxlength=20></td>
		</tr>
		<tr>
		<td colspan=2 align=center><input type=submit class=submit value='     �α���     '></td>
		</tr>
		</form>
	</table>
</td></tr></table>
</div>
<script>
document.modify_login.id.focus()
</script>
</body>
</html>
		";
		exit;
}

if($mode=="login")
{
	if($row[id] != $id || $row[pw] != $password) Error ("������ �����߽��ϴ�.");

	echo("
	<HTML>
	$style

<title>ȸ������</title>
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

<script>

var is_submit=0;
function check_form(form) 
{
	if(is_submit) 
	{
		return false;
	} 
	else 
	{
		if(form.new_password.value)
		{
			if(!form.new_password2.value)
			{				
				alert('��й�ȣ Ȯ���� �Է��ϼ���');
				form.new_password2.focus();
				return false;
			}
			if(form.new_password.value!=form.new_password2.value)
			{
				alert('��й�ȣ�� ��й�ȣ Ȯ���� ��ġ���� �ʽ��ϴ�.');
				form.new_password.focus();
				return false;
			}
		}
		
		if(!form.name.value){
			alert('�̸��� �Է��ϼ���');
			form.name.focus();
			return false;
		}
		
		if(!form.mail.value){
			alert('E-mail�� �Է��ϼ���');
			form.mail.focus();
			return false;
		}

		if(!form.comp_rank.value){
			alert('���μ��� �Է��ϼ���');
			form.comp_rank.focus();
			return false;
		}

		if(!form.comp_rank.value){
			alert('������ �Է��ϼ���');
			form.comp_rank.focus();
			return false;
		}
	}
}
</script>

<body bgcolor=$bgcolor>
<div align=center>

<table border=0 width=$out_table_width cellpadding=3 cellspacing=0 bgcolor=$bgcolor><tr><td>

<table width=$table_width bgcolor=$table_bgcolor cellpadding=$cellpadding cellspacing=$cellspacing>

<form name=modify action='main.php' method=post enctype=multipart/form-data>
<input type=hidden name=exec value=modify>
<input type=hidden name=login_id value='$login'>

<tr>
<td width=$menu_width align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h ID $deco_f<font></td>
<td width=$content_width bgcolor=$content_bgcolor><font color=blue><b>$row[id]</b></font></td>
</tr>

<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h ��й�ȣ���� $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=password name=new_password maxlength=20 class=input> <font color=$font_color>��й�ȣ�� �ٲܶ��� �Է��ϼ���</font></td>
</tr>

<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h ��й�ȣȮ�� $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=password name=new_password2 maxlength=20 class=input></td>
</tr>


<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h �̸� $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=text name=name size=20 maxlength='$name_chr_max' class=input value='$row[name]'></td>
</tr>


<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h E-mail $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=text name=mail size=40 maxlength=50 class=input value='$row[mail]'></td>
</tr>

<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h ���μ� $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=text name=comp_part size=30 maxlength=50 class=input value='$row[comp_part]'></td>
</tr>

<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h ���� $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=text name=comp_rank size=30 maxlength=30 class=input value='$row[comp_rank]'></td>
</tr>
<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h �׷�Խ��� $deco_f</font></td>
<td bgcolor=$content_bgcolor>&nbsp;$row[board]</td>
</tr>
<tr>
<td colspan=2 bgcolor=$content_bgcolor align=center><br>
<input class=submit type=submit value=�������� onclick=\"return check_form(this.form)\">  <input class=submit type=button value=â�ݱ� onclick='javascript:window.close();'></td>
</tr>


</form>
</table>

<tr>
<td align=center>

</td>
</tr>
</table>
<script>
document.modify.new_password.focus();
</script>
</div>

</body>
</html>
	");
}

?>