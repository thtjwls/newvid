<div class="row">    
    <div class="col-md-4 col-md-offset-4">        
        <h3 class="text-info">Company Infomation</h3>
        <form class="" method="get">
            <div class="input-group">
                <input type="search" class="form-control input-lg" placeholder="업체정보를 입력 하세요.ex)사업자번호, 전화번호, 이메일 등" value="<?=$_GET['company'];?>" name="company" required id="searchData"/>
                <span class="input-group-btn">
                    <input type="button" value="Search" class="btn btn-primary btn-lg" onclick="search(); return false;"/>
                </span>
            </div><!-- /input-group -->
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-hover table-bordered table-condensed table-responsive">
            <?
if (isset($_GET['company']) && (!isset($_GET['Idxno']) || $_GET['Idxno'] == '')) {
    //1차 서치
    $arr = $control->companyView($_GET['company'],'');
    echo "<caption>'".$_GET['company']."' 검색결과</caption>";
    echo "<tr><th style=>상호</th>";
    echo "<th>사업자번호</th>";
    echo "<th>전화번호</th>";
    while($row = mysql_fetch_assoc($arr)) {
        echo "<tr>";
        echo "<td><a href='?menu=company&company=".$_GET['company']."&Idxno=".$row['Idxno']."'>".$row['Company']."</a></td>";
        echo "<td>".$row['CompanyNumber']."</td>";
        echo "<td>".$row['Tel']."</td>";
        echo "</tr>";
    }
}
//end
//////////////////////////////// 구 분 선 ///////////////////////////////
if (isset($_GET['Idxno']) && isset($_GET['company'])) {
    //2차 서치
    $arr = $control->companyView($_GET['company'],$_GET['Idxno']);
    $rowi = mysql_fetch_assoc($arr);
            ?>
            <caption>
                '<?=$_GET['company'];?>' 검색결과
                <a href="/board/?menu=company_regist&mod=modify&Idxno=<?=$rowi['Idxno'];?>" class="pull-right" title="정보수정">수정                    
                    <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                </a>
                <a href="javascript:companyDel(<?=$rowi['Idxno'];?>);" class="pull-right" title="삭제">
                    삭제
                    <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                </a>
            </caption>
            <colgroup>
                <col width="30%;">
                <col width="70%;">
            </colgroup>
            <? foreach ( $rowi as $k => $v ) { ?>
            <?
                   if ($k == 'Idxno') continue;
                   if ($k == 'CreateDate') continue;
                //명칭 포맷
            switch ($k) {
                case 'Idxno' : $k = 'key값';break;
                case 'Company' : $k = '업체명';break;
                case 'CompanyNumber' : $k = '사업자번호';break;
                case 'CompanyCeo' : $k = '대표자명';break;
                case 'Tel' : $k = '전화번호';break;
                case 'PostNum' : $k = '우편번호';break;
                case 'Address' : $k = '주소';break;
                case 'InAddress' : $k = '상세주소';break;
                case 'CreateDate' : $k = '데이터 생성날짜';break;
                case 'Comment' : $k = '메모';break;
            }
            ?>
            <tr>
                <th>
                    <?=$k?>
                </th>
                <td>
                    <?=$v?>
                </td>
            </tr>
            <?
       }
}
//end
            ?>
        </table>
    </div>
</div>



<script>
    $(function () {
        $("#searchData").keypress(function (e) {            
            if (e.keyCode == 13) {
                search();

                return false;
            }
        })
    })
    function search()
    {
        var data = $("#searchData").val();
        if (data == "") {
            alert("검색어를 입력하세요.");
            $("#searchData").focus();
        } else {
            window.location.href = "/board/?menu=company&company=" + data;
        }        
    }

    function companyDel(idx)
    {
        var input = confirm("정말 삭제하시겠습니까?\n삭제 된 데이터는 복구되지 않습니다.");

        if (input === true) {
            try {

                $.ajax({
                    url: "module/control/Control_C.php?mod=company_register_del&Idxno=" + idx,
                    type: "GET",
                    success: function (d) {
                        if (d == true) {
                            alert("삭제가 성공적으로 완료되었습니다.");
                            window.location.href = "/board/?menu=company";

                        } else {
                            alert("데이터 삭제중 문제가 생겼습니다.\n브라우저 콘솔창에서 문제를 참고하십시오.");
                            console.log(d);
                        }
                    }
                })


            } catch (e) {
                console.log('Company Error : ' + e);
            }
        } else {
            return false;
        }
    }
</script>