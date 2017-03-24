<?
class Database
{
    protected $IP;
    protected $ID;
    protected $PASSWORD;
    protected $DATABASE_NAME;
    public $connect;

    public function __construct()
    {
        $this->IP = "localhost";
        $this->ID = "thtjwls";
        $this->PASSWORD = "ekdP0919!";
        $this->DATABASE_NAME = "thtjwls";
    }

    public function connect()
    {
        $this->connect = mysql_connect($this->IP,$this->ID,$this->PASSWORD) or die ("DB connect Err...");
        mysql_select_db($this->DATABASE_NAME);
        mysql_query("set names utf8");
        
        
        


        return $this->connect;
    }
}
?>