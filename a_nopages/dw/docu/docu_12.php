<? include "../DB/dbconnect.php";?><!--DB 커텍터-->
<? include "../docu/Module/php/docu_module.php"; ?><!-- 프로그래밍을 위한 변수-->
<!DOCTYPE html>
<html lang="ko">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
    <style>
    body, h1, h2, h3, h4, h5, h6, p, table, span, th, td{
        padding:0;
        margin:0;
        text-align:center;
    }

    input {
        border:0;
        width:80%;
        height:80%;
    }

    .wrap {
        width:628px;
        height:737px;
    }

    .top_table {
        position:relative;
        width:329px;
        height:80px;
        border-top:1px solid black;
        border-left:1px solid black;
        border-right:1px solid black;
        float:right;        
        margin-top:20px;
        font-size:10pt;
    }

    .top_table th {
        border-bottom:1px solid black;
        border-right:1px solid black;
        vertical-align:middle;
    }

    .top_table th:first-child {
        border-bottom:0;
    }

    .top_table td {
        border-right:1px solid black;
    }

    #header_th {
        border-right:1px solid black;
        width:20px;
    }
    .table_2 {
        width:628px;
        height:657px;
        border:1px solid black;
        border-bottom:0;
        border-right:0;
    }

    #coat {
        width:68px;
        position:absolute;
        left:0;
        top:115px;
        font-size:13pt;
    }

    .table_2 td{
        border-right:1px solid black;
        border-bottom:1px solid black;
    }

    img {
        position:absolute;
        top:1px;
        left:0;
        opacity:0.2;
    }
    
    #yy {
        position:absolute;
        left:700px;
        opacity:1;
    }

    #docu_A_12_01,#docu_A_12_02 {
        width:80px;
    }

    #ui-datepicker-div {
        font-size: 12px;
    }

    .docu_12_btn {
        float:right;
        margin-top:20px;
    }

        .docu_12_btn input[type=button], .docu_12_btn input[type=reset] {
            width: 80px;
            height: 37px;
        }

    </style>
    <script>   
        $(document).ready(function () {
            $("#docu_A_12_01").datepicker({
                dateFormat: 'yy.mm.dd',
                prevText: '이전 달',
                nextText: '다음 달',
                monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
                monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
                dayNames: ['일','월','화','수','목','금','토'],
                dayNamesShort: ['일','월','화','수','목','금','토'],
                dayNamesMin: ['일','월','화','수','목','금','토'],
                showMonthAfterYear: true,
                yearSuffix: '년',            
                numberOfMonths: 1,
                onSelect: function (selected) {
                    $("#docu_A_12_02").datepicker("option", "minDate", selected)
                }
            });

            $("#docu_A_12_02").datepicker({
                dateFormat: 'yy.mm.dd',
                prevText: '이전 달',
                nextText: '다음 달',
                monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                dayNames: ['일', '월', '화', '수', '목', '금', '토'],
                dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
                dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
                showMonthAfterYear: true,
                yearSuffix: '년',
                numberOfMonths: 1,
                onSelect: function (selected) {
                    $("#docu_A_12_01").datepicker("option", "maxDate", selected)
                }
            });
        });

        function docu_sum() {
            var docu_12 = document.docu12_insertform;
            var sum1 = docu_12.docu_A_12_12.value; if (sum1 == "") { sum1 = 0; };
            var sum2 = docu_12.docu_A_12_15.value; if (sum2 == "") { sum2 = 0; };
            var sum3 = docu_12.docu_A_12_18.value; if (sum3 == "") { sum3 = 0; };
            var sum4 = docu_12.docu_A_12_21.value; if (sum4 == "") { sum4 = 0; };
            var sum5 = docu_12.docu_A_12_24.value; if (sum5 == "") { sum5 = 0; };
            var sum6 = docu_12.docu_A_12_27.value; if (sum6 == "") { sum6 = 0; };
            var sum7 = docu_12.docu_A_12_30.value; if (sum7 == "") { sum7 = 0; };
            var sum8 = docu_12.docu_A_12_09.value; if (sum8 == "") { sum8 = 0; };
            var sum9 = docu_12.docu_A_12_08.value; if (sum9 == "") { sum9 = 0; };
            var total = parseInt(sum1) + parseInt(sum2) + parseInt(sum3) + parseInt(sum4) + parseInt(sum5) + parseInt(sum6) + parseInt(sum7) + parseInt(sum8) + parseInt(sum9);
          
            docu_12.docu_A_12_32.value = total;
        }

        function pre() {
            document.docu12_insertform.action = 'docu_12_view.php';
            document.docu12_insertform.submit();
        }

         function paper_submit() {
                var input = confirm("제출 하시겠습니까?");

                if (input == true) {
                    document.docu12_insertform.action = "docu_12_insert.php";
                    document.docu12_insertform.submit();
                } else {
                    return false;
                }
            }
            
        
    </script>
