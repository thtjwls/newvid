<? include_once ("lib/session.php"); 
   require("lib/dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>-->
    <title></title>
    <meta charset="utf-8" />
    <script src="js/jquery-1.12.4.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/index.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/qna.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/user.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/product.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="css/index.css"/>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script> <!--다음 주소 api-->
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="js/jquery.techbytarun.excelexportjs.js"></script>
</head>
<body>
    <div class="loginTab" id="loginTab">
        <div class="innerLoginTab">
            <div class="xBtn"><img src="img/x-mark.png" alt="닫기" width="20px;" onclick="loginLightBoxClose();"/></div>
            <h2>EzManager Login</h2>
            <form id="loginForm" method="post" autocomplete="off">
                <input type="text" id="loginId" value="" name="id" placeholder="아이디"/>                
                <input type="password" value="" id="loginPass" name="loginPass" placeholder="비밀번호"/>                
                <button onclick="_login(); return false;">LOGIN</button>
            </form>
            <p id="formSupport"></p>
        </div>
    </div>
    <div class="header">
        <div class="headerSection">
            <h1>
                <a href="/je">EzManager</a>                
            </h1>
            <nav class="headerNav" id="headerNav">
                <a href="">QnA</a>
                <?                
                if($useridx == "" || !$useridx) {                    
                ?>
                <a onclick="loginLightBox();">로그인</a>
                <a href="userform.php">회원가입</a>
                    <?
                } else {
                    ?>
                <a onclick="logout();">로그아웃</a>
                <a href="userModify.php">정보변경</a>
                    <?
                }
                ?>                                
            </nav>
        </div>
    </div>
    <div class="wrap">        