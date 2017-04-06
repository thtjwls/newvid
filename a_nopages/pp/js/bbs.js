$(function () {
    $("#bbsDeleteBtn").click(function () {
        var bbsIdx = $("#bbsIdx").val();
        var input = confirm("정말 삭제하시겠습니까?");
        if (input == true) {
            location.href = "module/bbsDelete.php?idx=" + bbsIdx;
        } else {
            return false;
        }
    });

    
    $("input[name=bbsRepleInsertBtn").click(function () {
        var bbsIdx = $("#bbsIdx").val();
        var param = $("form[name=bbsRepleInsertForm]").serialize();
        var bbsRepleArea = $("#reple_table");
        //$(".reple_table").load("module/bbsRepleInsert.php?idx="+bbsIdx);        
        $.ajax({
            url: "module/bbsRepleInsert.php?idx=" + bbsIdx,
            data: param,
            type: "POST",
            success: function (data) {
                window.location.reload(true);
                location.href = "#";                     
            }
        })        
    })

    $("#bbsModifyBtn").click(function () {
        var bbsidx = $("#bbsIdx").val();
        location.href = "?tabs=bbsModify&idx=" + bbsidx;
    })

    $("#bbsListView").click(function () {
        location.href = "?tabs=bbs";
    })
});

function bbsViewPagings(page) {
    
}