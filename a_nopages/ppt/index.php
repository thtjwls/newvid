<? include "dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title>PPT</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <link rel="stylesheet" href="css/index.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/timepicker.js" type="text/javascript"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery-ui.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css"/>
</head>
<body>
    <div class="wrap">
        <!-- input -->
        <div class="contents">
            <form action="" method="post" id="sendForm">
                <table cellpadding="10" cellspacing="0">
                    <caption>다예 알바계산</caption>
                    <colgroup>
                        <col width="33%">
                        <col width="33%">
                        <col width="33%">
                    </colgroup>
                    <tr>
                        <th>
                            날짜
                        </th>
                        <th>
                            출근시간
                        </th>
                        <th>
                            퇴근시간
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" value="" name="regi_date" id="regi_date">
                        </td>
                        <td>
                            <input type="text" value="" name="start_time" id="start_time"/>
                        </td>
                        <td>
                            <input type="text" value="" name="end_time" id="end_time"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <input type="button" value="입력" onclick="dateSend();" id="inputfunc"/>
                            <input type="button" value="초기화" id="deletefunc"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div> <!-- input End -->
        <!-- View -->
        <?
        $q = "select * from ppt order by regist_day desc";
        $r = mysql_query($q,$connect);

        $cntQ = "select count(idx) from ppt";
        $cntR = mysql_query($cntQ,$connect);
        $cnt = mysql_result($cntR,0,0);
        ?>
        <div class="show">
            <table cellpadding="20" cellspacing="0">
                <caption>
                    기록 (총 <?=$cnt?> 일 출근)
                </caption>
                <col width="33%;" />
                <col width="33%;" />
                <col width="33%;" />
                <tr>
                    <th>
                        날짜
                    </th>
                    <th>
                        출근시간
                    </th>
                    <th>
                        퇴근시간
                    </th>
                </tr>
                <?
                while($row=mysql_fetch_assoc($r)) {
                    $regiDate = $row[regist_day];
                    $stime = $row[start_time];
                    $etime = $row[end_time];
                    $ltime = $row[t_lose];
                    $idxno = $row[idx];

                    $ttimes = 0;

                    $ttime = $ttime + $ltime;
                    if($ttime == ""){
                        $ttime = 0;
                    }
                ?>
                <tr>
                    <td height="50px;">
                        <?=$regiDate?>                        
                    </td>
                    <td>
                        <?=$stime?>
                    </td>
                    <td>
                        <?=$etime?>
                        <span>
                            <?=$ltime?>시간
                        </span>
                        <input type="button" value="삭제" onclick="ListDel(<?=$idxno?>);" id="ListDelBtn"/>
                    </td>
                </tr>                
                <?                
                } //while end
                ?>
            </table>
            <div class="totalCost">
                <input type="number" value="10000" placeholder="시급을 입력해주세요." id="Hours"/>
                * 총 : <input type="text" value="<?=$ttime?>" id="totalTime"/>
                 시간
                <input type="button" value="계산" onclick="TotalCoat();" id="TotalCoat"/>
                =>                
            </div>
            <div class="reset">
                <input type="button" value="다시계산" onclick="window.location.reload();"/>
            </div>
        </div>
        <!-- View end -->
    </div>
</body>
</html>