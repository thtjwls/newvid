<? include "./lib/login_page_inmenu.php" ?>

<div class="in_contents_wrap">
    <div id="login_wap">
        <div id="login_text">
            <h1>로그인</h1>
        </div>
    
        <div class="inner_login_form">
            <form name="login_form" action="./user/login_check.php" method="post">
                <div class="login_form_input">
                    <div class="login_form_id">
                        <span id="login_form_text_id">ID</span>
                        <input type="text" name="id" value="" />
                    </div>
                    <div class="login_form_pass">
                        <span id="login_form_text_pass">PASSWORD</span>
                        <input type="password" name="pass" value="">
                    </div>
                    <input type="button" value="LOGIN" style="font-size:18px;" onclick="login()"/>
                </div>
            </form>
            <div class="login_form_search">
                <div class="meber_add_nav">
                    <p>아직 회원이 아니신가요? <span>회원가입하기 <img src="./img/form_right_boolet.png" width="12px;"/></span></p>
                </div>
                <div class="member_id_search">
                    <p>아이디를 분실 하셧나요? <span>아이디 찾기<img src="./img/form_right_boolet.png" width="12px;"/></span></p>
                </div>
                <div class="member_pass_search">
                    <p>비밀번호를 분실 하셧나요? <span>비밀번호 찾기<img src="./img/form_right_boolet.png" width="12px;"/></span></p>
                </div>
            </div>
        </div>
    </div><!--login_wap end -->
</div>