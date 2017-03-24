<?

include_once("include.php");

$mod = $_GET["mod"];

/* Data */
$input_ID = $_REQUEST["input_ID"];
$input_PASS = $_REQUEST["input_PASS"];

$db = new Database;
$Login = new Login;
$Login->INPUT_ID = $input_ID;
$Login->INPUT_PASS = $input_PASS;

switch($mod) {
    case "loginChk" :
        $Login = new Login;
        $Login->INPUT_ID = $input_ID;
        $Login->INPUT_PASS = $input_PASS;

        print ($Login->idChk());
        break;
    default :
        break;
}

?>