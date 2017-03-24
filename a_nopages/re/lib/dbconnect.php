<?
class Database {
    public $connect;
    private $DBIP = "localhost";
    private $DBUSER = "thtjwls";
    private $DBPASS = "ekdP0919!";
    private $DATABASE = "thtjwls";

    public function __construct()
    {
        $IP = $this->DBIP;
        $USER = $this->DBUSER;
        $PASS = $this->DBPASS;
        $DATABASE = $this->DATABASE;        

        $this->connect = mysql_connect(
            $this->DBIP,
            $this->DBUSER,
            $this->DBPASS
            ) or die ("<script>alert('connect Error')</script>");
        mysql_select_db($DATABASE,$this->connect);
        mysql_query("set names utf8");

        return $connect;
    }
}

$DB = new DATABASE;
$connect = $DB->connect;


?>