<?
include "config.php" ;
include "lib.php";
?>
<HTML>
<META HTTP-EQUIV="content-type" CONTENT="text/html; charset=euc-kr">
<?
echo("
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
");
?>

<title>회원가입</title>

<script>
function win_close()
{
	window.close();
}

function id_check(URL) {
      var id = eval(document.member.id);
                 
      if(!id.value) {
         alert('ID를 입력하신 후에 확인하세요!');
         id.focus();
         return;
      } else {
         URL = URL + "?id=" + id.value;
         window.open(URL,'id_check','width=320,height=150,resizable=no,scrollbars=no,status=0');
      }
}

var is_submit=0;
function check_form(form) 
{
	if(is_submit) 
	{
		return false;
	} 
	else 
	{
		if(!form.id.value){
			alert('ID를 입력하세요');
			form.id.focus();
			return false;
		}

		if(!form.password.value){
			alert('비밀번호를 입력하세요');
			form.password.focus();
			return false;
		}

		if(!form.password2.value){
			alert('비밀번호 확인을 입력하세요');
			form.password2.focus();
			return false;
		}

		if(form.password.value!=form.password2.value){
			alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
			form.password.focus();
			return false;
		}
		
		if(!form.name.value){
			alert('이름을 입력하세요');
			form.name.focus();
			return false;
		}
		
		if(!form.mail.value){
			alert('E-mail을 입력하세요');
			form.mail.focus();
			return false;
		}

		if(!form.comp_rank.value){
			alert('담당부서를 입력하세요');
			form.comp_rank.focus();
			return false;
		}

		if(!form.comp_rank.value){
			alert('직급을 입력하세요');
			form.comp_rank.focus();
			return false;
		}
	}
}
</script>

<?

echo "

<body bgcolor=$bgcolor>
<div align=center>

<table border=0 width=$out_table_width cellpadding=3 cellspacing=0 bgcolor=$bgcolor><tr><td>

<table width=$table_width bgcolor=$table_bgcolor cellpadding=$cellpadding cellspacing=$cellspacing>

<form name=member action='main.php' method=post enctype=multipart/form-data>
<input type=hidden name=exec value=register>

<tr>
<td width=$menu_width align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h ID $deco_f<font></td>
<td width=$content_width bgcolor=$content_bgcolor><input class=input type=text name=id size=20 maxlength='$id_chr_max' >  <input type=button value=중복확인 onclick=\"id_check('idcheck.php')\" class=submit></td>
</tr>

<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h 비밀번호 $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=password name=password maxlength=20 class=input></td>
</tr>

<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h 비밀번호확인 $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=password name=password2 maxlength=20 class=input></td>
</tr>


<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h 이름 $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=text name=name size=20 maxlength='$name_chr_max' class=input></td>
</tr>


<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h E-mail $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=text name=mail size=40 maxlength=50 class=input></td>
</tr>

<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h 담당부서 $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=text name=comp_part size=30 maxlength=50 class=input></td>
</tr>

<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h 직위 $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=text name=comp_rank size=30 maxlength=30 class=input></td>
</tr>

<tr>
<td colspan=2 bgcolor=$content_bgcolor align=center><input class=submit type=submit value=회원가입 onclick=\"return check_form(this.form)\">  <input class=submit type=reset value=취소>  <input class=submit type=button value=창닫기 onclick='win_close();'></td>
</tr>


</form>
</table>

<tr>
<td align=center>
";


echo "

</td>
</tr>
</table>
<script>
document.member.id.focus()
</script>
</div>

";
?>
</body>
</html>
