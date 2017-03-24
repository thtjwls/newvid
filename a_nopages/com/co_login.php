<? include_once("header.php"); ?>
<script>
    $(function () {
        var ID_focus = $("input[name=input_ID]");
        var PASS_focus = $("input[name=input_PASS]");

        if (ID_focus.focus() || PASS_focus.focus()) {
            $(document).keypress(function (e) {
                if (e.keyCode == 13) {
                    LoginData();
                }
            })
        }
    })
</script>

<div class="loginDefault">
    <div class="innerBox">
        <h1>로그인 페이지</h1>
        <form method="post" id="LoginFormData">
            <input type="text" value="" placeholder="아이디" name="input_ID" autofocus/>
            <input type="password" value="" placeholder="비밀번호" name="input_PASS" />
            <input type="button" value="로그인" onclick="LoginData();" />
        </form>
    </div>
    <p id="LoginSupport"></p>
</div>
<? include_once("footer.php"); ?>