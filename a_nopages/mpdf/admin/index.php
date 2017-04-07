<? session_start() ?>
<? $useridx = $_SESSION['useridx'];?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title>MPDF Admin Page</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <script src="../js/jquery-1.12.4.js"></script>
    <link href="css/adCssLoginContainer.css" rel="stylesheet" />
</head>
<body>
    <div id="wrap">
        <div class="contents">
            <form action="controller/class.AdminLoginControl.php" method="post">
                <h1>LOGIN</h1>
                <input type="text" name="id" value="" placeholder="ID" required/>
                <input type="password" name="pass" value="" placeholder="PASSWORD" required/>
                <input type="submit"  value="LOGIN" />
            </form>
		</div>		
	</div>
</body>
</html>