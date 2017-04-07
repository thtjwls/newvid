<? include "./lib/session.php"; ?>
<? include "./DB/dbcon.php"; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <link href="css/aside.css" rel="stylesheet" />
    <link href="css/common.css" rel="stylesheet" />
    <link href="css/in_page_menu.css" rel="stylesheet" />
    <link href="css/unit.css" rel="stylesheet" />
    <link href="css/user_add.css" rel="stylesheet" />
    <link href="css/login_form.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js"></script>
    <script type="text/javascript" src="js/controller.js"></script>
	<script type="text/javascript" src="js/user_add_check.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/docu_link.js"></script>
    <script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.PrintArea.js_4.js"></script>
    <script type="text/javascript" src="js/jquery.printElement.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//cdn.poesis.kr/post/search.min.js"></script>
    <link rel="stylesheet" href="css/editor.css" type="text/css" charset="utf-8" />
    <script src="js/editor_loader.js?environment=development" type="text/javascript" charset="utf-8"></script>
    <script src="http://google-code-prettify.googlecode.com/svn/trunk/src/prettify.js"></script>
    <script>
        $("#postcodify").postcodify(); //주소 API
        $("#search_button").postcodifyPopUp();
        $("#save").click(function () {
            Editor.save();
        })
    </script>
    <?
    $mod=$_GET["mod"];
    $inner_page=$_GET["inner_page"];
    ?>
</head>
<body>
    <div class="wrap">
        <!--
        <aside>
            <div class="aside_inner_back">
                <ul>
                    <li><img src="img/icon1.png" alt="Alternate Text" width="30px;"/><p>회사소개</p></li>
                    <li><img src="img/icon2.png" alt="Alternate Text" width="30px;"/><p>고객지원</p></li>
                    <li><img src="img/icon3.png" alt="Alternate Text" width="30px;"/><p>견적문의</p></li>
                    <li><img src="img/icon4.png" alt="Alternate Text" width="30px;"/><p>사이트맵</p></li>
                    <li><img src="img/icon5.png" alt="Alternate Text" width="18px;"/><p>오시는길</p></li>
                </ul>
            </div>
        </aside>
                    -->
        <header>
            <div class="mini_login">
                <? if($useridx == ""){ ?>
                <a href="/dw/?mod=login">로그인</a>
                <a href="/dw/?mod=useradd">회원가입</a>
                <? } else { ?>
                <a href="/dw/user/logout.php">로그아웃</a>
                <a href="#">정보수정</a>
                <? } ?>
            </div>
            <div class="inner_header">
                <div class="logo">
                    <a href="/dw/">
                        <img src="img/papers_logo.png" alt="Alternate Text" width="200px;" />
                    </a>
                </div>
                <div class="section">
                    <ul>
                        <li><a href="/dw/?mod=page1&inner_page=process">작 성</a></li>
                        <li><a href="/dw/?mod=page2">결제현황</a></li>
                        <li><a href="/dw/?mod=page3">보관/관리</a></li>
                        <li><a href="/dw/?mod=page4">공지사항</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <article>
            <div class="contents_wrap">
                    <? if(!$mod){ include "lib/page_home.php"; }
                        else if($mod=="page1"){ include "lib/page1.php"; }
                        else if($mod=="page2"){ include "lib/page2.php"; }
                        else if($mod=="useradd"){ include "user/user_add_form.php"; }
						else if($mod=="login"){ include "user/login.php"; }
                    ?>       
            </div>
        </article>
        <footer>

        </footer>
    </div>
</body>
</html>