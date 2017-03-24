<?
class Dbconnect
{
	public $DB_INFO = array();

	protected $IP;
	protected $DB_ID;
	protected $DB_PASSWORD;
	protected $DB_TABLE;

	public $connect;

	public function __construct()
	{
		$this->DB_INFO['IP'] = "thtjwls.dothome.co.kr";
		$this->DB_INFO['ID'] = "thtjwls";
		$this->DB_INFO['PASSWORD'] = "ekdP0919!";
		$this->DB_INFO['TABLE'] = "thtjwls";


		$this->connect = mysql_connect(			
			$this->DB_INFO['IP'],
			$this->DB_INFO['ID'],
			$this->DB_INFO['PASSWORD'],
		) or die ("Connect Err(e)");
		
		mysql_connect_db($this->DB_INFO['TABLE']);
		
		mysql_query("set names utf8");

		return $this->connect;
	}
}
?>