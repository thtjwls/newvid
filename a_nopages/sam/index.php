<? include_once("class.PageMove.php");?>
<?$mod = $_GET["mod"]; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title>웹 개발·퍼블리싱 포트폴리오</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script><!--다음 주소 api-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/common.css"/>
</head>
<body>
    <div class="wrap">
        <header>
            <div class="loginHeader">
                <div class="inLoginHeader">
                    <a href="?mod=FAQView">FAQ</a>
                    <a href="?mod=csView">QnA</a>

                    <?
                    if(!$_SESSION["sidx"]) {
                    ?>
                    <a href="?mod=userAddView">회원가입</a>
                    <a href="?mod=loginView">LOGIN</a>
                    <?
                    } else {
                    ?>
                    <a href="?mod=userModifyView">정보수정</a>
                    <a href="logout.php">LOGOUT</a>
                    <?
                    }
                    ?>

                </div>
            </div>
            <div class="logoWrap">
                <div class="inLogoWrap">
                    <div class="logoHeader">
                        <!--<img src="#" alt="logoImg" />-->
                        <h1><a href="./">Web Service</a></h1>
                    </div>
                    <div class="navi">
                        <ul>
                            <li><a href="?mod=page_1">BOARD</a></li>
                            <li><a href="?mod=page_2">CSS3</a></li>
                            <li><a href="?mod=page_3">PHP5</a></li>
                            <li><a href="?mod=page_4">PHOTO</a></li>
                            <li><a href="?mod=page_5">ABOUT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <section>
            <?
            (!$mod||$mod=="")?$mod = "default" : $mod = $mod;
            $pageName = new PageMove;
            $pageName->modName = $mod;
            $pageName->pageMove();
            ?>
        </section>
        <!--
        <footer>
            Copyright ⓒ Co., Incheonilbo ALL RIGHT RESERVED
        </footer>
                    -->
    </div>
</body>
</html>