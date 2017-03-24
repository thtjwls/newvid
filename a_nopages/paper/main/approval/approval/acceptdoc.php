<?
session_cache_limiter("");
session_start();

$login=$login_id;
$user=$user_name;
$part=$comp_part;
$rank=$comp_rank;

include "config.php";
include "connection.php";
?>

<html>
<head>
<LINK REL="stylesheet" TYPE="text/css" HREF="../allstyle.css">
<script language="JavaScript">
<!--
// 이미지 변화
image_buffer = new Array;
image_buffer[0] = new Array;
image_buffer[1] = new Array;
for(i = 0; i < 2; i++)
	for(j = 0; j < 3; j++)
		image_buffer[i][j] = new Image;
image_buffer[0][0].src = "button03.gif";
image_buffer[1][0].src = "button03j.gif";
image_buffer[0][1].src = "button02.gif";
image_buffer[1][1].src = "button02j.gif";
image_buffer[0][2].src = "button04.gif";
image_buffer[1][2].src = "button04j.gif";


function change_image(obj, type, toggle)
{
	obj.src = image_buffer[toggle][type].src;
	return true;
}

function onclick_accept(form)
{

	form.submit();	 
	return true;
}



-->
</SCRIPT>

</head>

<body link="#3366cc" alink="#3366cc"> 
<p align="left">
<div align="left">

<table border="0" cellpadding="0" cellspacing="0" width=900>
<tr>
	<td width=10 >&nbsp;</td>
	<td align=left>
	
	
	
    		<table border=0 cellpadding="0" cellspacing="0" >
    		<!------- 결재할 문서 목록 --------->
    		<tr>
        
        		<td width="500"  valign="top" align=center>
        		<!---- 문서를 디스플레이 하고 메모를 입렵 받는다. -->
        		<? $select = mysql_query("SELECT * FROM $table_name_2 WHERE seq_num=$index", $con);
        			if(!$select)
					{
						echo("
							<script>
							window.alert('DB select error in approve(chkdoc.php)!');
							history.go(-1);
							</script>
							");
						exit;
					}
					$row=mysql_fetch_array($select)
				?>
        			<table border=0 cellpadding="0" cellspacing="0"><tr>
        			<td align=left><img src=title22.gif></td>
        			</tr>
        			<? IF($sign == 1)
					{
						?>
        			<!-- 결재승인 -->
        			<tr>
        			<td>
        				아래의 문서를 최종승인 하셨습니다. 최종승인된 문서는 문서보관함에 자동으로 저장됩니다.
        				문서보관함에 저장되는 문서는 사용자 모두에게 공개가 되므로 되도록이면 메모를 넣어주시는 것이
        				문서를 참고하는 분들엑 도움을 줄수가 있습니다. 메모를 작성하지 않으셔두 무방합니다.
        				<br> <br>
						
					<form name=form1 method=post action=actionaccept.php>
        				<table border=0 cellpadding="0" cellspacing="1" bgcolor=60B030>
        				<tr height=20><td style="color:white;" align=center>확인서명</td><td bgcolor=white style="color:blue;">&nbsp;최종승인합니다!</td></tr>
        				<tr height=20><td style="color:white;" align=center>문서명</td><td bgcolor=white>&nbsp;<?echo$row[docname]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>작성자</td><td bgcolor=white>&nbsp;<?echo$row[from_part]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>작성일</td><td bgcolor=white>&nbsp;<?echo$row[sdate]?></td></tr>
        				<tr><td style="color:white;" align=center>메모작성</td><td bgcolor=white>
        				<textarea name="approvememo" rows="5" cols="60" style="font-family:굴림; font-size:13px;"></textarea></td></tr>
        				</table>
        				<input type=hidden name=sign value=1>
        				<input type=hidden name=index value=<?echo$index?>>
        			</td>
        			</tr>
        			<!-- 결재승인 -->
        			<?
					}
					ELSE
					{
						?>
        			<!-- 결재반려 -->
        			<tr>
        			<td>
        				아래의 문서를 반려하셨습니다. 문제점을 메모에 적어서 보내시면 작성자가 새롭게 작성할때
        				도움이 되므로 메모를 작성하시는 것이 업무에 효율을 주실수 있습니다. 반려사유를 반드시 기입하시기 바랍니다. <br> <br>
						
					<form name=form1 method=post action=actionaccept.php>
        				<table border=0 cellpadding="0" cellspacing="1" bgcolor=60B030>
        				<tr height=20><td style="color:white;" align=center>확인서명</td><td bgcolor=white style="color:red;">&nbsp;문서를 반려합니다!</td></tr>
        				<tr height=20><td style="color:white;" align=center>문서명</td><td bgcolor=white>&nbsp;<?echo$row[docname]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>작성자</td><td bgcolor=white>&nbsp;<?echo$row[from_part]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>작성일</td><td bgcolor=white>&nbsp;<?echo$row[sdate]?></td></tr>
						<?/*
        				<tr height=20><td style="color:white;" align=center>선택사항</td><td bgcolor=white>&nbsp;이전 검토자에게 재검토를 의뢰하시겠습니까?&nbsp;&nbsp;&nbsp;예<input type=radio name=chk value=1>아니오<input type=radio name=chk value=0 checked></td></tr>
						*/?>
        				<tr><td style="color:white;" align=center>메모작성</td><td bgcolor=white>
        				<textarea name="approvememo2" rows="5" cols="60" style="font-family:굴림; font-size:13px;"></textarea></td></tr>
        				</table>
        				<input type=hidden name=sign value=0>
        				<input type=hidden name=index value=<?echo$index?>>
        			</td>
        			</tr>
        			<!-- 결재반려 -->
        			<?
					}
					?>
        			</table>  
        			
        			<br>
        			<center>
        			<? IF($sign == 1)
					{
						?>
        			<a href="javascript:onclick_accept(document.form1)" onMouseOver="change_image(img_button01, 0, 1);" onMouseOut="change_image(img_button01, 0, 0);"><img name=img_button01 src=button03.gif border=0></a>
        			&nbsp;<a href="" onclick="form1.reset(); return false;" onMouseOver="change_image(img_button02, 1, 1);" onMouseOut="change_image(img_button02, 1, 0);"><img name=img_button02 src=button02.gif border=0></a>
        			<?
					}
					ELSE
					{
						?>
        			<a href="javascript:onclick_accept(document.form1)" onMouseOver="change_image(img_button03, 2, 1);" onMouseOut="change_image(img_button03, 2, 0);"><img name=img_button03 src=button04.gif border=0></a>
        			&nbsp;<a href="" onclick="form1.reset(); return false;" onMouseOver="change_image(img_button02, 1, 1);" onMouseOut="change_image(img_button02, 1, 0);"><img name=img_button02 src=button02.gif border=0></a>
        			<?
					}
					?>
        			</center>              
        			</form>
        
        		</td>
    		</tr>
	</table>
		<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="560" align="center" valign="top"><p>
        [<a href=<?echo("$main_frame");?>>처음으로</a>]
	[<a href='javascript:history.go(-1);' name=button>뒤로</a>]
<br><hr size="1" width="70%">
            </td>
    </tr>
</table>

	</td>
</tr>
</table>
</div>

</body>
</html>