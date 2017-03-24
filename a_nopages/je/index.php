<? include_once ("header.php");?>
<div class="menuList">
    <ul>
        <li onclick="pageMove('product');" class="active">
            <a>PRODUCT</a>
        </li>
        <!--
        <li onclick="pageMove('serial');">
            <a>SERIAL</a>
        </li>
                    -->
        <li onclick="pageMove('history');">
            <a>HISTORY</a>
        </li>
    </ul>
</div>
<?
$mod = $_REQUEST["mod"];

if(!$mod || $mod=="") $mod = "product";

switch ($mod) {
    case "product": 
        include_once("pages/product.php");
        break;
    case "serial" :
        include_once("pages/serial.php");
        break;
    case "history" :
        include ("pages/history.php");
        break;
    default :
        break;
}
?>
<? include_once ("footer.php");?>