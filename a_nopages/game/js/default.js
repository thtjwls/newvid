$(function () {
    //위로 38
    //밑으로 40
    //왼쪽 37
    //오른쪽 39
    var hero = $("#air");
    
    var moveX = 10;
    var time = 1000;


    //alert(heroLeft+1);

    $("body").keydown(function (e) {
        var heroX = Number(hero.css("left").replace(/[^0-9]/g, "")); //현재 x좌표의 위치
        var heroY = Number(hero.css("top").replace(/[^0-9]/g, "")); //현재 y좌표의 위치
        if (e.keyCode == 38) {
            hero.stop().animate({
                
            }, time)            
        }

        if (e.keyCode == 40) {
            hero.stop().animate({

            }, time)
        }

        if (e.keyCode == 37) {
            hero.stop().animate({

            }, time)
        }

        if (e.keyCode == 39) {
            hero.stop().animate({
                left:heroX + moveX + "px"
            }, time)
        }

        if (heroX < 20) {
            //$("#char").css("left", "20px");
        }

        if (heroY < 20) {
            //$("#char").css("top", "20px");
        }      
    });       //키 이벤트 종료
})