<? include "../DB/dbconnect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
</head>
<body>
    <?
    $content = $_POST["content"];
    $sql="insert into test_tbl (content) value ('$content')";
    $result=mysql_query($sql,$connect);
    if(!$result){
    ?>
    <script>
        alert("쿼리의 result 값이 1을 반환하지 않습니다.\n DB의 table name 과 field size 를 확인 해주세요.");
    </script>
    <?
    } else {
    ?>    
    <script>
        alert("저장되었습니다.");
    </script>
    <? } ?>

    <?
    $paper01="select content from test_tbl where idx='2'";
    $paper01_result=mysql_query($paper01,$connect);
    $row=mysql_fetch_array($paper01_result);
    $content01=$row[content];
    ?>
    <?=$content01?>
</body>
</html>