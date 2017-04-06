<?
class Login
{

	//login 체크를 위한 db 테이블
	public $dbtable;

	//db에서 출력 된 데이터 호출변수
	public $rows;

	//폼에서 입력 되어진 데이터 변수
	public $inputs;
	
	public function __construct()
	{
		//부모객체에서 Database 생성 함수를 받음 
		
	}

	protected function chkDatabase()
	{
		//Database 유효성 검사
	}

	protected function chkId()
	{
		//아이디 체크
	}

	protected function chkPassword()
	{
		//패스워드 체크
	}

	protected function chkAccess()
	{
		//엑세스 레벨 체크
	}

	protected function createSession()
	{
		//세션 생성 메서드
	}

	protected function createCookie()
	{
		//자동 로그인을 위한 쿠키 생성 메서드
	}
}
?>