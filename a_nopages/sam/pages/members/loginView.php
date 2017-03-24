<div class="loginWrap">
    <h3 class="pageTitle">LOGIN</h3>
    <div class="loginViewLockImg">
        <img src="images/lock_img.jpg" alt="lock" />
    </div>
    <div class="loginForm">
        <p>로그인이 필요한 서비스입니다.</p>
        <form method="post" autocomplete="off" id="login_data_form">
            <input type="text" name="input_ID" value="" placeholder="ID" required autofocus />
            <input type="password" name="input_PASS" value="" placeholder="PASSWORD" required />
            <input type="button" value="LOGIN" onclick="loginSetup();" />
            <p id="login_support"></p>
        </form>
    </div>
    <div class="memberSearch">
        <div class="id_searchDIV inMemberS">
            <p>아이디를 잊어버리셧나요?</p>
            <form action="control.UserImport.php" method="post" id="ids_form">
                <ul>
                    <li>
                        <input type="text" value="" name="ad_Email" placeholder="Email" id="IDsearch_email" />
                    </li>
                    <li>
                        <input type="tel" value="" name="ad_TEL" placeholder="TEL" id="IDsearch_tel" />
                    </li>
                    <li>
                        <input type="button" value="SUBMIT" onclick="id_search_submit();" />
                    </li>
                </ul>
            </form>            
        </div>
        <div class="pass_searchDIV inMemberS">
            <p>비밀번호를 잊어버리셧나요?</p>
            <form action="?mod=passSearchView" method="post" id="pss_form">
                <ul>
                    <li>
                        <input type="text" value="" name="ad_ID" placeholder="ID" id="PASSsearch_id" />
                    </li>
                    <li>
                        <input type="tel" value="" name="ad_TEL" placeholder="TEL" id="PASSsearch_tel" />
                    </li>
                    <li>
                        <input type="button" value="SUBMIT" onclick="pass_search_submit();" />
                    </li>
                </ul>
            </form>
        </div>
        <div class="addLocationDIV">
            <p>회원가입 하러 가기<a href="">GO</a></p>
        </div>
    </div>
    <p id="search_support_text"></p>
</div>
<script src="js/login.js"></script>
<script src="js/userSearch_js.js"></script>