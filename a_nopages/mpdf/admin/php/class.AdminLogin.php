<?
session_start();

include_once ("class.Database.php");

//인스턴스를 생성할 때 Login 메서드 호출하고 파라미터에 테이블 이름 넣어주세요.

class AdminLogin extends Database
{
	public function Login($TABLE,$INPUT_ID,$INPUT_PASS) {
		parent::__construct();

		$sql = "select count(id) from $TABLE where id = '".$INPUT_ID."'";
		$result = mysql_query($sql,$this->connect);
		$IDCNT = mysql_result($result,0,0);



		if($IDCNT == 0) {
			try {
				self::IDFaild();
			} catch (Exception $e) {
				echo "Fatal Error!!".$IDCNT;
			}
		} else {
			try {
				self::IDSuccess($TABLE,$INPUT_ID,$INPUT_PASS);
			} catch (Exception $e) {}
		}
	}

	public function IDSuccess($TABLE,$INPUT_ID,$INPUT_PASS)
	{
		$sql = "select idx,id,pass from ".$TABLE." where id = '".$INPUT_ID."'";
		$result = mysql_query($sql,$this->connect);
		$row = mysql_fetch_assoc($result);


		$DB_IDX = $row[idx];
		$DB_ID = $row[id];
		$DB_PASS = $row[pass];

		if($DB_PASS == $INPUT_PASS) {

			$_SESSION["useridx"] = $DB_IDX;
			echo "0";

		} else {
			self::IDFaild();
		}
	}

	public function IDFaild()
	{
		$echo = 1;

        echo $echo;
	}

}
?>