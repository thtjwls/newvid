$(function () {
    //BtnImgPostion();
    showContentImg();
    imgResizeFunc();
    imgTradeOption();

    //윈도우 리사이즈 이벤트 호출
    $(window).resize(function () {
        //BtnImgPostion();
        showContentImg();
        imgResizeFunc();
        imgTradeOption();
    })
})

function imgResizeFunc() {
    var containerWidth = $("#innerContentId").outerWidth();
    var imgClass = $(".gisaimg");
    

    //console.log(containerWidth);
    imgClass.css("width", containerWidth);
    console.log(containerWidth);
}

function showContentImg() {
    var windowW = $(window).width();
    var contentW = $("#innerContentId");

    contentW.css("width", windowW);
}

//좌우 pdf 넘어가는 화살표 이미지
function BtnImgPostion() {
    var arrowImg = $(".pageBtn");
    var arrowImgSize = 50;
    var LimgBtn = $("#prevBtn");
    var RimgBtn = $("#nextBtn");
    var containerHeight = $(window).height();

    arrowImg.css("height", arrowImgSize + "px");

    arrowImg.css("top", (containerHeight / 2) - (arrowImg.height() / 2));
}

//이미지 트레이드 액션
function imgTradeOption() {
    currentPostion(0);
    var imgS = $(".imgContainer").children("img").width();
    var contain = $(".imgContainer");
    var max = contain.children("img").length;
    var imgSize = imgS; //이미지 사이즈
    var current = 0; //현재위치
    var time = 100; //액션시간

    contain.css("width", imgSize * max);

    $("#prevBtn").click(function () {
        current--;
        contain.stop().animate({
            marginLeft: -(imgSize * current)
        }, time)
        currentPostion(current);
    })

    $("#nextBtn").click(function () {
        current++;
        contain.stop().animate({
            marginLeft: -(imgSize * current)
        }, time)
        currentPostion(current);
    })

    function currentPostion(c) {
        if (c > max - 2) {
            $("#nextBtn").css("display", "none");
        } else if (c == 0) {
            $("#prevBtn").css("display", "none");
        } else {
            $("#nextBtn").css("display", "block");
            $("#prevBtn").css("display", "block");
        }
    }
}

function dateOP() {
    var date = new Date();
    var year = String(date.getFullYear());
    var month = String(date.getMonth() + 1);
    var day = String(date.getDate());

    var today = (year) + (month) + (day);
        
    return today;    
}

window.onload = function imgShowOP() {
    //파일 네임에 가장 첫번째 를 A 또는 B 로 구분하고 A와 B 를 로케이트 돌림    
       
    var imgPath = "pdf/";
    var imgCate = "A"; // 인천 : A , 경기 : B 
    var imgDate = dateOP("A");
    var imgExt = ".png"; //파일 확장자
    //예제 이미지 파일네임 pdf/A1017010101-1.jpg
    
    console.log(imgPath + imgCate + imgDate + "-" + imgExt);
     
}

/* 툴팁 썸네일 테스트
$(function () {
    var container = $(".innerContent");

    toolTip = $("#toolTip");
    
    container.hover(
        function () {
        toolTip.css("display", "block");        
        //console.log("hover");
        },
        function () {
        toolTip.css("display", "none");        
        //console.log("blur");
        }
    )
  
    container.on("mousemove", function (e) {

        var tooltipX = e.pageX;
        var tooltipY = e.pageY;
        var tooltipWidth = toolTip.width();
        var tooltipHeight = toolTip.height();

        $("#toolTip").css("top", tooltipY-(tooltipWidth/2));
        $("#toolTip").css("left", tooltipX-(tooltipHeight/2));

    })    
})

*/