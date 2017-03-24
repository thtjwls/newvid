<!DOCTYPE html>
<html lang="ko">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
</head>
<body>
    <?
    $connect = mysql_connect("localhost","thtjwls","ekdP0919!") or die ("no connect");
    mysql_select_db("thtjwls");

    $sql = "select * from mpdf_view order by date desc";
    $result = mysql_query($sql,$connect);

    $cntSql = "select count(*) from mpdf_view";
    $cntResult = mysql_query($cntSql,$connect);
    $cnt = mysql_result($cntResult,0,0);
    ?>
    <table cellpadding="10" cellspacing="0" border="1">
        <caption>
            Total : [<?=$cnt?>]
        </caption>
        <tr>
            <th>IP</th>
            <th>DEVICE</th>
            <th>DATE</th>
        </tr>        
        <?
        $str = '';
        while($row = mysql_fetch_assoc($result)) {
            $str .= '<tr>';
            $str .= '<td>'.$row['ip'].'</td>';
            $str .= '<td>'.$row['device'].'</td>';
            $str .= '<td>'.$row['date'].'</td>';
            $str .= '</tr>';
        }

        print $str;
        ?>
    </table>
</body>
</html>