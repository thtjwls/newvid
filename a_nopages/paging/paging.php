<head>
    <meta charset="utf-8" />
    <style>
        .sa_table_wrap {
            font-family: "나눔고딕",NanumGothic;
            width: 1100px;
        }

        .sa_table_wrap a {
            text-decoration: none;
            color: #6d8fab;
        }

        .sa_table {         
            width:100%;   
            border-top: 2px solid #dddddd;
            border-left: 1px solid #dddddd;
            border-right: 1px solid #dddddd;
            text-align:center;
        }

        .sa_title_box > th {
            border-bottom: 2px solid #dddddd;
            font-size: 14px;
            font-weight:bold;
            background-color: #fafafa;            
            color: #4d4a45;
            padding-top:10px;
            padding-bottom:10px;
        }

        .sa_contents_box > td {
            border-bottom: 1px solid #dddddd;
            font-size: 14px;
            color: #4b4d4c;
            font-weight: bolder;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .sa_paging_box {
            text-align:center;
            margin-top:40px;
        }

        .sa_paging_box a {
            text-align:center;
        }

        .sa_paging_box ul li {
            list-style-type:none;
            display:inline-block;
            border:1px solid #4b4d4c;
            width:30px;
            height:30px;
            line-height:30px;
        }

        .sa_paging_box span {
            border: 1px solid #4b4d4c;
            padding:6px;
            line-height:30px;
        }
    </style>
</head>
<?
function pa_bbs($table, $increment, $page_view_URL) {
//테이블에 대한 정의는 이부분에서 해주세요!!!
//$table = "users"; //테이블의 이름을 정의
//$increment = "no"; //테이블을 정렬 할 ID값 정의
//$page_view_URL = ""; //URL이동이 없으면 빈칸으로 놔두세요.


//아래 $col_name과 숫자를 맞춰주세요
$col_title_1 = "번호"; //인덱스 항목 이름
$col_title_2 = "이름";
$col_title_3 = "닉네임";
$col_title_4 = "이메일";
$col_title_5 = "주소";

//가져올 항목의 필드네임
$col_name_1 = no; //분류값을 넣으세요.
$col_name_2 = name;
$col_name_3 = nick;
$col_name_4 = email;
$col_name_5 = address;



$connect=mysql_connect("localhost","thtjwls","ekdP0919!") or die ("<script>alert('connect 값 오류 계정 확인')</script>");
mysql_select_db("thtjwls",$connect);
mysql_query("set names utf8");
?>

<div class="sa_table_wrap">
    <table cellpadding="0" cellspacing="0" class="sa_table">
        <colgroup>
            <col width="8%" />
            <col width="47%" />
            <col width="25%" />
            <col width="10%" />
            <col width="10%" />
        </colgroup>
        <tr class="sa_title_box">
            <th>
                <?=$col_title_1?>
            </th>
            <th style="text-align:left;">
                <?=$col_title_2?>
            </th>
            <th>
                <?=$col_title_3?>
            </th>
            <th>
                <?=$col_title_4?>
            </th>
            <th>
                <?=$col_title_5?>
            </th>
        </tr>


        <?


    $cnt_query = "select count($increment) from $table";
    $cnt_result = mysql_query($cnt_query,$connect);
    $cnt = mysql_result($cnt_result,0,0); //전체 레코드

//페이징 start
    $page = $_GET["page"]; //현재페이지의 파라미터



    if(!$page){$page = 1;}
    $scale = 10; //1페이지의 출력 될 리스트 카운트
    $page_num = 10; //한 블럭 당 출력될 페이지 카운트
    $page_total_num = ceil($cnt/$scale); //전체 필요한 페이지 카운트
    //현재 page 가 6이면 start 페이지는 -4 인 2가 되야함.

    $start = $page - 4;
    if($start < 1 ){
        $start = 1;
    }
    //현재 page 가 6이면 끝 페이지는 +5 인 11이 나와야 함.
    $end_page = $page + 5;
    if($end_page >= $page_total_num) {$end_page = $page_total_num;}
    //$end_page가 전체 필요한 페이지보다 클때 $end_page와 전체 필요한 페이지는 같음


    if($page <6 ) {
        $start_page = 1;
        $end_page = 10;
    }

    if($page > $page_total_num-6 && $page_total_num-6 >1 ) {
        $start = $page_total_num-9;
        $end_page = $page_total_num;
    }

    if($page_total_num == 1) {
        $end_page = 1;
    }

    $page_view = ($page-1)*10; //화면의 출력 될 쿼리문의 시작점 (ex, $page_view 부터 $scale 까지)

    $view_record_query = "select * from $table order by $increment desc limit $page_view, $scale";
    $view_record_result = mysql_query($view_record_query,$connect);
    $view_record = mysql_num_rows($view_record_result);

    if($view_record < $scale) {
        $scale = $view_record;
    }
        ?>

        <?
    //페이징 end
    $list_query = "select * from $table order by $increment desc limit $page_view, $scale";
    $list_result = mysql_query($list_query,$connect);

    $board_num=$cnt-10*($page-1); //페이지 인덱스 번호
    for($i=1; $i<=$scale; $i++) {
        $list = mysql_fetch_array($list_result);
        $col1 = $list[$col_name_1];
        $col2 = $list[$col_name_2];
        $col3 = $list[$col_name_3];
        $col4 = $list[$col_name_4];
        $col5 = $list[$col_name_5];
        $col6 = $list[$col_name_6];
        ?>
        <tr class="sa_contents_box">
            <td>
                <?=$board_num?>
            </td>
            <td style="text-align:left;">
                <a href="<?=$page_view_URL?>?<?=$col_name_1?>=<?=$col1?>">
                    <?=$col2?>
                </a>
            </td>
            <td>
                <?=$col3?>
            </td>
            <td>
                <?=$col4?>
            </td>
            <td>
                <?=$col5?>
            </td>
        </tr>
        <?
        $board_num--;
    }
        ?>
    </table>
    <div class="sa_paging_box">
        <ul>
            <?
            if($page > 1 ){
            ?>
            <span>이전</span>
                <?
            }
            ?>
            <?
            for($i=$start; $i<=$end_page; $i++) {
            ?>
            <li>
                <?
                if($page==$i) {
                ?>
                <b><?=$i?></b>
                <?
                }else {
                ?>
                <a href="?page=<?=$i?>">
                    <?=$i?>
                </a>
                <?
                }
                ?>
            </li>
            <?
            }

            if($page < $end_page) {
            ?>
            <span>다음</span>
            <?
            }
}
            ?>

            <?
            pa_bbs("users","no","");
            ?>
        </ul>
    </div>
</div>