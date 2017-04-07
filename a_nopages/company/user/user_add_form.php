<? include "../lib/header.php"; ?>
<div class="user_wrap">
    <form action="user.php?mod=insert" id="user_insert" name="user_insert" method="post">
        <table cellpadding="0" cellspacing="10">
            <tr>
                <th>* 이름</th>
                <td>
                    <input type="text" value="" name="name" id="name" placeholder="이름"/>                    
                </td>
            </tr>
            <tr>
                <th>
                    * 아이디
                </th>
                <td>
                    <input type="text" value="" name="id" id="addFormId" placeholder="아이디"/>
                    <input type="button" value="중복확인" id="id_check"/>
                    <span id="id_result"></span>
                </td>
            </tr>
            <tr>
                <th>
                    * 비밀번호
                </th>
                <td>
                    <input type="password" value="" name="insert_pass" id="pass" placeholder="비밀번호"/>
                    <span id="pass_help"></span>
                </td>
            </tr>
            <tr>
                <th>
                    * 비밀번호 확인
                </th>
                <td>
                    <input type="password" value="" id="pass_confirm" name="pass_confirm" placeholder="비밀번호 확인"/>
                    <span id="pass_confirm_help"></span>
                </td>
            </tr>
            <tr>
                <th>
                    이메일
                </th>
                <td>
                    <input type="text" value="" name="email" id="email" placeholder="abc@incheonilbo.com"/>
                </td>
            </tr>
            <tr>
                <th>
                    닉네임
                </th>
                <td>
                    <input type="text" value="" id="nick" name="nick" placeholder="닉네임"/>
                    <input type="button" id="nick_check" value="중복확인" />
                    <span id="nick_check_help"></span>
                </td>
            </tr>
            <tr>
                <th>
                    전화번호
                </th>
                <td>
                    <input type="tel" value="" name="tel1" id="tel1"/>-
                    <input type="tel" value="" name="tel2" id="tel2"/>-
                    <input type="tel" value="" name="tel3" id="tel3"/>
                </td>
            </tr>
            <tr>
                <th>
                    * 우편번호
                </th>
                <td>
                    <input type="text" value="" name="post_num" id="post_num" placeholder="우편번호"/>
                    <input type="button" value="우편번호 찾기" id="post_search" onclick="post_code()" />
                </td>
            </tr>
            <tr>
                <th>주소</th>
                <td>
                    <input type="text" value="" name="address" id="address" placeholder="인천시 중구 인중로 226"/>
                </td>
            </tr>
            <tr>
                <th>상세주소</th>
                <td>
                    <input type="text" value="" name="inner_address" id="inner_address" placeholder="인천일보 사옥"/>
                </td>
            </tr>
        </table>
        <div class="user_insert_btn">
            <input type="button" value="제출" id="add_form" />
            <input type="reset" value="다시작성" />
        </div>       
        <input type="hidden" value="" id="id_check_result"/>        
        <input type="hidden" value="" id="nick_check_result"/>
    </form>
</div>
<? include "../lib/footer.html"; ?>