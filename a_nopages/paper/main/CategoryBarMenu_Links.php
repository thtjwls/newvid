<?
session_start();
$group=$board_name;
?>
<HTML>
<HEAD>
<link rel="STYLESHEET" type="text/css" href="Outlookbar.css">
<META HTTP-EQUIV="Content-Type" content="text/html;">
<TITLE>�̴ϱ׷���� Board</TITLE>
</HEAD>
<body bgproperties="fixed" BGCOLOR="gray" text="white" align="center" link="white" vlink="white" alink="white" leftmargin="11">

<font FACE="Arial, Helvetica" size="1">
<table cellpadding="5" width="100%">
	<tr><td align="center" height="75">
		<img src="image/ipalaut2.gif" width="32" height="32" border="0"><br><span style='font-size=9pt;'>��������</span>
	</td></tr>
	<tr><td align="center" height="75">

<?
if($group == "")
{
echo("
		<img src='image/intray0b.gif' width='26' height='26' border='0'><br><span style='font-size=9pt;'><font color=white><b>�׷�Խ���</b></font></span>
");
}
else
{
echo("
		<img src='image/intray0b.gif' width='26' height='26' border='0'><br><span style='font-size=9pt;'>�׷�Խ���</span>
");
}
?>

	</td></tr>
</table>
</font>

</BODY>
</HTML>
