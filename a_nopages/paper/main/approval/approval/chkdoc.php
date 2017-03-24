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
image_buffer[0][0].src = "button01.gif";
image_buffer[1][0].src = "button01j.gif";
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
function reload_1(part_name, index, etc_memo)
{
	var go='chkdoc.php?sign=1&part_name='+part_name+'&index='+index+'&etc_memo='+etc_memo;
		location.replace(go);
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
    		<!------- 검토할 문서 목록 --------->
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
        			<td align=left><img src=title11.gif></td>
        			</tr>
        			<? IF($sign == 1)
					{
					?>
        			<!-- 검토승인 -->
        			<tr>
        			<td>
        				아래와 같은 문서의 검토승인을 하셨습니다. 승인된 문서의 검토승인을 하실때 간단한 메모를 적어주시면 최종결재자가
        				결재할 문서를 결재할때 참고가 되며, 업무 프로세서의 절약이 되어 업무효율을 가지고 올수 있습니다. 또한, 필요 없을시에는
        				작성하지 않으셔두 됩니다. <br> <br>
						
					<form name=form1 method=post action=actionchk.php>
        				<table border=0 cellpadding="0" cellspacing="1" bgcolor=EFA000 width=500>
        				<tr height=20><td style="color:white;" align=center>확인서명</td><td bgcolor=white style="color:blue;">&nbsp;검토를 승인합니다!</td></tr>
        				<tr height=20><td style="color:white;" align=center>문서명</td><td bgcolor=white>&nbsp;<?echo$row[docname]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>작성자</td><td bgcolor=white>&nbsp;<?echo$row[from_part]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>작성일</td><td bgcolor=white>&nbsp;<?echo$row[sdate]?></td></tr>
        				</table>
        				<input type=hidden name=sign value=1>
        				<input type=hidden name=index value=<?echo$index?>>

        			</td>
        			</tr>
        			<tr>
        			<td>
							<br>
        				만일 또 다른 검토인에게 이 결재 문서를 의뢰하실 경우에 아래의 리스트에서 선택하시기 바랍니다. 선택된 검토인이 없을 시에는 자동으로 결재인에게 전송됩니다. <br> <br>
        				<table border=0 cellpadding="0" cellspacing="1" bgcolor=EFA000>
        				<tr height=20>
						<td width="91" height="21" align="center" bgcolor="#E5E7FF" class=mid><p>검토인선택</td>

						<td height="21" align="left" bgcolor="white" class=mid><p>
                    	<select name='viewers' style='font-family:굴림; font-size:13px;' onchange="reload_1(window.document.form1.viewers.options[selectedIndex].value, '<?echo$index?>');">
                        	<option selected value='0'>담당부서선택</option>
						<?
						
						$select = mysql_query("select comp_part from $table_name_1 group by comp_part", $con);

						if(!$select)
						{
							 echo("<script>
								window.alert('DB select error in $table_name_1');
								history.go(-1);
								</script>
									");
						 }

						while($row=mysql_fetch_array($select))
						{
							echo("
							<option value='$row[comp_part]'>$row[comp_part]</option>
            					");
						}
						echo("
                        </select>
						</td>

						<td height='21' align='left' bgcolor='white' class=mid><p>
                    		<select name='to_id' style='font-family:굴림; font-size:13px;'>
                        	<option selected value='1'>검토인선택</option>
							");
						$s = mysql_query("select id, name, comp_rank from $table_name_1 where comp_part='$part_name' order by name", $con);
						if(!$s)
						{
							 echo("<script>
								window.alert('DB select error in $table_name_1');
								history.go(-1);
								</script>
									");
						 }
						while($r=mysql_fetch_array($s))
						{
								echo("
									<option value=$r[id]>$r[comp_rank]-$r[name]</option>
								");
						}
						?>
                        	
                        </select>
                    </td>

                    </tr>
       				</table>
						<br>
        				<table border=0 cellpadding="0" cellspacing="1" bgcolor=EFA000 width=500 align=left>
        				<tr><td style="color:white;" align=center>메모작성</td><td bgcolor=white>
        				<textarea name="etc_memo" rows="5" cols="60" style="font-family:굴림; font-size:13px;"></textarea></td></tr>
							</table>

        			<!-- 검토승인 -->
        			<? 
					}
					ELSE
					{
					?>
        			<!-- 검토반려 -->
        			<tr>
        			<td>
        				아래와 같은 문서의 검토반려를 하셨습니다. 문제점을 메모에 적어서 보내시면 작성자가 새롭게 작성할때
        				도움이 되므로 메모를 작성 하시는 것이 업무에 효율을 주실수 있습니다. 반려사유를 반드시 기입하시기 바랍니다. <br> <br><form name=form1 method=post action=actionchk.php>
        				<table border=0 cellpadding="0" cellspacing="1" bgcolor=EFA000>
        				<tr height=20><td style="color:white;" align=center>확인서명</td><td bgcolor=white style="color:red;">&nbsp;검토을 반려합니다!</td></tr>
        				<tr height=20><td style="color:white;" align=center>문서명</td><td bgcolor=white>&nbsp;<?echo$row[docname]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>작성자</td><td bgcolor=white>&nbsp;<?echo$row[from_part]?></td></tr>
        				<tr height=20><td style="color:white;" align=center>작성일</td><td bgcolor=white>&nbsp;<?echo$row[sdate]?></td></tr>
        				<tr><td style="color:white;" align=center>메모작성</td><td bgcolor=white>
        				<textarea name="etc_memo2" rows="5" cols="60" style="font-family:굴림; font-size:13px;"></textarea></td></tr>
        				</table>
        				<input type=hidden name=sign value=0>
        				<input type=hidden name=index value=<?echo$index?>>
        			</td>
        			</tr>
        			<!-- 검토반려 -->
        			<?}?>

        			</table>  
        			
        			<br>
        			
        			<center>
        			<?IF($sign == 1)
					{
					?>
        			<a href="javascript:onclick_accept(document.form1)" onMouseOver="change_image(img_button01, 0, 1);" onMouseOut="change_image(img_button01, 0, 0);"><img name=img_button01 src=button01.gif border=0></a>
        			&nbsp;<a href="" onclick="form1.reset(); return false;" onMouseOver="change_image(img_button02, 1, 1);" onMouseOut="change_image(img_button02, 1, 0);"><img name=img_button02 src=button02.gif border=0></a>
        			<?
					}
					ELSE
					{
					?>
        			<a href="javascript:onclick_accept(document.form1)" onMouseOver="change_image(img_button03, 2, 1);" onMouseOut="change_image(img_button03, 2, 0);"><img name=img_button03 src=button04.gif border=0></a>
        			&nbsp;<a href="" onclick="form1.reset(); return false;" onMouseOver="change_image(img_button02, 1, 1);" onMouseOut="change_image(img_button02, 1, 0);"><img name=img_button02 src=button02.gif border=0></a>
        			<?}?>
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