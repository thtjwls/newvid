<?
session_start();

include "config.php";
$login=$login_id;

?>
<html>
<head>
<title>문서작성 및 발송</title>
<SCRIPT LANGUAGE="JavaScript">
<!--
function CheckValues1()
{

	var strFormnum=document.form1.formnum.value;
	
	
	if ( strFormnum == "1" ) {
		if(confirm("'휴가계획서'를 선택하셨습니다.\n문서를 작성하시겠습니까?")) {
			parent.mainFrame.location="resort/resortdoc.php";
		}
	} else {
		confirm("현재 해당 서식파일이 준비되지 않았습니다.\n준비되는데로 이용하실 수 있습니다!");
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
		alert("개인문서 결재선택시 문서명이 있어야합니다.\n결재할 문서명을 입력하시오.");
		document.form2.docname.select();
		document.form2.docname.focus();
	}
    else {
       	if(confirm("문서명은 '"+strTable+"'입니다.\n문서명이 정확합니까?")) {
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
        <td width="162" height="33" ><p><font color="white"><b>&nbsp;문서작성 
            및 발송</b></font></td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560"><br><img src="appoint2.gif" align="left" width="64"
             height="64" border="0">결재를 획득하기 하기 위해서는 반드시 문서를 
            작성하거나 문서를 첨부하셔야 합니다. 결재할 문서를 발송하고 난후 
            검토자나 승인자가 반송을 했을 경우는 앞의 과정은 모두 무시되고 문서작성자에게 
            곧바로 반송됩니다. 결재의 경우는 결재자가 접속을 하지 않는 경우 
            오랫동안 결재가 안될 가능성이 있습니다.</td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560"><p><img src="appoint1.gif" align="left" width="64"
             height="64" border="0">이 전자 결재시스템은 현재 작성,검토,결재 라는 간단한 절차만 수행하도록 
            되어 있습니다. <p>문의 Email : <a
             href="mailto:<?echo$admin_mail?>"><?echo$admin_mail?></a></td>
    </tr>
</table>
<table border="0" cellspacing="1" bgcolor="5DB17D">
    <tr>
        <td width="560" height="27" align="left" colspan="2"><p><font color="white"><b>정형화된 
            문서</b></font></td>
    </tr>
    <tr>
        <td width="140" height="13" align="center" bgcolor="DFF6E7"><p>문서작성순서</td>
        <td width="420" height="13" align="left" bgcolor="white"><p>제공된Form작성 
            -&gt; 결재 -&gt; 승인 -&gt; 문서보관함</td>
    </tr>
    <tr>
        <td width="140" align="center" bgcolor="DFF6E7"><p>문서선택</td>
        <td width="420" bgcolor="white">
		
		<form name="form1" method="get">
            <p><select name=formnum style="font-family:굴림; font-size:13px;">
            <option selected value="1">휴가계획서</option>
            <option value="2">일일업무일지</option>
            <option value="3">주간업무일지</option>
            <option value="4">월간업무일지</option>
            <option value="5">주간업무계획서</option>
            <option value="6">월간업무계획서</option></select> <input type="button"
             name="FORM1" value="문서작성" style="font-family:굴림; font-size:13px;" onClick="CheckValues1()"></td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560"></form>
            <p><font color="red">참고</font>: 현재 제공되고있는 기본적인 
            문서입니다. 기업에서 가장 기본적으로 사용하는 문서형태이며 문서형태는 
            계속 업그레이드 할 예정입니다.</td>
    </tr>
</table>
<br> 
<table border="0" cellpadding="0" cellspacing="1" bgcolor="#B4B6F4">
    <tr>
        <td width="560" height="30" colspan="2"><p><font color="white"><b>개인작성문서</b></font></td>
    </tr>
    <tr>
        <td width="140" height="14" align="center" bgcolor="#E5E7FF"><p>문서작성순서</td>
        <td width="420" height="14" bgcolor="white"><p>&nbsp;개인문서작성 -&gt; 
            결재 -&gt; 승인 -&gt; 문서보관함</td>
    </tr>
    <tr>
        <td width="140" height="28" align="center" bgcolor="#E5E7FF"><p>문서명입력</td>
        <td width="420" height="28" bgcolor="white">
		
		<form name="form2" method="post" action="personal\pmakedoc.php">
            <p>&nbsp;<input type="text" name="docname" maxlength="200" size="30" style="font-family:굴림; font-size:13px;"> 
            <input type="button" name="button2" value="문서발송" style="font-family:굴림; font-size:13px;" onClick="CheckValues2()"></td>
    </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560"></form>
            <p><font color="red">참고</font>: 본인이 작성한 문서를 발송하는 
            형태입니다. 문서명 입력란에는 반드시 발송되는 문서의 형태명을 입력하시기 
            바랍니다. (예 : '휴가계획서')</td>
    </tr>
</table>
<br>&nbsp;
<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560" align="center" valign="top"><p>
        [<a href=<?echo$main_frame;?>>처음으로</a>]
	[<a href='javascript:history.go(-1);' name=button>뒤로</a>]
<br><hr size="1" width="90%">
            </td>
    </tr>
</table>
</td></tr></table>

</body>
</html>