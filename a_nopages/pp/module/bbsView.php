<?
    include "lib/session.php";
    include "lib/dbconnect.php";

    function bbsView() {
        global $connect;
        $idx = $_GET["idx"];

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
        
        
    }
?>

<? bbsView(); ?>