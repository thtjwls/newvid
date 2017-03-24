<HTML>
<HEAD>
<style>
BODY,table,tr,td {font-size:9pt; }
A:link    {color:black;text-decoration:none;}
A:visited {color:black;text-decoration:none;}
A:active  {color:black;text-decoration:none;}
A:hover  {color:red;text-decoration:underline}
</style>

<body>
<table border=0><tr><td>
<iframe src='count.php' name=count width=150 height=18 frameborder=0 framespacing=0 marginheight=3 marginwidth=0 scrolling=no vspace=0></iframe>

<script>
function newWindow2( url )
{
window.open( url, 'MessageBox','width=640,height=500,resizable=yes,scrollbars=yes,status=0');
}
</script>
<a href="javascript:newWindow2('install.php')"><img src='admin.gif' border=0><span style='font-size=9pt;'>관리자</span></a>&nbsp;&nbsp;
<a href="javascript:newWindow2('message_box.php')"><img src='message.gif' border=0><span style='font-size=9pt;'>결재함</span></a>

</td></tr></table>

<!--
<iframe src='./SZmember/SZmessage/SZlogin_user.php' name=count width=166 frameborder=0 framespacing=0 marginheight=3 marginwidth=0 scrolling=no vspace=0></iframe>
-->

</body>

</html>