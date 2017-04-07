<?
include_once ("header.php");
include_once ("lib/dbconnect.php");
?>

<div id="userWrap">
    <table cellpadding="0" cellspacing="0">
        <caption>
            회원가입
        </caption>
        <tr>            
            <td>
                <input type="text" value="" placeholder="아이디" class="longInput" id="id" autocomplete="off" autofocus/>
                <span id="idSub" class="subTest"></span>
            </td>
        </tr>
        <tr>            
            <td>
                <input type="password" value="" placeholder="비밀번호" class="longInput" id="pass" autocomplete="off" />
                <span id="passSub" class="subTest"></span>
            </td>            
        </tr>
        <tr>            
            <td>
                <input type="password" value="" placeholder="비밀번호 확인" class="longInput" id="passConfirm" autocomplete="off" />
                <span id="passconfirmSub" class="subTest"></span>
            </td>
        </tr>
        <tr>            
            <td>
                <input type="text" value="" placeholder="이름" class="longInput" id="name" autocomplete="off" />
            </td>
        </tr>
        <tr>            
            <td>
                <input type="text" value="" placeholder="회사" class="longInput" id="company" autocomplete="off" />
            </td>
        </tr>
        <tr>            
            <td>
                <input type="text" value="" placeholder="부서" class="longInput" id="buse" autocomplete="off" />
            </td>
        </tr>
        <tr>            
            <td>
                <input type="tel" value="" placeholder="연락처 010-9003-6094" class="longInput" id="tel" autocomplete="off" />
            </td>
        </tr>
        <tr>            
            <td>
                <input type="text" value="" readonly placeholder="우편번호" class="middleInput" id="postNum" autocomplete="off" />
                <input type="button" value="우편번호찾기" class="middleInput" id="postNumBtn" onclick="post_code();"/>
            </td>
        </tr>
        <tr>            
            <td>
                <input type="text" value="" placeholder="주소" class="bigInput" id="address" autocomplete="off" />
            </td>            
        </tr>
        <tr>            
            <td>
                <input type="text" value="" placeholder="상세주소" class="bigInput" id="inAddress" autocomplete="off" />
            </td>
        </tr>
    </table>
    <div class="submitBtn">
        <input type="button" value="가입하기" />        
    </div>
</div>
<form action="" id="userAddForm">
    <input type="hidden" value="" id="c_id"/>
    <input type="hidden" value="" id="c_pass"/>
    <input type="hidden" value="" id="c_passConfirm"/>
    <input type="hidden" value="" id="c_name"/>
    <input type="hidden" value="" id="c_tel"/>
    <input type="hidden" value="" id="c_postNum"/>
    <input type="hidden" value="" id="c_address"/>
    <input type="hidden" value="" id="c_inAddress"/>
</form>
<?
include_once ("footer.php");
?>