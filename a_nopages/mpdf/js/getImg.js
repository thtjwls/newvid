/* 모바일 PDF 보기 서비스 (당일자 지면)  
 * PRODUCT DATE 2016-10-18 License by Jihoon */

// 판갈이에 대한 변수는 converPage 배열에 담아주시면 됩니다.
// ex) 1,2,3,18,19 면 판갈이
// var converPage = Array(1, 2, 3, 18, 19);

//임시 세션백 34번 라인에서 호출
function backhistory() {
	//alert("서버 점검중입니다.");
	//window.location.href = "http://m.incheonilbo.com/";
}

//판갈이
var d = new Date();
var converPage;

/* 임시 판갈이 */
converPage = Array(1, 2, 3, 18, 19);


//전체지면
var totalPages = 20;



window.onload = function (e) {
    $("#newsPanalIcBtn").click();    
    toDay();
}

$(function () {

//페이지들어오면 다시 내보냄
//backhistory();


    showContentImg();
    imgResizeFunc();
    arrowDisplay();        

    //윈도우 리사이즈 이벤트 호출
    $(window).resize(function () {        
        showContentImg();
        imgResizeFunc();

        
    })

    //default

    containerPush('i', 1);

    //console.log(imgView('g',1));
    console.log("t : " + totalPages + "\nday : " + d.getDate());
})


//이미지 사이즈 조정
function imgResizeFunc() {
    var containerWidth = $("#innerContentId").outerWidth();
    var imgClass = $("#contentImg");

    
    imgClass.css("width", containerWidth);    
}


//이미지 컨테이너 조정
function showContentImg() {
    var windowW = $(window).width();
    var contentW = $("#innerContentId");

    contentW.css("width", windowW);
}

//오늘날짜 리턴
function toDay() {
    var date = new Date();
    var year = String(date.getFullYear());
    var month = String(date.getMonth() + 1);
    var day = String(date.getDate());
    var week = String(date.getDay());

    //일요일 또는 토요일일 경우 날짜에서 금요일까지 뺌	
    if (week == 0) {
        day = String(date.getDate() - 2);
    } else if (week == 6) {
        day = String(date.getDate() - 1);
    }


	if(day < 10) {
		day = "0" + day;
	}

	if (month < 10) {
	    month = "0" + month;
	}

    var today = (month) + (day);

    return today;
}

function imgView(index,newsPage) {
    var filePath = "pdf/";
    var fileName;
    var fullName;
    var date = toDay();
    var ext = ".jpg"; //확장자

    //index 로 넘어온 파라미터가 i or g 일경우 01판 02판으로 나눔
    switch (index) {
        case "g":
            index = "01";
            break;
        case "i":
            index = "02";
            break;
        default:
            break;
    }

    if (newsPage < 10) { newsPage = "0" + newsPage; }

    fileName = "A" + date + index + newsPage + "01" + "-" + "1" + ext; //실제 파일이름.
    fullName = filePath + "A" + date + index + newsPage + "01" + "/" + fileName; //src 로 들어갈 파일 이름.

    return fullName;
}

