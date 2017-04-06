<?
class Membership
{
    public $connect;

    public $table;

    public $session_idx;

    public $member_name;
    public $member_id;
    public $member_pass;
    public $member_buse;
    public $member_email;
    public $member_hp;
    public $member_tel;
    public $member_position_level = 1;
    public $member_membership_level = 1;
    public $member_access = false;
    public $regist_day;
    public $regist_ip;

    /* 로그인 변수 */
    public $member_id_string; /* 아이디 문자열 */
    public $member_pass_string; /* 암호화 되지 않은 일반 평문 패스워드 */

    public $query;

    public $id_cnt;

    public function __construct($table)
    {
        $Database = new Database;
        $this->connect = $Database->connect();
        $this->table = $table;

        self::registDay();
        self::registIp();
    }

    public function id_chk()
    {

        $this->query = "select count(*) from ".$this->table." where id = '".$this->member_id."'";
        $result = mysql_query($this->query,$this->connect);
        $this->id_cnt = mysql_result($result,0,0);

        if($this->id_cnt == 0) {
            return 0;
        } else if ($this->id_cnt > 0) {
            return 1;
        }
    }

    protected function registDay()
    {
        $this->regist_day = date("Y-m-d H:i:s");
    }

    protected function registIp()
    {
        $this->regist_ip = $_SERVER["REMOTE_ADDR"];
    }

    public function member_insert() {
        $this->query = "insert into ".$this->table." (name,id,pass,buse,email,hp,tel,position_level,membership_level,regist_day,regist_ip) values ";
        $this->query .= "('".$this->member_name."','".$this->member_id."','".$this->member_pass."','".$this->member_buse."','".$this->member_email."','".$this->member_hp."','".$this->member_tel."','".$this->member_position_level."','".$this->member_membership_level."','".$this->regist_day."','".$this->regist_ip."')";
        $result = mysql_query($this->query,$this->connect);

        if(!$result) {
            return 1;
        } else {
            return 0;
        }
    }

    public function member_login_id_chk() {
        $this->query = "select count(id) from ".$this->table." where id = '".$this->member_id_string."'";
        $result = mysql_query($this->query,$this->connect);
        $cnt = mysql_result($result,0,0);

        if($cnt == 0) {
            return $this->query;
        } else {
           return self::member_login_pass_chk();
        }
    }

    private function member_login_pass_chk() {
        $this->query = "select idx,id,pass,access from ".$this->table." where id = '".$this->member_id_string."'";
        $result = mysql_query($this->query,$this->connect);

        $row = mysql_fetch_assoc($result);     

        if(!password_verify($this->member_pass_string,$row['pass'])) {
            return 1;
        } else if ($row['access'] == false) {
            return 2;
        } else {
            self::member_login_create_session($row['idx']);

            /* 최종 로그인 성공은 0을 반환함 */
            return 0;
        }
    }

    private function member_login_create_session($idx) {
        $this->session_idx = $idx;

        $_SESSION["loginidx"] = $this->idx;
    }
}
?>