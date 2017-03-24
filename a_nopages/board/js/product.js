$(function () {
    $("#EstimateDate").datepicker({
        showButtonPanel: true,
        currentText: '오늘 날짜',
        closeText: '닫기',
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        dayNames: ['월요일', '화요일', '수요일', '목요일', '금요일', '토요일', '일요일'],
        dayNamesMin: ['월', '화', '수', '목', '금', '토', '일'],
        monthNamesShort: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],        
    });
});

function productDel(i) {
    var input = confirm("삭제 후 복구는 불가능합니다. 신중하게 선택 해주세요.\n정말 삭제하시겠습니까?");

    if (input === true) {
        window.location.href = "module/control/Control_C.php?mod=product_del&Idxno=" + i;
    } else {
        return false;
    }
}