<!DOCTYPE html>
<html>
<head>
    <title></title>
	<meta charset="utf-8" />
</head>
<body>
    <?
    //var_dump($_SERVER);

    foreach($_SERVER as $key=>$value) {
        print ($key." : ".$value."<br>");
    }
    ?>
</body>
</html>
