<?

class Login
{
    var $connect;
    var $query;
    var $table;
    var $INPUT_ID;
    var $INPUT_PASS;

    function __construct()
    {
        $db = new Database;

        $this->connect = $db->connect;

        SESSION_START();
    }

    function idChk() 
    {
        $this->query = "select count(*) from co_user where id = '".$this->INPUT_ID."'";
        $result = mysql_query($this->query,$this->connect);
        $cnt = mysql_result($result,0,0);

        if($cnt == 0) { return 1;} else { return self::passChk(); }
    }

    function passChk() 
    {
        $this->query = "select idx,pass,access from co_user where id = '".$this->INPUT_ID."'";
        $result = mysql_query($this->query,$this->connect);

        $row = mysql_fetch_assoc($result);

        if(!password_verify($this->INPUT_PASS,$row[pass])) {

            return 1;

        } else if($row[access] == 0) {

            return 2;

        } else {
            $_SESSION["useridx"] = $row[idx];

            return 0;
        }
    }
}
?>