<?SESSION_START();

$headerURL = "www.sindy.co.kr";

require_once('../database/Database.php');
require_once('IN_CMS_C.php');
require_once('Control.php');
$control = new Control;

if ( $_SESSION['useridx'] != '' || isset($_SESSION['useridx'])) {
    $control->login_idx = $_SESSION['useridx'];
}

$json_data = json_decode(file_get_contents('php://input'));

switch ($_GET['mod']) {
	case 'login' :

		$control->id = $json_data->loginId;

		$control->pass = $json_data->loginPass;

		if ( $control->login() == true )
        {
            $_SESSION['useridx'] = $control->session_id;

            print true;
        }

        else { print false; }


		break;
    case 'logout' :

        if ( $control->logout() == true )
        {
            header("Location:http://".$headerURL."/board");
        }

        break;

    case 'dashboardInsert' :

        $control->postData = $_POST;

         if ($control->dashboardInsert() == true)
         {
             header("Location:http://".$headerURL."/board/?menu=dashboard_write");
         }

        break;

    case 'dashboardModify' :

        $control->postData = $_POST;

        if ($control->contentModify_insert($_GET['Idxno']) == true ) {

            header("Location:http://".$headerURL."/board/?menu=dashboard");

        }

        break;

    case 'contentDel' :

        print $control->contentDel($_GET['Idxno']);

        break;

    case 'product_modify' :

        $control->postData = $_POST;

        if ( $control->product_modify_insert() === true )
        {

            header("Location:http://".$headerURL."/board/?menu=product");

        } else {
            print("<script>alert('������ ������ �ֽ��ϴ�.\n������ ���� �� ��� �����ڿ��� �����ϼ���.');history.go(-1);</script>");
        }

        print ($control->product_modify_insert());

        break;

    case 'product_write' :
        $control->postData = $_POST;

        if ( $control->product_write() === true )
        {

            header("Location:http://".$headerURL."/board/?menu=product");

        } else if ( $control->product_write() == 2 ) {
            print("<script>alert('�ߺ� �� ProductKey ���� �ֽ��ϴ�.\n�ش� ���� �����ؾ� �մϴ�.');history.go(-1);</script>");

        } else if ( $control->product_write() === false ) {
            print("<script>alert('������ ����� ������ �߻��Ͽ����ϴ�.. ��� �� �ٽ� �õ����ּ���.\n������ ���� �� ��� �����ڿ��� �����ϼ���.');history.go(-1);</script>");
        }

        break;

    case 'product_del' :

        if ( $control->product_del($_GET['Idxno']) === true )
        {
            header("Location:http://".$headerURL."/board/?menu=product");
        } else {

            print ("������ ������ �ֽ��ϴ�....");
        }

    case 'company_register' :
        $control->postData = $_POST;

        if ( $control->company_register() === true ) {
            header("Location:http://".$headerURL."/board/?menu=company_regist");
        } else {

        }

        break;

    case 'company_register_modify_insert' :
        $control->postData = $_POST;

        if ( $control->company_modify_insert() === true ) {
            echo ("<script>alert('���������� �����Ǿ����ϴ�.');</script>");
            header("Location:http://".$headerURL."/board/?menu=company");
        } else {
            print ($control->company_modify_insert());
        }

        break;

    case 'company_register_del' :

        if ( $control->company_del($_GET['Idxno']) === true )
        {
            echo true;
        } else {
            echo false;
        }

        break;

	default :

		break;

}


?>