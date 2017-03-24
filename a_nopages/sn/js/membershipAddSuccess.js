$(function () {
    var moveTime = $("#moveTime");
    
    var count = 3;

    moveTime.text(count + " 초 후에 ");

    var interval = setInterval(function () {
        moveTime.text(count - 1 + " 초 후에 ");
        count--;

        //console.log(moveTime);

        if (count == 0 || count < 0) {
            moveTime.text("지금 ");
            
            setTimeout(function () {
                memberAddAfterPageMove();
            }, 200);            
        }
    }, 1000);           
})

function memberAddAfterPageMove() {
    location.replace("/sn");    
}