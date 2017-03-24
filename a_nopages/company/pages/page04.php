<? include "../lib/header.php"; ?>
<?
$report_mod=$_GET["report_mod"]; //서비스안내 의 이메일 폼 모드
$se_mod =$_GET["se_mod"];

?>

<div class="page04_wrap">
    <?
    if($report_mod == "") {
    ?>
    <!--서비스 안내 선택 모드 시작-->
    <div class="nevi">
        <p>
            28년의 인천에 역사<br />
            독자들과 함께하겠습니다.
        </p>
        <img src="../img/service_listfull.png" alt="" usemap="#service_map"/>
        <map name="service_map" id="ImageMapsCom-service_map">
            <area alt="구독신청" title="" href="https://ssl.incheonilbo.com/?mod=company&act=form&form_id=kd" shape="rect" coords="51,342,196,495" style="outline:none;" target="_blank" />
            <area alt="저작권문의" title="" href="https://ssl.incheonilbo.com/?mod=company&act=form&form_id=copy" shape="rect" coords="210,343,355,496" style="outline:none;" target="_blank" />
            <area alt="기사제보" title="" href="https://ssl.incheonilbo.com/?mod=company&act=form&form_id=jb" shape="rect" coords="375,344,520,497" style="outline:none;" target="_blank" />
            <area alt="광고문의" title="" href="http://www.incheonilbo.com/?mod=company&act=form&form_id=ad" shape="rect" coords="49,504,194,644" style="outline:none;" target="_blank" />
            <area alt="제휴문의" title="" href="http://www.incheonilbo.com/?mod=company&act=form&form_id=jh" shape="rect" coords="214,503,359,643" style="outline:none;" target="_blank" />
            <area alt="독자투고" title="" href="https://ssl.incheonilbo.com/?mod=company&act=form&form_id=tg" shape="rect" coords="372,503,517,643" style="outline:none;" target="_blank" />
            <!-- 각페이지에 대한 커스터마이징을 하고싶다면 아래 report_mod 에 따른 GET요청을 써서 <form> 태그 영역 안에 만들것
            <area  alt="구독신청" title="" href="?report_mod=service01" shape="rect" coords="51,342,196,495" style="outline:none;" target="_self"     />
            <area  alt="저작권문의" title="" href="?report_mod=service02" shape="rect" coords="210,343,355,496" style="outline:none;" target="_self"     />
            <area  alt="기사제보" title="" href="?report_mod=service03" shape="rect" coords="375,344,520,497" style="outline:none;" target="_self"     />
            <area  alt="광고문의" title="" href="?report_mod=service04" shape="rect" coords="49,504,194,644" style="outline:none;" target="_self"     />
            <area  alt="제휴문의" title="" href="?report_mod=service05" shape="rect" coords="214,503,359,643" style="outline:none;" target="_self"     />
            <area  alt="독자투고" title="" href="?report_mod=service06" shape="rect" coords="372,503,517,643" style="outline:none;" target="_self"     />            
                            -->
        </map>
    </div>
    <!--서비스 안내 선택 모드 종료-->
    <?
    }else if($report_mod=="service01") {
    ?>
    <!--구독신청-->
    <form action="?se_mod=service01" method="post" name="service_form">
        <h3>
            구독신청
            <input type="hidden" value="구독신청" name="subject" />
        </h3>
        <table>
            <tr>
                <td>

                </td>
            </tr>
        </table>
    </form>        
    <?
    } else if ($report_mod == "service02") {
    ?>
    <form action="?se_mod=service02" method="post" name="service_form">
        <h3>
            저작권문의
            <input type="hidden" value="저작권문의" name="subject" />
        </h3>
        <table>
            <tr>
                <td>

                </td>
            </tr>
        </table>
    </form>
    <?
    } else if ($report_mod == "service03") {
    ?>
    <form action="?se_mod=service03" method="post" name="service_form">
        <h3>
            기사제보
            <input type="hidden" value="기사제보" name="subject" />
        </h3>
        <table>
            <tr>
                <td>

                </td>
            </tr>
        </table>
    </form>
    <?
    } else if ($report_mod == "service04") {
    ?>
    <form action="?se_mod=service04" method="post" name="service_form">
        <h3>
            광고문의
            <input type="hidden" value="광고문의" name="subject" />
        </h3>
        <table>
            <tr>
                <td>

                </td>
            </tr>
        </table>
        <input type="text" value="" id="datepicker1" name="adv_date1" style="width:150px;" /><img src="../img/cal_icon.png" alt="Alternate Text" height="20" style="vertical-align:middle; margin-left:5px;" class="datepicker1" /> -
        <input type="text" value="" id="datepicker2" name="adv_date2" style="width:150px;" /><img src="../img/cal_icon.png" alt="Alternate Text" height="20" style="vertical-align:middle; margin-left:5px;" class="datepicker2" />
    </form>

    <?
    } else if ($report_mod == "service05") {
        
    } else if ($report_mod == "service06") {
        
    }
    ?>
    <?
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; //메일을 html 형식으로 보내기 위한 헤더

    if($se_mod == "service01"){
    $mailto="thtjwls@naver.com"; //관리자 메일주소
    $content="";
    $result=mail($mailto, $subject, $content, $headers);

    ?>
    <?
        
    } else if ($se_mod == "service02") {
        //저작권문의
        $mailto="thtjwls@naver.com"; //관리자 메일주소
        $content="";
        $result=mail($mailto, $subject, $content, $headers);
    } else if ($se_mod == "service03") {
        //기사제보
        
        $mailto="thtjwls@naver.com"; //관리자 메일주소
        $content="";
    $result=mail($mailto, $subject, $content, $headers);
    } else if ($se_mod == "service04") {
        //광고문의                
        $mailto="thtjwls@naver.com"; //관리자 메일주소
        $content="";
    $result=mail($mailto, $subject, $content, $headers);
    } else if ($se_mod == "service05") {
        //제휴문의
    } else if ($se_mod == "service06") {
        //독자투고
    }
    
    ?>
</div>
<?
    if($report_mod != ""){
?>
<div class="submit_btn">
    <input type="button" value="제출" id="service_submit" />
    <input type="reset" value="취소" />
</div>

<?
    }    
?>

<input type="hidden" id="page_num" value="page04" />
<? include "../lib/footer.html"; ?>