<div class="contentsBox_div loginView_div">
    <h3>LOGIN WRAP</h3>
    <form method="post" action="" autocomplete="new-password" id="member_submit_form">
        <ul>
            <li>
                <input type="text" value="" placeholder="이름" name="member_name" />
                <p id="member_id_support"></p>
            </li>
            <li>
                <input type="text" value="" placeholder="아이디" name="member_id" /><button id="id_chk_btn" onclick="id_chk(); return false;">중복확인</button>
                <p id="member_id_support"></p>
            </li>
            <li>
                <input type="password" value="" placeholder="비밀번호" name="member_pass" onkeyup="pass_chk();" />
                <p id="member_pass_support"></p>
            </li>
            <li>
                <input type="password" value="" placeholder="비밀번호 확인" name="member_pass_confirm" onkeyup="pass_confirm_chk();" />
                <p id="member_pass_confirm_support"></p>
            </li>
            <li>
                <select name="member_buse">
                    <option value="기술지원팀">기술지원팀</option>
                    <option value="온라인뉴스부">온라인뉴스부</option>
                    <option value="디자인팀">디자인팀</option>
                    <option value="개발팀">개발팀</option>
                    <option value="회계/총무팀">회계/총무팀</option>
                </select>
                <p></p>
            </li>
            <li>
                <input type="email" value="" placeholder="이메일 ex) webmaster@incheonilbo.com" name="member_email" />
                <p></p>
            </li>
            <li>
                <input type="tel" value="" placeholder="비상연락처 ex) 010-0000-0000" name="member_hp" />
                <p></p>
            </li>
            <li>
                <input type="tel" value="" placeholder="내선번호 ex) 032-452-0114" name="member_tel" />
                <p></p>
            </li>
            <li>
                <input type="checkbox" value="" id="membership_agree" />
                <label for="membership_agree">아래 약관에 동의 합니다.</label>
                <textarea readonly class="membership_agree_textarea">
                    약관 등록
                </textarea>
            </li>
            <li>
                <input type="button" value="SUBMIT" onclick="member_add_submit();" />
            </li>
        </ul>
        <input type="hidden" value="" id="hidden_id" />
        <input type="hidden" value="" id="hidden_pass" />
        <input type="hidden" value="" id="hidden_pass_confirm" />
    </form>
</div>
<script src="/sn/js/membership.js?version=20"></script>