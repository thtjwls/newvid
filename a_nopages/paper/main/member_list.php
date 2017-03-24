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
	$total_result=mysql_query("select * from $table_name_1 where $search_field like '%$search_str%'", $con);
    $total=mysql_num_rows($total_result);
   	$query=mysql_query("select * from $table_name_1 where $search_field like '%$search_str%' order by seq_num asc limit $offset,$limit",$con);
}
else
{
	$total_result=mysql_query("select * from $table_name_1",$con);
    $total=mysql_num_rows($total_result);
    $query=mysql_query("select * from $table_name_1 order by seq_num asc limit $offset,$limit",$con);
}
	echo ("
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
function member_del(del)
{   
	var go = 'member_del.php?del='+del;
	if (confirm('삭제하시겠습니까?'))    
	{
		location.replace(go);
	}
	else
	{
		return;
	}
}
function member_modi(num)
{   
	var go = 'modify2.php?seq_num='+num;
	if (confirm('수정 하시겠습니까?'))    
	{
		window.open(go,'_new','width=550,height=340,scrollbars=yes,resizable=1,status=auto,menubar=0');
	}
	else
	{
		return;
	}
}
function member_modify(num)
{   
	var go = 'member_modify.php?num='+num;
	if (confirm('그룹게시판 수정/추가 하시겠습니까?'))    
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
	var go = 'member_del.php?del=all';
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
<form name=member_list action=$PHP_SELF method=post>
	<br>
<table border='0' cellpadding='0' cellspacing='0' bgcolor='#88c4ff'>
    <tr>
        <td width='162' height='33' align=center><p><font color='white'><b>&nbsp;사용자 리스트</b></font></td>
	");
	if($mode==search)
	{
		echo("
		<td bgcolor='white' width='300' height='33' align=center><p><font color='black'>&nbsp;현재 <font color=red>$total</font> 명의 사용자가 검색되었습니다.</td>
			");
	}
	else
	{
		echo("
		<td bgcolor='white' width='300' height='33' align=center><p><font color='black'>&nbsp;현재 <font color=red>$total</font> 명의 사용자가 등록되어 있습니다.</td>
			");
	}
	echo("
    </tr>
</table>

	<table width='650' border=0 cellspacing=1 cellpadding=5>
	<TR><TD><font color=blue>사용자 검색</font> 
	<select name='search_field'>
	<option value=name>이름	
	<option value=id>아이디
	<option value=mail>이메일
	<option value=comp_part>담당부서
	<option value=comp_rank>직책
	</select>
	&nbsp;&nbsp;&nbsp;<input type=text name='search_str' size=20>
	<input type=submit name=mode value='search'>
	</TD></TR>
	</table>
	<table width='650' border=0 cellspacing=1 cellpadding=5 bgcolor=#88c4ff>
	<tr bgcolor=#FDF2FF align=center>
	<td align=center>번호</td>
	<td align=center>이름</td>
	<td align=center>아이디</tr>
	<td align=center>이메일</tr>
	<td align=center>담당부서</tr>
	<td align=center>직책</tr>
	<td align=center>게시판수정/추가</tr>
	<td align=center>기능</tr>

	
	");

while($row=mysql_fetch_array($query))
{

    echo("
	<tr bgcolor=white onMouseOver=upbar(this) onMouseOut=downbar(this)>
	<td align=center>$row[seq_num]</td>
	<td align=center>$row[name]</a></td>
	<td align=center>$row[id]</td>
	<td align=center>$row[mail]</td>
	<td align=center>$row[comp_part]</td>
	<td align=center>$row[comp_rank]</td>
		");
	?>
	<td align=center>
	<a href="javascript:member_modify('<?echo$row[seq_num]?>');">
	<?
	if($row[board]!="")
	{
		echo$row[board];
	}
	else
	{
		echo("미지정");
	}
	?>
	</td>
	<td align=center>
	<a href="javascript:member_modi('<?echo$row[seq_num]?>');">수정</a>&nbsp;|&nbsp;<a href="javascript:member_del('<?echo$row[seq_num]?>');">삭제</a></td>
	</tr>
		<?
}

echo("</table></form><p>");

$pages=intval($total / $limit);
if ($total % $limit) {
$pages++;}
for ($i=1;$i<=$pages;$i++) { 
$newoffset=$limit*($i-1);
echo(" 
	<a href='$PHP_SELF?offset=$newoffset&mode=$mode&search_field=$search_field&search_str=$search_str'>[$i]</a> 
	");
}
?>
<table border='0' cellpadding='0' cellspacing='0' bgcolor='#88c4ff'>
    <tr>
        <td width='162' height='33' align=center><p><font color='white'>&nbsp;
<a href="javascript:delete_all();">사용자 모두삭제</a></font></td>
    </tr>
</table>

</body>
</html>
