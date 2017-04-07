<?
$page = isset($_GET['page']) ? $_GET['page'] : 1;
?>
<div class="notice_setup contentsBox_div list_setup_div" id="load_type_1">
    <h3>
        NOTICE
        <span class="search_box">
            <a href="?setPage=page02">more</a>
        </span>
    </h3>
    <div id="ajax_load_key_1">
        <div class="ajax_load_box">
            <ul class="notice_list_ul list_ul" id="notice_load_ul">
                <li>
                    <span>No.</span>
                    <span>CATE</span>
                    <span>SUBJECT</span>
                    <span>WRITER</span>
                    <span>DATE</span>
                </li>
                <?
            $nboard = new Board("sn_notice");
            $nboard->object_key = 1;            
            $nboard->page = $page;
            //$nboard->scale = 15;
            $nboard->search = "";
            array_push($nboard->field,"idx","cate","title","writer","regist_day");
            $nboard->query("");
            $nboard->limit();
            print $nboard->dataList();
                ?>
            </ul>
            <ul class="paging_ul" id="">
                <?
                print $nboard->paging();
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="recent_setup contentsBox_div list_setup_div" id="load_type_2">
    <h3>
        RECENT BOARD
        <span class="search_box">
            <a href="">more</a>
        </span>
    </h3>
    <div id="ajax_load_key_2">
        <div class="ajax_load_box">
            <ul class="recent_list_ul list_ul">
                <li>
                    <span>No.</span>
                    <span>CATE</span>
                    <span>TITLE</span>
                    <span>WRITER</span>
                    <span>VIEW</span>
                    <span>REGIST</span>
                </li>
                <?
        $rBoard = new Board("sn_tbl_01");
        $rBoard->object_key = 2;
        $rBoard->page = $page;
        //$rBoard->scale = 15;
        $rBoard->search = "";
        array_push($rBoard->field,"idx","cate","title","writer","regist_day","view");
        $rBoard->query("");
        $rBoard->limit();
        print $rBoard->dataList();
                ?>
            </ul>
            <ul class="paging_ul">
                <?=$rBoard->paging();?>
            </ul>
        </div>
    </div>
</div>