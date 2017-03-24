<?
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$nboard_list = new Board("sn_notice");
$nboard_list->search = isset($_GET["search"]) ? $_GET["search"] : "";
$nboard_list->page = $page;
//$nboard_list->scale = 15;
array_push($nboard_list->field,"idx","cate","title","writer","view","regist_day");
$nboard_list->query("");
$nboard_list->limit();
?>
<div class="contentsBox_div list_setup_div one_page_div_setup notice_setup" id="load_type_1">
    <h3>
        NOTICE VIEW        
        <span class="search_box">
            <input type="search" name="search" value="" id="notice_search" autofocus/>            
            <a href="javascript:bbsSearch();">검색</a>
            <a href="javascript:bbsSearch(0);">전체</a>
        </span>
    </h3>        
    <div id="ajax_load_key_1">
        <div class="ajax_load_box">
            <span class="count_box_span">
                <?=$nboard_list->page?> of <?=$nboard_list->tpageNum?> page
            </span>
            <ul class="notice_list_ul list_ul notice_list_ul">
                <li>
                    <span>No.</span>
                    <span>CATE</span>
                    <span>SUBJECT</span>
                    <span>WRITER</span>
                    <span>VIEW</span>
                    <span>DATE</span>
                </li>
                <?                    

                    if($nboard_list->dataCnt == 0) {
                        print("<li class='dataCnt_zero_li'><span>데이터가 없습니다.</span></li>");
                    }
                    print $nboard_list->dataList();
                ?>
            </ul>
            <ul class="paging_ul">
                <?
                print $nboard_list->paging();
                ?>
            </ul>
        </div>
    </div>        
</div>
<div class="form_action_move">
    <a href="?setPage=modWrite&modWrite=set_write">글쓰기</a>
</div>