//패널 버튼 액션
$(function () {
    var icBtn = $("#newsPanalIcBtn");
    var gyBtn = $("#newsPanalGyBtn");
    var panalContainer = $("#newsPanelList");    

        
    console.log(d.getDate());
    console.log(toDay());


    //인천판
    icBtn.click(function () {
        var imgStr = "";        

        for (var i = 1; i <= totalPages; i++) {
            
            if (converPage.indexOf(i) == -1) {
                imgStr += "<div class='imgToolTip' onclick='containerPush(\"g\","+i+");'>";
                imgStr += "<img src = " + imgView("g", i) + " class='panelImg' style='width:107.03px; height:147.08px;'>";
                imgStr += "<div class='indexNumber'>";
                imgStr += "<p>" + i + "면</p>";
                imgStr += "</div>";
                imgStr += "</div>";

                continue;
            }

            imgStr += "<div class='imgToolTip' onclick='containerPush(\"i\"," + i + ");'>";
            imgStr += "<img src = " + imgView("i", i) + " class='panelImg' style='width:107.03px; height:147.08px;'>";
            imgStr += "<div class='indexNumber'>";
            imgStr += "<p>" + i + "면</p>";
            imgStr += "</div>";
            imgStr += "</div>";
        }
        
        $("#pageServe").val(2);
        panalContainer.html(imgStr);
    })

    //경기판
    gyBtn.click(function () {
        var imgStr = "";
        for (var i = 1; i <= totalPages; i++) {
            imgStr += "<div class='imgToolTip' onclick='containerPush(\"g\"," + i + ");'>";
            imgStr += "<img src = " + imgView("g", i) + " class='panelImg' style='width:107.03px; height:147.08px;'>";
            imgStr += "<div class='indexNumber'>";
            imgStr += "<p>" + i + "면</p>";
            imgStr += "</div>";
            imgStr += "</div>";
        }
        
        $("#pageServe").val(1);
        panalContainer.html(imgStr);
    })
})

//패널에서 지면이 본판 컨테이너에 삽입
function containerPush(p , i) {    
    var page = p;
    var pageNum = i;
    var current = pageNum;
  
    
    var str = "";
    str += "<img src='"+ imgView( page , pageNum ) +"' class='contentImg' id='contentImg'>";

    $("#imgContainer").html(str);
    showContentImg();
    imgResizeFunc();
    naviPage(pageNum);
    panelClose();
    $("#currentPage").val(pageNum);

    arrowDisplay();
}

function panelClose() {
    $("#panelCloseBtn").trigger("click");
}

function naviPage(n) {
    
    var pageNum = n;
    
    $("#viewPageNum").text(n + "면");
}

function pageNextMove() {
    var stay = $("#currentPage").val();
    var pageHead = $("#pageServe").val();
    pageHead = Number(pageHead);
    stay = Number(stay);
    //var newsPage = Array(1, 2, 3, 18, 19);
    
    if (pageHead == 1) {
        containerPush('g', stay + 1);
    } else if (pageHead == 2 && converPage.indexOf(stay + 1) != -1) {
        containerPush('i', stay + 1);
    } else if (pageHead == 2 && converPage.indexOf(stay + 1) == -1) {
        containerPush('g', stay + 1);
    }

    arrowDisplay();
}

function pagePrevMove() {
    var stay = $("#currentPage").val();
    var pageHead = $("#pageServe").val();
    pageHead = Number(pageHead);
    stay = Number(stay);
    //var newsPage = Array(1, 2, 3, 18, 19);

    if (pageHead == 1) {
        containerPush('g', stay - 1);
    } else if (pageHead == 2 && converPage.indexOf(stay - 1) != -1) {
        containerPush('i', stay - 1);
    } else if (pageHead == 2 && converPage.indexOf(stay - 1) == -1) {
        containerPush('g', stay - 1);
    }

    arrowDisplay();    
}

function arrowDisplay() {
    var currentPage = $("#currentPage").val();
    var preBtnArrow = $("#preBtnArrow");
    var nextBtnArrow = $("#nextBtnArrow");

    if (currentPage <= 1) {
        preBtnArrow.css("display", "none");
        nextBtnArrow.css("display", "inline");
    } else if (currentPage >= totalPages) {
        preBtnArrow.css("display", "inline");
        nextBtnArrow.css("display", "none");
    } else {
        preBtnArrow.css("display", "inline");
        nextBtnArrow.css("display", "inline");
    }
}

//우클릭 방지
$(window.document).ready(function () {
    $(window.document).on("contextmenu", function (event) { return false; });	//우클릭방지
    $(window.document).on("selectstart", function (event) { return false; });	//더블클릭을 통한 선택방지
    $(window.document).on("dragstart", function (event) { return false; });	//드래그
});