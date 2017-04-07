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
        body, h1, h2, h3, h4, h5, h6, p, table, span, th, td {
            padding: 0;
            margin: 0;
            text-align: center;
            font-size:14px;
        }

        .wrap h1 {
            font-size:24px;
        }

        input {
            border: 0;
            width: 80%;
            height: 80%;
        }

        .wrap {
            width: 628px;
            height: 737px;
            background-image: url(../img/incheonilbo_logo.png);
            background-repeat: no-repeat;
            background-position: center;
            background-position-x: center;
            background-position-y: 250px;
        }

        .top_table {
            position: relative;
            width: 329px;
            height: 80px;
            border-top: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
            float: right;
            margin-top: 20px;
            font-size: 10pt;
        }

            .top_table th {
                border-bottom: 1px solid black;
                border-right: 1px solid black;
                vertical-align: middle;
            }

                .top_table th:first-child {
                    border-bottom: 0;
                }

            .top_table td {
                border-right: 1px solid black;
            }

        #header_th {
            border-right: 1px solid black;
            width: 20px;
        }

        .table_2 {
            width: 628px;
            height: 657px;
            border: 1px solid black;
            border-bottom: 0;
            border-right: 0;
        }

        #coat {
            width: 68px;
            position: absolute;
            left: 0;
            top: 115px;
            font-size: 13pt;
        }

        .table_2 td {
            border-right: 1px solid black;
            border-bottom: 1px solid black;
        }

        img {
            position: absolute;
            top: 1px;
            left: 0;
            opacity: 0.2;
        }

        #yy {
            position: absolute;
            left: 700px;
            opacity: 1;
        }

        #docu_A_12_01, #docu_A_12_02 {
            width: 80px;
        }

        #ui-datepicker-div {
            font-size: 12px;
        }

        .docu_12_btn {
            float: right;
            margin-top: 20px;
        }

            .docu_12_btn input[type=button], .docu_12_btn input[type=reset] {
                width: 80px;
                height: 37px;
            }
    </style>
    <script>
        function pagePrintPreview() {
            document.getElementById("print_btn").style.display = "none"; //프린터 버튼 숨김

            var browser = navigator.userAgent.toLowerCase();
            if (-1 != browser.indexOf('chrome')) {
                window.print();
            } else if (-1 != browser.indexOf('trident')) {
                try {
                    var webBrowser = '<OBJECT ID="previewWeb" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';

                    document.body.insertAdjacentHTML('beforeEnd', webBrowser);

                    //ExexWB 메쏘드 실행 (7 : 미리보기 , 8 : 페이지 설정 , 6 : 인쇄하기(대화상자))
                    previewWeb.ExecWB(7, 1);

                    //객체 해제
                    previewWeb.outerHTML = "";
                } catch (e) {
                    alert("- 도구 > 인터넷 옵션 > 보안 탭 > 신뢰할 수 있는 사이트 선택\n   1. 사이트 버튼 클릭 > 사이트 추가\n   2. 사용자 지정 수준 클릭 > 스크립팅하기 안전하지 않은 것으로 표시된 ActiveX 컨트롤 (사용)으로 체크\n\n※ 위 설정은 프린트 기능을 사용하기 위함임");
                }

            }

            document.getElementById("print_btn").style.display = "block"; //프린터 버튼 나타남
        }        
    </script>
</head>
<?


