<? include "lib/header.php";?>
            <ul>
                <li>
                    <a href="?page=page1&mod=view_table">
                        <p id="<?=$hover_css?>">문서관리</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <p>사원관리</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <p>거래처관리</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <p>매입매출</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <p>품목관리</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <p>견적관리</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <p>수주관리</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <p>생산관리</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <p>일정관리</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <p>재고관리</p>
                    </a>
                </li>
            </ul>
            <div class="login_name">
            <?=$username?> 님 안녕하세요.(<?=$userlevel?>) <a href="user/logout.php" id="logout_link">로그아웃</a>
        </div>
        </div>        
        <div class="contents">
            <? if($page=="page1" && $mod=="view_table"){  include "lib/page1.php";} 
            else if($page=="page1" && $mod=="pa_write") { include "lib/pa_write.php";}
            else if($page=="page1" && $mod=="paper_view") { include "lib/paper_view.php";}?>                    
        </div>
<? include "lib/footer.php";?>