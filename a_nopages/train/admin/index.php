<!-- ADMIN INDEX -->
<?
include_once("../lib/dbconnect.php");    
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title>ADMIN INDEX</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="css/index.css"/>
</head>
<body>
    <div class="wrap">
        <table cellpadding="0" cellspacing="0">
            <caption>
                REQUEST LIST
            </caption>
            <tr>
                <th>BUSE</th>
                <th>NAME</th>
                <th>RE</th>
                <th>SDATE</th>
                <th>EDATE</th>
            </tr>
            <?
            $sql = "select * from train";
            $result = mysql_query($sql,$connect);
            while($row = mysql_fetch_assoc($result)) {
                $buse = $row[buse];
                $name = $row[name];
                $train = $row[train];
                $sDate = $row[sDate];
                $eDate = $row[eDate];

                $str = "<tr>";
                $str .="<td>".$buse."</td>";
                $str .="<td>".$name."</td>";
                $str .="<td>".$train."</td>";
                $str .="<td>".$sDate."</td>";
                $str .="<td>".$eDate."</td>";
                $str .="</tr>";

                print $str;
            }
            ?>
        </table>
    </div>
</body>
</html>