<?
class Login
{
    public $id;
    public $pass;
    public $connect;
	public $true;

    public function __construct()
    {
        $db = new Database;
        $this->connect = $db->connect;
    }

    public function idChk()
    {
        $query = "select count(ad_ID) from sam_user_tbl where ad_ID = '".$this->id."'";
        $result = mysql_query($query,$this->connect);
        $cnt = mysql_result($result,0,0);

        ($cnt == 0) ? print($query) : self::passChk();
    }

    private function passChk()
    {
        $query = "select ad_idx,ad_ID,ad_PASS from sam_user_tbl where ad_ID = '".$this->id."'";
        $result = mysql_query($query,$this->connect);

        $row = mysql_fetch_assoc($result);

        (!password_verify($this->pass,$row[ad_PASS])) ? print("false") : self::sessionChk($row[ad_idx]);
    }

    public function sessionChk($sidx) {
        $_SESSION["sidx"] = $sidx;

        print ("true");
    }
}
?>