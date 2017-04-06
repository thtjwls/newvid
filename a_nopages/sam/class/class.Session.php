<?
class Session
{
    public $session_idx;
    public $se_name;
    public $se_id;
    public $se_tel;
    public $se_email;
    public $se_post_num;
    public $se_address;
    public $se_detail_address;
    public $remote_ip;
    public $result;
    public $row;
    public $connect;

    public function __construct()
    {
        $con = new Database;
        $this->connect = $con->connect;
    }

    public function getSe()
    {
        $query = "select * from sam_user_tbl where ad_idx = '".$this->session_idx."'";
        $this->result = mysql_query($query,$this->connect);
        $this->row = mysql_fetch_assoc($this->result);
      
        $row = $this->row;

        $this->se_name = $row[ad_NAME];
        $this->se_id = $row[ad_ID];
        $this->se_tel = $row[ad_TEL];
        $this->se_email = $row[ad_Email];
        $this->se_post_num = $row[ad_POST_NUM];
        $this->se_address = $row[ad_ADDRESS];
        $this->se_detail_address = $row[ad_DETAIL_ADDRESS];
        $this->remote_ip = $_SERVER["REMOTE_ADDR"];
    }
}
?>