</head>
<body>
    <div class="wrap">
        <form action="docu_12_insert.php" name="docu12_insertform" method="post">
            <h1>출 장 신 청 서</h1>
            <table cellpadding="0" cellspacing="0" class="top_table">
                <tr>
                    <th rowspan="2" id="header_th">
                        <p>담</p>
                        <p>당</p>
                        <p>부</p>
                        <p>서</p>
                    </th>
                    <th height="22px;" width="95px;">
                        <p>담당</p>
                    </th>
                    <th width="97px;">
                        부서장
                    </th>
                    <th style="border-right:0;">
                        국장
                    </th>
                </tr>
                <tr>
                    <td height="55px;"></td>
                    <td></td>
                    <td style="border-right:0;"></td>
                </tr>
            </table>
            <div id="coat">
                <p>(단위:원)</p>
            </div>

            <table class="table_2" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="85px" height="69px">소속</td>
                    <td width="111px;">
                        <input type="text" name="buse" value="<?=$buse_code?>" /> 
                    </td>
                    <td width="85px;">직위</td>
                    <td width="65px;">
                        <input type="text" name="level" value="<?=$level_code?>" /> 
                    </td>
                    <td width="73px;">성명</td>
                    <td>
                        <input type="text" name="name" value="<?=$name?>" /> 
                    </td>
                </tr>
                <tr>
                    <td height="41px;">출장기간</td>
                    <td colspan="3">
                        <input type="text" name="docu_A_12_01" id="docu_A_12_01" value="" />부터
                        <input type="text" name="docu_A_12_02" id="docu_A_12_02" value="" />까지
                    </td>
                    <td>출장지</td>
                    <td>
                        <input type="text" name="docu_A_12_03" />
                    </td>
                </tr>
                <tr>
                    <td height="42px;">출장목적</td>
                    <td colspan="5">
                        <input type="text" value="" name="docu_A_12_04" />
                    </td>
                </tr>
                <tr>
                    <td height="51px;">교통수단</td>
                    <td>
                        <input type="text" name="docu_A_12_05" value="" />
                    </td>
                    <td>동행인</td>
                    <td>
                        <input type="text" name="docu_A_12_06" value="" />
                    </td>
                    <td>동행사유</td>
                    <td>
                        <input type="text" name="docu_A_12_07" value="" />
                    </td>
                </tr>
                <tr>
                    <td height="49px;">교통비</td>
                    <td colspan="2">
                        <input type="text" name="docu_A_12_08" value="" />
                    </td>
                    <td colspan="3">
                        <p style="letter-spacing:10px;">참 고 사 항</p>
                    </td>
                </tr>
                <tr>
                    <td height="40px;">숙박비</td>
                    <td colspan="2">
                        <input type="text" value="" name="docu_A_12_09" />
                    </td>
                    <td colspan="3" rowspan="9">
                        <textarea name="docu_A_12_10" cols="35" rows="24"></textarea>
                    </td>
                </tr>
                <tr>
                    <td height="46px;">
                        <input type="text" value="" name="docu_A_12_11" placeholder="항목" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_12" placeholder="금액" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_13" placeholder="비고" />
                    </td>
                </tr>
                <tr>
                    <td height="41px;">
                        <input type="text" value="" name="docu_A_12_14" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_15" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_16" />
                    </td>
                </tr>
                <tr>
                    <td height="41px;">
                        <input type="text" value="" name="docu_A_12_17" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_18" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_19" />
                    </td>
                </tr>
                <tr>
                    <td height="41px;">
                        <input type="text" value="" name="docu_A_12_20" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_21" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_22" />
                    </td>
                </tr>
                <tr>
                    <td height="41px;">
                        <input type="text" value="" name="docu_A_12_23" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_24" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_25" />
                    </td>
                </tr>
                <tr>
                    <td height="41px;">
                        <input type="text" value="" name="docu_A_12_26" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_27" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_28" />
                    </td>
                </tr>
                <tr>
                    <td height="41px;">
                        <input type="text" value="" name="docu_A_12_29" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_30" />
                    </td>
                    <td>
                        <input type="text" value="" name="docu_A_12_31" />
                    </td>
                </tr>
                <tr>
                    <td style="letter-spacing:6px;">총 액</td>
                    <td colspan="2">
                        <input type="text" value="" name="docu_A_12_32" onclick="docu_sum();" />
                    </td>
                </tr>
            </table>
            <div class="docu_12_btn">
                <input type="button" value="미리보기" onclick="pre();"/>
                <input type="reset" value="다시작성" />
                <input type="button" value="제출" onclick="paper_submit();"/>
            </div>
        </form>
    </div>
</body>
</html>