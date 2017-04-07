//포토갤러리 업로드
function photoUpload() {
    var title = $("input[name=title]");
    var img = $("input[name=image]");
    var comment = $("textarea[name=writer_comment]");

    if (title.val() == "") {
        alert("제목을 입력 해주세요.");
        title.focus();
    } else if (img.val() == "") {
        alert("이미지 파일 첨부를 해주세요.");
        img.focus();
    } else if (comment.val() == "") {
        alert("코멘트를 작성 해주세요.");
        comment.focus();
    } else {
        $("#photoUpForm").submit();
    }
}


//포토바 선택 액션
function imageView(idx) {
    $(".photo_full_wrap").css("display", "block");
    $(".photoReple").css("display", "block");
    $(".photo_intro_wrap").css("display", "none");


    $("#photo_view").load("module/photoView.php?idx=" + idx + " #image");
    $("#photo_title").load("module/photoView.php?idx=" + idx + " #title");
    $("#photo_comment").load("module/photoView.php?idx=" + idx + " #comment");
    $("#reple_list").load("module/photoView.php?idx=" + idx + " #reple_list_wrap");
    $("#formIdxDiv").load("module/photoView.php?idx=" + idx + " #viewidx");
    $("#ph_img_nick_span").load("module/photoView.php?idx=" + idx + " #ph_img_nick", function () {
        sessionMatch(idx);
    });


    //포토 선택 후 윈도우 조정        
    windowResize();
};

function sessionMatch(idx) {
    //유저 현재사진과 유저 세션 정보 확인 
    var sessionNick = $("#ph_user_nick").val(); //현재 세션 닉네임  
    var imgNick = $("#ph_img_nick").val(); //이미지작성자 닉네임        

    if (sessionNick == imgNick) {
        $("<img>", {
            src: "img/Photo_View_X_icon.png",
            id: "ph_view_del_icon",
            onclick: "ph_delete_location("+idx+")"
        }).appendTo("#photo_view");

        $("#photo_view").hover(
            function () {
                $("#ph_view_del_icon").stop().animate({
                    opacity:1
                },300)
            },
            function () {
                $("#ph_view_del_icon").stop().animate({
                    opacity: 0
                }, 300)
            }
        );
    };
}

function ph_delete_location(idx) {
    var inputConfirm = confirm("정말 삭제하시겠습니까?");
    if (inputConfirm == true) {
        location.href = "module/photo_Del.php?idx=" + idx;
    } else {
        return false;
    }
}

$(function () {    
    var container = $(".photo_list_view ul");
    var child = container.children("li").length;
    var containerWidth = 150 * child; //컨테이터의 총 길이   
    var current = 0; //현재위치
    var move = 150;  //이동할 폭 
    if (current < 1) { current = 0 }
    if (current > child -4) { current = child -4 }
    

    container.css("width", containerWidth + "px");
    
    //포토바 리스트 애니메이트
    $("#photo_arrow_icon_right").click(function () {        
        if (current < child - 4) {
            current++;
            var moveX = current * move;
            container.animate({
                left:-moveX+"px"
            },300)            
        }                
    })

    $("#photo_arrow_icon_left").click(function () {        
        if (current > 0) {
            current--;
            var moveX = current * move;
            container.animate({
                left: -moveX + "px"
            },300)            
        }                
    })

    //댓글 입력 ajax 통신
    $("#reple_submit_Btn").click(function () {
        var comment = $("#pp_photo_reple_comment").val();
        var repleParam = $("#formRepleUp").serialize();
        var useridx = $("#useridx").val();
        var reIdx = $("#viewidx").val();

        if (comment == "") {
            alert("댓글을 입력 해 주세요.");
        } else if (useridx == "" || !useridx) {
            alert("댓글은 로그인 후 이용 해 주세요.");
        } else {
            $.ajax({
                data: repleParam,
                type : "POST",
                url: "module/photoView.php?mod=insert",
                success: function (data) {
                    $("#reple_list").load("module/photoView.php?idx=" + reIdx + " #reple_list_wrap");
                    $("#pp_photo_reple_comment").val("");
                }
            })
        }
    })    
})

//댓글 삭제 ajax 통신
function repleDelet(idx) {
    var reDeleteInput = confirm("정말 삭제하시겠습니까?");
    var reIdx = $("#viewidx").val();

    if (reDeleteInput == true) {
        $.ajax({
            url: "module/photoView.php?mod=delete&idx=" + idx,
            success: function (data) {
                $("#reple_list").load("module/photoView.php?idx=" + reIdx + " #reple_list_wrap");
                $("#pp_photo_reple_comment").val("");
            }
        })
    } else {
        return false;
    }
}

$(function () {
    var text1 = $("#ph_intro_1");
    var text2 = $("#ph_intro_2");
    var text3 = $("#ph_title_img");

    var container = $(".photo_intro_wrap");
    var max = container.children("p").length;
    var animateLevel = 0;
    var time = 800;

    //단계별 포토인트로 애니메이트
    var photoIntro = setInterval(function () {
        switch (animateLevel) {
            case 0:
                text1.animate({
                    left: "700px",
                    opacity: 1
                }, time);
                break;
            case 1:
                text2.animate({
                    left: "800px",
                    opacity: 1
                }, time);
                break;
            case 2:
                text3.animate({
                    right: "480px",
                    opacity:1
                }, time)
            default:
                break;
        }
        animateLevel++;        
    },time);


    if (animateLevel >= max) {
        clearInterval(photoIntro);
    }
})

$(function () {
    var imgNick = $("#phViewNick").val();
    var sessionUserNick = $("#sessionUserNick").val();
});

function BlPhotoViewMask(idx) {
    var phidx = $("#phBlviewIdx" + idx); //화면의 불러올 이미지의 id 의 경로
    var phtitle = $("#phBlockTitle"+idx).val(); //이미지의 제목
    var phText = $("#phBlockText"+idx).val(); //이미지의 텍스트
    var phpath = phidx.attr("src");
    var phView = $("#BlClickView"); //이미지를 감싸는 영역
    var phInsert = $("#Blimg"); //실제 이미지를 넣는 영역
    
    // 이미지 영역에 사이즈
    var phViewWidth = phView.width();
    var phViewHeight = phView.height();

    //이미지를 넣을 영역의 사이즈
    var phInsertDivHeight = phInsert.height();
    
    var imgView = 
    $("<img>", {
        src: phpath,       
        id : "imgViewId"
    }).appendTo("#Blimg");
    
    $("#BlClickView h1").html("제목 : " + phtitle);
    $("#BlClickView p").html("작성자의 말 : " + phText);
    //alert(phtitle);

    
    phView.css("display", "block");

    //이미지를 이미지 뷰 영역 중앙에 위치 하기위한 margin
    
      
    phView.animate({
        opacity: 1
    },500);
    //이미지사이즈
    var imgWidth = $("#imgViewId").width();
    var imgHeight = $("#imgViewId").height();

    imgMargin(phInsertDivHeight, imgHeight);
};

function imgMargin(phInsertDivHeight, imgHeight) {
    $("#imgViewId").css("margin-top", (phInsertDivHeight-imgHeight)/2)
};

function ViewCloseBtn() {
    var phView = $("#BlClickView"); //이미지를 감싸는 영역
    
    phView.animate({
        opacity: 0
    }, 500);

    phView.css("display", "none");
    $("#imgViewId").remove();
}