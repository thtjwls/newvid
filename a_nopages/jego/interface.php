<?
if($useridx =="" || !$useridx) {
?>
<script>
    location.href = "index.php";
</script>
    <?
}
?>
<div class="ltn_menu">
    <section class="page1_section">
        <ul id="selectable">
            <li id="page_nav2">
                <button>재고현황</button>
            </li>
            <li id="page_nav3">
                <button>기안현황</button>
            </li>
            <li id="page_nav4">
                <button>재고입력</button>
            </li>
            <li id="page_nav5">
                <button>현황보고서</button>
            </li>
            <li id="page_nav6">
                <button>작업명령</button>
            </li>
            <li id="page_nav7">
                <button>작업내역</button>
            </li>
        </ul>
    </section>
</div>
<div class="top_menu">
    <div class="inner_top_menu">
        <h1>
            MungTungGuri
        </h1>
        <div class="log_option">
            <a href="lib/logout.php">로그아웃</a>
            <a href="">정보관리</a>
        </div>
    </div>
</div>