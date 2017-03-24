<? include "../lib/header.php" ?>
<div id="top_img">
<? include "../lib/top_img.php" ?>
</div>
<div id="wap">
<div class="left_menu">
	<? include "../lib/left_menu.php" ?>
</div><!-- left_menu -->
<div id="contents_div">
<table id="photo_list" cellpadding="0" cellspacing="0">
<h3>포토 갤러리</h3>
<tr>
<?
	$sql="select * from board where file1 !='0' and file1 !='' and ";
	$sql= $sql."file1 like '%.png' or ";
	$sql= $sql."file1 like '%.jpg' or ";
	$sql= $sql."file1 like '%.jpeg' or ";
	$sql= $sql."file1 like '%.gif' ";
	$sql= $sql."order by idx desc";
	$result=mysql_query($sql,$connect);

	while($row=mysql_fetch_array($result)){
		$img=$row[file1];
		$idx=$row[idx];
		$contents=$row[contents];
		$subject=$row[subject];
		$regist_day=substr($row[regist_day],5,5);

		//$img=substr($img,15);
		$dir="../file/";
?>
<td id="photo">
	<div id="photo_img">
		<a href="http://thtjwls.dothome.co.kr/test/board/board_view.php?idx=<?=$idx?>">
			<img src="<?=$dir.$img ?>" height="130px;">
	</div>
	<div id="photo_text">
		<p>[<?=$regist_day?>]<br>
		<?=$subject?><p>
	</div>
		</a>
</td>
<? } ?>
</tr>
</table>
</div>
</div><!-- wap_end -->
<? include "../lib/footer.php" ?>