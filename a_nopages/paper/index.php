<html>
<head>
<title>::::: CYBER APPROVAL! ::::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
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
<script language="JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->
</script>

</head>

<body bgcolor="#FFFFFF" text="#000000">
<div align="center">
  <img src="main/image/Azul.jpg" width="727" height="432" border="0">
<form name="login" method="post" action="main/login.php">
	<table border='0' cellpadding='0' cellspacing='0' width='220' bordercolordark='black' bordercolorlight='black' align = center>
   		<tr>
           	
        <td align=right> 
          <div align="center"><img src="main/image/login.jpg" border="0"> </div>
        </td>
       	</tr>
	</table>
	<table border='0' cellpadding='2' cellspacing='1' width='220' bordercolordark='black' bordercolorlight='black' align = center>
    	<tr>
        	<td width='80' align=right>
            	<b>아이디</b></td><td width='140'><input type="text" name="id" class="input" size="20">
        	</td>
    	</tr>
    	<tr>
        	<td width='80' align=right>
            	<b>패스워드</b></td><td width='140'><input type="password" name="pw" class="input" size="20">
        	</td>
    	</tr>
	</table>
	<table border = '0' cellpadding='5' cellspacing='1' bgcolor = 'white' width ='220' align = center>
		<tr>
			<td width='80' align=right>
            	</td><td width='140'><input type="submit" class="submit2" value="로그인">&nbsp;<input type="button" class="submit2" value="신규등록" onclick="window.open('main/join.php','_new','width=550,height=300,scrollbars=yes,resizable=1,status=auto,menubar=0')"></td>
      	</tr>
	</table>
</form>
</div>
<script>
document.login.id.focus();
</script>
</body>
</html>
