<? include "../lib/header.php"; ?>
<?
$view=$_GET["view"];
for($i=1; $i<=9; $i++){
    if($view == $i) {
?>
<script>
    $(document).ready(function () {
        $('#member<?=$i?>').attr('id', 'select_group');
    })
</script>
<?
    };
};
?>
<div class="page07_wrap">
    <? if($view != "") { //좌측 메뉴 ?>
    <div class="buse_list">
        <ul>
            <a href="?view=1">
                <li id="member1">
                    임원실
                </li>
            </a>
            <a href="?view=2">
                <li id="member2">
                    논설위원
                </li>
            </a>
            <a href="?view=3">
                <li id="member3">
                    경영기획실
                </li>
            </a>
            <a href="?view=4">
                <li id="member4">
                    편집국
                </li>
            </a>
            <a href="?view=5">
                <li id="member5">
                    광고국
                </li>
            </a>
            <a href="?view=6">
                <li id="member6">
                    신사업국
                </li>
            </a>
            <a href="?view=7">
                <li id="member7">
                    이너스
                </li>
            </a>
            <a href="?view=8">
                <li id="member8">
                    경기본사
                </li>
            </a>
            <a href="?view=9">
                <li id="member9">
                    노동조합
                </li>
            </a>
        </ul>
    </div>
    <? } ?>
    <div class="jojic" id="jojic">
        <?
            if(!$view) {
        ?>
        <img src="../img/updown.png" alt="조직도" usemap="#incheonilbo_regit" />
        <map name="incheonilbo_regit" id="ImageMapsCom-incheonilbo_regit">
            <area alt="노동조합" title="" href="?view=9" shape="rect" coords="184,86,305,207" style="outline:none;" target="_self" />
            <area alt="논설위원실" title="" href="?view=2" shape="rect" coords="181,985,303,1106" style="outline:none;" target="_self" />
            <area alt="대표이사" title="" href="?view=1" shape="rect" coords="1,489,153,641" style="outline:none;" target="_self" />
            <area alt="경영기획실" title="" href="?view=3" shape="rect" coords="382,86,485,186" style="outline:none;" target="_self" />
            <area alt="편집국" title="" href="?view=4" shape="rect" coords="383,296,486,396" style="outline:none;" target="_self" />
            <area alt="경기본사" title="" href="?view=8" shape="rect" coords="383,558,486,658" style="outline:none;" target="_self" />
            <area alt="광고영업총괄본부" title="" href="?view=5" shape="rect" coords="382,755,485,855" style="outline:none;" target="_self" />
            <area alt="이너스" title="" href="?view=7" shape="rect" coords="382,1004,484,1107" style="outline:none;" target="_self" />
            <area alt="총무회계팀" title="" href="?view=3" shape="rect" coords="505,121,614,150" style="outline:none;" target="_self" />
            <area alt="판매팀" title="" href="?view=3" shape="rect" coords="631,122,740,151" style="outline:none;" target="_self" />
            <area alt="비서팀" title="" href="?view=3" shape="rect" coords="757,122,866,151" style="outline:none;" target="_self" />
            <area alt="제작시설관리팀" title="" href="?view=3" shape="rect" coords="888,121,996,149" style="outline:none;" target="_self" />
            <area alt="편집기획부" title="" href="?view=4" shape="rect" coords="503,245,611,273" style="outline:none;" target="_self" />
            <area alt="온라인뉴스부" title="" href="?view=4" shape="rect" coords="504,302,612,330" style="outline:none;" target="_self" />
            <area alt="전산부" title="" href="?view=4" shape="rect" coords="632,302,740,330" style="outline:none;" target="_self" />
            <area alt="문화체육부" title="" href="?view=4" shape="rect" coords="761,302,869,330" style="outline:none;" target="_self" />
            <area alt="사진부" title="" href="?view=4" shape="rect" coords="887,301,996,331" style="outline:none;" target="_self" />
            <area alt="정치부" title="" href="?view=4" shape="rect" coords="504,359,613,389" style="outline:none;" target="_self" />
            <area alt="경제부" title="" href="?view=4" shape="rect" coords="632,359,741,389" style="outline:none;" target="_self" />
            <area alt="사회부" title="" href="?view=4" shape="rect" coords="506,415,615,445" style="outline:none;" target="_self" />
            <area alt="정경부" title="" href="?view=8" shape="rect" coords="504,508,613,538" style="outline:none;" target="_self" />
            <area alt="경기사회부" title="" href="?view=8" shape="rect" coords="631,508,740,538" style="outline:none;" target="_self" />
            <area alt="경기제2사회부" title="" href="?view=8" shape="rect" coords="507,564,616,594" style="outline:none;" target="_self" />
            <area alt="경기사진부" title="" href="?view=8" shape="rect" coords="632,565,741,595" style="outline:none;" target="_self" />
            <area alt="경기관리부" title="" href="?view=8" shape="rect" coords="761,565,870,595" style="outline:none;" target="_self" />
            <area alt="중부권" title="" href="?view=8" shape="rect" coords="505,622,614,652" style="outline:none;" target="_self" />
            <area alt="북부권" title="" href="?view=8" shape="rect" coords="633,622,742,652" style="outline:none;" target="_self" />
            <area alt="서부권" title="" href="?view=8" shape="rect" coords="760,621,869,651" style="outline:none;" target="_self" />
            <area alt="동부권" title="" href="?view=8" shape="rect" coords="505,679,614,709" style="outline:none;" target="_self" />
            <area alt="남부권" title="" href="?view=8" shape="rect" coords="631,679,740,709" style="outline:none;" target="_self" />
            <area alt="광고출판영업팀" title="" href="?view=5" shape="rect" coords="505,792,614,822" style="outline:none;" target="_self" />
            <area alt="광고관리팀" title="" href="?view=5" shape="rect" coords="632,791,741,821" style="outline:none;" target="_self" />
            <area alt="광고디자인" title="" href="?view=5" shape="rect" coords="759,793,868,823" style="outline:none;" target="_self" />
            <area alt="신사업국" title="" href="?view=6" shape="rect" coords="506,930,615,960" style="outline:none;" target="_self" />
            <area alt="사업국" title="" href="?view=6" shape="rect" coords="633,930,742,960" style="outline:none;" target="_self" />
            <area alt="관리팀" title="" href="?view=7" shape="rect" coords="503,1041,612,1071" style="outline:none;" target="_self" />
            <area alt="디자인팀" title="" href="?view=7" shape="rect" coords="628,1042,737,1072" style="outline:none;" target="_self" />
        </map>
        <!-- 조직도 멤버리스트는
            <div class="member_list">
            <div class="top_member">
                <div class="member">

                </div>
            </div>
            <div class="second_member">
                <div class="member">

                </div>
            </div>
                <div class="etc_member">

                </div>
            </div>
        </div>
            -->
        <? } else if ($view == "1"){ //임원 ?>        
        <div class="member_list">            
            <h1>임원실</h1>
            <div class="top_member">
                <div class="member">
                    <img src="../img/testimage.png" alt="" />
                    <p>
                        <b>황보은</b>
                        <br /><br />
                        대표이사<br />
                        ceo@incheonilbo.com
                    </p>
                </div>
            </div>
            <div class="second_member">
                <div class="member">
                    <img src="../img/testimage.png" alt="" />
                    <p>
                        <b>이인수</b>
                        <br /><br />
                        상임이사<br />
                        yis6223@incheonilbo.com
                    </p>
                </div>
            </div>
        </div>
    </div>
    <? } else if ($view == "2") { //논설위원실 ?>
    <div class="member_list">
        <h1>논설위원</h1>
        <div class="top_member">
            <div class="member">
                <img src="../img/testimage.png" alt="" />
                <p>
                    <b>김형수</b>
                    <br /><br />                   
                    논설위원실장<br />                    
                    khs@incheonilbo.com
                </p>
            </div>
        </div>
    </div>
</div>

<? } else if ($view == "3") { //경영기획 ?>
<div class="member_list">
    <h1>경영기획실</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김형태</b>
                <br /><br />
                경영기획실장<br />                
                cts@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="second_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>추미영</b>
                <br /><br />
                총무회계팀 팀장<br />                
                my1976@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김아름</b>
                <br /><br />
                총무회계팀 과장<br />                
                arkim@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>방영빈</b>
                <br /><br />
                총무회계팀 사원<br />                
                youngbinkk@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="etc_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이상진</b>
                <br /><br />
                판매팀 팀장<br />                
                say0141@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이아영</b>
                <br /><br />
                비서팀 팀장<br />
                zoa85@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>안순조</b>
                <br /><br />
                비서팀 과장<br />
                안순조<br />
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이진주</b>
                <br /><br />
                비서팀 사원<br />
                ljj@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } else if ($view == "4") { //편집국 ?>
<div class="member_list" id="member_list">
    <h1>편집국</h1>
    
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이 두</b>
                <br /><br />
                편집국장<br />
                two2two2@incheonilbo.com                
            </p>            
        </div>
    </div>
    <div class="second_member">
        <ul id="buse_link">
            <li>
                <input type="image" src="../img/p1.png" value="편집기획부" onclick="location.href = ('?view=4-1'); return false;" />
            </li>
            <li>
                <input type="image" src="../img/p2.png" value="편집기획부" onclick="location.href = ('?view=4-2'); return false;" />
            </li>
            <li>
                <input type="image" src="../img/p3.png" value="편집기획부" onclick="location.href = ('?view=4-3'); return false;" />
            </li>
            <li>
                <input type="image" src="../img/p4.png" value="편집기획부" onclick="location.href = ('?view=4-4'); return false;" />
            </li>
            <li>
                <input type="image" src="../img/p5.png" value="편집기획부" onclick="location.href = ('?view=4-5'); return false;" />
            </li>
            <li>
                <input type="image" src="../img/p6.png" value="편집기획부" onclick="location.href = ('?view=4-6'); return false;" />
            </li>
            <li>
                <input type="image" src="../img/p7.png" value="편집기획부" onclick="location.href = ('?view=4-7'); return false;" />
            </li>
        </ul> 
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>윤신옥</b>
                <br /><br />
                편집기획부 국장<br />                
                rudolpu@incheonilbo.com                
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>남창섭</b>
                <br /><br />
                온라인뉴스 부장<br />                
                csnam@incheonilbo.com
                
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김진국</b>
                <br /><br />
                문화체육부 국장<br />                
                freebird@incheonilbo.com                
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>양진수</b>
                <br /><br />
                사진부 차장<br />                
                photosmith@incheonilbo.com                
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>윤관옥</b>
                <br /><br />
                정치부 부장<br />                
                okyun@incheonilbo.com                
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김칭우</b>
                <br /><br />
                경제부 부장<br />                
                chingw@incheonilbo.com                
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이은경</b>
                <br /><br />
                사회부 부장<br />                
                lotto@incheonilbo.com                
            </p>
        </div>
    </div>
</div>
<? } else if ($view == "5") { //광고국 ?>
<div class="member_list">
    <h1>광고국</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>홍원표</b>
                <br /><br />
                광고·영업총괄 본부장<br />                
                vy2192@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="second_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>임효준</b>
                <br /><br />
                광고출판영업팀 팀장<br />                
                limhj@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>서동열</b>
                <br /><br />
                광고출판영업팀 국장<br />                
                sdy0109@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>반준렬</b>
                <br /><br />
                광고출판영업팀 부국장<br />                
                banjy@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="etc_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>진애리</b>
                <br /><br />
                광고관리팀 팀장<br />                
                arafuralily8@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>장문정</b>
                <br /><br />
                광고관리팀 사원<br />                
                answjddl358@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김혜림</b>
                <br /><br />
                광고디자인팀 사원<br />                
                khr3743@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } else if ($view == "6") { //신사업국 ?>
<div class="member_list">
    <h1>신사업국</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>정병석</b>
                <br /><br />
                사업본부 본부장<br />                
                chungbs@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="second_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김도현</b>
                <br /><br />
                사업본부 팀장<br />                
                yeasman@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이현정</b>
                <br /><br />
                사업본부 과장<br />                
                lhj@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>채은아</b>
                <br /><br />
                사업본부 대리<br />                
                ckcs0508@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } else if ($view == "7") { //이너스 ?>
<div class="member_list">
    <h1>이너스</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이인수</b>
                <br /><br />
                이너스 대표이사<br />                
                yis6223@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="second_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이상규</b>
                <br /><br />
                관리팀 팀장<br />                
                thank@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>심지선</b>
                <br /><br />
                디자인팀 과장<br />                
                sjs27@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>문서현</b>
                <br /><br />
                디자인팀 과장<br />                
                angelmsh77@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } else if ($view == "8") { //경기본사 ?>
<div class="member_list">
    <h1>경기본사</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>정흥모</b>
                <br /><br />
                편집국장<br />
                baikal404@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="second_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이동화</b>
                <br /><br />
                정경부 부국장<br />
                itimes21@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>홍성수</b>
                <br /><br />
                사회부 부장 <br />
                sshong@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이동희</b>
                <br /><br />
                제2사회부 부장<br />                                
                dhl@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이상우</b>
                <br /><br />
                문화체육부 차장
                <br />
                @incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김철빈</b>
                <br /><br />
                사진부 부장                
                <br />
                jesuslee@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } else if ($view == "9") { //노동조합 ?>
<div class="member_list">
    <h1>노동조합</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이종만</b>
                <br /><br />
                노동조합 위원장<br />
                malema@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } else if($view == "4-1") { //편집기획부 more ?>
<div class="member_list">
    <h1>편집기획부</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>윤신옥</b>
                <br /><br />
                편집기획부 국장
                <br />                
                rudolpu@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="second_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>곽승신</b>
                <br /><br />
                편집기획부 부장
                <br />                
                kisse@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김정원</b>
                <br /><br />
                편집기획부 차장
                <br />                
                megabbl@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>최영화</b>
                <br /><br />
                편집기획부 차장
                <br />                
                margartia77@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="etc_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>최창법</b>
                <br /><br />
                편집기획부 기자
                <br />                
                changbeop@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>장주석</b>
                <br /><br />
                편집기획부 기자
                <br />                
                borntoend@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>조상수</b>
                <br /><br />
                편집기획부 기자
                <br />                
                josangsu@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김미나</b>
                <br /><br />
                편집기획부 기자
                <br />                
                alskv@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김신희</b>
                <br /><br />
                편집기획부 기자
                <br />                
                ksh6142@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>전민지</b>
                <br /><br />
                그래픽 기자
                <br />                
                mzy1019@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } else if($view == "4-2") { //온라인뉴스 more ?>
<div class="member_list">
    <h1>온라인뉴스부</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>남창섭</b>
                <br /><br />
                온라인뉴스부 부장
                <br />
                csnam@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="second_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이종범</b>
                <br /><br />
                전산팀 차장
                <br />                
                jblee@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>정유진</b>
                <br /><br />
                온라인뉴스부 사원<br />
                coffee17g@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김혜민</b>
                <br /><br />
                온라인뉴스부 기자
                <br />                
                khm@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="etc_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이지훈</b>
                <br /><br />
                전산부 사원
                <br />                
                ljh@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } else if($view == "4-3") { //문화체육부 more ?>
<div class="member_list">
    <h1>문화체육부</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김진국</b>
                <br /><br />
                문화체육부 국장
                <br />                
                freebird@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="second_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이종만</b>
                <br /><br />
                문화체육부 부장
                <br />                
                malema@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="etc_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김신영</b>
                <br /><br />
                문화체육부 기자
                <br />                
                happy1812@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } else if($view == "4-4") { //사진부 more ?>
<div class="member_list">
    <h1>사진부</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>양진수</b>
                <br /><br />
                사진부 차장
                <br />                
                photosmith@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="second_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이상훈</b>
                <br /><br />
                사진부 기자
                <br />                
                photohecho@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } else if($view == "4-5") { //정치부 more ?>
<div class="member_list">
    <h1>정치부</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>윤관옥</b>
                <br /><br />
                정치부 부장
                <br />                
                okyun@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="second_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>정찬흥</b>
                <br /><br />
                제2정치부 부장
                <br />                
                report61@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이주영</b>
                <br /><br />
                정치부 차장
                <br />                
                leejy96@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="etc_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>박진영</b>
                <br /><br />
                정치부 기자
                <br />                
                erhist@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>신상학</b>
                <br /><br />
                정치부 기자(국회)
                <br />                
                jshin0205@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이순민</b>
                <br /><br />
                정치부 기자
                <br />                
                smlee@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } else if($view == "4-6") { //경제부 more ?>
<div class="member_list">
    <h1>경제부</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김칭우</b>
                <br /><br />
                경제부 부장                                
                <br />
                chingw@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="second_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김기성</b>
                <br /><br />
                경제부 부국장(공항)                                
                <br />
                audisung@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="etc_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>신나영</b>
                <br /><br />
                경제부 기자                                
                <br />
                creamyn@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>황은우</b>
                <br /><br />
                경제부 기자                                
                <br />
                hew@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } else if($view == "4-7") { //사회부 more ?>
<div class="member_list">
    <h1>사회부</h1>
    <div class="top_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>이은경</b>
                <br /><br />
                사회부 부장                                
                <br />
                lotto@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="second_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>황신섭</b>
                <br /><br />
                사회부 차장                                
                <br />
                hss@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>장지혜</b>
                <br /><br />
                사회부 차장                                
                <br />
                jjh@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>문희국</b>
                <br /><br />
                서구/부국장                
                <br />
                moonhi@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>왕수봉</b>
                <br /><br />
                강화/부국장
                <br />                
                8888king@incheonilbo.com
            </p>
        </div>
    </div>
    <div class="etc_member">
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>정회진</b>
                <br /><br />
                사회부 기자                                
                <br />
                hijung@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>김원진</b>
                <br /><br />
                사회부 기자
                <br />                
                kwj7991@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>곽안나</b>
                <br /><br />
                사회부 기자                                
                <br />
                lucete237@incheonilbo.com
            </p>
        </div>
        <div class="member">
            <img src="../img/testimage.png" alt="" />
            <p>
                <b>송유진</b>
                <br /><br />
                사회부 기자                                
                <br />
                uzin@incheonilbo.com
            </p>
        </div>
    </div>
</div>
<? } ?>
<input type="hidden" id="page_num" value="page07" />
</div>
<? include "../lib/footer.html"; ?>