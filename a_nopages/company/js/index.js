$(document).ready(function () {
    //allow mouse over
    $("#left_arrow").stop().on("mouseenter", function () {
        $("#left_arrow").stop().animate({
            left: "130px"
        });
    });

    $("#left_arrow").stop().on("mouseleave", function () {
        $("#left_arrow").stop().animate({
            left: "160px"
        });
    });

    $("#right_arrow").stop().on("mouseenter", function () {
        $("#right_arrow").stop().animate({
            right: "130px"
        });
    });

    $("#right_arrow").stop().on("mouseleave", function () {
        $("#right_arrow").stop().animate({
            right: "160px"
        });
    });
    //arrow mouse over end

    $("#left_arrow").click(function () {
        $(".animate_wrap").animate({
            left: "1920px",
        }, 800);

        setTimeout("incheonilbo()", 750);
    });


    $("#right_arrow").click(function () {
        $(".animate_wrap").animate({
            right: "1920px",
        }, 800);

        setTimeout("recurt()", 750);
    });
});

function incheonilbo() {
    location.href = ("http://www.incheonilbo.com");
}

function recurt() {
    location.href = ("./pages/page01.php");
}