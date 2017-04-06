<div class="userAddWrap">    
    <h3 class="pageTitle">
        JOIN MEMBERSHIP
    </h3>
    <div class="userAddFromDIV">
        <form action="" method="post" id="userAddFormData" autocomplete="off">
            <input type="text" value="" name="ad_NAME" placeholder="이름" required autofocus />
            <p id="su_1"></p>
            <input type="text" value="" name="ad_ID" placeholder="아이디" required />
            <p id="su_2"></p>
            <input type="password" value="" name="ad_PASS" placeholder="패스워드" required />
            <p id="su_3"></p>
            <input type="password" value="" name="ad_PASS_confirm" placeholder="패스워드 확인" required />
            <p id="su_4"></p>
            <input type="tel" value="" name="ad_TEL" placeholder="연락처 ex)010-0000-0000" required />
            <p id="su_5"></p>
            <input type="email" value="" name="ad_Email" placeholder="Email@email.com" required />
            <p id="su_6"></p>
            <input type="text" value="" name="ad_POST_NUM" placeholder="우편번호" required />
            <p id="su_7"></p>
            <input type="text" value="" name="ad_ADDRESS" placeholder="주소" required />
            <p id="su_8"></p>
            <input type="text" value="" name="ad_DETAIL_ADDRESS" placeholder="상세주소" required />                                    
            <p id="su_9"></p>
            <textarea readonly id="ad_agreeView">
<!-- 약관 내용은 이곳에 집어넣는다.-->               
            </textarea>
            <div class="agreeBox">
                <input type="checkbox" value="" id="ad_agree"/>
                <label for="ad_agree">약관에 동의합니다.(필수)</label>
            </div>
            <input type="button" value="SUBMIT" onclick="dataSetUp();"/>            
        </form>             
    </div>
</div>
<input type="hidden" value="" id="form_id_Chk"/>
<input type="hidden" value="" id="form_pass_Chk" />
<input type="hidden" value="" id="form_passConfirm_Chk" />
<script src="js/userAdd_js.js"></script>