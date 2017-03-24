<? include "header.php"; ?>
        <div id="login_wrap">
            <div class="wrap_top">
                <p>웹기반 재고관리 시스템</p>
            </div>
            <div class="login_form">
                <form action="lib/login_data.php?mod=login" method="post" id="login_submit_form">
                    <input type="text" value="" class="login_form_input" id="login_form_index_id" name="id" placeholder="아이디를 입력 해 주세요." autocomplete="off"/>
                    <input type="password" value="" class="login_form_input" id="login_form_index_pass" name="pass" placeholder="비밀번호를 입력 해 주세요." autocomplete="off"/>
                    <input type="button" value="LOGIN IN" id="login_form_index_submit" class="login_form_input"/>
                </form>
            </div>
        </div>
<? include "footer.php"; ?>