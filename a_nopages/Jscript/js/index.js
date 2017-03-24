$(function () {
    var cnt = 0;

    function circleCreate() {
        if (cnt == 10) cnt = "꼴";
        $("<div>", {
            class: "circle",
            text : cnt+"등"
        }
        ).appendTo("body");
    }
   
    var circleClear = setInterval(function () {
        cnt++;
        if (cnt == 10) clearInterval(circleClear);
        
        circleCreate();        
        console.log(cnt);
    }, 1000);


})