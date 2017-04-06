<?
class Database {

	public $connect;

	function __construct()
	{
		try {
			
			$this->connect = mysql_connect("localhost","thtjwls","ekdP0919!") or die ("<script>alert('connect 값 오류 계정 확인')</script>");
			
			mysql_select_db("thtjwls",$this->connect);
			
			mysql_query("set names utf8");

		} catch (Exception $e){}
	}
}

?>