<?

session_start();
 
 include "config.php";
 include "connection.php";

?>

<html>
<head>

<title>sub-main</title>

<style>
td {font-size: 9pt; font-family:'굴림';}
A:link{color:03BFFE;font-family:굴림;font-size:9pt;text-decoration:none;}
A:visited { color:03BFFE;font-family:굴림;font-size:9pt;text-decoration:none;}
A:hover { color:red;font-family:굴림;font-size:9pt;text-decoration:underline;}

.bt1 {background-color:#e3e3e3;border:#d3d3d3 1px solid;}
.mid {border:#B6B6B6 1px solid;border-top:none;border-left:none}
.top {border:#B6B6B6 1px solid;border-bottom:none;border-left:none;border-right:none;}
.bts {border:#B6B6B6 1px solid;}
.bt {border:#000000 1px solid;}
.bt2 {background-color:#000000;color:#ffffff;border:#000000 1px solid;}
.input {border:solid 1;background-color:white;}
.submit {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:white;background-color:black;       height=21px}
.submit2 {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:black;background-color:#88c4ff;  height=18px}

</style>

<script>
function reload(part)
{
		location.replace("sub_table1.php?flag=1&part=" + part);
}
</script>

<meta http-equiv='Content-Type' content='text/html; charset=euc-kr'>
</head>

<body>
<form name=sub_table1>
<table width='600' border=0 cellspacing=0 cellpadding=0 bgcolor=f0f0f0  class=bts style='border=top:none;'>
 <tr align = center rowspan=3 >  
 <td align=center width=70 class=bts style='border-top:none;' bgcolor=F0F0D8>최종 결재인</td>

  
 <td width=140 align=left class=mid><img src=./image/check1.gif align=absmiddle>
 <select name='group1' onchange='reload(window.document.sub_table1.group1.options[selectedIndex].value);' value=<?echo$part;?>>
            			<option value='init'>담당부서선택</option>
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

						while($row=mysql_fetch_array($select1))
						{
							echo("
							<option value='$row[comp_part]'>$row[comp_part]</option>
            					");
						}
?>
</select>
	</td>
<?
if($flag!=1)
{
	echo("
 <td align=left width=390>
		</td>
		");
}
else
{
	echo("
 <td align=left width=390 class=mid><img src=./image/check2.gif align=absmiddle>
 <select name='name1'>
            			<option value='init_name'>결재인선택</option>
		");
$sel = mysql_query("select name, comp_rank from $table_name_1 where comp_part='$part'", $con);
if(!$sel)
{
	 echo("<script>
		window.alert('DB select error in $table_name_1');
		history.go(-1);
		</script>
			");
 }

						while($ro=mysql_fetch_array($sel))
						{
							echo("
							<option value='$ro[name]'>$ro[name]($ro[comp_rank])</option>
            					");
						}
echo("
</select>
	</td>
	");
}
?>

 </tr>
 </table>
 </form>

</body>
</html>


