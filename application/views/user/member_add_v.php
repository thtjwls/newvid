<!-- 회원가입 -->
<div class="members-add-wrap contents">
	<form action="" id="useraddForm" method="post">
		<!-- 아이디,비밀번호,이름,이메일,핸드폰번호,주소 -->
		<fieldset>
			<legend class="hidden">회원가입</legend>
			<div class="row_group">
				<div class="inDiv">
					<label for="mem_id">아이디</label>
					<input type="text" placeholder="아이디" name="mem_id" id="mem_id"/>
					<span class="input_icon"></span>
					<p class="help-text"></p>
				</div>
				<div class="inDiv">
					<label for="mem_password">비밀번호</label>
					<input type="password" placeholder="비밀번호" name="mem_password" id="mem_password"/>
					<i class="fa fa-lock fa-2x"></i>
					<!--
					<span class="input_icon">
						<i class="fa fa-lock fa-2x"></i>
					</span>-->
					<p class="help-text"></p>
				</div>
				<div class="inDiv">
					<label for="mem_password_confirm">비밀번호 확인</label>
					<input type="password" placeholder="비밀번호 확인" id="mem_password_confirm"/>
					<i class="fa fa-check fa-2x"></i>
					<p class="help-text"></p>
				</div>
			</div>
			<div class="row_group">
				<div class="inDiv">
					<label for="mem_name">이름</label>
					<input type="text" placeholder="이름" name="mem_name" id="mem_name"/>
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
					<input type="text" placeholder="년(yyyy)" id="birthdayYear" class="birthdayInput"/>
					<select name="birthdayMonth" id="birthdayMonth" class="birthdayMonth">
						<option value="0">월</option>
						<? for ( $i = 1; $i <= 12; $i++ ) { ?>
						<option value="<?=$i?>"><?=$i?></option>
						<? } ?>
					</select>			
					<select name="birthdayDay" id="birthdayDay" class="birthdayDay">
						<option value="0">일</option>
						<? for( $i = 1; $i <= 31; $i++ ) { ?>
						<option value="<?=$i?>"><?=$i?></option>
						<? } ?>
					</select>
					<p class="help-text"></p>
				</div>
				<div class="inDiv">
					<input type="email" placeholder="이메일" name="mem_email" id="mem_email"/>
				</div>
			</div>
			<div class="row_group phoneDiv">
				<div class="inDiv">
					<input type="tel" placeholder="휴대전화번호" id="mem_tel"/>
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
				<input type="button" href="javascript:void();" onclick="useradd();" class="submit-btn" value="회원가입"/>
			</div>
		</fieldset>
        <input type="hidden" id="id_chk" value="false">
        <input type="hidden" id="pass_chk" value="false">
	</form>
</div>
<script>
    $(function () {
        useradd();
    })

    function useradd()
    {
        var formContainer       = $('#useraddForm'),
            id                  = $("#mem_id"),
            password            = $("#mem_password"),
            password_confirm    = $("#mem_password_confirm"),
            name                = $("#mem_name"),
            genger              = $("#gender"),
            birthY              = $("#birthdayYear"),
            birthM              = $("#birthdayMonth"),
            birthD              = $("#birthdayDay"),
            email               = $("#mem_email"),
            tel                 = $("#mem_tel"),
            id_chk              = $("#id_chk"),
            pass_chk            = $("#pass_chk");


            id.chkField();
    }

    $.fn.extend({
        chkField : function () {

        }
    })
</script>