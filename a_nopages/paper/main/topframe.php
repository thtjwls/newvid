<?
session_cache_limiter("");
session_start();

include "function.php";

if(!$login_id)
{
	move_url('../index.php');
}

$login=$login_id;
$user=$user_name;
$part=$comp_part;
$rank=$comp_rank;

$info = $user."(".$part."-".$rank.")";
$flag=0;
?>
<html>
	<head>
		<style>
			table,td,tr,BODY,input,DIV,form,TEXTAREA,center,option,pre,blockquote {font-size:9pt; font-family:tahoma,verdana,굴림; color:black}
			SELECT{font-size:9pt;}
			A:link    {color:blue;text-decoration:none;}
			A:visited {color:blue;text-decoration:none;}
			A:active  {color:blue;text-decoration:none;}
			A:hover  {color:red;text-decoration:underline}

			.input {border:solid 1;background-color:white;}
			.submit {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:white;background-color:black; height=18px}
			.submit2 {border:solid 1 #88c4ff;font-family:Tahoma,Verdana;font-size:9pt;color:black;background-color:#88c4ff; height=18px}
		</style>
	</head>
<body bgcolor='#FFFFFF' text='#000000' background='image/back.jpg' leftmargin='0' topmargin='0'>
<p>&nbsp;</p>
<?
echo("
<div id='layer1' style='width:481px; height:24px; position:absolute; left:0px; top:48px; z-index:1;'> 
  <table border='0' cellpadding='0' cellspacing='0' bordercolordark='black' bordercolorlight='black' align = left width='600'>
    <tr>
        	
      <td width='420' align=left><img src='image/login_icon.jpg' border='0'>&nbsp;<b>$info</b> 님! 
        로그인되었습니다. </td>
           	
      <td align=left width='180'><a href='logout.php' target='_top' onfocus=blur()><img src='image/logout_end.gif' border='0'></a>&nbsp;&nbsp;&nbsp;<a href='mainframe.php' target='mainFrame' onfocus=blur()><img src='image/mainpage.jpg' border='0'></a> 
		</td>

    	</tr>
	</table>
</div>
</body>
</html>
");
?>