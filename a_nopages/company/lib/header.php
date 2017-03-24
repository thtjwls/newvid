<? include "../lib/session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <meta charset="utf-8" />
    <link href="../css/com.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="../js/company.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script> <!--다음 주소 api-->
    <script src="../js/HuskyEZCreator.js" charset="utf-8"></script>    
    <script src="../js/popup.js"></script>
    <script src="../js/user.js"></script>
    <script src="../js/report.js"></script>
</head>
<body>
    <?
        //form action 설정
    if(!$useridx) {
        $action = "login";
        $header_dsn = "login_header";
    } else {
        $action = "logout";
        $query = "select nick from it_user where idx='$uesridx'";
        $query_result = mysql_query($query,$connect);
        $nick_array = mysql_fetch_array($query_result);
        $nick = $nick_array[nick];
        $header_dsn = "logout_header";
    }
    ?>
    <div class="wrap">
        <div class="<?=$header_dsn?>" id="login_header">
            <form action="../user/user.php?mod=<?=$action?>" method="post" name="login" id="login_form">
                <?
                if($action == "login") {
                ?>
                <input type="text" value="" placeholder="아이디" name="login_id" id="login_id" />
                <input type="password" value="" placeholder="비밀번호" name="login_pass" id="login_pass" />
                <a href="#" id="logins">로그인</a><a href="../user/user_add_form.php">회원가입</a>
                <?
                } else {
                ?>
                <a href="../user/user.php?mod=logout">로그아웃</a><a href="../user/user_modify.php">정보수정</a>
                <?
                };
                ?>
            </form>
        </div>
        <div class="header">
            <a href="../"><img src="../img/incheonilbo_logo.png" alt="인천일보 로고" /></a>
        </div>
        <div class="top_menu">
            <ul>
                <li id="page01">
                    <a href="../pages/page01.php">회사소개</a>
                    <ul id="sub_menu1" class="sub_menu">
                        <li>
                            <a href="#">CI 보기</a>
                        </li>
                        <li>
                            <a href="../pages/page02.php">CEO 인사말</a>
                        </li>
                        <li>
                            <a href="../pages/page03.php">회사연혁</a>
                        </li>
                        <li>
                            <a href="../pages/page08.php?tomap=incheon">오시는 길</a>
                        </li>
                        <li>
                            <a href="../pages/page07.php">조직도</a>
                        </li>
                    </ul>
                </li>
                <!--
                <li id="page02">
                    섹션이 추가 될 경우 사용
                </li>
                    -->
                <!--
                <li id="page03">
                    섹션이 추가 될 경우 사용
                </li>
                    -->
                <li id="page04">
                    <a href="../pages/page04.php">독자 서비스</a>
                    <ul id="sub_menu4" class="sub_menu">
                        <li>
                            <a href="https://ssl.incheonilbo.com/?mod=company&act=form&form_id=kd" target="_blank">구독신청</a>
                        </li>
                        <li>
                            <a href="https://ssl.incheonilbo.com/?mod=company&act=form&form_id=copy" target="_blank">저작권문의</a>
                        </li>
                        <li>
                            <a href="https://ssl.incheonilbo.com/?mod=company&act=form&form_id=jb" target="_blank">기사제보</a>
                        </li>
                        <li>
                            <a href="http://www.incheonilbo.com/?mod=company&act=form&form_id=ad" target="_blank">광고문의</a>
                        </li>
                        <li>
                            <a href="http://www.incheonilbo.com/?mod=company&act=form&form_id=jh" target="_blank">제휴문의</a>
                        </li>
                        <li>
                            <a href="https://ssl.incheonilbo.com/?mod=company&act=form&form_id=tg" target="_blank">독자투고</a>
                        </li>
                    </ul>
                </li>
                <li id="page05">
                    <a href="../pages/page05_sec2.php">인재채용</a>
                    <ul id="sub_menu5" class="sub_menu">
                        <!-- 인사제도 규정이 있으면 추후에 추가
                        <li>
                            <a href="../pages/page05.php">인사제도</a>
                        </li>
                            -->
                        <li>
                            <a href="../pages/page05_sec2.php">채용공고</a>
                        </li>
                    </ul>
                </li>
                <li id="page06">
                    <a href="../pages/page06.php">연간사업 안내</a>
                </li>
                <!--섹션이 추가 될 경우 사용
                <li id="page07">
                    <ul id="sub_menu7" class="sub_menu">
                        <li>
                            <a href="#">임원</a>
                        </li>
                        <li>
                            <a href="#">인천본사</a>
                        </li>
                        <li>
                            <a href="#">경기본사</a>
                        </li>
                    </ul>
                </li>
                    -->
                <!--섹션이 추가 될 경우 사용
                <li id="page08">
                    <a href="../pages/page08.php?tomap=incheon">오시는길</a>
                    <ul id="sub_menu8" class="sub_menu">
                        <li>
                            <a href="../pages/page08.php?tomap=incheon">인천본사</a>
                        </li>
                        <li>
                            <a href="../pages/page08.php?tomap=gyeonggi">경기본사</a>
                        </li>
                    </ul>
                </li>
                    -->
            </ul>
        </div>
        <div class="sub-menu-box">

        </div>
        <div class="contents">
