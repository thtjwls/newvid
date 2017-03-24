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
			table,td,tr,BODY,input,DIV,form,TEXTAREA,center,option,pre,blockquote {font-size:9pt; font-family:tahoma,verdana,굴림; color:black}
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
	if( confirm('정말 삭제하시겠습니까?') )
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
	if (confirm('(경고!) 모든 데이터가 사라집니다. 정말 삭제하시겠습니까?'))    
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
        <td width='162' height='33' align=center><p><font color='white'><b>&nbsp;문서보관함 리스트</b></font></td>
<?
	if($mode==search)
	{
		echo("
		<td bgcolor='white' width='300' height='33' align=center><p><font color='black'>&nbsp;현재 <font color=red>$total</font> 개의 전자결재 문서가 검색되었습니다.<br>회색글씨의 문서는 작성인이 <b>휴지통</b>에 담은것입니다.</td>
			");
	}
	else
	{
		echo("
		<td bgcolor='white' width='300' height='33' align=center><p><font color='black'>&nbsp;현재 <font color=red>$total</font> 개의 전자결재 문서가 등록되어 있습니다.<br>회색글씨의 문서는 작성인이 <b>휴지통</b>에 담은것입니다.</td>
			");
	}
?>
	</tr>
</table>
	<table width='650' border=0 cellspacing=1 cellpadding=5>
	<TR><TD><font color=blue>사용자 검색</font> 
	<select name='search_field'>
	<option value=docname>문서명	
	<option value=from_part>작성인
	<option value=viewer>검토인
	<option value=approve>결재인
	</select>
	&nbsp;&nbsp;&nbsp;<input type=text name='search_str' size=20>
	<input type=submit name=mode value='search'>
	</TD></TR>
	</table>

	<table width='700' border=0 cellspacing=1 cellpadding=5 bgcolor=#88c4ff>
	<tr bgcolor=#FDF2FF align=center>
	<td align=center width=30>번호</td>
	<td align=center width=100>문서명</td>
	<td align=center width=120>작성인</tr>
	<td align=center width=120>검토인</tr>
	<td align=center width=120>결재인</tr>
	<td align=center width=60>작성일</tr>
	<td align=center width=60>검토일</tr>
	<td align=center width=60>결재일</tr>
	<td align=center width=30>기능</tr>
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
		<td align=center width=30><a href="javascript:delete_mode('<?echo$row[seq_num]?>', '<?echo$row[filename]?>', '<?echo$row[filename2]?>');"><font color=gray>삭제</font></a></td>
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
		<td align=center width=30><a href="javascript:delete_mode('<?echo$row[seq_num]?>', '<?echo$row[filename]?>', '<?echo$row[filename2]?>');">삭제</a></td>
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
        <td width='162' height='33' align=center><p><font color='white'>&nbsp;<a href="javascript:delete_all();">문서보관함 모두삭제</a></font></td>
    </tr>
</table>

</body>
</html>
