<? include "../lib/header.php" ?>
<div id="top_img">
<? include "../lib/top_img.php" ?>
</div>
<div id="wap">
<div class="left_menu">
	<? include "../lib/left_menu.php" ?>
</div><!-- left_menu -->
<div id="contents_div">
<div class="title">
<h3>기본 회원 정보</h3>
</div>
<div id="hidden_ok">
<!--이구간은 작성 금지구간입니다. -->
</div>
	<!--//
	Form은 다중 Form을 쓰지 않는 이상 table 밖에다가 쓰는 버릇을 들이는게 나중에 디버깅이나 코드 수정할 때 편해요
	테이블 테그는 tr, td 요소 구분 지어서 써주는 것도 좋음
	-->
	<form name="user_add_form" id="user_add" action="user_add_insert.php" method="post">
	<table cellspacing="0" cellpadding="0" id="user_add_table">
		<tr>
			<th class="add_header" scope="row" scope="row" id="th_name">
				* 이름
			</th>
			<td>
				<div>
					<input type="text" name="name" id="name" class="user_add_input">
				</div>
			</td>
		</tr>
		<tr>
			<th scope="row" scope="row" id="th_id">
				* 아이디
			</th>
			<td>
				<div class="add_confirm" id="add_confirm">
					<input type="text" name="id" id="id" class="user_add_input">
					<input type="image" onclick="id_check(); return false;" src="http://thtjwls.dothome.co.kr/test/img/jungbok.png" style="vertical-align:middle">
						<!--<img src="http://thtjwls.dothome.co.kr/test/img/jungbok.png">-->
				<p>영문5자 이상 10자 이하</p>
				</div>
			</td>
		</tr>
		<tr>
			<th scope="row" id="th_pass">
				* 비밀번호
			</th>
			<td>
				<div>
					<input type="password" name="pass" id="pass" class="user_add_input">
					<p class="form_confirm">영문,숫자,특수문자 조합 6자리 이상</p>
				</div>
			</td>
		</tr>
		<tr>
			<th scope="row" id="th_pass2">
				* 비밀번호 확인
			</th>
			<td>
				<div class="add_confirm">
					<input type="password" name="pass_confirm" id="pass_confirm" class="user_add_input">
					<input type="image" onclick="pass_check(); return false;" src="http://thtjwls.dothome.co.kr/test/img/number.png" style="vertical-align:middle">
					<!--<img src="http://thtjwls.dothome.co.kr/test/img/number.png">-->
					</a>
					<p>영문,숫자,특수문자 조합 6자리 이상</p>
				</div>
			</td>
		</tr>
		<tr>
			<th class="add_header" scope="row">* 닉네임</td>
			<td>
				<div>
					<input type="text" name="nick" id="nick" class="user_add_input">
					<input type="image" onclick="nick_check(); return false;" src="http://thtjwls.dothome.co.kr/test/img/jungbok.png" style="vertical-align:middle">
				</div>
			</td>
		</tr>
		<tr>
			<th class="add_header" scope="row">
				* 이메일
			</th>
			<td>
				<div>
					<input type="text" name="email1" id="email1" class="user_add_email">@
					<input type="text" name="email2" id="email2" class="user_add_email">
				</div>
			</td>
		</tr>
		<tr>
			<th class="add_header" scope="row">
				* 주소
			</td>
			<td>
				<div>
					<input type="text" name="address" id="address" class="user_add_address">
				</div>
			</td>
		</tr>
		<tr>
			<th class="add_header" scope="row">
				* 휴대폰번호
			</td>
			<td>
				<div>
					<select name="hp1" id="hp1">
						<option value="010">010</option>
						<option value="011">011</option>
						<option value="019">019</option>
					</select>-
					<input type="text" name="hp2" id="hp2">-
					<input type="text" name="hp3" id="hp3">
				</div>
			</td>
		</tr>
	</table>
	<div id="add_button">
	<input type="button" id="button" value="확인" onclick="user_insert_check()"><input type="reset" id="user_reset" value="취소">
	</div>
	</form>
</div>
</div><!-- wap_end -->
<? include "../lib/footer.php" ?>