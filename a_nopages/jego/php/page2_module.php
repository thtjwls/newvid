<meta charset="utf-8" />
<?
//추후를 위해 남겨둠
include "../lib/session.php";
include "../lib/dbconnect.php";

$idx = $_REQUEST["idx"];
$mod = $_REQUEST["mod"];

if($mod == "del") {
    $page2_list_del_Query = "delete from je_jego where idx = '$idx'";
    $page2_list_del_Result = mysql_query($page2_list_del_Query,$connect);

    if(!$page2_list_del_Result) {
?>
<script>
    alert("데이터 전송에 문제가있습니다.\n관리자에게 문의하세요.");
    history.go(-1);
</script>
        <?
    } else {
        ?>
<script>
    alert("삭제되었습니다.");
    history.go(-1);
</script>
        <?
    }
} else if ($mod == "modify"){
    $page2_list_modi_Query = "select * from je_jego where idx = '$idx'";
    $page2_list_modi_Result = mysql_query($page2_list_modi_Query,$connect);

    $modi = mysql_fetch_array($page2_list_modi_Result);

    $modi_idx = $modi[idx];
    $modi_com = $modi[je_com];
    $modi_name = $modi[je_name];
    $modi_serial = $modi[je_serial];
    $modi_ibgo = $modi[je_ibgo];
    $modi_sou = $modi[je_sou];
    $modi_acmember = $modi[je_acmember];
    $modi_regidate = $modi[je_regidate];
    $modi_number = $modi[je_number];
    $modi_cost = $modi[je_cost];
    $modi_sta = $modi[je_sta];
        ?>
<table cellpadding="0" cellspacing="0" id="page2_modi_table_export">
    <colgroup>
        <col width="20%;" />
        <col width="80%;" />
    </colgroup>
    <tr>
        <th>거래처</th>
        <td>
            <input type="text" value="<?=$modi_com?>" name="modi_com"/>
        </td>
    </tr>
    <tr>
        <th>품명</th>
        <td>
            <input type="text" value="<?=$modi_name?>" name="modi_name"/>
        </td>
    </tr>
    <tr>
        <th>구분버호</th>
        <td>
            <input type="text" value="<?=$modi_serial?>" name="modi_serial"/>
        </td>
    </tr>
    <tr>
        <th>입고일</th>
        <td>
            <input type="text" value="<?=$modi_ibgo?>" name="modi_ibgo" onclick="modiDateFunc();" id="modiFuncDate"/>
        </td>
    </tr>
    <tr>
        <th>소유자</th>
        <td>
            <input type="text" value="<?=$modi_sou?>" name="modi_sou"/>
        </td>
    </tr>
    <tr>
        <th>수량</th>
        <td>
            <input type="number" value="<?=$modi_number?>" name="modi_number"/>
        </td>
    </tr>
    <tr>
        <th>금액</th>
        <td>
            <input type="text" value="<?=$modi_cost?>" name="modi_cost"/>
        </td>
    </tr>
    <tr>
        <th>상태</th>
        <td>
            <input type="number" value="<?=$modi_sta?>" min="1" max="3" name="modi_sta"/>
            <input type="hidden" value="<?=$modi_idx?>" id="modiIdx" name="modi_idx"/>
        </td>
    </tr>    
</table>
<?
} else if($mod == "modiInsert") {
    $idx = $_POST["modi_idx"];
    $modi_com = $_POST["modi_com"];
    $modi_name = $_POST["modi_name"];
    $modi_serial = $_POST["modi_serial"];
    $modi_ibgo = $_POST["modi_ibgo"];
    $modi_sou = $_POST["modi_sou"];
    $modi_number = $_POST["modi_number"];
    $modi_cost = $_POST["modi_cost"];
    $modi_sta = $_POST["modi_sta"];
    $modi_date = date("Y-m-d H:i:s");

    $modifyQuery = "update je_jego set
        je_com='$modi_com',
        je_name='$modi_name',
        je_serial='$modi_serial',
        je_ibgo = '$modi_ibgo',
        je_sou = '$modi_sou',
        je_number = '$modi_number',
        je_cost = '$modi_cost',
        je_sta = '$modi_sta',
        je_acmember = '$username',
        je_regidate = '$modi_date'
        where idx='$idx'
    ";

    $modifyResult = mysql_query($modifyQuery,$connect);
}

?>