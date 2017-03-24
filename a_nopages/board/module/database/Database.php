<?
class Database
{
    public $database;

    public $dbconnect;

    public function __construct()
    {
        self::dbinfo();               
    }

	protected function dbinfo()
    {
        $this->database = array(
            'ip' => 'localhost',
            'id' => 'thtjwls',
            'password' => 'ekdP0919!',
            'database' => 'thtjwls'
        );
    }

	public function connect()
	{
		$this->dbconnect = mysql_connect(
			$this->database['ip'],
			$this->database['id'],
			$this->database['password']) or die ('dbconnect error');

		mysql_select_db( $this->database['database'] );
        
		mysql_query('set names utf8'); 

		return $this->dbconnect;
	}

    public function test()
    {
        $pass = password_hash('1234',PASSWORD_BCRYPT);
        $regist_day = date('Y-m-d H:i:s');

        $sql = "insert into IN_MEMBER (Name,Pass,Hp,Company,Email,Regist_day) values ('юлаЖхф','$pass','010-9003-6094','testCompany','thtjwls@naver.com','$regist_day')";
        //$result = mysql_query($sql,self::connect());

        print $sql;
    }

    
}
?>