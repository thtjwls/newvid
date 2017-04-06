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
            position:absolute;
            top:0;
            left:800px;
            opacity:1;
            z-index:2;
        }

        .wrap {
            margin-left: 30px;     
            width:600px;       
        }

         .table01 {
            text-align: center;
            border-left:1px solid black;
            border-bottom:1px solid black;
            margin-top:50px;
        }      

         .table01 input {
             width:80%;
             height:90%;
             border:0;
             font-size:14px;
         }

         .table01 p {
             width:auto;
             margin:auto;
         }

            .table01 td {
                border-top: 1px solid black;
                border-right: 1px solid black;
                width: inherit;
            }

        .table01 caption {
            font-size:28px;
            padding-bottom:20px;
        }

        .docu_btn {
            float:right;
        }
        
        
         .docu_btn input[type=button], .docu_btn input[type=reset] {
            width: 80px;
            height: 37px;
            margin-top: 15px;
        }

        .ui-datepicker-title {
            font-size: 12px;
        }

        .ui-datepicker-calendar td, .ui-datepicker-calendar th {
            font-size:12px;
        }

        #writer_tel {
            width:30px;
            font-size:16px;
            font-family:NanumGothic;
            margin-bottom:25px;
        }

        .table01 .datapicker_style {
            font-size:12px;
        }
    </style>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $(".datapicker_style").datepicker({
            dateFormat: 'yy.mm.dd',
            prevText: '이전 달',
            nextText: '다음 달',
            monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
            monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
            dayNames: ['일','월','화','수','목','금','토'],
            dayNamesShort: ['일','월','화','수','목','금','토'],
            dayNamesMin: ['일','월','화','수','목','금','토'],
            showMonthAfterYear: true,
            yearSuffix: '년'             
          });
        });

        function pre() {
            window.open("docu_08_view.php", "기안용지", "width=700,height=1000,up=150,left=150", "menubar=no,location=no,scrollbars=no,fullscreen=no,toolbar=no");
            document.docu08_insertform.action = 'docu_08_view.php';
            document.docu08_insertform.submit();
        }

        function paper_submit() {
            var input = confirm("제출 하시겠습니까?");

            if (input == true) {
                document.getElementById("docu_btn").innerHTML += "<input type='hidden' name='mode' value='save'>"
                document.docu08_insertform.action = "Module/php/docu_insert_module.php";
                document.docu08_insertform.submit();
            } else {
                return false;
            }
        }
    </script>

    <?
    $regist_day=substr($regist_day,0,10);
        ?>
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
                        <input type="text" name="docu_01" value="" />
                    </td>
                    <td colspan="4" style="border-top:0;">
                        (전화번호 4520-<input type="text" name="writer_tel" value="<?=$com_tel?>" id="writer_tel">)
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
                        <input type="text" name="regi_day" value="<?=$regist_day?>" class="datapicker_style" />
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
                        <input type="text" name="docu_02" value="" class="datapicker_style" />
                    </td>
                    <td colspan="7" rowspan="2">
                        <input type="text" name="" value="" />
                    </td>
                </tr>
                <tr>
                    <td height="26px;" colspan="2">
                        보존년한
                    </td>
                    <td>
                        <input type="text" name="docu_04" value="" class="datapicker_style" />
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
                        <input type="text" name="" value="" />
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
                        <input type="text" name="" value="" />
                    </td>
                </tr>
                <tr>
                    <td height="39px;">실 장</td>
                    <td colspan="3">
                        <input type="text" name="" value="" />
                    </td>
                </tr>
                <tr>
                    <td height="38px;">국 장</td>
                    <td colspan="3">
                        <input type="text" name="" value="" />
                    </td>
                </tr>
                <tr>
                    <td height="38px;">팀 장</td>
                    <td colspan="3">
                        <input type="text" name="" value="" />
                    </td>
                </tr>
                <tr>
                    <td height="38px;">과 장</td>
                    <td colspan="3">
                        <input type="text" name="" value="" />
                    </td>
                </tr>
                <tr>
                    <td height="29px;" colspan="2">
                        기안책임자
                    </td>
                    <td colspan="3">
                        <input type="text" name="writer_name" value="<?=$name?>" />
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
                        <input type="text" name="docu_05" value="<?=$buse_code?>" />
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
                        <input type="text" name="docu_06" value="" />
                    </td>
                </tr>
                <tr>
                    <td height="33px;" colspan="2">제목</td>
                    <td colspan="8">
                        <input type="text" name="docu_07" value="" />
                    </td>
                </tr>
                <tr>
                    <td height="39px;" colspan="10">
                        <input type="text" name="docu_08" value="" />
                    </td>
                </tr>
                <tr>
                    <td height="38px;" colspan="10">
                        <input type="text" name="docu_09" value="" style="width:90%;" />
                    </td>
                </tr>
                <tr>
                    <td height="38px;" colspan="10">
                        <input type="text" name="docu_10" value="" style="width:90%;" />
                    </td>
                </tr>
                <tr>
                    <td height="38px;" colspan="10">
                        <input type="text" name="docu_11" value="" style="width:90%;" />
                    </td>
                </tr>
                <tr>
                    <td height="39px;" colspan="10">
                        <input type="text" name="docu_12" value="" style="width:90%;" />
                    </td>
                </tr>
                <tr>
                    <td height="39px;" colspan="10">
                        <input type="text" name="docu_13" value="" style="width:90%;" />
                    </td>
                </tr>
                <tr>
                    <td height="38px;" colspan="10">
                        <input type="text" name="docu_14" value="" style="width:90%;" />
                    </td>
                </tr>
                <tr>
                    <td height="38px;" colspan="10">
                        <input type="text" name="docu_15" value="" style="width:90%;" />
                    </td>
                </tr>
                <tr>
                    <td height="39px;" colspan="10">
                        <input type="text" name="docu_16" value="" style="width:90%;" />
                    </td>
                </tr>
            </table>
            <div class="docu_btn" id="docu_btn">
                <input type="button" value="미리보기" onclick="pre();" />
                <input type="reset" value="다시작성" />
                <input type="button" value="제출" onclick="paper_submit();" />
                <input type="hidden" value="기안" name="<?=$cate?>"/>
                <input type="hidden" value="<?=$buse_own?>" name="buse_own" />
            </div>
        </form>
    </div>
</body>
</html>

