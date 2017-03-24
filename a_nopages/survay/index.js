$(function () {
    var activeContainer = $(".menuList").children("ul").children("li");

    activeContainer.click(function () {
        activeContainer.removeClass("active");
        $(this).addClass("active");
    });

    activeContainerWidht = 100 / activeContainer.length;

    activeContainer.css("width", activeContainerWidht+"%");
});

function pageMove(pageId) {
    var locationPage;

    if (pageId == "product") {
        locationPage = "?mod=" + pageId;
    } else if (pageId == "serial") {
        locationPage = "?mod=" + pageId;
    } else if (pageId == "history") {
        locationPage = "?mod=" + pageId;
    }

    console.log(pageId + "\n" + locationPage);

    $.ajax({
        url: locationPage,
        type: "GET",
        success: function (d) {
            $("#cheet").load(locationPage + " #cheetTable");
        }
    })
}


