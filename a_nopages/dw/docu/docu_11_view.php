<? include "../DB/dbconnect.php";?> <!--DB 커텍터-->
<? include "../docu/Module/php/docu_module.php"; ?> <!-- 프로그래밍을 위한 변수-->
<!DOCTYPE html>
<html lang="ko">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <style>
        body, h1, h2, h3, h4, h5, h6, p, table, span, th, td{
         padding:0;
         margin:0;
         text-align:center;
         }

         .wrap {
             width:740px;
             height:480px;
             position:relative;
             margin-top:5px;
             background-image:url(../img/incheonilbo_logo.png);
             background-repeat:no-repeat;
             background-position:center;
             background-position-x:center;
             background-position-y:80px;
         }

         table {
             border:1px solid black;
         }

         .table_01{
             width:634px;
             height:95px;
             position:absolute;
             top:53px;
             left:1px;
             border-bottom:1px solid black;

         }

         .table_01 select{
             width:90%;
         }

         .table_01 td {
             border-left : 1px solid black;
         }

         .table_01 td:first-child {

         }

         .table_02 {
             width:105px;
             height:426px;
             border:1px solid black;
             border-bottom:2px solid black;
             border-right:2px solid black;
             position:absolute;
             right:0;
             top:53px;
         }

         .table_02 td {
             border-bottom:1px solid black;
             border-right:1px solid black;
             border-left:1px solid black;
         }

         .table_02 td:last-child {
             border-left:0;
         }

         .table_03 {
             width:634px;
             height:33px;
             border:1px solid black;
         }

         .table_03 td {
             border-right:1px solid black;
         }

         .table_03 thead td {
             border-bottom : 1px solid black;
         }

         .table_03 td:last-child {
             border-right:0;
         }

         #name {
             float:none;
             margin-right:2px;
         }

         #sign {
             float: right;
             margin-right: 2px;
         }

         .table_04 {
             width:634px;
             height:298px;
         }

         .table_04 td{
             border-bottom:1px solid black;
             border-right:1px solid black;
         }

         .table_04 td:last-child {
             border-right:0;
         }

             .table_04 input {
                 width:80%;
                 height:80%;
                 border:0;
             }


              .contents {
                 padding: 0;
                 margin: 0;
             }

         .contents_div {
             position:absolute;
             top:147px;
             left:1px;
         }

         .buy {
             border:0;
             font-size:26px;
         }

         .input_button {
             position:absolute;
             bottom:-50px;
             right:0;
         }

             .input_button input[type=button], .input_button input[type=reset] {
                 border: 0;
                 height: 30px;
             }

             .input_button #submit {

             }

             .text_button {
                 border:0;
                 background-color:#FFF;
                 width:80%;
             }

        .print_btn {
            float:right;
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

        function docu_modify() {
            history.go(-1);
        }
    </script>
</head>
<?
$regi_date      =$_POST["regi_date"];
$name           =$_POST["name"];
        $docu_buse_code =$_POST["docu_buse_code"];
        $docu_A_11_01   =$_POST["docu_A_11_01"]; //품명
        $docu_A_11_02   =$_POST["docu_A_11_02"]; //수량
        $docu_A_11_03   =$_POST["docu_A_11_03"]; //용도
        $docu_A_11_04   =$_POST["docu_A_11_04"]; //단가
        $docu_A_11_05   =$_POST["docu_A_11_05"]; //금액
        $docu_A_11_06   =$_POST["docu_A_11_06"]; //비고
        $docu_A_11_07   =$_POST["docu_A_11_07"]; //Line_2
        $docu_A_11_08   =$_POST["docu_A_11_08"];
        $docu_A_11_09   =$_POST["docu_A_11_09"];
        $docu_A_11_10   =$_POST["docu_A_11_10"];
        $docu_A_11_11   =$_POST["docu_A_11_11"];
        $docu_A_11_12   =$_POST["docu_A_11_12"];
        $docu_A_11_13   =$_POST["docu_A_11_13"]; //Line_3
        $docu_A_11_14   =$_POST["docu_A_11_14"];
        $docu_A_11_15   =$_POST["docu_A_11_15"];
        $docu_A_11_16   =$_POST["docu_A_11_16"];
        $docu_A_11_17   =$_POST["docu_A_11_17"];
        $docu_A_11_18   =$_POST["docu_A_11_18"];
        $docu_A_11_19   =$_POST["docu_A_11_19"];
        $docu_A_11_20   =$_POST["docu_A_11_20"];
        $docu_A_11_21   =$_POST["docu_A_11_21"];
        $docu_A_11_22   =$_POST["docu_A_11_22"];
        $docu_A_11_23   =$_POST["docu_A_11_23"];
        $docu_A_11_24   =$_POST["docu_A_11_24"];
        $docu_A_11_25   =$_POST["docu_A_11_25"];
        $docu_A_11_26   =$_POST["docu_A_11_26"];
        $docu_A_11_27   =$_POST["docu_A_11_27"];
        $docu_A_11_28   =$_POST["docu_A_11_28"];
        $docu_A_11_29   =$_POST["docu_A_11_29"];
        $docu_A_11_30   =$_POST["docu_A_11_30"];
        $docu_A_11_31   =$_POST["docu_A_11_31"];
        $docu_A_11_32   =$_POST["docu_A_11_32"];
        $docu_A_11_33   =$_POST["docu_A_11_33"];
        $docu_A_11_34   =$_POST["docu_A_11_34"];
        $docu_A_11_35   =$_POST["docu_A_11_35"];
        $docu_A_11_36   =$_POST["docu_A_11_36"];
?>
<body>
    <div class="wrap">
        <form action="docu_11_insert.php" name="docu11_insertform" method="post">
            <h1>물품 신청서</h1>
            <div class="contents">
                <table class="table_01" cellpadding="0" cellspacing="0">
                    <tr>
                        <td rowspan="2" width="456px;" style="font-size:24pt;">
                            물품(구입,수리) 신청서
                        </td>
                        <td rowspan="2" width="29px;">
                            <p>신</p>
                            <p>청</p>
                            <p>부</p>
                            <p>서</p>
                        </td>
                        <td height="26px;" width="71px;" style="border-bottom:1px solid black;">
                            부장
                        </td>
                        <td width="73px;" style="border-bottom:1px solid black;">
                            국장
                        </td>
                    </tr>
                    <tr>
                        <td height="64px;"></td>
                        <td></td>
                    </tr>
                </table>
                <table class="table_02" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="2" style="border-top:0; border-right:0; border-left:1px solid black;" height="26px;" width="68px;">관리부서</td>
                    </tr>
                    <tr>
                        <td width="30px;" height="66px;">
                            <p>사</p>
                            <p>장</p>
                        </td>
                        <td style="border-right:0;"></td>
                    </tr>
                    <tr>
                        <td height="66px;">
                            <p>이</p>
                            <p>사</p>
                        </td>
                        <td style="border-right:0;"></td>
                    </tr>
                    <tr>
                        <td height="64px;">
                            <p>실</p>
                            <p>장</p>
                        </td>
                        <td style="border-right:0;"></td>
                    </tr>
                    <tr>
                        <td height="65px;">
                            <p>팀</p>
                            <p>장</p>
                        </td>
                        <td style="border-right:0;"></td>
                    </tr>
                    <tr>
                        <td height="65px;">
                            <p>과</p>
                            <p>장</p>
                        </td>
                        <td style="border-right:0;"></td>
                    </tr>
                    <tr>
                        <td style="border-bottom:0;" height="65px;">
                            <p>담</p>
                            <p>당</p>
                        </td>
                        <td style="border-bottom:0; border-right:0;"></td>
                    </tr>
                </table>
                <div class="contents_div">
                    <table class="table_03" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="75px;" height="32px;">신청일</td>
                            <td width="115px;">
                                <?=$regi_date?>
                            </td>
                            <td width="84px;">신청부서</td>
                            <td width="149px;">
                                <?=$buse_code?>
                            </td>
                            <td width="62px;">신청자</td>
                            <td>
                                <span id="name" style="width: 70%;">
                                    <?=$name?>
                                </span>
                            </td>
                        </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="table_04">
                        <tr>
                            <td width="151px;" height="24px;">품 명</td>
                            <td width="65px;">수 량</td>
                            <td width="137px">용 도</td>
                            <td width="100px;">단 가</td>
                            <td width="115px;">금 액</td>
                            <td width="100px;">비 고</td>
                        </tr>
                        <tr>
                            <td height="40px;">
                                <?=$docu_A_11_01?>
                            </td>
                            <td>
                                <?=$docu_A_11_02?>
                            </td>
                            <td>
                                <?=$docu_A_11_03?>
                            </td>
                            <td>
                                <?=$docu_A_11_04?>
                            </td>
                            <td>
                                <?=$docu_A_11_05?>
                            </td>
                            <td>
                                <?=$docu_A_11_06?>
                            </td>
                        </tr>
                        <tr>
                            <td height="40px;">
                                <?=$docu_A_11_07?>
                            </td>
                            <td>
                                <?=$docu_A_11_08?>
                            </td>
                            <td>
                                <?=$docu_A_11_09?>
                            </td>
                            <td>
                                <?=$docu_A_11_10?>
                            </td>
                            <td>
                                <?=$docu_A_11_11?>
                            </td>
                            <td>
                                <?=$docu_A_11_12?>
                            </td>
                        </tr>
                        <tr>
                            <td height="41px;">
                                <?=$docu_A_11_13?>
                            </td>
                            <td>
                                <?=$docu_A_11_14?>
                            </td>
                            <td>
                                <?=$docu_A_11_15?>
                            </td>
                            <td>
                                <?=$docu_A_11_16?>
                            </td>
                            <td>
                                <?=$docu_A_11_17?>
                            </td>
                            <td>
                                <?=$docu_A_11_18?>
                            </td>
                        </tr>
                        <tr>
                            <td height="40px;">
                                <?=$docu_A_11_19?>
                            </td>
                            <td>
                                <?=$docu_A_11_20?>
                            </td>
                            <td>
                                <?=$docu_A_11_21?>
                            </td>
                            <td>
                                <?=$docu_A_11_22?>
                            </td>
                            <td>
                                <?=$docu_A_11_23?>
                            </td>
                            <td>
                                <?=$docu_A_11_24?>
                            </td>
                        </tr>
                        <tr>
                            <td height="41px;">
                                <?=$docu_A_11_25?>
                            </td>
                            <td>
                                <?=$docu_A_11_26?>
                            </td>
                            <td>
                                <?=$docu_A_11_27?>
                            </td>
                            <td>
                                <?=$docu_A_11_28?>
                            </td>
                            <td>
                                <?=$docu_A_11_29?>
                            </td>
                            <td>
                                <?=$docu_A_11_30?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?=$docu_A_11_31?>
                            </td>
                            <td>
                                <?=$docu_A_11_32?>
                            </td>
                            <td>
                                <?=$docu_A_11_33?>
                            </td>
                            <td>
                                <?=$docu_A_11_34?>
                            </td>
                            <td>
                                <?=$docu_A_11_35?>
                            </td>
                            <td>
                                <?=$docu_A_11_36?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>        
    </div>
    <div class="print_btn" id="print_btn">
        <input type="button" value="수정하기" onclick="docu_modify();"/>
        <input type="button" value="프린트" onclick="pagePrintPreview();" />
    </div>
</body>
</html>