<?

session_cache_limiter("");
session_start();

include("config.php");
include("connection.php");


if (!$offset)
{
	$offset=0; 
}

if($mode==search)
{
	$total_result=mysql_query("select * from $table_name_2 where $search_field like '%$search_str%'", $con);
    $total=mysql_num_rows($total_result);
   	$query=mysql_query("select * from $table_name_2 where $search_field like '%$search_str%' order by seq_num asc limit $offset,$limit",$con);
}
else
{
	$total_result=mysql_query("select * from $table_name_2",$con);
    $total=mysql_num_rows($total_result);
    $query=mysql_query("select * from $table_name_2 order by seq_num asc limit $offset,$limit",$con);
}

?>
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
function delete_mode(del, name, name2)
{
	var go = 'approve_del.php?del='+del+'&filename='+name+'&filename2='+name2;
	if( confirm('���� �����Ͻðڽ��ϱ�?') )
	{
		location.replace(go);
	}
	else
	{
		return;
	}
}
function delete_all()
{   
	var go = 'approve_del.php?del=all';
	if (confirm('(���!) ��� �����Ͱ� ������ϴ�. ���� �����Ͻðڽ��ϱ�?'))    
	{
		location.replace(go);
	}
	else
	{
		return;
	}
}
function upbar (ooo) {
	ooo.style.backgroundColor = '#FDF2FF';
}

function downbar (ooo){
ooo.style.backgroundColor = '';
}
</script>

<form name='approve_list' action='<?echo$PHP_SELF?>' method=post>
	<br>
<table border='0' cellpadding='0' cellspacing='0' bgcolor='#88c4ff'>
    <tr>
        <td width='162' height='33' align=center><p><font color='white'><b>&nbsp;���������� ����Ʈ</b></font></td>
<?
	if($mode==search)
	{
		echo("
		<td bgcolor='white' width='300' height='33' align=center><p><font color='black'>&nbsp;���� <font color=red>$total</font> ���� ���ڰ��� ������ �˻��Ǿ����ϴ�.<br>ȸ���۾��� ������ �ۼ����� <b>������</b>�� �������Դϴ�.</td>
			");
	}
	else
	{
		echo("
		<td bgcolor='white' width='300' height='33' align=center><p><font color='black'>&nbsp;���� <font color=red>$total</font> ���� ���ڰ��� ������ ��ϵǾ� �ֽ��ϴ�.<br>ȸ���۾��� ������ �ۼ����� <b>������</b>�� �������Դϴ�.</td>
			");
	}
?>
	</tr>
</table>
	<table width='650' border=0 cellspacing=1 cellpadding=5>
	<TR><TD><font color=blue>����� �˻�</font> 
	<select name='search_field'>
	<option value=docname>������	
	<option value=from_part>�ۼ���
	<option value=viewer>������
	<option value=approve>������
	</select>
	&nbsp;&nbsp;&nbsp;<input type=text name='search_str' size=20>
	<input type=submit name=mode value='search'>
	</TD></TR>
	</table>

	<table width='700' border=0 cellspacing=1 cellpadding=5 bgcolor=#88c4ff>
	<tr bgcolor=#FDF2FF align=center>
	<td align=center width=30>��ȣ</td>
	<td align=center width=100>������</td>
	<td align=center width=120>�ۼ���</tr>
	<td align=center width=120>������</tr>
	<td align=center width=120>������</tr>
	<td align=center width=60>�ۼ���</tr>
	<td align=center width=60>������</tr>
	<td align=center width=60>������</tr>
	<td align=center width=30>���</tr>
<?
while($row=mysql_fetch_array($query))
{
	if(($row[ok_flag]==3) || ($row[ok_flag]==4) || ($row[ok_flag]==5))
	{
		echo("
		<tr bgcolor=white onMouseOver=upbar(this) onMouseOut=downbar(this)>
		<td align=center width=30><font color=gray>$row[seq_num]</font></td>
		<td align=center width=100><a href='approve_detail2.php?content=$row[filename]'><font color=gray>$row[docname]</font></a></td>
		<td align=center width=120><font color=gray>$row[from_part]</font></td>
		<td align=center width=120><font color=gray>$row[view_list]</font></td>
		<td align=center width=120><font color=gray>$row[approve]</font></td>
		<td align=center width=60><font color=gray>$row[sdate]</font></td>
		<td align=center width=60><font color=gray>$row[mdate]</font></td>
		<td align=center width=60><font color=gray>$row[edate]</font></td>
			");
			?>
		<td align=center width=30><a href="javascript:delete_mode('<?echo$row[seq_num]?>', '<?echo$row[filename]?>', '<?echo$row[filename2]?>');"><font color=gray>����</font></a></td>
		</tr>
			<?
	}
	else
	{
		echo("
		<tr bgcolor=white onMouseOver=upbar(this) onMouseOut=downbar(this)>
		<td align=center width=30>$row[seq_num]</td>
		<td align=center width=100><a href='approve_detail2.php?content=$row[filename]'>$row[docname]</a></td>
		<td align=center width=120>$row[from_part]</td>
		<td align=center width=120>$row[view_list]</td>
		<td align=center width=120>$row[approve]</td>
		<td align=center width=60>$row[sdate]</td>
		<td align=center width=60>$row[mdate]</td>
		<td align=center width=60>$row[edate]</td>
			");
			?>
		<td align=center width=30><a href="javascript:delete_mode('<?echo$row[seq_num]?>', '<?echo$row[filename]?>', '<?echo$row[filename2]?>');">����</a></td>
		</tr>
			<?
	}
}

echo("</table></form><p>");

$pages=intval($total / 10);
if ($total % 10) {
$pages++;}
for ($i=1;$i<=$pages;$i++) { 
$newoffset=10*($i-1);
echo(" <a href='$PHP_SELF?offset=$newoffset'>[$i]</a> ");}
?>

<table border='0' cellpadding='0' cellspacing='0' bgcolor='#88c4ff'>
    <tr>
        <td width='162' height='33' align=center><p><font color='white'>&nbsp;<a href="javascript:delete_all();">���������� ��λ���</a></font></td>
    </tr>
</table>

</body>
</html>
