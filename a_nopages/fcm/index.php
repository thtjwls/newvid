<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
	<meta charset="utf-8" />
</head>
<body>

    <div class="messageWrapper">
        <h2>Push Message</h2>

        <form action="push_notification.php" method="post">
            <textarea name="message" rows="4" cols="50" placeholder="메세지를 입력하세요" required></textarea>
            <br />
            <input type="submit" name="submit" value="Send" id="submitButton" />
        </form>

    </div>


    <?
	include("config.php");

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "Select Token From FCM_Users";

	$result = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_array($result)) {
    ?>
    <ul>
        <li>
            <? echo substr($row["Token"], 0, 30); ?> ...
        </li>
    </ul>

    <?php
	}
    ?>


</body>
</html>
