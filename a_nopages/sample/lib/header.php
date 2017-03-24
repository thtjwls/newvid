<? include "lib/session.php"; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="css/pa_wrap.css" />
    <link rel="stylesheet" href="css/editor.css" type="text/css" charset="utf-8"/>
	<link rel="stylesheet" href="css/view_page.css" type="text/css" charset="utf-8">
    <script src="js/editor_loader.js?environment=development" type="text/javascript" charset="utf-8"></script>
    <script src="http://google-code-prettify.googlecode.com/svn/trunk/src/prettify.js"></script>
    <script src="js/pa_wrap.js"></script>
    <?
        if($useridx == ""){
        ?>
        <script charset="utf-8">
            alert("로그인 후 이용해 주세요.");
            location.href="./";
        </script>
<?
}

if($userlevel==10){
	$userlevel="최고관리자";
} else if($userlevel==8) {
	$userlevel="대표";
}
else if($userlevel==7) {
	$userlevel="본부장";
}
else if($userlevel==6) {
	$userlevel="국장";
}
else if($userlevel==5) {
	$userlevel="부장";
}
else if($userlevel==4) {
	$userlevel="차장";
}
else if($userlevel==3) {
	$userlevel="과장";
}
else if($userlevel==2) {
	$userlevel="대리";
}
else if($userlevel==1) {
	$userlevel="사원";
}

    ?>
</head>
<? include "lib/pa_declare.php";?>

<body>
    <div class="wrap">
        <div class="aside">
            <div class="paper_box">
                <div class="paper_inner1 paper_inner">
                    <h3>전자결제함</h3>
                    <ul>
                        <li>
                            <a href="#"><img src="./img/folder.png" class="folder_img" alt="Alternate Text" />대기함</a>
                        </li>
                        <li>
                            <a href="#"><img src="./img/folder.png" class="folder_img" alt="Alternate Text" />진행함</a>
                        </li>
                        <li>
                            <a href="#"><img src="./img/folder.png" class="folder_img" alt="Alternate Text" />완료함</a>
                        </li>
                        <li>
                            <a href="#"><img src="./img/folder.png" class="folder_img" alt="Alternate Text" />반려함</a>
                        </li>
                    </ul>
                </div>
                <div class="paper_inner1 paper_inner">
                    <h3>공용문서함</h3>
                    <ul>
                        <li><a href="#"><img src="./img/folder.png" class="folder_img" alt="Alternate Text" />업무폴더</a></li>
                        <li><a href="#"><img src="./img/folder.png" class="folder_img" alt="Alternate Text" />문제해결</a></li>
                        <li><a href="#"><img src="./img/folder.png" class="folder_img" alt="Alternate Text" />지식공유</a></li>
                        <li><a href="#"><img src="./img/folder.png" class="folder_img" alt="Alternate Text" />업무표준</a></li>
                        <li><a href="#"><img src="./img/folder.png" class="folder_img" alt="Alternate Text" />공지사항</a></li>
                    </ul>
                </div>
                <div class="paper_inner1 paper_inner">
                    <h3>부서별문서함</h3>
                    <ul>
                        <li>
                            <a href="#" id="buse1" class="show_buse1">
                                <img src="./img/folder.png" class="folder_img" alt="Alternate Text" />경영기획실
                            </a>
                            <ul id="paper_submenu">
                                <li><img src="./img/folder_submenu.png" class="folder_submenu" alt="Alternate Text" />총무회계팀</li>
                                <li><img src="./img/folder_submenu.png" class="folder_submenu" alt="Alternate Text" />판매팀</li>
                                <li><img src="./img/folder_submenu.png" class="folder_submenu" alt="Alternate Text" />비서팀</li>
                                <li><img src="./img/folder_submenu.png" class="folder_submenu" alt="Alternate Text" />제작시설관리팀</li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <img src="./img/folder.png" class="folder_img" alt="Alternate Text" />신사업국
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="./img/folder.png" class="folder_img" alt="Alternate Text" />편집국
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="./img/folder.png" class="folder_img" alt="Alternate Text" />임원/비서실
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="header">
