<?
session_start();
$login=$login_id;
include "message_config.php";
include "lib.php";
include "config.php";
include "connection.php";

if(!$login) 
{
	echo"
		<script>
		window.alert('로그인 하세요')
		window.close()
		</script>
		";
	exit;
}

$select =mysql_query("select * from $table_name_1 where id='$login'", $con);
if(!$select)
{
	echo("
		<script>
		window.alert('DB select error in $table_name_1');
		window.close();
		</script>;
		");
}
$row=mysql_fetch_array($select);

if($mode=="alldelete"){
	
	//보낸쪽지함에서..삭제할때
	if($mode2=="send"){
		
		if(file_exists("$message_dir/$login.send.db.cgi")){
	
		unlink("$message_dir/$login.send.db.cgi");
		}
	
		echo "<meta http-equiv='refresh' content='0; url=message_box.php?mode=send_message'>" ;
		exit;
	}
	//보낸쪽지함에서..삭제할때끝...
	
	if(file_exists("$message_dir/$login.db.cgi")){
	
		unlink("$message_dir/$login.db.cgi");
	}
	if(file_exists("$message_dir/$login.cgi")){
		$delete_check= file("$message_dir/$login.cgi");
		$end_line_delete_check = count($delete_check) - 1;
		if($delete_check[$end_line_delete_check]==1){
			unlink("$message_dir/$login.cgi");
		}
	}
		
	echo "<meta http-equiv='refresh' content='0; url=message_box.php'>" ;
	exit;
}


if($mode=="selectdelete"){
	
	if($mode2=="send"){
		
		if(count($select_delete) == 0 ){
		
			echo"
				<script>
				window.alert('삭제할 쪽지를 선택하세요')
				history.go(-1)
				</script>
				";
			exit;
		}
	
	
		$temp2 = file("$message_dir/$login.send.db.cgi");
	
		for($i=0 ; $i< count($select_delete) ; $i++){
		
			$delete[] = $select_delete[$i];
	
		}
	
	
	
		$total_delete = count($delete);
	
			
		for($j=0 ; $j<$total_delete ; $j++){
			
			
	
			$del = $delete[$j]  ;
	
			$temp = file("$message_dir/$login.send.db.cgi");

			$total = count($temp);
		
			$fp = fopen("$message_dir/$login.send.db.cgi","w");

			flock($fp,2);

	
	
	
	
			for($i=0 ; $i<$total ; $i++){
		
				if($i!=$del){
				
				fwrite($fp, $temp[$i]);
		
				}
			}	
	
			fclose($fp);
		}
	
		echo "<meta http-equiv='refresh' content='0; url=message_box.php?mode=send_message'> " ;
	
		exit;
	}		
		
		
	// 보낸 쪽지함에서..	
	
	
	
		
	
	
	if(count($select_delete) == 0 ){
		
		echo"
			<script>
			window.alert('삭제할 쪽지를 선택하세요')
			history.go(-1)
			</script>
			";
		exit;
	}
	
	
	$temp2 = file("$message_dir/$login.db.cgi");
	
	for($i=0 ; $i< count($select_delete) ; $i++){
		
		$delete[] = $select_delete[$i];
	
	}
	
	
	
	$total_delete = count($delete);
	
			
	for($j=0 ; $j<$total_delete ; $j++){
	
		$del = $delete[$j] ;
	
		$temp = file("$message_dir/$login.db.cgi");

		$total = count($temp);
		
		$fp = fopen("$message_dir/$login.db.cgi","w");

		flock($fp,2);

	
	
	
	
		for($i=0 ; $i<$total ; $i++){
		
			if($i!=$del){
				
			fwrite($fp, $temp[$i]);
		
			}
		}
	
		fclose($fp);
	}
	
	echo "<meta http-equiv='refresh' content='0; url=message_box.php'> " ;
	
	exit;
}
?>

<title>쪽지함</title>
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

<script>
function newWindow( url )
{
  window.open( url, 'message','width=300,height=180,resizable=no,scrollbars=no,status=0');
}


function alldelete()
{
	if(confirm('삭제하시겠습니까?')){
		
		window.location.href='message_box.php?mode=alldelete';
	} else {
		
		return false;
	}
}


function alldelete2()
{
	if(confirm('삭제하시겠습니까?')){
		
		window.location.href='message_box.php?mode2=send&mode=alldelete';
	} else {
		
		return false;
	}
}


function selectdelete()
{
	if(!confirm('삭제하시겠습니까?')){
		
		return false;
	}
}		
		
	
</script>

<BODY leftMargin=0 topMargin=0 marginheight=0 marginwidth=0>


<?


if($mode=="send_message"){

	if(file_exists("$message_dir/$login.send.db.cgi")){

		$message = file("$message_dir/$login.send.db.cgi");
		$isfile=1;
	} else {
	
		$message[] = "";
		$isfile=0;
	}
	


	echo "

<table border=0 width=610><tr><td>
<form method=post action=$PHP_SELF>
<input type=hidden name=mode value=selectdelete>
<input type=hidden name=mode2 value=send>

<table border=0 width=100% cellspacing=1 cellpadding=3>
<tr align=center>
	<td>
	<img src='image/send_memo.jpg' border='0'>
	</td>
</tr>
</table>

<table border=0 bgcolor=#111111 width=100% cellspacing=1 cellpadding=3>
<tr><td bgcolor=white colspan=4 align=center><b><font color=red>◎</font> ${row[name]}(${row[id]})님의 보낸 쪽지함 <font color=red>◎</font></b></td></tr>
<tr bgcolor=#faf7eb>
<td align=center width=120 bgcolor=#faf7eb nowrap><b>받는사람</b></td>
<td align=center width=310 bgcolor=#faf7eb><b>내용</b></td>
<td align=center width=140 bgcolor=#faf7eb nowrap><b>날짜</b></td>
<td align=center width=35 bgcolor=#faf7eb nowrap><b>삭제</b></td>
</tr>




	";
	
	


	if($isfile==1){

		$delete_date2 = $delete_date * 24 * 60 * 60 ;
	
		$today = time();

	
		
		//지정일수가 지나면.. 메세지 삭제..
		for($i=0 ; $i < count($message) ; $i++){
		
			$temp2 = explode("|",$message[$i]);
		
			if($today - $temp2[3] > $delete_date2 ) {
						
				$cut_line = $i;
			}
		}
			
	
		if(isset($cut_line)){
		
			$message = file("$message_dir/$login.send.db.cgi");
		
			$fp = fopen("$message_dir/$login.send.db.cgi","w");

			flock($fp,2);

			for($i=0 ; $i<count($message) ; $i++){
		
				if($i>$cut_line){
				
					fwrite($fp, $message[$i]);
		
				}
			}
	
			fclose($fp);
		}
	
		// 삭제...
	
	
		//쪽지 개수가..지정된값보다 많을 경우 삭제
		$temp_message = file("$message_dir/$login.send.db.cgi");
		
		if(count($temp_message) > $saved_message_num){
			
			$cut_num = count($temp_message) - $saved_message_num;
			
			$fp = fopen("$message_dir/$login.send.db.cgi","w");

			flock($fp,2);

			for($i=0 ; $i<count($temp_message) ; $i++){
		
				if($i>=$cut_num){
				
				fwrite($fp, $temp_message[$i]);
		
				}
			}
	
			fclose($fp);
		}
		// 삭제..
	
	
		$n = count($message);
		$m = $n - 1;
		for($i=0 ; $i < $n ; $i++) {
		
			$message[$m] = chop($message[$m]);
			
			$message2[$i] = $message[$m]."|$m|";
		
			$m--;
		}
	
	
	
		$total= count($message2);
	
		if(empty($page)) $page = 1 ;

		if(($total % $message_scale) == 0 ) {

			$allpage = intval($total / $message_scale);
		} else {
		
			$allpage = intval($total / $message_scale) + 1 ;
		}
		
		if($page > $allpage ) $page=$allpage;
		
		if($total > $message_scale ){

			$start = ($page - 1) * $message_scale  ;

			if($page == $allpage ){
	
				$end = $total - 1 ;
			} else {
	
				$end = $start + $message_scale - 1  ;
			}
	

		} else {
	
			$start = 0 ;
			$end = $total - 1 ;
		}
	
	
	
	
	
	
	
		for($i=$start ; $i <= $end ; $i++ ){
	
		
		
			$temp2 = explode("|",$message2[$i]);

			if(file_exists("$message_dir/$temp2[0].cgi")){
				
				$sended_temp = file("$message_dir/$temp2[0].cgi");
				$end_line_sended_temp=count($sended_temp)-1;
				for($j=0;$j<count($sended_temp);$j++){
					$sended_message = explode("|",$sended_temp[$j]);
					
					if($sended_temp[$end_line_sended_temp]!=1){
						if( $login_info[0]==$sended_message[0] && $temp2[3]==$sended_message[3]){
							$color="red";
							$mark="<img src=yet.gif>";
							break;
						} else {
							$color="";
							$mark="";
						}
					} else {
						$color="";
						$mark="";
					}
				}
			} else {
				$color="";
				$mark="";
			}
				
			$temp2[3] = date("Y-m-d h:i:s a",$temp2[3]);
			echo " <tr><td bgcolor=white><a href=javascript:newWindow('message.php?to_filename=$temp2[0]&to=$temp2[1]')> $temp2[1]</a> </td><td wrap bgcolor=white> $temp2[2] $mark</td><td bgcolor=white><font color='$color'> $temp2[3]</font></td><td bgcolor=white align=center><input type=checkbox name=select_delete[] value=$temp2[5]></td></tr> \n";	
		
		

		}




	}


	echo"

</table>


</td></tr>
<tr><td align=center>

<input type=button value='전체삭제' class=submit onclick='alldelete2()'>&nbsp;&nbsp;&nbsp;<input type=submit value='선택삭제' class=submit onclick='return selectdelete()'>

</td></tr>

<tr><td align=center>
	
	";
	


	
	$start_page=(int)(($page-1)/$show_page_num)*$show_page_num;

	$i=1;
	
	if($page>$show_page_num){
		$prev_page= $start_page ;
		echo"
			<a href=$PHP_SELF?mode=send_message&page=1>[1]</a>..
			<a href=$PHP_SELF?mode=send_message&page=$prev_page>[Prev]</a>
			
		";
	}
	
	while($i+$start_page<=$allpage && $i<=$show_page_num){
		
		$move_page=$i+$start_page;
		if($page==$move_page) {
			echo "<font color=red>[$move_page]</font>";
		} else {
			echo "<a href=$PHP_SELF?mode=send_message&page=$move_page>[$move_page]</a>";
		}
		
		$i++;
	}
	
	if($allpage>$move_page){
		
		$next_page=$move_page + 1;
		
		echo "			
			<a href=$PHP_SELF?mode=send_message&page=$next_page>[Next]</a>
			..<a href=$PHP_SELF?mode=send_message&page=$allpage>[$allpage]</a>
		";
	}





	


	echo"

</td></tr>

<tr><td align=center>

<font color=silver>$delete_date 일이 지난 쪽지는 자동으로 삭제됩니다</font><br>
<font color=silver>$saved_message_num 개 까지 저장이 됩니다</font>
</td></tr>
<tr><td align=center>
</td></tr>
</table>
	";
	exit;

}












if(file_exists("$message_dir/$login.db.cgi")){

	$message = file("$message_dir/$login.db.cgi");
	$isfile=1;
} else {
	
	$message[] = "";
	$isfile=0;
}



echo "

<table border=0 width=610><tr><td>
<form method=post action=$PHP_SELF>
<input type=hidden name=mode value=selectdelete>

<table border=0 width=100% cellspacing=1 cellpadding=3>
<tr align=center>
	<td>
	<img src='image/recv_memo.jpg' border='0'>
	</td>
</tr>
</table>

<table border=0 bgcolor=#111111 width=605 cellspacing=1 cellpadding=3>
<tr><td bgcolor=white colspan=4 align=center><b><font color=red>◎</font> ${row[name]}(${row[id]})님의 받은 쪽지함 <font color=red>◎</font></b></td></tr>
<tr bgcolor=#faf7eb>
<td align=center width=120 bgcolor=#faf7eb nowrap><b>보낸사람</b></td>
<td align=center width=310 bgcolor=#faf7eb ><b>내용</b></td>
<td align=center width=140 bgcolor=#faf7eb nowrap><b>날짜</b></td>
<td align=center width=35 bgcolor=#faf7eb nowrap><b>삭제</b></td>
</tr>

";

if($isfile==1){

	$delete_date2 = $delete_date * 24 * 60 * 60 ;
	
	$today = time();




	//지정일수가 지나면.. 메세지 삭제..
	for($i=0 ; $i < count($message) ; $i++){
		
		$temp2 = explode("|",$message[$i]);
		
		if($today - $temp2[3] > $delete_date2 ) {
						
			$cut_line = $i;
		}
	}
			
	
	if(isset($cut_line)){
		
		$message = file("$message_dir/$login.db.cgi");
		
		$fp = fopen("$message_dir/$login.db.cgi","w");

		flock($fp,2);

		for($i=0 ; $i<count($message) ; $i++){
		
			if($i>$cut_line){
				
			fwrite($fp, $message[$i]);
		
			}
		}
	
		fclose($fp);
	}
	
	// 삭제...
	
	//쪽지 개수가..지정된값보다 많을 경우 삭제
		$temp_message = file("$message_dir/$login.db.cgi");
		if(count($temp_message) > $saved_message_num){
		
			$cut_num = count($temp_message) - $saved_message_num ;
							
			$fp = fopen("$message_dir/$login.db.cgi","w");

			flock($fp,2);

			for($i=0 ; $i<count($temp_message) ; $i++){
		
				if($i>=$cut_num){
				
				fwrite($fp, $temp_message[$i]);
		
				}
			}
	
			fclose($fp);
		}
		// 삭제..
	
	
	$n = count($message);
	$m = $n - 1;
	for($i=0 ; $i < $n ; $i++) {
		
		$message[$m] = chop($message[$m]);
		$message2[$i] = $message[$m]."|$m|";
		
		$m--;
	}
	
	
	
	$total= count($message2);
	
	if(empty($page)) $page = 1 ;

	if(($total % $message_scale) == 0 ) {

		$allpage = intval($total / $message_scale);
	} else {
		
		$allpage = intval($total / $message_scale) + 1 ;
	}
	
	if($page > $allpage ) $page=$allpage;

	if($total > $message_scale ){

		$start = ($page - 1) * $message_scale  ;

		if($page == $allpage ){
	
			$end = $total - 1 ;
		} else {
	
			$end = $start + $message_scale - 1  ;
		}
	

	} else {
	
		$start = 0 ;
		$end = $total - 1 ;
	}
	
	
	
	
	
	
	
	for($i=$start ; $i <= $end ; $i++ ){
	
		
		$temp2 = explode("|",$message2[$i]);
		
				
		$temp2[3] = date("Y-m-d h:i:s a",$temp2[3]);

		echo " <tr><td bgcolor=white><a href=javascript:newWindow('message.php?to_filename=$temp2[0]&to=$temp2[1]')> $temp2[1]</a> </td><td wrap bgcolor=white> $temp2[2] </td><td bgcolor=white> $temp2[3] </td><td bgcolor=white align=center><input type=checkbox name=select_delete[] value=$temp2[5]></td></tr> \n";	
		

	}




}


echo"

</table>


</td></tr>
<tr><td align=center>

<input type=button value='전체삭제' class=submit onclick='alldelete()'>&nbsp;&nbsp;&nbsp;<input type=submit value='선택삭제' class=submit onclick='return selectdelete()'>

</td></tr>

<tr><td align=center>
	
";
	
	$start_page=(int)(($page-1)/$show_page_num)*$show_page_num;

	$i=1;
	
	if($page>$show_page_num){
		$prev_page= $start_page ;
		echo"
			<a href=$PHP_SELF?page=1>[1]</a>..
			<a href=$PHP_SELF?page=$prev_page>[Prev]</a>
			
		";
	}
	
	while($i+$start_page<=$allpage && $i<=$show_page_num){
		
		$move_page=$i+$start_page;
		if($page==$move_page) {
			echo "<font color=red>[$move_page]</font>";
		} else {
			echo "<a href=$PHP_SELF?page=$move_page>[$move_page]</a>";
		}
		
		$i++;
	}
	
	if($allpage>$move_page){
		
		$next_page=$move_page + 1;
		
		echo "			
			<a href=$PHP_SELF?page=$next_page>[Next]</a>
			..<a href=$PHP_SELF?page=$allpage>[$allpage]</a>
		";
	}

echo"

</td></tr>

<tr><td align=center>

<font color=silver>$delete_date 일이 지난 쪽지는 자동으로 삭제됩니다</font><br>
<font color=silver>$saved_message_num 개 까지 저장이 됩니다</font>
</td></tr>
<tr><td align=center>
</td></tr>
</table>
";
?>
