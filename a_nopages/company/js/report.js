function report(reportNum) {
    var reportPath = location.href = ("../report/report.php?rNum=" + reportNum);

    if (reportNum == "r1") {
        //이메일 무단수집거부
        reportPath
    } else if (reportNum == "r2") {
        //개인정보 취급방침
        reportPath
    } else if (reportNum == "r3") {
        //청소년 보호정책
        reportPath
    } else if (reportNum == "r4") {
        //편집규약
        reportPath
    } else if (reportNum == "r5") {
        //윤리강령
        reportPath
    } else if (reportNum == "r6") {
        //신문광고 및 신문판매 윤리강령
        reportPath
    } else if (reportNum == "r6") {
        //고충처리인
        reportPath
    }
}