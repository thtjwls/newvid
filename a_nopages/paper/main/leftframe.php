<?
session_start();

include "config.php";

?>
<HTML>
<HEAD>
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
<body>
<table border=0><tr><td>
<iframe src='count.php' name=count width=154 height=0 frameborder=0 framespacing=0 marginheight=0 marginwidth=0 scrolling=no vspace=0></iframe>
<iframe src='CategoryBar_Frame.htm
' name=CategoryBar_Frame width=154 height=450 frameborder=0 framespacing=0 marginheight=0 marginwidth=0 scrolling=no vspace=0></iframe>
</td></tr></table>
<table border=0 width=154><tr align=center><td>
<a href='mailto:<?echo($admin_mail)?>'><img src='image/email.jpg' border='0' alt='관리자 이메일'></a>
</td>
</tr>
</table>

</body>

</html>