<? include "../DB/dbconnect.php";?> <!--DB 커텍터-->
<? include "../docu/Module/php/docu_module.php"; ?> <!-- 프로그래밍을 위한 변수-->
<!DOCTYPE html>
<html lang="ko">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <style>
       body, h1, h2, h3, h4, h5, h6, p, tabl, span, th, td{
        padding:0;
        margin:0;
        text-align:center;
        }
        
        .wrap {
            width:740px;
            height:480px;
            position:relative;
            margin-top:5px;
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
    </style>
    <script src="../js/jquery-1.6.4.min.js"></script>
    <script src="../js/jquery.PrintArea.js_4.js"></script>
    <script src="../js/jquery.printElement.js"></script>
    <script>
        //제출시 경로
        function docu11_submit() {
            document.docu11_insertform.action = "docu_11_insert.php";
            document.docu11_insertform.submit();
        }
        //미리보기 경로
        function docu_11_view() {
            document.docu11_insertform.action = 'docu_11_view.php';
            document.docu11_insertform.submit();
        }

        function docu_11_sum1() {
            var docu = document.docu11_insertform;
            //수량
            var sum1 = docu.docu_A_11_02.value;
            var sum2 = docu.docu_A_11_08.value;
            var sum3 = docu.docu_A_11_14.value;
            var sum4 = docu.docu_A_11_20.value;
            var sum5 = docu.docu_A_11_26.value;
            var sum6 = docu.docu_A_11_32.value;

            //단가        
            var target1 = docu.docu_A_11_04.value;
            var target2 = docu.docu_A_11_10.value;
            var target3 = docu.docu_A_11_16.value;
            var target4 = docu.docu_A_11_22.value;
            var target5 = docu.docu_A_11_28.value;
            var target6 = docu.docu_A_11_34.value;

            //코멘트
            var comment1 = "수량, 단가 는 정수만 입력됩니다.";


            if (isNaN(sum1)) {
                alert(comment1);
                docu.docu_A_11_02.focus();
            } else if (isNaN(sum2)) {
                alert(comment1);
                docu.docu_A_11_08.focus();
            } else if (isNaN(sum3)) {
                alert(comment1);
                docu.docu_A_11_14.focus();
            } else if (isNaN(sum4)) {
                alert(comment1);
                docu.docu_A_11_20.focus();
            } else if (isNaN(sum5)) {
                alert(comment1);
                docu.docu_A_11_26.focus();
            } else if (isNaN(sum6)) {
                alert(comment1);
                docu.docu_A_11_32.focus();
            } else if (isNaN(target1)) {
                alert(comment1);
                docu.docu_A_11_04.focus();
            } else if (isNaN(target2)) {
                alert(comment1);
                docu.docu_A_11_10.focus();
            } else if (isNaN(target3)) {
                alert(comment1);
                docu.docu_A_11_16.focus();
            } else if (isNaN(target4)) {
                alert(comment1);
                docu.docu_A_11_22.focus();
            } else if (isNaN(target5)) {
                alert(comment1);
                docu.docu_A_11_28.focus();
            } else if (isNaN(target6)) {
                alert(comment1);
                docu.docu_A_11_34.focus();
            }
            else {
                if ((sum1 * target1) == "0") { docu.docu_A_11_05.value == "" } else { docu.docu_A_11_05.value = +sum1 * target1; }
                if ((sum2 * target2) == "0") { docu.docu_A_11_11.value == "" } else { docu.docu_A_11_11.value = +sum2 * target2; }
                if ((sum3 * target3) == "0") { docu.docu_A_11_17.value == "" } else { docu.docu_A_11_17.value = +sum3 * target3; }
                if ((sum4 * target4) == "0") { docu.docu_A_11_23.value == "" } else { docu.docu_A_11_23.value = +sum4 * target4; }
                if ((sum5 * target5) == "0") { docu.docu_A_11_29.value == "" } else { docu.docu_A_11_29.value = +sum5 * target5; }
                if ((sum6 * target6) == "0") { docu.docu_A_11_35.value == "" } else { docu.docu_A_11_35.value = +sum6 * target6; }
            }
        }

          
    </script>
    <script>
        /*
        $(document).ready(function() {
         $("#print_btn").click(function() { //인쇄 커맨드를 전달 할 영역
          printByJquery({
           printMode: 'popup', //팝업설정 popup = 팝업창 , iframe = iframe
           //overrideElementCSS:[ '<c:url value="/common/w/css/wchkin.css"/>', { href:'<c:url value="/common/w/css/wchkin.css"/>',media:'print' } ], //css경로
           pageTitle:'물품 신청서', //인쇄 타이틀
           leaveOpen:false //false = 인쇄후 창닫기
          });
         });
        });

        function printByJquery(options) {
            $(".wrap").printElement(); //인쇄 할 영역
        }
        프린터 컨트롤러 1
        */
    </script>
</head>

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
                        <td height="64px;">

                        </td>
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
                                <input type="text" name="regi_date" value="<?=$regi_date?>" class="text_button"/> 
                            </td>
                            <td width="84px;">신청부서</td>
                            <td width="149px;">
                                <input type="text" name="docu_buse_code" value="<?=$buse_code?>" class="text_button" />
                            </td>
                            <td width="62px;">신청자</td>
                            <td>
                                <span id="name" style="width:"70%;">
                                    <input type="text" name="name" value="<?=$name?>" class="text_button" />
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
                                <input type="text" name="docu_A_11_01" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_02" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_03" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_04" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_05" value="" onfocus="docu_11_sum1();"/>
                            </td>
                            <td>
                                <select name="docu_A_11_06">
                                    <option value="">선택</option>
                                    <option value="구입">구입</option>
                                    <option value="수리">수리</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td height="40px;">
                                <input type="text" name="docu_A_11_07" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_08" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_09" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_10" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_11" value="" onfocus="docu_11_sum1();"/>
                            </td>
                            <td>
                                <select name="docu_A_11_12">
                                    <option value="">선택</option>
                                    <option value="구입">구입</option>
                                    <option value="수리">수리</option>
                                </select>                               
                            </td>
                        </tr>
                        <tr>
                            <td height="41px;">
                                <input type="text" name="docu_A_11_13" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_14" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_15" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_16" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_17" value="" onfocus="docu_11_sum1();"/>
                            </td>
                            <td>
                                <select name="docu_A_11_18">
                                    <option value="">선택</option>
                                    <option value="구입">구입</option>
                                    <option value="수리">수리</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td height="40px;">
                                <input type="text" name="docu_A_11_19" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_20" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_21" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_22" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_23" value="" onfocus="docu_11_sum1();"/>
                            </td>
                            <td>
                                <select name="docu_A_11_24">
                                    <option value="">선택</option>
                                    <option value="구입">구입</option>
                                    <option value="수리">수리</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td height="41px;">
                                <input type="text" name="docu_A_11_25" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_26" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_27" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_28" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_29" value="" onfocus="docu_11_sum1();"/>
                            </td>
                            <td>
                                <select name="docu_A_11_30">
                                    <option value="">선택</option>
                                    <option value="구입">구입</option>
                                    <option value="수리">수리</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="docu_A_11_31" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_32" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_33" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_34" value="" />
                            </td>
                            <td>
                                <input type="text" name="docu_A_11_35" value="" onfocus="docu_11_sum1();"/>
                            </td>
                            <td>
                                <select name="docu_A_11_36">
                                    <option value="">선택</option>
                                    <option value="구입">구입</option>
                                    <option value="수리">수리</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="input_button">
                    <?
                    if($level <4){
                    ?>
                    <input type="button" value="제출" id="docu_11_submit" onclick="docu11_submit();"/>
                    <input type="reset" value="재작성" />
                    <input type="button" value="미리보기" onclick="docu_11_view();"/>
                    <input type="button" value="인쇄하기" id="print_btn"/>
                    <?
                    }else if($level >4){
                    ?>
                    <input type="reset" value="재작성" />
                    <input type="button" value="미리보기" />
                    <input type="button" value="인쇄하기" />
                    <?
                    }
                    ?>                                        
                </div>
            </div>
        </form>
    </div>
</body>
</html>