<?

class Board
{
    //기본 테이블 셋팅
    public $table; #construct()

    //고유 키값
    static private $object_key_count = 0;
    public $object_key;

    // 테이블 html 타입 (list or table)
    public $bbs_type; #dataList()
    public $bbs_box = "ul";
    public $bbs_row = "li";
    public $bbs_lin = "span";

    public $connect; #Database Class

    //추출할 데이터 필드명을 객체 호출부에서 array_push(); 안에 인덱스로 넣음
    public $field = array(); #dataList()

    //공통 쿼리 처리부분 where ~
    public $sql;
    public $sql_type;
    public $limit;

    //서치 쿼리
    public $search;
    public $like;

    ############################## 페이징 처리변수 ################################

    # 페이지 변수
    public $page;

    # 스케일 [ 한페이지의 리스트 갯수 ]
    public $scale = 10;

    # 데이터 카운트
    public $dataCnt;

    # 페이지 박스 [ 한개의 페이지 리스트 갯수 ]
    public $pageNum = 5;

    public $spage;
    public $epage;
    public $bpage;
    public $npage;

    public $tpageNum;
    public $prevSetLimit;


    public function __construct($table)
    {
        //이곳에서는 DB 호출만
        $Database = new Database;

        $this->table = $table;

        $this->connect = $Database->connect();

        $this->object_key = ++self::$object_key_count;

    }



    //공통 쿼리 처리부
    public function query($type)
    {
        $str = "";
        $this->sql_type = $type;

        $desc = self::field();

        $str .= "select ";

        switch ($this->sql_type) {
            case "row" :
                $str .=" * ";
                break;
            case "count" :
                $str .=" count(*) ";
                break;
            default :
                $str .=" * ";
                break;
        }


        $str .= "from ";
        $str .= $this->table;
        $str .= " where ";
        $str .= $desc;
        $str .=" order by idx desc";

        $this->sql = $str;

        return $str;

    }

    public function field()
    {
        $sql = "desc ".$this->table;
        $result = mysql_query($sql,$this->connect);

        $desc = "";

        while($row = mysql_fetch_assoc($result)) {
            $desc .= $row["Field"] . " like '%" . $this->search . "%' or ";
        }

        $desc = substr($desc,0,-3);

        return $desc;
    }


    public function bbsType($type)
    {
        switch ($type) {
            case "table" :
                $this->bbs_row = "tr";
                $this->bbs_lin = "td";
                $this->bbs_box = "table";
            case "list" :
                $this->bbs_row = "li";
                $this->bbs_lin = "span";
                $this->bbs_box = "ul";
        }
    }



    //데이터 출력부
    public function dataList()
    {        
        $str = "";
        self::query("row");
        $query = $this->sql . " limit " . $this->prevSetLimit . ", " . $this->scale;

        $result = mysql_query($query,$this->connect);

        while($row = mysql_fetch_assoc($result)) {
            $str .= "<".$this->bbs_row.">";

            foreach($row as $k => $v)
            {
                if(in_array($k,$this->field))
                {

                    if($k == "regist_day")
                    {
                        if($k == date("Y-m-d"))
                        {
                            $v = substr($v,6,10);
                        }

                        else
                        {
                            $v = substr($v,5,5);
                        }
                    }

                    if($k == "title") {$str .= "<".$this->bbs_lin."><a href='#'>".$v."</a></".$this->bbs_lin.">"; continue;}
                    $str .= "<".$this->bbs_lin.">".$v."</".$this->bbs_lin.">";
                }
            }

            $str .= "</".$this->bbs_row.">";
        }
        
        return $str;
    }

    //쿼리 리미트 처리부
    public function limit()
    {
        $result = mysql_query(self::query("count"),$this->connect);

        $this->dataCnt = mysql_result($result,0,0);

        $this->tpageNum = ceil($this->dataCnt/$this->scale);

        $this->spage = (ceil($this->page/$this->pageNum) - 1 ) * $this->pageNum + 1;

        $this->epage = $this->spage + $this->pageNum - 1;
        if($this->epage >= $this->tpageNum) $this->epage = $this->tpageNum;

        $this->bpage = $this->spage - 1;
        if($this->bpage < 1) $this->bpage = 1;

        $this->npage = $this->epage + 1;

        if($this->epage == $this->tpageNum) $this->npage = $this->epage;

        if($this->page < 0) $this->page = 1;

        $this->prevSetLimit = ($this->page * $this->scale) - $this->scale;

        if($this->dataCnt == 0) {$this->spage = 1;$this->epage = 1;}
    }

    //페이징 출력부
    public function paging()
    {
        $str = "";

        if($this->page > $this->pageNum) {
            $str .= "<li><a href='javascript:bbsMove(".$this->bpage.",".$this->object_key.");'><</a></li>";
        }

        for($i = $this->spage; $i < $this->epage + 1; $i++) {
            if($this->page == $i) {
                $str .="<li class='paging_active'>".$i."</li>";

                continue;
            }

            $str .="<li><a href='javascript:bbsMove(".$i.",".$this->object_key.");'>".$i."</a></li>";
        }

        if($this->epage < $this->npage) {
            $str .="<li><a href='javascript:bbsMove(".$this->npage.",".$this->object_key.")'>></a></li>";
        }

        #################################
        #       자바스크립트 출력부      #
        #################################
        ////$str .="<script>";
        ////$str .="function bbsMove(i,t,s) {";
        ////$str .= "var page = i; ";
        ////$str .= "var type = t; ";
        ////$str .= "$('#ajax_load_key_' + type).load('./?page=' + page + ' #ajax_load_key_' + type);}";
        //$str .="</script>";

        return $str;
    }
}

?>