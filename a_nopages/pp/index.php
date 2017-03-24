<?
include "lib/session.php";
include "lib/dbconnect.php";    
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title>지훈이의 포트폴리오</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/common.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>    
    <script src="js/user_form.js" type="text/javascript"></script>
    <script src="js/window.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/bbs.js" type="text/javascript"></script>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script><!--다음 주소 api-->
    <script src="js/HuskyEZCreator.js" charset="utf-8"></script>   
    <script type="text/javascript" src="js/photo.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery.ajax-cross-origin.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/intro.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/circle-progress.js" charset="utf-8"></script>
    <link href="https://fonts.googleapis.com/css?family=Baloo+Paaji" rel="stylesheet" />
</head>
<body>        
    <?
    $tabs = $_GET["tabs"];
    $mod  = $_GET["mod"];
    //user 닉네임 획득
    $usernickQuery = "select nick from pp_member where idx ='$useridx'";
    $usernickResult = mysql_query($usernickQuery,$connect);
    $userrow = mysql_fetch_array($usernickResult);
    $usernick = $userrow[nick];
    ?>
    <input type="hidden" value="<?=$tabs?>" id="tabsId"/>
    <div class="wrap">        
        <header>            
            <div class="login_header">                
  <?
                    if($useridx == "" ){
                ?>
                <a href="?tabs=login">로그인</a>
                <a href="?tabs=memberAd">회원가입</a>
  <?
                    } else {
                ?>
                <a href="module/member.php?mod=logout">로그아웃</a>
                <a href="?tabs=memberModify">정보수정</a>
  <?
                    }
  ?>
            </div>
            <div class="logo_header">
                <p>Web programing</p>
            </div>
            <section id="header_nav_section">
                <ul>
                    <li id="pageIntro">
                        <a href="?tabs=intro">
                            자기소개
                        </a>
                    </li>
                    <li id="pageBBS">
                        <a href="?tabs=bbs">
                            자유게시판
                        </a>
                    </li>
                    <li id="pagePhoto">
                        <a href="?tabs=photo">
                            포토갤러리
                        </a>
                    </li>
                    <li>
                        <a href="?tabs=chat">
                            실시간 공개채팅
                        </a>
                    </li>
                    <li>
                        <a href="?tabs=test">
                            테스트페이지
                        </a>
                    </li>
                </ul>
            </section>
        </header>
        <article id="pp_article">
            <?
            if($tabs == "" || $tabs == "intro" || !$tabs) { //초기화면
            ?>
            <nav id="nav_btn">
                <ul>
                    <li id="intro_top_nav_move">
                        <div class="pp_intro_btn_text" id="pp_intro_btn_text_top">좌우명</div><div id="intro_nav_btn_boolet_top"></div>
                    </li>
                    <li id="intro_middle_nav_move">
                        <div class="pp_intro_btn_text" id="pp_intro_btn_text_middle">보유스킬</div><div id="intro_nav_btn_boolet_middle"></div>
                    </li>
                    <li id="intro_bottom_nav_move">
                        <div class="pp_intro_btn_text" id="pp_intro_btn_text_bottom">네글자씩</div><div id="intro_nav_btn_boolet_bottom"></div>
                    </li>
                </ul>
                <p id="wheelId"></p>
            </nav>
            <div class="intro_wrap">
                <div class="intro_top" id="intro_top">
                    <!--인트로 Top 영역 -->
                    <div class="innovation_wrap">
                        <p>
                            Idea + Create = <span>Innovation</span><br />
                            <span class="know_and_innovation">생각</span>에 <span class="know_and_innovation">창조</span>를 더해 <span class="know_and_innovation">혁신</span>을 만든다                            
                        </p>
                        <span id="resize"></span>
                    </div>
                </div> <!--인트로 Top 영역 end-->
                <div class="intro_middle" id="intro_middle">
                    <!-- 인트로 middle 영역-->
                    <div class="inner_intro_middle">
                        <h1 id="intro_middle_skil">Skill</h1>
                        <div id="circle_progress_wrap">
                            <div id="circle_progress_HTML" class="circle_progress_canvas_div">
                                <h3>HTML/CSS</h3>
                                <strong></strong>
                            </div>
                            <div id="circle_progress_PHP" class="circle_progress_canvas_div">
                                <h3>PHP</h3>
                                <strong></strong>
                            </div>
                            <div id="circle_progress_JQuery" class="circle_progress_canvas_div">
                                <h3>JS/JQ</h3>
                                <strong></strong>
                            </div>
                            <div id="circle_progress_AJAX" class="circle_progress_canvas_div">
                                <h3>AJAX</h3>
                                <strong></strong>
                            </div>
                        </div>
                    </div>
                </div><!-- 인트로 middle 영역 end -->
                <div class="intro_bottom" id="intro_bottom"><!-- 인트로 bottom 영역-->                    
                    <div class="inner_intro_bottom">

                    </div>
                </div> <!-- 인트로 bottom 영역 end -->
            </div>
            <?
            } else if ($tabs == "bbs") { //자유게시판
                include "module/bbs.php";
            ?>
            <div class="bbs_Write_Btn">
                <?
 if($useridx !="") {
                ?>
                <input type="button" value="글쓰기" onclick="location.href = 'index.php?tabs=bbswrite';" />
                <?
                   }
                ?>
            </div>
            <?
            } else if ($tabs == "photo") { //포토갤러리
                $photoCntQuery = "select count(idx) from pp_photo where cate='view'";
                $photoCntResult = mysql_query($photoCntQuery,$connect);
                $photoCnt = mysql_result($photoCntResult,0,0);
            ?>
            <div id="photoViewType">
                <div id="photoViewTypeBlock">
                    B
                </div>
                <div id="photoViewTypeSlide">
                    S
                </div>
            </div>
            <div class="photo_intro_wrap">
                <!--photo intro 의 프롤로그 영역-->
                <p id="ph_intro_1">
                    이곳에서 나의추억을
                </p>
                <p id="ph_intro_2">
                    다른사람과 공유해보세요.
                </p>
                <img src="img/photo_title_img.png" alt="Alternate Text" id="ph_title_img" />
            </div>
            <div class="photo_full_wrap">
                <div class="photo_wrap">
                    <h3>
                        포토갤러리
                    </h3>
                    <div class="photo_title" id="photo_title">
                        <!--해당 사진의 타이틀 영역-->
                    </div>
                    <div class="photo_view" id="photo_view">
                        <!--선택한 사진의 큰 사진영역-->                        
                    </div>
                </div>
                <div class="photo_comment">
                    <h3>
                        작성자의 말
                    </h3>
                    <div id="photo_comment">
                        <!--작가의 코멘트 영역-->
                    </div>
                </div>
            </div>
            <div class="photo_list">
                <a>
                    <img src="img/arrow-icon-left.png" alt="left" class="photo_arrow_icon" id="photo_arrow_icon_left" />
                </a>
                <div class="photo_list_view">
                    <ul>
                        <?
                $photolistQuery = "select * from pp_photo where cate='view' order by idx desc";
                $photolistResult = mysql_query($photolistQuery,$connect);
                while($phrow = mysql_fetch_array($photolistResult)) {
                    $image = $phrow[image];
                    $phidx = $phrow[idx];
                    $phtitle = $phrow[title];
                    $phnick = $phrow[writer];
                        ?>
                        <li>
                            <a onclick="imageView(<?=$phidx?>);">
                                <img src="photo/<?=$image?>" alt="" title="<?=$phtitle?>" />
                            </a>
                        </li>
                        <?
                }
                        ?>
                    </ul>
                </div>
                <a>
                    <img src="img/arrow-icon-right.png" alt="right" class="photo_arrow_icon" id="photo_arrow_icon_right" />
                </a>
            </div>
            <?
                if($useridx != "") {
            ?>
            <div class="photo_upload_btn">
                <input type="button" value="사진등록" onclick="location.href = '?tabs=photow';" />
            </div>
            <?
                }
                //pp_photo 에서 cate=reple 레코드만 뽑음
                //pp_photo cate=reple 데이터 가져오기 끝
            ?>
            <div class="photoReple">
                <div id="reple_writer">
                    <form method="post" id="formRepleUp">
                        <div id="formIdxDiv"></div>
                        <textarea name="pp_photo_reple" id="pp_photo_reple_comment" cols="100" rows="5" placeholder="댓글을 입력 해 주세요."></textarea>
                        <input type="hidden" value="<?=$useridx?>" id="useridx" />
                        <input type="button" value="완료" id="reple_submit_Btn" />
                    </form>
                </div>
                <div id="reple_list">
                    <!--포토 리플 영역-->
                </div>
            </div>                            
            <span id="ph_session_div">
                <span>
                    <input type="hidden" value="<?=$usernick?>" id="ph_user_nick" />
                </span>
                <span id="ph_img_nick_span">

                </span>
            </span>
            <?
            } else if ($tabs == "chat") { //공개채팅
                include "module/chat.php";

            } else if ($tabs == "memberAd") {
            ?>
            <form name="member_ad_form" id="member_ad_form" action="module/member.php?mod=add" method="post">
                <table cellpadding="10" cellspacing="10" class="member_add_table">
                    <caption>
                        회원가입
                    </caption>
                    <colgroup>
                        <col width="100px" />
                        <col width="100px;" />
                    </colgroup>
                    <tr>
                        <th>
                            이름
                        </th>
                        <td colspan="2">
                            <input type="text" name="name" id="name" />
                        </td>
                    </tr>
                    <tr>
                        <th>
                            아이디
                        </th>
                        <td>
                            <input type="text" value="" name="id" id="id" />
                        </td>
                        <td colspan="2">
                            <input type="button" value="중복확인" id="id_chk" />
                            <p class="chk_help" id="id_chk_help"></p>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            비밀번호
                        </th>
                        <td>
                            <input type="password" value="" name="pass" id="pass" />
                            <p id="pass_chk_help" class="chk_help"></p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>
                            비밀번호 확인
                        </th>
                        <td>
                            <input type="password" value="" name="passchk" id="passchk" />
                            <p class="chk_help" id="pass_confirm"></p>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            닉네임
                        </th>
                        <td>
                            <input type="text" value="" name="nick" id="nick" />
                        </td>
                        <td colspan="2">
                            <input type="button" value="중복확인" id="nickChkbtn" />
                            <p class="chk_help" id="nick_chk_help"></p>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            우편번호
                        </th>
                        <td>
                            <input type="text" value="" name="post_num" id="post_num" />
                        </td>
                        <td>
                            <input type="button" value="우편번호찾기" onclick="post_code()" />
                        </td>
                    </tr>
                    <tr>
                        <th>
                            주소
                        </th>
                        <td colspan="3">
                            <input type="text" value="" name="address" id="address" />
                        </td>
                    </tr>
                    <tr>
                        <th>
                            상세주소
                        </th>
                        <td colspan="3">
                            <input type="text" value="" name="inner_address" id="inner_address" />
                        </td>
                    </tr>
                    <tr>
                        <th>
                            전화번호
                        </th>
                        <td colspan="2">
                            <input type="tel" value="" name="tel1" id="tel1" />-
                            <input type="tel" value="" name="tel2" id="tel2" />-
                            <input type="tel" value="" name="tel3" id="tel3" />
                        </td>
                    </tr>
                    <tr>
                        <th>
                            가입목적
                        </th>
                        <td colspan="3">
                            <textarea name="etc" id="etc" cols="70" rows="10" placeholder="※필수작성은 아니나 가입하신분의 회사,가입목적,피드백 등을 작성해 주시면 정말 큰 힘이됩니다! ('구경' 이라고만 해주셔도 괞찬습니다.)"></textarea>
                        </td>
                    </tr>
                </table>
                <div class="submit_btn">
                    <input type="button" value="완료" id="form_fin" />
                    <input type="reset" value="다시작성" />
                </div>
                <div id="userchk">
                    <input type="hidden" value="" id="idConfirm" />
                    <input type="hidden" value="" id="passConfirm" />
                    <input type="hidden" value="" id="passchkConfirm" />
                    <input type="hidden" value="" id="nickConfirm" />
                </div>
            </form>
            <?
            } else if ($tabs == "bbsView") {
                    $idx = $_GET["idx"];
                    setcookie("cook","$idx",time() + 3600);		//cook쿠키의 이름은 cook 3600초 유지
                    if($_COOKIE[cook] != $idx){											//$cookieid 가 없으면 if 문 돌림
                        $sqlhit="update pp_bbs set view=view+1 where idx='$idx'";
                        $hit=mysql_query($sqlhit,$connect);	//hit 레코드 +1 증가
                    }
                    $bbsViewQuery = "select * from pp_bbs where idx='$idx' and cate='board'";
                    $bbsViewRresult = mysql_query($bbsViewQuery,$connect);
                    $bbsRow = mysql_fetch_array($bbsViewRresult);
                    $commentIdx = $bbsRow[comment_idx];
                    $cate = $bbsRow[cate];
                    $title = $bbsRow[title];
                    $contents = $bbsRow[contents];
                    $writer = $bbsRow[writer];
                    $view = $bbsRow[view];
                    $regist_day = $bbsRow[regist_day];
                    $commentCntQuery = "select count(idx) from pp_bbs where comment_idx='$idx' and cate='comment'";
                    $commentCntResult = mysql_query($commentCntQuery,$connect);
                    $commentCnt = mysql_result($commentCntResult,0,0);
            ?>
            <table cellpadding="0" cellspacing="0" class="bbsView">
                <caption>
                    자유게시판
                </caption>
                <colgroup>
                    <col width="80%" />
                    <col width="20%" />
                </colgroup>
                <tr>
                    <th colspan="2" style="text-align:left;">
                        <?=$title?>
                    </th>
                </tr>
                <tr>
                    <td>
                        <?=$writer?>
                    </td>
                    <td style="text-align:right;">
                        <?=$regist_day?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="contents">
                        <?=$contents?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border-bottom:0;" class="bbsViewBtn">
                        <input type="button" value="목록" id="bbsListView" />
                        <?
                if($writer == $usernick) {
                        ?>
                        <input type="button" value="삭제" id="bbsDeleteBtn" />
                        <input type="button" value="수정" id="bbsModifyBtn" />
                        <input type="hidden" value="<?=$idx?>" id="bbsIdx" />
                    </td>
                </tr>
                <?
                }
                ?>
            </table>
            <table class="reple_table" id="reple_table" cellpadding="0" cellspacing="3">
                <caption>댓 글</caption>
                <?
                if($commentCnt != 0) {
                ?>


                <?
                    $commentQuery = "select * from pp_bbs where comment_idx='$idx' and cate='comment' order by idx desc";
                    $commentResult = mysql_query($commentQuery,$connect);
                    while($commentRow=mysql_fetch_array($commentResult)){
                    $re_contents = $commentRow[contents];
                    $re_writer = $commentRow[writer];
                    $re_regist_day = $commentRow[regist_day];
                ?>
                <tr>
                    <th>
                        <?=$re_writer?>
                    </th>
                    <th style="text-align:right;">
                        <?=$re_regist_day?>
                    </th>
                </tr>
                <tr>
                    <td colspan="2" class="reple_contents">
                        <?=$re_contents?>
                    </td>
                </tr>
                <?
                    } //comment list while end
                } //comment list (if) end
                ?>
                <tr>
                    <td style="text-align:center;" colspan="2">
                        <form action="bbsRepleInsert.php" method="post" name="bbsRepleInsertForm">
                            <textarea name="bbsReple" cols="100" rows="7" placeholder="댓글을 입력 해 주세요."></textarea>
                            <input type="button" name="bbsRepleInsertBtn" value="작성" />
                        </form>
                    </td>
                </tr>
                    <?
                include "module/bbs.php";
                    ?>
            </table><!--reple table end-->
            <?
            if($useridx != "" || !!$useridx) {
            ?>
            <div class="bbs_Write_Btn">
                <input type="button" value="글쓰기" onclick="location.href = 'index.php?tabs=bbswrite';" />
            </div>
            <?
            }
            } else if ($tabs == "login") {
            ?>
            <div class="login_wrap">
                <div class="inner_login_wrap">
                    <form action="module/member.php?mod=login" method="post" class="login_wrap_input_form" id="login_wrap_input_form">
                        <h3>
                            로그인
                        </h3>
                        <input type="text" name="login_id" value="" id="login_id" placeholder="아이디" autocomplete="off" autofocus />
                        <input type="password" name="login_pass" id="login_pass" value="" placeholder="비밀번호" autocomplete="off" />
                        <input type="button" value="로그인" onclick="login_form();" />
                    </form>
                    <div class="memberAd_form_div">
                        아직 회원이 아니신가요?
                        <a href="?tabs=memberAd">> 회원가입 바로가기</a><br />
                    </div>
                    <p></p>
                </div>
            </div>
            <?
            } else if ($tabs == "memberModify") {
                include "module/memberModify.php";
            ?>
            <form name="member_modify_form" id="member_modify_form" class="memberModifyForm" action="module/member.php?mod=modify" method="post">
                <table cellpadding="10" cellspacing="10" class="member_add_table">
                    <caption>
                        회원가입
                    </caption>
                    <colgroup>
                        <col width="100px" />
                        <col width="100px;" />
                    </colgroup>
                    <tr>
                        <th>
                            이름
                        </th>
                        <td colspan="2">
                            <input type="text" name="name" id="name" value="<?=$membername?>" readonly />
                        </td>
                    </tr>
                    <tr>
                        <th>
                            아이디
                        </th>
                        <td>
                            <input type="text" value="<?=$memberid?>" name="id" id="id" readonly />
                        </td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <th>
                            비밀번호
                        </th>
                        <td>
                            <input type="password" value="" name="pass" id="pass" />
                            <p id="pass_chk_help" class="chk_help"></p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>
                            비밀번호 확인
                        </th>
                        <td>
                            <input type="password" value="" name="passchk" id="passchk" />
                            <p class="chk_help" id="pass_confirm"></p>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            닉네임
                        </th>
                        <td>
                            <input type="text" value="<?=$membernick?>" name="nick" id="nick" readonly />
                        </td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <th>
                            우편번호
                        </th>
                        <td>
                            <input type="text" value="<?=$memberpostnum?>" name="post_num" id="post_num" />
                        </td>
                        <td>
                            <input type="button" value="우편번호찾기" onclick="post_code()" />
                        </td>
                    </tr>
                    <tr>
                        <th>
                            주소
                        </th>
                        <td colspan="3">
                            <input type="text" value="<?=$memberaddress?>" name="address" id="address" />
                        </td>
                    </tr>
                    <tr>
                        <th>
                            상세주소
                        </th>
                        <td colspan="3">
                            <input type="text" value="<?=$memberinneraddress?>" name="inner_address" id="inner_address" />
                        </td>
                    </tr>
                    <tr>
                        <th>
                            전화번호
                        </th>
                        <td colspan="2">
                            <input type="tel" value="<?=$membertel1?>" name="tel1" id="tel1" />-
                            <input type="tel" value="<?=$membertel2?>" name="tel2" id="tel2" />-
                            <input type="tel" value="<?=$membertel3?>" name="tel3" id="tel3" />
                        </td>
                    </tr>
                    <tr>
                        <th>
                            가입목적
                        </th>
                        <td colspan="3">
                            <textarea name="etc" id="etc" cols="70" rows="10" placeholder="※필수작성은 아니나 가입하신분의 회사,가입목적,피드백 등을 작성해 주시면 정말 큰 힘이됩니다! ('구경' 이라고만 해주셔도 괞찬습니다.)">
                                <?=$memberetc?>
                            </textarea>
                        </td>
                    </tr>
                </table>
                <div class="submit_btn">
                    <input type="button" value="완료" id="form_fin_modify" class="memberModify" />
                    <input type="reset" value="다시작성" />
                </div>
                <div id="userchk">
                    <input type="hidden" value="" id="passConfirm" />
                    <input type="hidden" value="" id="passchkConfirm" />
                </div>
            </form>
            <?
            } else if ($tabs == "bbswrite") {
            ?>
            <div class="write_se2_wrap">
                <div class="write_se2_caption">
                    자유게시판
                </div>
                <div id="writer-se2-editor-div">
                    <form name="page05_write_form" id="write_form" action="module/bbswrite.php?mod=write" method="post">
                        <div class="write_se2_title">
                            <input type="text" value="" name="bbstitle" id="bbstitle" placeholder="제목을 입력 해주세요." maxlength="50" />
                        </div>
                        <div id="editor-text-area-cus">
                            <textarea name="ir1" id="ir1" rows="10" cols="100" style="width:1198px; height:412px; display:none;"></textarea>

                            <input type="button" value="등록" id="contents_submit" onclick="content_result();" />

                            <script type="text/javascript">
                                var oEditors = [];
                                nhn.husky.EZCreator.createInIFrame({
                                    oAppRef: oEditors,
                                    elPlaceHolder: "ir1",
                                    sSkinURI: "SmartEditor2Skin.html",
                                    fCreator: "createSEditor2"
                                });

                                // ‘저장’ 버튼을 누르는 등 저장을 위한 액션을 했을 때 submitContents가 호출된다고 가정한다.
                                function content_result() {
                                    // 에디터의 내용이 textarea에 적용된다.
                                    var title = $("#bbstitle");
                                    oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
                                    var content = $("#ir1");
                                    // 에디터의 내용에 대한 값 검증은 이곳에서
                                    // document.getElementById("ir1").value를 이용해서 처리한다.
                                    try {
                                        elClickedObj.form.submit();
                                    } catch (e) {
                                        if (title.val() == "") {
                                            alert("제목을 입력 해주세요.");
                                            title.focus();
                                        } else if (content.val() == "<p>&nbsp;</p>" || content.val() == "") {
                                            alert("내용을 입력 해주세요.");
                                            content.focus();
                                        } else {
                                            $("#write_form").submit();
                                        }
                                    }
                                }
                            </script>
                        </div>
                    </form>
                </div>
            </div>
            <?
            } //bbswrite end
            else if ($tabs == "bbsModify") {
                $bbsModifyIdx = $_REQUEST["idx"];
                $bbsModifyQuery = "select idx,title,contents from pp_bbs where idx = $bbsModifyIdx";
                $bbsModifyResult = mysql_query($bbsModifyQuery,$connect);
                $bbsrow = mysql_fetch_array($bbsModifyResult);
                $title = $bbsrow[title];
                $contents = $bbsrow[contents];
            ?>
            <div class="write_se2_wrap">
                <div class="write_se2_caption">
                    자유게시판
                </div>
                <div id="writer-se2-editor-div">
                    <form name="page05_write_form" id="write_form" action="module/bbswrite.php?mod=modify&idx=<?=$bbsModifyIdx?>" method="post">
                        <div class="write_se2_title">
                            <input type="text" value="<?=$title?>" name="bbstitle" id="bbstitle" placeholder="제목을 입력 해주세요." />
                        </div>
                        <div id="editor-text-area-cus">
                            <textarea name="ir1" id="ir1" rows="10" cols="100" style="width:1198px; height:412px; display:none;">
                                <?=$contents?>
                            </textarea>

                            <input type="button" value="등록" id="contents_submit" onclick="content_result();" />

                            <script type="text/javascript">
                                var oEditors = [];
                                nhn.husky.EZCreator.createInIFrame({
                                    oAppRef: oEditors,
                                    elPlaceHolder: "ir1",
                                    sSkinURI: "SmartEditor2Skin.html",
                                    fCreator: "createSEditor2"
                                });

                                // ‘저장’ 버튼을 누르는 등 저장을 위한 액션을 했을 때 submitContents가 호출된다고 가정한다.
                                function content_result() {
                                    // 에디터의 내용이 textarea에 적용된다.
                                    var title = $("#bbstitle");
                                    oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
                                    var content = $("#ir1");
                                    // 에디터의 내용에 대한 값 검증은 이곳에서
                                    // document.getElementById("ir1").value를 이용해서 처리한다.
                                    try {
                                        elClickedObj.form.submit();
                                    } catch (e) {
                                        if (title.val() == "") {
                                            alert("제목을 입력 해주세요.");
                                            title.focus();
                                        } else if (content.val() == "<p>&nbsp;</p>" || content.val() == "") {
                                            alert("내용을 입력 해주세요.");
                                            content.focus();
                                        } else {
                                            $("#write_form").submit();
                                        }
                                    }
                                }
                            </script>
                        </div>
                    </form>
                </div>
            </div>
            <?
            } else if ($tabs == "photow") {
            ?>
            <div class="photow_wrap">
                <form action="module/photoUp.php?mod=insert" enctype="multipart/form-data" id="photoUpForm" method="post">
                    <table cellpadding="3" cellspacing="0" class="photoFileUploadTable">
                        <caption>
                            사진등록하기
                        </caption>
                        <colgroup>
                            <col width="10%">
                            <col width="90%" />
                        </colgroup>
                        <tr>
                            <th>
                                제목
                            </th>
                            <td>
                                <input type="text" name="title" value="" autofocus placeholder="필수입력 항목입니다." />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                이미지
                            </th>
                            <td>
                                <input type="file" name="image" value="" />
                                <!-- 파입업로드를 위한 mas_file_size 지정 -->
                                <input type="hidden" name="MAX_FILE_SIZE" value="20971520" />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                코멘트
                            </th>
                            <td>
                                <textarea name="writer_comment" cols="50" rows="5" placeholder="필수입력 항목입니다."></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="button" value="등록하기" onclick="photoUpload();" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <?
            } else if ($tabs == "photoBlock") {
            ?>
            <div class="phTypeBlock">
                <h3>
                    포토갤러리
                </h3>
                <div id="phBlockList">
                    <?
                    $phBlockListQuery = "select * from pp_photo where cate='view' order by idx desc";
                    $phBlockListResult = mysql_query($phBlockListQuery,$connect);
                    while($phBlLi = mysql_fetch_array($phBlockListResult)) {
                        $Blidx = $phBlLi[idx];
                        $Bltitle = $phBlLi[title];
                        $Blimg = $phBlLi[image];
                        $BlText = $phBlLi[writer_comment];
                    ?>
                    <div class="ph_bl_list_div">
                        <img src="photo/<?=$Blimg?>" title="<?=$BlText?>" onclick="BlPhotoViewMask(<?=$Blidx?>);" id="phBlviewIdx<?=$Blidx?>"/>                        
                        <input type="hidden" value="<?=$Bltitle?>" id="phBlockTitle<?=$Blidx?>"/>
                        <input type="hidden" value="<?=$BlText?>" id="phBlockText<?=$Blidx?>"/>
                    </div>
                        <?
                    }
                        ?>                    
                </div>
            </div>            
            <div id="BlClickView">
                <div id="Bl_View_text_wrap">
                    <h1></h1>
                    <p></p>
                </div>
                <div id="ViewCloseBtn">
                    <img src="img/Photo_View_X_icon.png" alt="" width="30px;" onclick="ViewCloseBtn();"/>
                </div>
                <div id="Blimg">

                </div>
            </div>
            <?
            } else if ($tabs == "test") {
            ?>
            <div class="testwrap">
                
            </div>
                <?
            } 
            ?>
        </article>

        <footer>
            <p id="footer_trex">
                Tel.010-9003-6094 Email. thtjwls@naver.com
                <br />
                Copyright(C) 2016. All rights reserved by Ji Hoon
            </p>
        </footer>
    </div>
</body>
</html>