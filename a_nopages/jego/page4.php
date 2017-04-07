<? include "header.php";?>
<? include "interface.php";?>
<form action="php/page4_insert.php" method="post" name="page4_insert_form" id="page4_send_form">
    <table cellpadding="0" cellspacing="0">
        <caption class="table_caption">
            재고입력
        </caption>
        <colgroup>
            <col width=""/>
            <col width=""/>
            <col width="" />
            <col width="" />
            <col width="" />
            <col width="" />
            <col width="" />
            <col width="" />
        </colgroup>
        <thead>
            <tr>
                <th class="page_table_th_title">거래처</th>
                <th class="page_table_th_title">품명</th>
                <th class="page_table_th_title">구분번호</th>
                <th class="page_table_th_title">입고일</th>
                <th class="page_table_th_title">소유자</th>
                <th class="page_table_th_title">수량</th>
                <th class="page_table_th_title">금액(단가)</th>
                <th class="page_table_th_title">상태</th>
            </tr>
        </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="je_com" required/><!--거래처-->
                    </td>
                    <td>
                        <input type="text" value="" name="je_name" required /><!--품명-->
                    </td>
                    <td>
                        <input type="text" value="" name="je_serial" /><!--구분번호-->
                    </td>
                    <td>
                        <input type="text" value="" name="je_ibgo" required /><!--입고일-->
                    </td>
                    <td>
                        <input type="text" value="" name="je_sou" /><!--소유자-->
                    </td>
                    <td>
                        <input type="number" value="" name="je_number" min="1" required/><!--수량-->
                    </td>
                    <td>
                        <input type="text" value="" name="je_cost" /><!--금액-->
                    </td>
                    <td>
                        <select name="je_sta">
                            <option value="1">양호</option>
                            <option value="2">불량</option>
                            <option value="3">파기</option>
                        </select>
                        <!--상태-->
                    </td>
                </tr>
            </tbody>        
        <tfoot id="sub_btn_tfoot">
            <tr>
                <td colspan="8">
                    <input type="button" value="등록하기" id="sub_btn_config"/>
                    <input type="reset" value="재작성" />
                </td>
            </tr>
        </tfoot>
    </table>
    <div id="page4_data_status">
        <div id="page4_data_result_success">
            <p class="page4_data_result_p">데이터 전송에 성공 했습니다.</p>
        </div>
        <div id="page4_data_result_fail">
            <p class="page4_data_result_p">데이터 전송에 실패 했습니다.</p>
        </div>
    </div>
</form>


<script>
    window.onload = $("input[name=je_com]").focus();

$(function () {
    var submitBtn = $("#sub_btn_config");    

    var cat = $;
    var cat1 = $("[name=je_com]");
    var cat2 = $("[name=je_name]");
    var cat3 = $("[name=je_serial]");
    var cat4 = $("[name=je_ibgo]");
    var cat5 = $("[name=je_sou]");
    var cat6 = $("[name=je_number]");
    var cat7 = $("[name=je_cost]");
    var cat8 = $("[name=je_sta]");

    cat4.datepicker({
        dateFormat: 'yy-mm-dd',
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        changeMonth: true,
        changeYear: true,
        showAnim: "fade",
        yearSuffix: '년'
    });

    submitBtn.click(function () {
        var submitDatas = $("#page4_send_form").serialize();
        var msg = "해당필드는 빈칸이 될 수 없습니다.";

        if (cat1.val() == "") {
            alert(msg);
            cat1.focus();
        } else if (cat2.val() == "") {
            alert(msg);
            cat2.focus();
        } else if (cat3.val() == "") {
            alert(msg);
            cat3.focus();
        } else if (cat4.val() == "") {
            alert(msg);
            cat4.focus();
        } else if (cat5.val() == "") {
            alert(msg);
            cat5.focus();
        } else if (cat6.val() == "") {
            alert(msg);
            cat6.focus();
        } else if (cat7.val() == "") {
            alert(msg);
            cat7.focus();
        } else if (cat8.val() == "") {
            alert(msg);
            cat8.focus();
        } else {
            //데이터 입력 ajax 코드 시작
            $.ajax({
                url: "php/page4_insert.php",
                data: submitDatas,
                success: function (data) {
                    console.log(data);
                    if (data == "error") {
                        $("#page4_data_result_fail").slideDown();
                        setTimeout(function () {
                            $("#page4_data_result_fail").slideUp();
                        }, 2000)
                    } else {
                        $("#page4_data_result_success").slideDown();

                        cat1.val("");
                        cat2.val("");
                        cat3.val("");
                        cat4.val("");
                        cat5.val("");
                        cat6.val("");
                        cat7.val("");

                        cat1.focus();

                        setTimeout(function () {
                            $("#page4_data_result_success").slideUp(function () {
                                //location.reload();
                            });
                        }, 2000)
                    }
                }
            });
            //ajax 코드 끝   
        }        
    });    
});


$(function () {
    var availableTags =
        [
            //자주쓰는 거래처 목록은 이곳에다 등록하세요.
            "인천일보",
            "시소컴퓨터",
            "디와이컴퍼니"
        ];
        $("[name=je_com]").autocomplete({
        source: availableTags
    });

});
</script>
<? include "footer.php";?>
