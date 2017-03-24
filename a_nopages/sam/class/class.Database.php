<?
class Database
{
    var $DB_IP = "localhost";
    var $DB_ID = "thtjwls";
    var $DB_PASS = "ekdP0919!";
    var $DB_DB = "thtjwls";
    var $connect;
    var $Query;

    public function __construct()
    {
        $this->connect = mysql_connect($this->DB_IP,$this->DB_ID,$this->DB_PASS) or die ("Connect ERR...!");
        mysql_select_db($this->DB_DB);
        mysql_query("set names utf8");

        return $this->connect;
    }
}

new Database; 
?>