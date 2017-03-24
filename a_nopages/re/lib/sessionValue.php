<?
    $sql = "select * from j_user where idx = '$useridx'";
    $result = mysql_query($sql,$connect);
    $row = mysql_fetch_assoc($result);
    $userId = $row[id];
    $userName = $row[name];
    $userCompany = $row[company];
    $userBuse = $row[buse];
    $userTel = $row[tel];
    $userPostNum = $row[postNum];
    $userAddr = $row[address];
    $userInAddr = $row[in_address];
    $userLevel = $row[level];
?>