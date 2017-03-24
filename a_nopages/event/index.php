<?
include "lib/dbconnect.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Excel Download lib-->
    <script src="js/jquery.techbytarun.excelexportjs.js"></script>
    <script src="js/index.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/index.css" />
</head>
<body>
    <div class="wrap">
        <button onclick="dateView();">
            Click
        </button>
        <h1>
            추첨
        </h1>
        <form action="" method="post" id="lotsForm" autocomplete="off">
            <table cellpadding="20" cellspacing="0">
                <caption class="ta_caption">
                    회원추가
                </caption>
                <colgroup>
                    <col width="100px;">
                    <col width="700px;">
                </colgroup>
                <tr>
                    <th>이름</th>
                    <td>
                        <input type="text" value="" name="name" autofocus />
                        <span class="helperSpan" id="nameHelper">이름을 입력 해주세요.</span>
                    </td>
                </tr>
                <tr>
                    <th>
                        연락처
                    </th>
                    <td>
                        <select name="tel1">
                            <option value="010">010</option>
                            <option value="011">011</option>
                            <option value="019">019</option>
                            <option value="032">032</option>
                            <option value="031">031</option>
                            <option value="02">02</option>
                        </select> -
                        <input type="tel" value="" name="tel2" maxlength="4" /> -
                        <input type="tel" value="" name="tel3" maxlength="4" />
                        <span class="helperSpan" id="telHelper">전화번호를 입력하세요.</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="submitBtn_td">
                        <input type="button" value="제출" class="submitBtn" id="submitBtnId" />
                    </td>
                </tr>
            </table>
        </form>
        <div class="appendUser" id="appendUser">
            <div class="lotsActBtn">
                추첨 인원 :<input type="number" value="" name="lotsUserCnt" id="lotsUserCnt" />
                <button onclick="lotsActive();">추첨</button>
                <button onclick="dataReset();">데이터리셋</button>
            </div>
            <?
            $userCntQ = "select count(idx) from lots";
            $userCntR = mysql_query($userCntQ,$connect);
            $userCnt = mysql_result($userCntR,0,0);
            ?>
            <table cellpadding="0" cellspacing="0">
                <caption class="ta_caption">
                    참여자 총<?=$userCnt?>명
                </caption>
                <colgroup>
                    <col width="100px;" />
                    <col width="600px;" />
                    <col width="100px;">
                </colgroup>
                <tr>
                    <th>
                        이름
                    </th>
                    <th colspan="2">
                        연락처
                    </th>
                </tr>
                <?
                $lotsViewQuery = "select * from lots order by idx desc";
                $lotsVeiwResult = mysql_query($lotsViewQuery,$connect);
                while($row = mysql_fetch_array($lotsVeiwResult)) {
                    $rowIdx = $row[idx];
                    $rowName = $row[name];
                    $rowTel = $row[tel];
                ?>
                <tr>
                    <td>
                        <?=$rowName?>
                    </td>
                    <td>
                        <?=$rowTel?>
                    </td>
                    <td>
                        <button onclick="userDel(<?=$rowIdx?>);">삭제</button>
                    </td>
                </tr>
                <?
                }
                ?>
            </table>
        </div>
    </div>
    <div class="lotsA">
        <div class="ExcelDownload">
            <a href="#" id="ExportExcelBtn" download="">
                엑셀다운로드
            </a>
            <a href="#" id="ExportExit">
                접기
            </a>
        </div>
        <table cellpadding="0" cellspacing="0" id="lotsATable">
            <caption>
                당첨을 축하합니다!!
            </caption>
            <tr id="appendToData">

            </tr>
        </table>
    </div>        
</body>
</html>