</div>    <!--contents end-->
<footer>
    COPYRIGHT By., ALL RIGHT RESERVED
</footer>
</div><!--wrap end-->
<div class="login_wrap_absolute">
    <div class="login_wrap_relative">
        <div class="login_form_wrap">            
            <h3>로 그 인</h3>
            <input type="text" value="" placeholder="ID" id="login_member_id"/>
            <input type="password" value="" placeholder="PASSWORD" id="login_member_pass"/>            
            <input type="button" value="LOGIN" onclick="login_submit();"/>
            <p id="login_support_text"></p>
            <div class="id_pass_search">
                <a href="">아이디를 잊어버리셧나요?</a>
                <a href="">패스워드를 잊어버리셧나요?</a>
            </div>
            <div class="closeDiv">
                <a href="javascript:loginForm(false);">[CLOSE]</a>
            </div>
        </div>        
        <div class="login_form_hidden">
            <form action="" method="post" id="login_submit_form">
                <input type="hidden" value="" name="hidden_login_member_id" id="hidden_login_id"/>
                <input type="hidden" value="" name="hidden_login_member_pass" id="hidden_login_pass"/>
            </form>
        </div>
    </div>
</div>
</body>
</html>