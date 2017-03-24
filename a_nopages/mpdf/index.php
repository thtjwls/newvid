<?
include_once("php/viewCnt.php");
include_once ("php/class.PdfModel.php");
$imgLoad = new img;
//$D = new rmDir; //서버 최초 접속자가 서버에 파일을 지움

$o = (isset($o)) ? $_GET['o'] : false;

//오류로 인해 막아둠
//$D->file();

//$imgArr = $imgLoad->getFileNames();
//$panelImg = new Imgthumb;
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title>인천일보 지면PDF보기</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <script src="js/jquery-1.12.4.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.mobile-1.4.5.js"></script>
    <!--<script src="js/custom.js"></script>-->
    <link href="css/jquery-ui.css" rel="stylesheet" />
    <link href="css/jquery.mobile-1.4.5.css" rel="stylesheet" />    
    <link href="css/index2.css" rel="stylesheet" />    
</head>
<body>
    <div class="wrap" data-role="page" id="mpdfHeader">
        <!-- 툴팁 -->
        <div id="toolTip">
            
        </div>
        <!-- 툴팁 끝 -->
        <!-- 헤더 -->
        <div class="header m-fix-lay" data-role="header">
            <h1>
                <?$imgLoad->getDate();?>                                            
            </h1>            
            <div class="pathArrowDiv">
                <span>
                    <img src="images/left-arrow.png" alt="" class="titlePathArrow" id="preBtnArrow" onclick="pagePrevMove();" />
                </span>
                <span id="viewPageNum">
                    1면
                </span>
                <span>
                    <img src="images/right-arrow.png" alt="" class="titlePathArrow" id="nextBtnArrow" onclick="pageNextMove();" />
                </span>
            </div>
            <a href="#menuPanel" data-icon="bullets">LIST</a>
        </div>
        <!-- 헤더 끝 -->
        <!-- 컨텐츠 -->
        <div class="content  m-fix-lay" data-role="content">
            <div class="innerContent" id="innerContentId">
                <div class="imgContainer" id="imgContainer">
                    <!-- 지면이 올라오는 컨테이너 -->
                </div>
            </div>
            <input type="hidden" value="2" id="pageServe"/>
            <input type="hidden" value="1" id="currentPage"/>
            <div class="fixPageBtnDiv"></div>
        </div>
        <!-- 컨텐츠 끝 -->
        <script src="js/getImg.js?version=0109b"></script>        
        <!-- 패널 -->
        <div data-role="panel" id="menuPanel" data-position="left" data-display="overlay" data-theme="a">
            <div id="panelHeader">
                <h4 class="panelHeaderTitle">
                    <?$imgLoad->getDate();?>지면보기
                </h4>
                <p>인천 / 경기 모아보기</p>
            </div>
            <button id="newsPanalIcBtn">인 천 판</button>
            <button id="newsPanalGyBtn">경 기 판</button>
            <div id="newsPanelList">
                <!-- 데이터가 있다면 이곳이 대체됨. -->
            </div>
            <a href="#mpdfHeader" data-rel="close" id="panelCloseBtn" data-role="button">닫기</a>
            <div class="panelFooter" data-role="footer">
                <h4>ⓒ INCHEONILBO Corp.</h4>
            </div>
        </div>
        <!-- 패널 끝 -->        
    </div>    
</body>
</html>