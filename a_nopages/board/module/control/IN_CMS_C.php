<?
class IN_CMS_C
{
	//table load
	public $table = 'IN_BUSE';

	//dbconnect load
    public $connect;


	//query load
    public $query;


    public function __construct()
    {
		$database = new Database;
		$this->connect = $database->connect();
    }

    //database buse load
    public function buseInfo()
    {
		$rows;

		$this->query = 'select ';

		$this->query .= ($mod == 'count') ? 'count(Buse)' : 'Buse';
		$this->query .= ' from '.$this->table;


        $result = mysql_query( $this->query,$this->connect );		
		
		$cnt = mysql_num_rows($result);

		for( $i = 0; $i < $cnt; $i++ )
		{
			$rows .= '&'.mysql_result($result,$i);
		}		
		
		$getBuse = explode('&',$rows);

		return $getBuse;
    }	
}
?>