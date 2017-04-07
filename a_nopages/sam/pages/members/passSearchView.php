<?
$id = $_POST["ad_ID"];
$tel = $_POST["ad_TEL"];
?>
<div class="default_wrap_size passSearchView">
    <h3 class="pageTitle">
        Password Search
    </h3>
    <div class="contents">
        <h4>Please Enter youre Change Password</h4>
        <form action="" method="post" autocomplete="off" id="password_search_form">
            <div class="change_passwordDiv chageInputBlock">
                <input type="password" name="ad_PASS" id="change_password" value="" placeholder="변경 할 비밀번호" required />
            </div>
            <div class="change_password_confirmDiv chageInputBlock">
                <input type="password" value="" id="change_password_confirm" placeholder="비밀번호 확인" required />
            </div>
            <input type="button" value="SUBMIT" onclick="submitPassChange();" />
            <input type="hidden" value="<?=$id?>" name="ad_ID"/>
            <input type="hidden" value="<?=$tel?>" name="ad_TEL"/>
        </form>        
        <div class="input_password_support_Div">
            <p id="input_password_support_text">Check You're Password ... !!!</p>
        </div>
    </div>
    <input type="hidden" value="" id="chackEnterPassword" />
</div>
<script src="js/password_change.js"></script>