<!-- 회원가입 -->
<div class="members-add-wrap contents">
	<form action="">
		<!-- 아이디,비밀번호,이름,이메일,핸드폰번호,주소 -->
		<fieldset>
			<legend class="hidden">회원가입</legend>
			<div class="row_group">
				<div class="inDiv">
					<label for="">아이디</label>
					<input type="text" placeholder="아이디"/>
					<span class="input_icon"></span>
					<p class="help-text"></p>
				</div>
				<div class="inDiv">
					<label for="">비밀번호</label>
					<input type="password" placeholder="비밀번호"/>
					<i class="fa fa-lock fa-2x"></i>
					<!--
					<span class="input_icon">
						<i class="fa fa-lock fa-2x"></i>
					</span>-->
					<p class="help-text"></p>
				</div>
				<div class="inDiv">
					<label for="">비밀번호 확인</label>
					<input type="password" placeholder="비밀번호 확인"/>
					<i class="fa fa-check fa-2x"></i>
					<p class="help-text"></p>
				</div>
			</div>
			<div class="row_group">
				<div class="inDiv">
					<label for="">이름</label>
					<input type="text" placeholder="이름"/>
					<span class="input_icon"></span>
					<p class="help-text"></p>
				</div>
				<div class="inDiv" id="gender_group">
					<input type="radio" name="gender" id="male"/>
					<label for="male" class="btn">
						남자
					</label>
					<input type="radio" name="gender" id="female"/>
					<label for="female" class="btn">
						여자
					</label>										
				</div>
				<div class="inDiv birthdayDiv">
					<span class="form_title">생일</span>
					<input type="text" placeholder="년(yyyy)" class="birthdayInput"/>
					<select name="" id="" class="birthdayMonth">
						<option value="">월</option>
						<? for ( $i = 1; $i <= 12; $i++ ) { ?>
						<option value=""><?=$i?></option>
						<? } ?>
					</select>			
					<select name="" id="" class="birthdayDay">
						<option value="">일</option>
						<? for( $i = 1; $i <= 31; $i++ ) { ?>
						<option value=""><?=$i?></option>
						<? } ?>
					</select>
					<p class="help-text"></p>
				</div>
				<div class="inDiv">
					<input type="email" placeholder="본인확인 이메일(선택)"/>
				</div>
			</div>
			<div class="row_group phoneDiv">
				<div class="inDiv">
					<input type="tel" placeholder="휴대전화번호"/>
					<button>인증</button>
					<p class="help-text"></p>
				</div>
				<div class="inDiv">
					<input type="text" placeholder="인증번호"/>
					<button>인증</button>
					<p class="help-text"></p>
				</div>
			</div>
			<div class="row_group">
				<input type="button" class="submit-btn" value="회원가입"/>
			</div>
		</fieldset>
	</form>
</div>
