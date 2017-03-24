$(function () {
    $("#login_pass").keydown(function (e) {
        if (e.keyCode == 13) {
            login_form();
        }
    });
});

$(function () {
    var login_header = $(".login_header");
    var logo_header = $(".logo_header");
    var tabId = $("#tabsId").val();
    var sectionDiv = $("header > section");
    var windowHeight = $(window).height();
    var windowWidth = $(document).width();    
    var wrapHeight = $(".wrap").height();
  
    if (tabId == "intro" || !tabId || tabId == "") {
        login_header.slideUp(1000);
        logo_header.slideUp(1000);
        sectionDiv.css("position", "fixed");
        sectionDiv.css("width", "1920px");
        sectionDiv.css("border", "0");
        sectionDiv.css("background-color", "#20150A");
        sectionDiv.css("z-index", "999");
        $("#pp_article").css("padding-top", "36px");
        $("body").css("background-color", "#20150A");
        $(".wrap, section ul li a").animate({
            color: "#FFF"
        });           

        $(".intro_top, .intro_middle, .intro_bottom").css("height", windowHeight);
        //$(".intro_top, .intro_middle, .intro_bottom").css("border-bottom", "1px solid #FFF");        
        if ($("body").height() > windowHeight) {
            $("body").css("width", "1920px");
            $("body").css("height", "1019px");
            $("body").css("overflow", "hidden");
        }               
    }
    windowResize();
});
function windowResize() {
    var windowH = $(window).height();
    var windowW = $(window).width();
    var wrapW = $(".wrap").width();
    var wrapH = $(".wrap").height();
    if (wrapH > windowH) {
        $(".wrap").css("width", "1900px");
    }
}