$buse_code      =$_POST["buse"];
$level          =$_POST["level"];
$name           =$_POST["name"];
$docu_buse_code =$_POST["docu_buse_code"];
$docu_A_12_01   =$_POST["docu_A_12_01"];
$docu_A_12_02   =$_POST["docu_A_12_02"];
$docu_A_12_03   =$_POST["docu_A_12_03"];
$docu_A_12_04   =$_POST["docu_A_12_04"];
$docu_A_12_05   =$_POST["docu_A_12_05"];
$docu_A_12_06   =$_POST["docu_A_12_06"];
$docu_A_12_07   =$_POST["docu_A_12_07"];
$docu_A_12_08   =$_POST["docu_A_12_08"];
$docu_A_12_09   =$_POST["docu_A_12_09"];
$docu_A_12_10   =$_POST["docu_A_12_10"];
$docu_A_12_11   =$_POST["docu_A_12_11"];
$docu_A_12_12   =$_POST["docu_A_12_12"];
$docu_A_12_13   =$_POST["docu_A_12_13"];
$docu_A_12_14   =$_POST["docu_A_12_14"];
$docu_A_12_15   =$_POST["docu_A_12_15"];
$docu_A_12_16   =$_POST["docu_A_12_16"];
$docu_A_12_17   =$_POST["docu_A_12_17"];
$docu_A_12_18   =$_POST["docu_A_12_18"];
$docu_A_12_19   =$_POST["docu_A_12_19"];
$docu_A_12_20   =$_POST["docu_A_12_20"];
$docu_A_12_21   =$_POST["docu_A_12_21"];
$docu_A_12_22   =$_POST["docu_A_12_22"];
$docu_A_12_23   =$_POST["docu_A_12_23"];
$docu_A_12_24   =$_POST["docu_A_12_24"];
$docu_A_12_25   =$_POST["docu_A_12_25"];
$docu_A_12_26   =$_POST["docu_A_12_26"];
$docu_A_12_27   =$_POST["docu_A_12_27"];
$docu_A_12_28   =$_POST["docu_A_12_28"];
$docu_A_12_29   =$_POST["docu_A_12_29"];
$docu_A_12_30   =$_POST["docu_A_12_30"];
$docu_A_12_31   =$_POST["docu_A_12_31"];
$docu_A_12_32   =$_POST["docu_A_12_32"];
?>
<body>
    <div class="wrap">
        <form action="docu_12_insert.php" name="docu12_insertform" method="post">
            <h1>출 장 신 청 서</h1>
            <table cellpadding="0" cellspacing="0" class="top_table">
                <tr>
                    <th rowspan="2" id="header_th">
                        <p>
                            담
                        </p>
                        <p>
                            당
                        </p>
                        <p>
                            부
                        </p>
                        <p>
                            서
                        </p>
                    </th>
                    <th height="22px;" width="95px;">
                        <p>
                            담당
                        </p>
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
                        <?=$buse_code?>
                    </td>
                    <td width="85px;">직위</td>
                    <td width="65px;">
                        <?=$level?>
                    </td>
                    <td width="73px;">성명</td>
                    <td>
                        <?=$name?>
                    </td>
                </tr>
                <tr>
                    <td height="41px;">출장기간</td>
                    <td colspan="3">
                        <?=$docu_A_12_01?> 부터 <?=$docu_A_12_02?>  까지
                    </td>
                    <td>출장지</td>
                    <td>
                        <?=$docu_A_12_03?>
                    </td>
                </tr>
                <tr>
                    <td height="42px;">출장목적</td>
                    <td colspan="5">
                        <?=$docu_A_12_04?>
                    </td>
                </tr>
                <tr>
                    <td height="51px;">교통수단</td>
                    <td>
                        <?=$docu_A_12_05?>
                    </td>
                    <td>동행인</td>
                    <td>
                        <?=$docu_A_12_06?>
                    </td>
                    <td>동행사유</td>
                    <td>
                        <?=$docu_A_12_07?>
                    </td>
                </tr>
                <tr>
                    <td height="49px;">교통비</td>
                    <td colspan="2">
                        <?=$docu_A_12_08?>
                    </td>
                    <td colspan="3">
                        <p style="letter-spacing:10px;">참 고 사 항</p>
                    </td>
                </tr>
                <tr>
                    <td height="40px;">숙박비</td>
                    <td colspan="2">
                        <?=$docu_A_12_09?>
                    </td>
                    <td colspan="3" rowspan="9">
                        <?=$docu_A_12_10?>
                    </td>
                </tr>
                <tr>
                    <td height="46px;">
                        <?=$docu_A_12_11?>
                    </td>
                    <td>
                        <?=$docu_A_12_12?>
                    </td>
                    <td>
                        <?=$docu_A_12_13?>
                    </td>
                </tr>
                <tr>
                    <td height="41px;">
                        <?=$docu_A_12_14?>
                    </td>
                    <td>
                        <?=$docu_A_12_15?>
                    </td>
                    <td>
                        <?=$docu_A_12_16?>
                    </td>
                </tr>
                <tr>
                    <td height="41px;">
                        <?=$docu_A_12_17?>
                    </td>
                    <td>
                        <?=$docu_A_12_18?>
                    </td>
                    <td>
                        <?=$docu_A_12_19?>
                    </td>
                </tr>
                <tr>
                    <td height="41px;">
                        <?=$docu_A_12_20?>
                    </td>
                    <td>
                        <?=$docu_A_12_21?>
                    </td>
                    <td>
                        <?=$docu_A_12_22?>
                    </td>
                </tr>
                <tr>
                    <td height="41px;">
                        <?=$docu_A_12_23?>
                    </td>
                    <td>
                        <?=$docu_A_12_24?>
                    </td>
                    <td>
                        <?=$docu_A_12_25?>
                    </td>
                </tr>
                <tr>
                    <td height="41px;">
                        <?=$docu_A_12_26?>
                    </td>
                    <td>
                        <?=$docu_A_12_27?>
                    </td>
                    <td>
                        <?=$docu_A_12_28?>
                    </td>
                </tr>
                <tr>
                    <td height="41px;">
                        <?=$docu_A_12_29?>
                    </td>
                    <td>
                        <?=$docu_A_12_30?>
                    </td>
                    <td>
                        <?=$docu_A_12_31?>
                    </td>
                </tr>
                <tr>
                    <td style="letter-spacing:6px;">총 액</td>
                    <td colspan="2">
                        <?=$docu_A_12_32?>
                    </td>
                </tr>
            </table>
            <div class="docu_12_btn" id="print_btn">
                <input type="button" value="미리보기" onclick="pre();" />
                <input type="reset" value="다시작성" onclick="history.go(-1);" />
                <input type="button" value="제출" onclick="paper_sumit();" />
                <input type="button" value="인쇄" onclick="pagePrintPreview();" />
            </div>
        </form>
    </div>
</body>
</html>