<? include "../lib/session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<? include "../lib/header.php"; ?>
<?
$sql="select * from it_user where idx='$useridx'";
$result = mysql_query($sql,$connect);
$row=mysql_fetch_array($result);
$idx= $row[idx];
$name = $row[name];
$id = $row[id];
$nick = $row[nick];
$email = $row[email];
$tel = $row[tel];
$tel_arr = explode("-",$tel);
$tel1 = $tel_arr[0];
$tel2 = $tel_arr[1];
$tel3 = $tel_arr[2];
$post_num =$row[post_num];
$address = $row[address];
$inner_address =$row[inner_address];
?>
<div class="user_wrap">
    <form action="user.php?mod=modify&idx=<?=$idx?>" id="user_modify" name="user_modify" method="post">
        <table cellpadding="0" cellspacing="10">
            <tr>
                <th>* 이름</th>
                <td>
                    <?=$name?>
                </td>
            </tr>
            <tr>
                <th>
                    * 아이디
                </th>
                <td>
                    <?=$id?>
                </td>
            </tr>
            <tr>
                <th>
                    * 비밀번호
                </th>
                <td>
                    <input type="password" value="" name="modify_pass" id="pass" placeholder="비밀번호" />
                    <span id="pass_help"></span>
                </td>
            </tr>
            <tr>
                <th>
                    * 비밀번호 확인
                </th>
                <td>
                    <input type="password" value="" id="pass_confirm" name="pass_confirm" placeholder="비밀번호 확인" />
                    <span id="pass_confirm_help"></span>
                </td>
            </tr>
            <tr>
                <th>
                    이메일
                </th>
                <td>
                    <input type="text" value="<?=$email?>" name="email" id="email" placeholder="abc@incheonilbo.com" />
                </td>
            </tr>
            <tr>
                <th>
                    닉네임
                </th>
                <td>
                    <?=$nick?>
                </td>
            </tr>
            <tr>
                <th>
                    전화번호
                </th>
                <td>
                    <input type="tel" value="<?=$tel1?>" name="tel1" id="tel1" />-
                    <input type="tel" value="<?=$tel2?>" name="tel2" id="tel2" />-
                    <input type="tel" value="<?=$tel3?>" name="tel3" id="tel3" />
                </td>
            </tr>
            <tr>
                <th>
                    * 우편번호
                </th>
                <td>
                    <input type="text" value="<?=$post_num?>" name="post_num" id="post_num" placeholder="우편번호" />
                    <input type="button" value="우편번호 찾기" id="post_search" onclick="post_code()" />
                </td>
            </tr>
            <tr>
                <th>주소</th>
                <td>
                    <input type="text" value="<?=$address?>" name="address" id="address" placeholder="인천시 중구 인중로 226" />
                </td>
            </tr>
            <tr>
                <th>상세주소</th>
                <td>
                    <input type="text" value="<?=$inner_address?>" name="inner_address" id="inner_address" placeholder="인천일보 사옥" />
                </td>
            </tr>
        </table>
        <div class="user_insert_btn">
            <input type="button" value="제출" id="modify_form" />
            <input type="reset" value="다시작성" />
        </div>
        <input type="hidden" value="" id="id_check_result" />
        <input type="hidden" value="" id="nick_check_result" />
    </form>
</div>
<? include "../lib/footer.html"; ?>