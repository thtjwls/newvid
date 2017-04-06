<?
//로그인 객체를 생성할때 파라미터로 [아이디문자열], [넘길 암호 데이터 문자열], [아이디를 추출 할 DB 의 테이블]을 인자값으로 넘긴다.
//로그인이 실패 하게 될 경우 중간에서 false 를 리턴하며, 성공 하였을 경우엔 $_SESSION['useridx'] 에 해당 아이디의 idx 키 값 을 담아서 세션을 생성한다.

require_once("Dbconnect.php");

class Login
{
	public $user = array();
	
	public $connect;

	public function __construct( $id, $password, $table )
	{
		SESSION_START();
		
		$this->user['id'] = $id;
		$this->user['pass'] = $password;
		$this->user['table'] = $table;

		$this->connect = new Dbconnect;

		self::id_chk();
	}

	private function id_chk()
	{
		$sql = "select count(idx) from ".$this->user['table'];
		$sql .= " where ".$this->user['id'];

		$result = mysql_query($sql,$this->connect);
		$cnt = mysql_result($result,0,0);

		if( $cnt == 1 ) {
			self::pass_chk();
		} else {

			return false;

		}
	}

	private function pass_chk()
	{
		$sql = "select idx,id,password from ".$this->user['table'];
		$sql .=" where id = '".$this->user['id']."'";
		$result = mysql_query($sql,$this->connect);
		$row = mysql_fetch_assoc($result);

		if( ! password_verify( $this->user['pass'], $row['password') ) {
			return 0;
		} else {

			self::session_add($row['idx']);

		}
	}

	private function session_add($sessionIdx)
	{
		$_SESSION['useridx'] = $sessionIdx;
		
		return true;
	}
}
?>