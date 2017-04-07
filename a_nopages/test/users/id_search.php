<? include "../lib/header.php" ?>
<div id="top_img">
<? include "../lib/top_img.php" ?>
</div>
<div id="wap">
<div class="left_menu">
	<? include "../lib/left_menu.php" ?>
</div><!-- left_menu -->
<div id="contents_div">
<h3>회원 찾기</h3>
<div class="search">
	<?
		$mode	=$_GET["mode"];
		$name	=$_GET["name"];
		$id		=$_GET["id"];
		$hp		=$_GET["hp"];

			if($mode == "id_search")
			{		
				$sql	="select count(id) from users where name='$name' && hp='$hp'";
				$result	=mysql_query($sql,$connect);
				$search	=mysql_result($result,0,0);
				
				if($search == 0){
				?>
				<script>
					alert("등록 된 사용자가 없습니다.");
					location.href="http://thtjwls.dothome.co.kr/test/users/id_search.php";
				</script>
			<? } else { 
				$sql	="select id from users where name='$name' && hp='$hp'";
				$result	= mysql_query($sql,$connect);
				$search	= mysql_result($result,0,0);
			?>
				<script>
					alert("등록된 사용자는 <?=$search?> 입니다.");		
			//document.getElementById("search").innerHTML +="<p>등록된 사용자 는 <?=$search?> 입니다.</p>";
				</script>
		<? } 
		
		}else if($mode == "pass_search"){
			$sql	="select count(pass) from users where name='$name' && hp='$hp' && id='$id'";
			$result	=mysql_query($sql,$connect);
			$search	=mysql_result($result,0,0);

			if($search == 0){
		?>
		<script>
			alert("일치하는 내용이 없습니다.");
		</script>
		<? } else { ?>
			<script>
				var input = confirm("확인되었습니다. 비밀번호를 초기화 하시겠습니까?");
				
				if(input == "true"){
					<? 
						$query="update users set pass=1234568 where id='$id'";
						$q_result=mysql_query($query,$connect);
					?>
					window.alert("aa");
				} 
				</script>
				<? 
				} 
				} 
				?>
	<div class="id_search">
	<form name="search_form" id="id_search_form" action="id_search.php" method="post">
	<table cellspacing="0" cellpadding="0">
	<h1>아이디 찾기</h1>
	<div id="id_search_div">
		<tr>
			<td>
				<div>
					<input type="text" name="sid_name" id="sid_name" placeholder="이름">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div>
					<input type="text" id="sid_hp" name="sid_hp" placeholder="휴대폰 번호">
				</div>
			</td>
		</tr>
		<input type="hidden" name="hidden_search" id="hidden_search" value="id_search">
	</div>
	</table>
	<div id="add_button">
	<input type="button" id="button" value="찾기" onclick="id_search();">
	</div>
	</form>
	</div>
	
	<div class="pass_search">
	<form name="pass_sear_form" id="pass_search_form" action="id_search.php" method="post">
	<table cellspacing="0" cellpadding="0">
	<div id="pass_search_div">
		<h1>비밀번호 찾기</h1>
		<tr>
			<td>
				<div>
					<input type="text" name="id" id="sipass_id" placeholder="아이디">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div>
					<input type="text" name="name" id="sipass_name" placeholder="이름">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div>
					<input type="text" name="hp" id="sipass_hp" placeholder="휴대폰 번호">
				</div>
			</td>
		</tr>
		<input type="hidden" name="hidden_pass" id="hidden_pass" value="pass_search">
	</table>
	<div id="add_button">
	<input type="button" id="button" value="찾기" onclick="pass_search()">
	</div>
	</div>
	</div>
</div> <!-- id_search end -->
</div> <!-- search -->
</div><!-- wap_end -->
<? include "../lib/footer.php" ?>