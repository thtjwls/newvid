<?
include_once ("header.php");
include_once ("lib/dbconnect.php");
include_once ("lib/sessionValue.php");
?>

<form action="" id="userAddForm" autocomplete="off" method="post">
    <fieldset class="userAddFormTitle">
        <legend class="userFormSection">회원가입</legend>
        <ul>
            <li>
                <input type="text" placeholder="아이디" value="<?=$userId?>" name="id" id="id" autocomplete="off" readonly/>
                <!--<p id="idSub" class="subText"></p>-->
            </li>
            <li>
                <input type="password" placeholder="비밀번호" name="pass" id="pass" />
                <p id="passSub" class="subText"></p>
            </li>
            <li>
                <input type="password" placeholder="비밀번호 확인" id="passConfirm" />
                <p id="passConfirmSub" class="subText"></p>
            </li>
            <li>
                <input type="text" placeholder="이름" value="<?=$userName?>" name="name" id="name" readonly/>
            </li>
            <li>
                <input type="text" placeholder="회사" value="<?=$userCompany?>" name="company" id="company" />
            </li>
            <li>
                <input type="text" placeholder="부서" value="<?=$userBuse?>" name="buse" id="buse" />
            </li>
            <li>
                <input type="tel" placeholder="연락처" value="<?=$userTel?>" name="tel" id="tel" />
            </li>
            <li>
                <input type="text" placeholder="우편번호" id="postNum" value="<?=$userPostNum?>" name="postNum" onfocus="post_code();" />
            </li>
            <li>
                <input type="text" placeholder="주소" id="addr" value="<?=$userAddr?>" name="addr" />
            </li>
            <li>
                <input type="text" placeholder="상세주소" id="inAddr" value="<?=$userInAddr?>" name="inAddr" style="border-bottom:1px solid #757575;" />
            </li>
            <li>
                <input type="button" value="수정하기" id="formModiBtn" />
            </li>
        </ul>
    </fieldset>
</form>
<input type="hidden" id="c_pass" />
<input type="hidden" id="c_passConfirm" />
<input type="hidden" id="c_name" />
<input type="hidden" id="c_tel" />
<input type="hidden" id="c_addr" />
<input type="hidden" id="c_inAddr" />


<?
include_once ("footer.php");
?>