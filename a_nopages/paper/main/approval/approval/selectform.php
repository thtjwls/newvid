<?
session_start();

include "config.php";
$login=$login_id;

?>
<html>
<head>
<title>�����ۼ� �� �߼�</title>
<SCRIPT LANGUAGE="JavaScript">
<!--
function CheckValues1()
{

	var strFormnum=document.form1.formnum.value;
	
	
	if ( strFormnum == "1" ) {
		if(confirm("'�ް���ȹ��'�� �����ϼ̽��ϴ�.\n������ �ۼ��Ͻðڽ��ϱ�?")) {
			parent.mainFrame.location="resort/resortdoc.php";
		}
	} else {
		confirm("���� �ش� ���������� �غ���� �ʾҽ��ϴ�.\n�غ�Ǵµ��� �̿��Ͻ� �� �ֽ��ϴ�!");
		return;
	}
	return;
}


function CheckSpaces(strValue) {
	var flag=true;

	if (strValue!="") {
		for (var i=0; i < strValue.length; i++) {
			if (strValue.charAt(i) != " ") {
				flag=false;
				break;
			}
		}
	}
	return flag;
}

function CheckValues2()
{
	var strTable=document.form2.docname.value;
	if (CheckSpaces(strTable)) {
		alert("���ι��� ���缱�ý� �������� �־���մϴ�.\n������ �������� �Է��Ͻÿ�.");
		document.form2.docname.select();
		document.form2.docname.focus();
	}
    else {
       	if(confirm("�������� '"+strTable+"'�Դϴ�.\n�������� ��Ȯ�մϱ�?")) {
		document.form2.submit();
		}
	}
	return;
}
//-->
</SCRIPT>
<LINK REL="stylesheet" TYPE="text/css" HREF="../allstyle.css">
</head>

<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">

<p>&nbsp;
<table border="0" cellpadding="0" cellspacing="0"><tr><td width=15 >&nbsp;</td><td>
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#8295c0">
    <tr>
        <td width="162" height="33" ><p><font color="white"><b>&nbsp;�����ۼ� 
            �� �߼�</b></font></td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560"><br><img src="appoint2.gif" align="left" width="64"
             height="64" border="0">���縦 ȹ���ϱ� �ϱ� ���ؼ��� �ݵ�� ������ 
            �ۼ��ϰų� ������ ÷���ϼž� �մϴ�. ������ ������ �߼��ϰ� ���� 
            �����ڳ� �����ڰ� �ݼ��� ���� ���� ���� ������ ��� ���õǰ� �����ۼ��ڿ��� 
            ��ٷ� �ݼ۵˴ϴ�. ������ ���� �����ڰ� ������ ���� �ʴ� ��� 
            �������� ���簡 �ȵ� ���ɼ��� �ֽ��ϴ�.</td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560"><p><img src="appoint1.gif" align="left" width="64"
             height="64" border="0">�� ���� ����ý����� ���� �ۼ�,����,���� ��� ������ ������ �����ϵ��� 
            �Ǿ� �ֽ��ϴ�. <p>���� Email : <a
             href="mailto:<?echo$admin_mail?>"><?echo$admin_mail?></a></td>
    </tr>
</table>
<table border="0" cellspacing="1" bgcolor="5DB17D">
    <tr>
        <td width="560" height="27" align="left" colspan="2"><p><font color="white"><b>����ȭ�� 
            ����</b></font></td>
    </tr>
    <tr>
        <td width="140" height="13" align="center" bgcolor="DFF6E7"><p>�����ۼ�����</td>
        <td width="420" height="13" align="left" bgcolor="white"><p>������Form�ۼ� 
            -&gt; ���� -&gt; ���� -&gt; ����������</td>
    </tr>
    <tr>
        <td width="140" align="center" bgcolor="DFF6E7"><p>��������</td>
        <td width="420" bgcolor="white">
		
		<form name="form1" method="get">
            <p><select name=formnum style="font-family:����; font-size:13px;">
            <option selected value="1">�ް���ȹ��</option>
            <option value="2">���Ͼ�������</option>
            <option value="3">�ְ���������</option>
            <option value="4">������������</option>
            <option value="5">�ְ�������ȹ��</option>
            <option value="6">����������ȹ��</option></select> <input type="button"
             name="FORM1" value="�����ۼ�" style="font-family:����; font-size:13px;" onClick="CheckValues1()"></td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560"></form>
            <p><font color="red">����</font>: ���� �����ǰ��ִ� �⺻���� 
            �����Դϴ�. ������� ���� �⺻������ ����ϴ� ���������̸� �������´� 
            ��� ���׷��̵� �� �����Դϴ�.</td>
    </tr>
</table>
<br> 
<table border="0" cellpadding="0" cellspacing="1" bgcolor="#B4B6F4">
    <tr>
        <td width="560" height="30" colspan="2"><p><font color="white"><b>�����ۼ�����</b></font></td>
    </tr>
    <tr>
        <td width="140" height="14" align="center" bgcolor="#E5E7FF"><p>�����ۼ�����</td>
        <td width="420" height="14" bgcolor="white"><p>&nbsp;���ι����ۼ� -&gt; 
            ���� -&gt; ���� -&gt; ����������</td>
    </tr>
    <tr>
        <td width="140" height="28" align="center" bgcolor="#E5E7FF"><p>�������Է�</td>
        <td width="420" height="28" bgcolor="white">
		
		<form name="form2" method="post" action="personal\pmakedoc.php">
            <p>&nbsp;<input type="text" name="docname" maxlength="200" size="30" style="font-family:����; font-size:13px;"> 
            <input type="button" name="button2" value="�����߼�" style="font-family:����; font-size:13px;" onClick="CheckValues2()"></td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560"></form>
            <p><font color="red">����</font>: ������ �ۼ��� ������ �߼��ϴ� 
            �����Դϴ�. ������ �Է¶����� �ݵ�� �߼۵Ǵ� ������ ���¸��� �Է��Ͻñ� 
            �ٶ��ϴ�. (�� : '�ް���ȹ��')</td>
    </tr>
</table>
<br>&nbsp;
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560" align="center" valign="top"><p>
        [<a href=<?echo$main_frame;?>>ó������</a>]
	[<a href='javascript:history.go(-1);' name=button>�ڷ�</a>]
<br><hr size="1" width="90%">
            </td>
    </tr>
</table>
</td></tr></table>

</body>
</html>