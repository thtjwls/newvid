<?
class Database
{
    public $query;
    public $connect;
    protected $IP = "localhost";
    protected $DB_ID = "thtjwls";
    protected $DB_PASSWORD = "ekdP0919!";
    protected $DB_NAME = "thtjwls";
    protected $DB_UNICODE_QUERY = "set names utf8";

    public function __construct()
    {
        $this->connect = mysql_connect($this->IP,$this->DB_ID,$this->DB_PASSWORD) or die ("Failed Connect to DB");
        mysql_select_db($this->DB_NAME);
        mysql_query($this->DB_UNICODE_QUERY);

        return $this->connect;
    }
}
?>