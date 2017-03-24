$(document).ready(function () {
    var current = 0; //현재위치
    var max = 0; //이미지 갯수
    var img_size = 1000; //이미지의 사이즈
    var container; //슬라이드 요소를 감싸는 프로퍼티
    var index_btn1 = $("#index_btn1");
    var index_btn2 = $("#index_btn2");
    var index_btn3 = $("#index_btn3");


    container = $(".index_title_img ul");
    text1_container = $("#index1_text");
    text2_container = $("#index2_text");
    text3_container = $("#index3_text");
    plus_btn = $("#plus_btn");

    
    var rolling = setInterval(        
        container.animate({
            marginLeft: -current * img_size
        })
    )
    


    text1_container.animate({
        opacity: "1"
    }, 1000);

       
        if (current == 0) {
            $("#index_btn1").click(function () {
                container.animate({
                    marginLeft: "0",
                    current: "0"
                }, 1000);

                text1_container.animate({
                    opacity: "1"
                }, 1000);


                text2_container.animate({
                    opacity: "0"
                }, 1000);

                text3_container.animate({
                    opacity: "0"
                }, 1000);

                plus_btn.animate({
                    right: "69px",
                    bottom: "260px"
                }, 800)
            });

            $("#index_btn2").click(function () {
                container.animate({
                    marginLeft: "-1000px",
                    current: "1"
                }, 1000);
            
                text1_container.animate({
                    opacity: "0"
                },1000);
            

                text2_container.animate({
                    opacity: "1"
                }, 1000);

                text3_container.animate({
                    opacity: "0"
                }, 1000);

                plus_btn.animate({
                    right: "900px",
                    bottom: "216px"
                },800)
            });

            $("#index_btn3").click(function () {
                container.animate({
                    marginLeft: "-2000px",
                    current: "2"
                }, 1000);

                text1_container.animate({
                    opacity: "0"
                }, 1000);


                text2_container.animate({
                    opacity: "0"
                }, 1000);

                text3_container.animate({
                    opacity: "1"
                }, 1000);

                plus_btn.animate({
                    right: "69px",
                    bottom: "208px"
                }, 800)
            });  
    }
});

/* index 페이지 nav태그 요소 애니메이션
$(document).ready(function () {
    var icon = $(".nav_icon ul li");

    var $i;

    for ($i = 1; $i <= 4; $i++) {
        (function ($i) {
            $("#nav_icon"+$i).on("mouseenter", function () {
                $("#nav_icon"+$i+" img").animate({
                    width: "100px"
                });

                $("#nav_icon"+$i+" img").animate({
                    width: "200px"
                });
            })
        })($i)
    }
})
*/