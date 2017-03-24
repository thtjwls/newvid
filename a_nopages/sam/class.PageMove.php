<?
class PageMove
{
    public $modName;

    function __construct()
    {

    }

    function pageMove()
    {
        switch ($this->modName) {
            case "default" :
                include_once("pages/default.php");
                break;
            case "FAQView" :
                include_once("pages/view/faqView.php");
                break;
            case "csView" :
                include_once("pages/view/csView.php");
                break;
            case "userModifyView" :
                include_once("pages/members/userModifyView.php");
                break;
            case "userAddView" :
                include_once("pages/members/userAddView.php");
                break;
            case "loginView" :
                include_once("pages/members/loginView.php");
                break;
            case "idSearchView" :
                include_once("pages/members/idsearch.php");
                break;
            case "passSearchView" :
                include_once("pages/members/passSearchView.php");
                break;
            case "page_1" :
                include_once("pages/view/page_1.php");
                break;
            case "page_2" :
                include_once("pages/view/page_2.php");
                break;
            case "page_3" :
                include_once("pages/view/page_3.php");
                break;
            case "page_4" :
                include_once("pages/view/page_4.php");
                break;
            case "page_5" :
                include_once("pages/view/page_5.php");
                break;
            default :
                break;
        }
    }
}
?>