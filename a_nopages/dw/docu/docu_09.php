<!DOCTYPE html>
<html lang="ko">
<head>
    <title>연차양식</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <style>
        body, h1, h2, h3, h4, h5, h6, p, div, table, td, tr, th {
            border:0;
            padding:0;
            margin:0;
            font-family:"나눔고딕";
        }

        .wrap {
            width:560px;
            height:800px;
            border:1px solid black;
        }

        h1 {
            font-weight:100;
            background-color:#D6D6D6;
            width:85px;
            margin-left:70px;
            margin-top:7px;
            font-size:28pt;
        }

        .title p {
            margin-left:70px;
            margin-top:20px;
            font-size:28pt;
        }

        .contets {
            width:90%;
            height:90%;
            margin:auto;
            margin-top:27px;
            position:relative;
        }

        .status {
            width:410px;
            height:100px;
            margin:auto;
        }

        table {
            border-left:1px solid black;
            border-top:1px solid black;
            text-align:center;
            vertical-align:middle;
        }

        td {
            border-right:1px solid black;
            border-bottom:1px solid black;
        }

        .input_st {
            font-size:16pt;
            margin-left:15px;
            margin-top:30px;
        }

        .input_st p {
            margin-top:10px;
        }

        .buse_order {
            position:absolute;
            right:58px;
            top:258px;
        }

        .order_text {
            margin-left:19px;
            margin-top:20px;
        }

        .order_text table, .order_text td {
            border: 0;
        }

        .send_text {
            width:470px;
            margin:auto;
            margin-top:15px;
        }

        .send_text p {
            font-size:16pt;
        }

        .company_title {
            font-size:20pt;
            font-weight:400;
            position:absolute;
            bottom:30px;
            left:150px;
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="contets">
            <div class="status">
                <table class="top_table" cellspacing="0" cellpadding="0" width="409px;" height="99px;">
                    <tr>
                        <td rowspan="2"><p>관</p><p>리</p><p>부</p><p>서</p></td>
                        <td height="33px;">담당</td>
                        <td>과장</td>
                        <td>팀장</td>
                        <td>실장</td>
                        <td>이사</td>
                        <td>사장</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
                <div class="title">
                    <h1>년 차</h1>
                    <p>결 근 (교육, 병가, 청원)</p>
                </div>
                <div class="input_st">
                    <p>소 속 :</p>
                    <p>직 위 :</p>
                    <p>성 명 :</p>
                    <p>사 유 :</p>
                </div>
                <div class="buse_order">
                    <table cellspacing="0" cellpadding="0" width="167px;" height="99px;">
                        <tr>
                            <td rowspan="2" width="30px;">
                                <p>담</p>
                                <p>당</p>
                                <p>부</p>
                                <p>서</p>
                            </td>
                            <td height="20px;">팀장</td>
                            <td>국장</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
            </div>
            <div class="order_text">
                <table cellpadding="0" cellspacing="0" width="466px;" height="62px;">
                    <tr>
                        <td rowspan="2">결근기간</td>
                        <td>2016 년 월 일 부터</td>
                        <td rowspan="2">( 일간)</td>
                    </tr>
                    <tr>                        
                        <td>2016 년 월 일 까지</td>                        
                    </tr>
                </table>
            </div>
            <div class="send_text">
                <p>상기와 같이 휴가 하고자 하오니 허락하여 주시기 바랍니다. <br /><br />제출일자: 2016년 월 일</p>
                <p style="float:right; margin-top:40px;">신청인<span style="margin-left:40px;">이 지 훈</span></p>
            </div>
            <div class="company_title">
                <p>인천일보사장 귀하</p>
            </div>
        </div>
    </div>
</body>
</html>