<?

session_start();
 
 include "config.php";
 include "connection.php";

$login=$login_id;
$user=$user_name;
?>

<html>
<head>

<title>Kims SendMail</title>

<style>
td {font-size: 9pt; font-family:'±¼¸²';}
A:link{color:03BFFE;font-family:±¼¸²;font-size:9pt;text-decoration:none;}
A:visited { color:03BFFE;font-family:±¼¸²;font-size:9pt;text-decoration:none;}
A:hover { color:red;font-family:±¼¸²;font-size:9pt;text-decoration:underline;}

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
function reload_1(part1)
{
		location.replace("approval.php?flag1=1&part1=" + part1);
}
</script>

<meta http-equiv='Content-Type' content='text/html; charset=euc-kr'>
</head>

<body bgcolor='white' text='#000000' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>

<form name='approval' action='approval.php' method=post>

<table border=0 width=600 cellspacing=1 cellpadding=3>
<tr align=center>
	<td>
	<img src='image/approval.jpg' border='0'>
	</td>
</tr>
</table>

<table width='600' border=0 cellspacing=0 cellpadding=0 bgcolor=F0F0D8 class=bts>
 <tr align = center>
        <td align=center width=70 class=mid style='border-bottom:none;'>±â¾ÈÀÎ</td>
        <td align=left bgcolor=#f0f0f0 class=top>
        <input style='background-color:#ffffff;border:1 solid black' type='text' name='name' size='18' value=<?echo$user;?>>
        </td>
 </tr>
</table>
<table width='600' border=0 cellspacing=0 cellpadding=0 bgcolor=F0F0D8 class=bts>
 <tr align = center>
        <td align=center width=70 class=mid style='border-bottom:none;'>°á Àç Á¦ ¸ñ</td>
        <td align=left bgcolor=#f0f0f0 class=top>
        <input style='background-color:#ffffff;border:1 solid black' type='text' name='subject' size='74'>
        </td>
 </tr>
</table>
<table width='600' border=0 cellspacing=0 cellpadding=0 bgcolor=f0f0f0  class=bts style='border=top:none;'>
 <tr align = center rowspan=3 >  
 <td align=center width=70 class=bts style='border-top:none;' bgcolor=F0F0D8>°áÀçÀÎ</td>

  
 <td width=140 align=left class=mid><img src=./image/check1.gif align=absmiddle>
 <select name='group1' onchange='reload_1(window.document.approval.group1.options[selectedIndex].value);'>
            			<option value='init'>´ã´çºÎ¼­¼±ÅÃ</option>
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
if($flag1!=1 && $flag2!=1)
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
            			<option value='init_name1'>°áÀçÀÎ¼±ÅÃ</option>
		");
$sel1 = mysql_query("select name, comp_rank from $table_name_1 where comp_part='$part1'", $con);
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
							<option value='$ro1[name]'>$ro1[name]($ro1[comp_rank])</option>
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
<table border=0 width=600 class=bts>
<tr>
	<td height='410' align='center' colspan='3' width='590'> 
	<object id='edit_box' data='web_editor.php' width='590' height='410' type='text/x-scriptlet' border='1'>
      </object>
	  </td>
</tr>
</table>
<table border=0 width=600>
	<tr align=center>
	    <td colspan=3 align=center bgcolor=#ffffff>
        <input  class=bt2 style='width:100px;' type=submit name='send' value='°áÀçÀÇ·Ú' style='width:65 ; height:20'>
        </td>
	</tr>    	
 </TABLE>
 <input type='hidden' name='part1' <?echo("value='$part1'");?>>

 </form>
<script>
document.approval.subject.focus();
</script>

</body>
</html>