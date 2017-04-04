<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?
define("HOST","localhost");
define("PASSWORD","ekdP0919!");
define("USER","thtjwls");
define("DB","thtjwls");

$mysqli = new mysqli(HOST,USER,PASSWORD,DB);

if ( $mysqli->connect_errno ) {
    die('Connect error : ' . $mysqli->connect_error);
}

$sql = "SELECT * FROM `my_chart_data`";
$sql2 = "SHOW TABLES LIKE `thtjwls`";
$result = $mysqli->query($sql2);
while ( $row = $result->fetch_object()) {
    print_r($row);
}
?>
</body>
</html>