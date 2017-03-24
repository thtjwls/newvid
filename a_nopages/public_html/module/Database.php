<?
class Database
{
	public $connect;
	public $dbconfig;
	
	public function __construct()
	{
		$this->dbconfig = array(
			'db_ip' => 'localhost',
			'db_id' => 'thtjwls',
			'db_pass' => 'ekdP0919!',
			'database' => 'thtjwls'
		);
	}

	public function connect()
	{
		$this->connect = mysql_connect(
			$this->dbconfig['db_ip'],
			$this->dbconfig['db_id'],
			$this->dbconfig['db_pass']
		) or die ('db connect err');

		mysql_select_db($this->dbconfig['database']);

		mysql_query('set names utf8');

		return $this->connect;
	}
}
?>