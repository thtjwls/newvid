<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <script>

    </script>
</head>
<body>
    <?php
    $myfile = fopen("testfile.html","w");
    $txt = "123";
    fwrite($myfile,$txt);
    $txt = "456";
    fwrite($myfile,$txt);
    fclose($myfile);
        ?>
</body>
</html>