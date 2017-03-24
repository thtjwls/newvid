<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script type="text/javascript">
		
	</script>
</head>
<body>
    <?
    $sql = "insert into IN_DASHBOARD ";

    $sql .= "(Buse, Name, Desktop, Notebook, Moniter, Keyboard, Mouse, Comment, CreateDate)";
    $sql .= " values ('".$_POST['Buse']."','".$_POST['Name']."','".$_POST['Desktop']."','".$_POST['Notebook']."','".$_POST['Moniter']."',".$_POST['Keyboard'].",".$_POST['Mouse'].",'".$_POST['Comment']."','')";

    echo $sql;
    ?>
</body>
</html>