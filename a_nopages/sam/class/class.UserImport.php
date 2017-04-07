<?
class UserImport
{
    public $connect,
    $se_idx,
    $tbl,
    $query,
    $ad_NAME,
    $ad_ID,
    $ad_PASS,
    $ad_TEL,
    $ad_Email,
    $ad_POST_NUM,
    $ad_ADDRESS,
    $ad_DETAIL_ADDRESS,
    $regist_day,
    $regist_ip;

    public function __construct()
    {
        $d = new Database;
        $this->connect = $d->connect;
        $this->tbl = "sam_user_tbl";

        $this->regist_ip = $_SERVER["REMOTE_ADDR"];
        $this->regist_day = date("Y-m-d H:i:s");
    }

    public function idChk()
    {
        $this->query = "select count(ad_idx) from ".$this->tbl." where ad_ID = '".$this->ad_ID."'";
        $result = mysql_query($this->query,$this->connect);
        $cnt = mysql_result($result,0,0);

        $cnt == 0 ? print("true") : print("false");
    }

    public function memberInsert()
    {
        $this->query = "insert into ".$this->tbl." (";
        $this->query .= "ad_NAME,ad_ID,ad_PASS,ad_TEL,ad_Email,ad_POST_NUM,ad_ADDRESS,ad_DETAIL_ADDRESS,regist_day,regist_ip) values ";
        $this->query .= "('".$this->ad_NAME."','".$this->ad_ID."','".$this->ad_PASS."','".$this->ad_TEL."','".$this->ad_Email."','".$this->ad_POST_NUM."','".$this->ad_ADDRESS."','".$this->ad_DETAIL_ADDRESS."','".$this->regist_day."','".$this->regist_ip."')";
        $result = mysql_query($this->query,$this->connect);

        (!$result) ? print("<script>alert('가입에 실패 하였습니다..');</script>") : print("<script>alert('가입에 성공 하였습니다..');window.location.href='/?mod=default';</script>");

    }

    public function modify()
    {

        $sql = "update sam_user_tbl set ad_pass = '".$this->ad_PASS."', ad_TEL = '".$this->ad_TEL."', ad_Email = '".$this->ad_Email."', ad_POST_NUM = '".$this->ad_POST_NUM."', ad_ADDRESS = '".$this->ad_ADDRESS."', ad_DETAIL_ADDRESS = '".$this->ad_DETAIL_ADDRESS."', regist_ip = '".$this->regist_ip."' where ad_idx = '".$this->se_idx."'";
        $result = mysql_query($sql,$this->connect);

        if(!$result) {
            print("<script>alert('수정에 실패하였습니다. 잠시 후 다시 시도해주세요.');window.location.href = './';</script>");
        } else {
            print("<script>alert('수정되었습니다.');window.location.href = './';</script>");
            print("<script></script>");
        }
    }

    public function ids_search()
    {
        $cSql = "select count(*) from sam_user_tbl where ad_Email = '".$this->ad_Email."' and ad_TEL = '".$this->ad_TEL."'";
        $cResult = mysql_query($cSql,$this->connect);
        $cnt = mysql_result($cResult,0,0);

        if($cnt == 0) {
            return "false";
        } else {
            $sql = "select * from sam_user_tbl where ad_Email = '".$this->ad_Email."' and ad_TEL = '".$this->ad_TEL."'";
            $result = mysql_query($sql,$this->connect);

            $row = mysql_fetch_assoc($result);

            return $row[ad_ID];
        }
    }

    public function pss_search()
    {
        $cSql = "select count(*) from sam_user_tbl where ad_ID = '".$this->ad_ID."' and ad_TEL = '".$this->ad_TEL."'";
        $cResult = mysql_query($cSql,$this->connect);
        $cnt = mysql_result($cResult,0,0);

        if($cnt == 0) {
            return "false";
        } else {
            $sql = "select * from sam_user_tbl where ad_ID = '".$this->ad_ID."' and ad_TEL = '".$this->ad_TEL."'";
            $result = mysql_query($sql,$this->connect);

            $row = mysql_fetch_assoc($result);

            return "true";
        }
    }

    public function passChangeUser() {
        $sql = "update sam_user_tbl set ad_PASS = '".$this->ad_PASS."' where ad_ID = '".$this->ad_ID."'";
        $result = mysql_query($sql,$this->connect);

        if(!$result) {
            return "false";
        } else {
            return "true";
        }
    }
}
?>