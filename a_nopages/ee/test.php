<?
$mod = $_REQUEST["mod"];
$input = $_REQUEST["input"];
$total = 153069;
$total2 = 85691;

if($mod == "total") {
    $percent = ($input / $total) * 100;
    $percent2 = ($input / $total2) * 100;

    echo "상대백분율 :".sprintf("%2.2f",$percent2);
    echo "<br>전체백분율 : ".sprintf("%2.2f",$percent);
}
?>