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
				<a href="">아이디를 잃어버리셨나요?</a>
			</span>
			<span>
				<a href="">비밀번호를 잃어버리셨나요?</a>
			</span>
		</div>	
	</form>	
</div>
<style type="text/css">
	.login-wrap { width:600px; margin:auto auto; }
	.login-wrap h3{ text-transform:uppercase; text-align:center; }
	.login-wrap .row { width:100%; margin-bottom:30px; }
	.login-wrap .login-contents label { display:none; }
	.login-wrap .login-contents .input-area { width:70%;margin:auto; }
	.login-wrap .login-contents input { width:100%; padding:15px; background:none; 
	border:1px solid #B1B1B1;}
	.login-wrap .login-contents .input-group { position:relative; margin-bottom:10px; }
	.login-wrap .login-contents .input-group > .fa { position: absolute; right:12px; top:12px; color:#B1B1B1;}
	.login-wrap .login-contents p.helper { padding:10px;width:70%;margin:auto; }
	.login-wrap .login-actions { width:70%;margin-right:auto;margin-left:auto; }
	.login-wrap .login-actions .submit-btn { width:100%;border:0; background-color:#ff2c2c;color:#FFF; font-size:21px; font-weight:300; text-transform:uppercase; padding:10px 0; }
</style>