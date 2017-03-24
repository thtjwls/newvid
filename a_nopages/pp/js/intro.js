$(function () {
    /* default */
    var aniTime = 200;
    var defaultTop = $("#intro_top");
    var defaultMiddle = $("#intro_middle");
    var defaultBottom = $("#intro_bottom");
    defaultTop.stop().slideDown();
    defaultMiddle.stop().slideUp();
    defaultBottom.stop().slideUp();
 
    /* 현재문서의 위치 current 값 */
    var Current = 0;

    
    
    /* 각 li 항목 가져오기 */
    var introTopMoveBtn = $("#intro_top_nav_move");
    var introMiddleMoveBtn = $("#intro_middle_nav_move");
    var introBottomMoveBtn = $("#intro_bottom_nav_move");

    /* li 의 텍스트 항복 */
    var introTopText = $("#pp_intro_btn_text_top");
    var introMiddleText = $("#pp_intro_btn_text_middle");
    var introBottomText = $("#pp_intro_btn_text_bottom");

    /* 각 항목의 단계별 불릿 */
    var introTopBoolet = $("#intro_nav_btn_boolet_top");
    var introMiddleBoolet = $("#intro_nav_btn_boolet_middle");
    var introBottomBoolet = $("#intro_nav_btn_boolet_bottom");

    /* 현재 보고있는 인트로 페이지 불릿 색상 변경 */
    function selectBoolet() {

        if (Current == 0) {
            introTopBoolet.css("backgroundColor", "#ff6a00");
            introMiddleBoolet.css("backgroundColor", "#FFF");
            introBottomBoolet.css("backgroundColor", "#FFF");
        } else if (Current == 1) {
            introMiddleBoolet.css("backgroundColor", "#ff6a00");
            introTopBoolet.css("backgroundColor", "#FFF");
            introBottomBoolet.css("backgroundColor", "#FFF");
        } else if (Current == 2) {
            introBottomBoolet.css("backgroundColor", "#ff6a00");
            introTopBoolet.css("backgroundColor", "#FFF");
            introMiddleBoolet.css("backgroundColor", "#FFF");
        }
        
        //introMiddleBoolet
        //introBottomBoolet
    }

    /* 인트로에서의 마우스 휠 이벤트 */
    $(document).stop().on("mousewheel", function (event) {
        var E = window.event.wheelDelta;        
        if (E > 0) {
            Current--;
        } else {
            Current++;
        }        

        if (Current == 0) {
            selectBoolet();
            defaultTop.stop().slideDown();
            defaultMiddle.stop().slideUp();
            defaultBottom.stop().slideUp();
        } else if (Current == 1) {
            selectBoolet();
            defaultTop.stop().slideUp();
            defaultMiddle.stop().slideDown();
            defaultBottom.stop().slideUp();
            progressCircle();
        } else if (Current == 2) {
            selectBoolet();
            defaultTop.stop().slideUp();
            defaultMiddle.stop().slideUp();
            defaultBottom.stop().slideDown();
        }

        if (Current > 2) {
            Current = 0;
            selectBoolet();
            defaultTop.stop().slideDown();
            defaultMiddle.stop().slideUp();
            defaultBottom.stop().slideUp();
        } else if (Current < 0) {
            Current = 2;
            selectBoolet();
            defaultTop.stop().slideUp();
            defaultMiddle.stop().slideUp();
            defaultBottom.stop().slideDown();
        }        
    });

    //각 항목 애니메이션을 제어하는 함수, 첫번째 인자 : 텍스트항목 두번째 인자 : 불릿

    function navBtnAnihover(nav, boolet) { //항목을 들어왔을때 함수        
        nav.stop().animate({
            opacity: 1
        }, aniTime);
        
        /*
        boolet.stop().animate({
            backgroundColor: "#ff6a00"
        }, aniTime)
        */
    };

    function navBtnAniOut(nav, boolet) { //항목을 떠났을때 함수        
        nav.stop().animate({
            opacity: 0
        }, aniTime);
        
        /*
        boolet.stop().animate({
            backgroundColor: "#FFF"
        }, aniTime)
        */
    };

    //항목의 hover 이벤트
    introTopMoveBtn.hover(
        function () {
            navBtnAnihover(introTopText, introTopBoolet);
        },
        function () {
            navBtnAniOut(introTopText, introTopBoolet);
        }
    )

    introMiddleMoveBtn.hover(
        function () {
            navBtnAnihover(introMiddleText, introMiddleBoolet);
        },
        function () {
            navBtnAniOut(introMiddleText, introMiddleBoolet);
        }
    )

    introBottomMoveBtn.hover(
        function () {
            navBtnAnihover(introBottomText, introBottomBoolet);
        },
        function () {
            navBtnAniOut(introBottomText, introBottomBoolet);
        }
    )

    //항목의 Click이벤트
    introTopMoveBtn.click(function () {
        Current = 0;
        selectBoolet();
        defaultTop.stop().slideDown();
        defaultMiddle.stop().slideUp();
        defaultBottom.stop().slideUp();
    })

    introMiddleMoveBtn.click(function () {
        Current = 1;
        selectBoolet();
        defaultTop.stop().slideUp();
        defaultMiddle.stop().slideDown();
        defaultBottom.stop().slideUp();
        progressCircle();
    })

    introBottomMoveBtn.click(function () {
        Current = 2;
        selectBoolet();
        defaultTop.stop().slideUp();
        defaultMiddle.stop().slideUp();
        defaultBottom.stop().slideDown();
    })

    selectBoolet();
});

//인트로의 div 오브젝트 이동
/*
function scrollmove(obj) {
    var scrollTime = 1000;
    var topSectoion = $("#header_nav_section").height();
    var scrollTarget = $("#" + obj);
    var targetOffset = scrollTarget.offset();
    var moveScroll = Math.floor(targetOffset.top);    

    $("html, body").stop().animate({
        scrollTop: moveScroll-topSectoion + "px"
    }, scrollTime);
};
*/


function progressCircle() {
    $('#circle_progress_HTML').circleProgress({
        value: 0.85,
        fill: { gradient: ['#0681c4', '#07c6c1'] }
    }).on('circle-animation-progress', function (event, progress, stepValue) {
        $(this).find('strong').text(String(stepValue.toFixed(2).substr(2)));
    });

    $('#circle_progress_PHP').circleProgress({
        value: 0.9,
        fill: { gradient: ['#0681c4', '#07c6c1'] }
    }).on('circle-animation-progress', function (event, progress, stepValue) {
        $(this).find('strong').text(String(stepValue.toFixed(2).substr(2)));
    });

    $('#circle_progress_JQuery').circleProgress({
        value: 0.7,
        fill: { gradient: ['#0681c4', '#07c6c1'] }
    }).on('circle-animation-progress', function (event, progress, stepValue) {
        $(this).find('strong').text(String(stepValue.toFixed(2).substr(2)));
    });

    $('#circle_progress_AJAX').circleProgress({
        value: 0.6,
        fill: { gradient: ['#0681c4', '#07c6c1'] }
    }).on('circle-animation-progress', function (event, progress, stepValue) {
        $(this).find('strong').text(String(stepValue.toFixed(2).substr(2)));
    });

    $(".circle_progress_canvas_div canvas").css("width", "150px");
    $(".circle_progress_canvas_div canvas").css("height", "150px");
}