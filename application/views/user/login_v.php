<div class="login-wrap contents">
	<form action="">
		<div class="login-header row">
			<h3>login</h3>
		</div>
		<div class="login-contents row">
			<div class="input-area">
				<label for="id">아이디</label>
				<div class="input-group">
					<input type="text" name="id" id="id" placeholder="ID" require/>
					<i class="fa fa-user fa-2x"></i>
				</div>				
				<div class="input-group">
					<label for="password">비밀번호</label>
					<input type="password" name="password" id="password" placeholder="PASSWORD" require/>
					<i class="fa fa-lock fa-2x"></i>
				</div>								
			</div>			
			<p class="helper">아이디 또는 비밀번호를 입력 해주세요.</p>
		</div>
		<div class="login-actions row">
			<input type="submit" value="login" class="submit-btn"/>
		</div>
		<div class="login-lose row">
			<span>
				<a href="/members/user/lose">아이디를 잃어버리셨나요?</a>
			</span>
			<span>
				<a href="/members/user/lose">비밀번호를 잃어버리셨나요?</a>
			</span>
		</div>	
	</form>	
</div>
