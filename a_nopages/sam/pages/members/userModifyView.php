<?
$se = new Session;
$se->session_idx = $_SESSION["sidx"];
$se->getSe();
?>
<div class="userAddWrap">
    <h3 class="pageTitle">
        MODIFY MEMBERSHIP
    </h3>
    <div class="userAddFromDIV">
        <form action="" method="post" id="userAddFormData" autocomplete="off">
            <input type="text" value="<?=$se->se_name?>" name="ad_NAME" placeholder="이름" required disabled/>
            <p id="su_1"></p>
            <input type="text" value="<?=$se->se_id?>" name="ad_ID" placeholder="아이디" required disabled/ />
            <p id="su_2"></p>
            <input type="password" value="" name="ad_PASS" placeholder="비밀번호" required />
            <p id="su_3"></p>
            <input type="password" value="" name="ad_PASS_confirm" placeholder="비밀번호 확인" required />
            <p id="su_4"></p>
            <input type="tel" value="<?=$se->se_tel?>" name="ad_TEL" placeholder="연락처 ex)010-0000-0000" required />
            <p id="su_5"></p>
            <input type="email" value="<?=$se->se_email?>" name="ad_Email" placeholder="Email@email.com" required />
            <p id="su_6"></p>
            <input type="text" value="<?=$se->se_post_num?>" name="ad_POST_NUM" placeholder="우편번호" required />
            <p id="su_7"></p>
            <input type="text" value="<?=$se->se_address?>" name="ad_ADDRESS" placeholder="주소" required />
            <p id="su_8"></p>
            <input type="text" value="<?=$se->se_detail_address?>" name="ad_DETAIL_ADDRESS" placeholder="상세주소" required />
            <p id="su_9"></p>
            <input type="button" value="SUBMIT" onclick="dataSetUp();" />
        </form>
    </div>
</div>
<input type="hidden" value="" id="form_pass_Chk" />
<input type="hidden" value="" id="form_passConfirm_Chk" />
<script src="js/userModi_js.js"></script>