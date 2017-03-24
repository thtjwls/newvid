<?

session_start();

include ("config.php");
include ("connection.php");

$group=$board_name;

$login=$login_id;
$user=$user_name;
$part=$comp_part;
$rank=$comp_rank;
?>
<html>
<head>
<title>main_frame</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
</head>
<STYLE TYPE="text/css">
<!--
	.base
		{ text-decoration:none; font-size:9pt; }
	.big
		{ text-decoration:none; font-size:10pt }

		.button
		{ font-size:9pt; color:#333333; background-color:#D8D8D8; border-width:1; border-color:#AAAAAA; }
	.file
		{ font-size:9pt; color:navy; background-color:#F0F0F0; border-width:1; border-color:#777777; border-style:solid; }
	.password
		{ font-size:9pt; color:navy; background-color:#F0F0F0; border-width:1; border-color:#777777; border-style:solid; }
	.select
		{ font-size:9pt; color:navy; background-color:BEIGE; border-width:1; border-color:#777777; border-style:solid; }
	.small
		{ text-decoration:none; font-size:8pt }
	.text
		{ font-size:9pt; color:navy; background-color:#F0F0F0; border-width:1; border-color:#777777; border-style:solid; }
	.textarea
		{ font-size:9pt; color:navy; background-color:#F0F0F0; border-width:1; border-color:#777777; border-style:solid; }
	A, TD, BODY
		{ text-decoration:none; font-size:9pt; color:black; }
	A:hover
		{ text-decoration:underline; font-size:9pt; color:red; }
BODY {
	SCROLLBAR-FACE-COLOR:#03BFFE; SCROLLBAR-HIGHLIGHT-COLOR: #000000; SCROLLBAR-SHADOW-COLOR: #000000; SCROLLBAR-3DLIGHT-COLOR: #000000; SCROLLBAR-ARROW-COLOR: #FFFFFF; SCROLLBAR-TRACK-COLOR: #A7A8A3; SCROLLBAR-DARKSHADOW-COLOR: #000000
}

// -->
</STYLE>

<body bgcolor="#FFFFFF" text="#000000" link="#FFCCFF">
        <table border="0" cellspacing="0" width="600" bordercolordark="white" bordercolorlight="black">
		<tr>
		<td>
		<img src='image/main_logo.jpg' border='0'>
		</td>
		</tr>
		</table>
        <table border="0" cellspacing="0" width="600" bordercolordark="white" bordercolorlight="black">
          <tr> 
            <td width="300" align="left" valign="top"> 
              <p><img src="image/main_notice.jpg" border="0" alt="공지사항" usemap="#Map"></p>
            </td>
            <td width="300" align="left" valign="top"> 
              <p><img src="image/main_board.jpg" border="0" alt="그룹게시판" usemap="#Map2"></p>
            </td>
          </tr>
		  <tr>
            <td width="300"> 
			<?
				  echo("
				  <pre><iframe frameborder='0' height='140' leftmargin='0' marginheight='3' marginwidth='3' scrolling='no' src='board_empty.php' topmargin='0' width='300'></iframe></pre>
					  ");
			?>
			</td>
            <td width="300"> 
			<?
			if($group=="")
			{
				  echo("
				  <pre><iframe frameborder='0' height='140' leftmargin='0' marginheight='3' marginwidth='3' scrolling='no' src='board_empty.php' topmargin='0' width='300'></iframe></pre>
					  ");
			}
			else
			{
				  echo("
				  <pre><iframe frameborder='0' height='140' leftmargin='0' marginheight='3' marginwidth='3' scrolling='no' src='board_empty.php' topmargin='0' width='300'></iframe></pre>
					  ");
			}
			?>
            </td>
		   </tr>
		   <?
			$select=mysql_query("select * from $table_name_2", $con);
			if(!$select)
			{
				echo("
					<script>
					window.alert('DB select error in approve(getdoc.php)!');
					history.go(-1);
					</script>
					");
				exit;
			}
			$a=0;
			$b=0;
			$c=0;

			while($row=mysql_fetch_array($select))
			{
				$from_part = explode("(", $row[from_part]);
				if($user_name == $from_part[0])
				{
					$a++;
				}
				for($i=0;$i<($row[view_cnt]+1);$i++)
				{
					$list = explode("<br>", $row[view_list]);
					$ttt=$list[$i];
					$view_list = explode("(", $ttt);
					$zzz=$view_list[0];
					if(($row[viewer] != "검토인없음") && ($user_name==$zzz))
					{
						$b++;
					}
				}
				$approve = explode("(", $row[approve]);
				if(($user_name == $approve[0]) && (($row[return_flag] == 2) || ($row[return_flag] == 4) || ($row[return_flag] == 5) || ($row[viewer] == "검토인없음")))
				{
					$c++;
				}
			}
			?>

          <tr> 
            <td width="600" align="left" valign="top"> 
              &nbsp;<img src='image/st_clear.gif'>&nbsp;문서함 리스트 총 <font color=red><?echo$a?></font>개<br>
              &nbsp;<img src='image/st_clear.gif'>&nbsp;검토함 리스트 총 <font color=red><?echo$b?></font>개<br>
              &nbsp;<img src='image/st_clear.gif'>&nbsp;결재함 리스트 총 <font color=red><?echo$c?></font>개
            </td>
          </tr>
		 </table>
		         <table border="0" cellspacing="0" width="600" bordercolordark="white" bordercolorlight="black">
<tr>
<td>
</td>
</tr>
</table>
</body>
</html>
