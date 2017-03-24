<? include "../DB/dbconnect.php";?><!--DB 커텍터-->
<? include "../docu/Module/php/docu_module.php"; ?><!-- 프로그래밍을 위한 변수-->
<?

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <style>
        @import url(http://fonts.googleapis.com/earlyaccess/nanumgothic.css);

        body, h1, h2, h3, h4, h5, h6, p, table, span, th, td {
            padding: 0;
            margin: 0;
            font-family: 'Nanum Gothic', sans-serif;
        }

        #img1 {
            position: absolute;
            top: 0;
            left: 800px;
            opacity: 1;
            z-index: 2;
        }

        .wrap {
            margin-left: 30px;
            width: 600px;
            background-image: url(../img/incheonilbo_logo.png);
            background-repeat: no-repeat;
            background-position: center;
            background-position-x: center;
            background-position-y: 250px;
        }

        .table01 {
            text-align: center;
            border-left: 1px solid black;
            border-bottom: 1px solid black;
            margin-top: 50px;
        }

            .table01 input {
                width: 80%;
                height: 90%;
                border: 0;
                font-size: 14px;
            }

            .table01 p {
                width: auto;
                margin: auto;
            }

            .table01 td {
                border-top: 1px solid black;
                border-right: 1px solid black;
                width: inherit;
            }

            .table01 caption {
                font-size: 28px;
                padding-bottom: 20px;
            }

        .print_btn, #print_btn {
            float: right;
        }


            .print_btn input[type=button], .print_btn input[type=reset] {
                width: 80px;
                height: 37px;
                margin-top: 15px;
            }

        .ui-datepicker-title {
            font-size: 12px;
        }

        .ui-datepicker-calendar td, .ui-datepicker-calendar th {
            font-size: 12px;
        }

        .input_text {
            font-size:12px;
            float:left;
            padding-left:10px;
        }
    </style>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
    <script>

        function pre() {
            document.docu08_insertform.action = 'docu_08_view.php';
            document.docu08_insertform.submit();
        }

        function paper_pre_submit() {
            var input = confirm("제출 하시겠습니까?");

            if (input == true) {
                opener.document.getElementById("docu_btn").innerHTML += "<input type='hidden' name='mode' value='save'>"
                opener.document.docu08_insertform.action = "Module/php/docu_insert_module.php";
                opener.document.docu08_insertform.submit();
            } else {
                return false;
            }
        }

        function docu_08back() {
            history.go(-1);
        }

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
<body>

    <div class="wrap">
        <form action="docu_08_insert.php" name="docu08_insertform" method="post">
            <table cellpadding="0" cellspacing="0" class="table01">
                <caption>
                    기 안 용 지
                </caption>
                <colgroup>
                    <col width="30px" />
                    <col width="67px" />
                    <col width="93px" />
                    <col width="52px" />
                    <col width="33px" />
                    <col width="34px" />
                    <col width="88px" />
                    <col width="23px" />
                    <col width="33px" />
                    <col width="146px" />
                </colgroup>
                <tr>
                    <td height="45px;" colspan="2">
                        분류기호
                    </td>
                    <td width="93px;">
                        <p class="input_text"><?=$docu_01?></p>
                    </td>
                    <td colspan="4" style="border-top:0;">
                        (전화번호 4520-<?=$writer_tel?>)
                    </td>
                    <td colspan="3" style="vertical-align:top;">
                        <span style="float:left; padding-left:5px;">결제규정</span>
                        <span style="float:right; letter-spacing:13px;">조 항</span>
                        <br />
                        <p style="float:right; padding-right:13px;">전결사항</p>
                    </td>
                </tr>
                <tr>
                    <td height="27px;" colspan="2">
                        기안일자
                    </td>
                    <td>
                        <p class="input_text"><?=$write_day?></p>
                    </td>
                    <td colspan="7">
                        <p style="letter-spacing:60px; width:300px; text-align:center; padding-left:50px;">결재자</p>
                    </td>
                </tr>
                <tr>
                    <td height="25px;" colspan="2">
                        시행일자
                    </td>
                    <td>
                        <p class="input_text"><?=$docu_02?></p>
                    </td>
                    <td colspan="7" rowspan="2">
                        <p class="input_text">

                        </p>
                    </td>
                </tr>
                <tr>
                    <td height="26px;" colspan="2">
                        보존년한
                    </td>
                    <td>
                        <p class="input_text"><?=$docu_04?></p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="5">
                        <p>
                            보
                        </p>
                        <p>
                            조
                        </p>
                        <p>
                            기
                        </p>
                        <p>
                            관
                        </p>
                    </td>
                    <td height="38px;">이 사</td>
                    <td colspan="3">
                        <p class="input_text"></p>
                    </td>
                    <td rowspan="6">
                        <p>
                            협
                        </p>
                        <br />
                        <br />
                        <br />
                        <br />
                        <p>
                            조
                        </p>
                    </td>
                    <td colspan="4" rowspan="6">
                        <p class="input_text"></p>
                    </td>
                </tr>
                <tr>
                    <td height="39px;">실 장</td>
                    <td colspan="3">
                        <p class="input_text"></p>
                    </td>
                </tr>
                <tr>
                    <td height="38px;">국 장</td>
                    <td colspan="3">
                        <p class="input_text"></p>
                    </td>
                </tr>
                <tr>
                    <td height="38px;">팀 장</td>
                    <td colspan="3">
                        <p class="input_text"></p>
                    </td>
                </tr>
                <tr>
                    <td height="38px;">과 장</td>
                    <td colspan="3">
                        <p class="input_text"></p>
                    </td>
                </tr>
                <tr>
                    <td height="29px;" colspan="2">
                        기안책임자
                    </td>
                    <td colspan="3">
                        <p class="input_text"><?=$writer_name?></p>
                    </td>
                </tr>
                <tr>
                    <td height="65px;" colspan="2">
                        경 유
                        <br />
                        수 신
                        <br />
                        참 조
                        <br />
                    </td>
                    <td colspan="2">품 의</td>
                    <td>
                        <p>
                            발
                        </p>
                        <br />
                        <p>
                            신
                        </p>
                    </td>
                    <td colspan="3">
                        <p class="input_text"><?=$docu_05?></p>
                    </td>
                    <td>
                        <p>
                            통
                        </p>
                        <br />
                        <p>
                            제
                        </p>
                    </td>
                    <td>
                        <p class="input_text"><?=$docu_06?></p>
                    </td>
                </tr>
                <tr>
                    <td height="33px;" colspan="2">제목</td>
                    <td colspan="8">
                        <p class="input_text"><?=$docu_07?></p>
                    </td>
                </tr>
                <tr>
                    <td height="39px;" colspan="10">
                        <p class="input_text"><?=$docu_08?></p>
                    </td>
                </tr>
                <tr>
                    <td height="38px;" colspan="10">
                        <p class="input_text"><?=$docu_09?></p>
                    </td>
                </tr>
                <tr>
                    <td height="38px;" colspan="10">
                        <p class="input_text"><?=$docu_10?></p>
                    </td>
                </tr>
                <tr>
                    <td height="38px;" colspan="10">
                        <p class="input_text"><?=$docu_11?></p>
                    </td>
                </tr>
                <tr>
                    <td height="39px;" colspan="10">
                        <p class="input_text"><?=$docu_12?></p>
                    </td>
                </tr>
                <tr>
                    <td height="39px;" colspan="10">
                        <p class="input_text"><?=$docu_13?></p>
                    </td>
                </tr>
                <tr>
                    <td height="38px;" colspan="10">
                        <p class="input_text"><?=$docu_14?></p>
                    </td>
                </tr>
                <tr>
                    <td height="38px;" colspan="10">
                        <p class="input_text"><?=$docu_15?></p>
                    </td>
                </tr>
                <tr>
                    <td height="39px;" colspan="10">
                        <p class="input_text"><?=$docu_16?></p>
                    </td>
                </tr>
            </table>
            <div class="print_btn" id="print_btn">
                <input type="button" value="인쇄" onclick="pagePrintPreview();" />
                <input type="button" value="다시작성" onclick="docu_08back();" />
                <input type="button" value="제출" onclick="paper_pre_submit();" />
            </div>
        </form>
    </div>
</body>
</html>

