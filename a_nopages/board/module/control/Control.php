<?


class Control
{
	public $id;

    //로그인 성공 시 세션 아이디
    public $session_id;
    public $login_idx;

	// no protected
	public $pass;

	//protected
	public $hPass;

	protected $connect;

    //dashboard data
    public $postData;
    public $contentData;

    //today
    public $toDay;

    public $query;

    //viewDataRow
    public $viewDateResult;
    public $viewDateCnt;
    public $search;

    //페이징 set
    public $pagingSet;

    //페이지 control table setup
    public $controlTable;



	public function __construct()
    {
		$database = new Database;
		$this->connect = $database->connect();

        $this->toDay = date("Y-m-d H:i:s");

        $this->controlTable = ($this->controlTable == '' || !$this->controlTable) ?
            'IN_DASHBOARD' : $this->controlTable;


    }

	public function login()
	{
		if ( self::idChk() == true ) { return true; } else { return false; }
	}

	public function idChk()
	{
		$sql = "select count(id) from IN_MEMBER where Id = '".$this->id."'";
		$result = mysql_query($sql,$this->connect);
		$idCnt = mysql_result($result,0,0);

		if( $idCnt == 0 ) { return false;  } else { self::passChk(); }
	}

	public function passChk()
	{
		$sql = "select Idxno,Id,Pass from IN_MEMBER where Id = '".$this->id."'";
		$result = mysql_query($sql,$this->connect);

		if ( $result == true ) {
			try {

				$row = mysql_fetch_assoc( $result );
                $this->hPass = $row['Pass'];

				if ( ! password_verify( $this->pass , $this->hPass) ) {

					print false;

				} else {

                    $_SESSION['useridx'] = $row['Idxno'];

                    $this->session_id = $_SESSION['useridx'];

					print true;
				}

			} catch (Exception $e) {

				var_dump($e->getMessage());

			}

		} else {

			return false;

		}
	}

    public function loginSessionMember()
    {
        $sql = "select Name from IN_MEMBER where Idxno = '".$this->login_idx."'";
        $result = mysql_query($sql,$this->connect);
        $row = mysql_fetch_assoc($result);

        return $row['Name'];
    }


    //logout
    public function logout()
    {
        session_destroy();

        return true;
    }

    public function dashboardInsert()
    {
        $indexCnt = 0;

        $sql = "insert into IN_DASHBOARD ";

        $sql .= "(Buse, Name, Desktop, Notebook, Moniter, Keyboard, Mouse, Comment, CreateDate)";
        $sql .= " values ('".$_POST['Buse']."','".$_POST['Name']."','".$_POST['Desktop']."','".$_POST['Notebook']."','".$_POST['Moniter']."',".$_POST['Keyboard'].",".$_POST['Mouse'].",'".$_POST['Comment']."','".$this->toDay."')";

        $result = mysql_query($sql,$this->connect);

        try {

            if ( !$result )
            {
                return false;
            } else {

                return true;
            }

        } catch (Exception $e) {var_dump($e->getMessage());}
    }

    public $queryCnt;

    //공통 쿼리부분
    public function query()
    {

        $sql = "select * from ".$this->controlTable." ";
        $result = mysql_query($sql,$this->connect);

        $this->queryCnt = mysql_num_rows($result);


        $row = mysql_fetch_assoc($result, 1);

        switch ( $this->controlTable ) {

            case '' :
                break;

            case 'IN_DASHBOARD' :

                $this->query = "select Idxno,Buse,Name,Desktop,Notebook,Moniter,Keyboard,Mouse,Comment,CreateDate,ModifyDate,LastModify from IN_DASHBOARD where ";

                break;

            case 'IN_PRODUCT' :

                $this->query = "select * from IN_PRODUCT where ";

                break;

            default :
                break;
        }


        $queryStr;

        $num = 0;

        foreach ( $row as $field => $value )
        {
            if ( $num == count($row) - 1 ) {

                $queryStr .= "".$field." like '%".$this->search."%'";

                break;
            }

            $queryStr .= "".$field." like '%".$this->search."%' or ";

            $num++;
        }


        $this->query .= $queryStr;



        return $this->query;
    }

    public function dashboardView()
    {
        $query = self::query();

        $pagingSet = self::pagingSet();

        $query = $query." order by Idxno desc limit ".$this->pagingSet['prevLimit'].", ".$this->pagingSet['scale'];

        $result = mysql_query($query,$this->connect);

        $expQuery = explode("limit",$query);
        $expQueryResult = mysql_query($expQuery[0],$this->connect);

        $rowCnt = mysql_num_rows($expQueryResult);

        $this->viewDateResult = $result;

        $this->viewDateCnt = $rowCnt;

        return $query;

    }




    public function pagingSet()
    {

        $this->pagingSet['pageNum'] = 10;
        //if($this->pagingSet['nPage'] <= 0) { $this->pagingSet['nPage'] = 1; }

        //data : 24개 pageNum = 10 개 scale = 10개 현재페이지 : 3


        $this->pagingSet['tPage'] = ceil($this->viewDateCnt / $this->pagingSet['scale']);

        $this->pagingSet['sPage'] = (ceil($this->pagingSet['page']/$this->pagingSet['pageNum']) - 1 ) * $this->pageNum + 1;

        $this->pagingSet['ePage'] = $this->pagingSet['sPage'] + $this->pagingSet['pageNum'] - 1;
        if($this->pagingSet['ePage'] >= $this->pagingSet['tPage']) $this->pagingSet['ePage'] = $this->pagingSet['tPage'];

        $this->pagingSet['bPage'] = $this->pagingSet['sPage'] - 1;
        if($this->pagingSet['bPage'] < 1) $this->pagingSet['bPage'] = 1;

        $this->pagingSet['nPage'] = $this->pagingSet['ePage'] + 1;

        if($this->pagingSet['ePage'] == $this->pagingSet['tPage']) $this->pagingSet['nPage'] = $this->pagingSet['ePage'];

        if($this->pagingSet['page'] < 0) $this->pagingSet['page'] = 1;

        $this->pagingSet['prevLimit'] = ($this->pagingSet['page'] * $this->pagingSet['scale']) - $this->pagingSet['scale'];

        if($this->viewDateCnt == 0) {$this->pagingSet['sPage'] = 1;$this->pagingSet['ePage'] = 1;}

        return $this->viewDateCnt;

    }

    public function contentDel($idx)
    {
        $sql = "delete from IN_DASHBOARD where Idxno = '".$idx."'";
        $result = mysql_query($sql,$this->connect);

        if ( !$result ) {
            return false;
        } else {
            return true;
        }
    }

    public function contentModify($idx)
    {
        $sql = "select * from IN_DASHBOARD where Idxno = '".$idx."'";
        $result = mysql_query($sql,$this->connect);

        $row = mysql_fetch_assoc($result);

        return $row;
    }

    public function contentModify_insert($idx)
    {
        $this->query = "update IN_DASHBOARD set Name = '".$_POST['Name']."', Desktop = '".$_POST['Desktop']."', Notebook = '".$_POST['Notebook']."', Moniter = '".$_POST['Moniter']."', Keyboard = '".$_POST['Keyboard']."', Mouse = '".$_POST['Mouse']."', Comment = '".$_POST['Comment']."', ModifyDate = '".$this->toDay."', LastModify = '".self::loginSessionMember()."' where Idxno = '".$idx."'";
        $result = mysql_query($this->query,$this->connect);

        try {
            if( !$result ) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {var_dump($e->getMessage());}
    }

    //public function productView()
    //{
    //    $this->query = "select * from IN_PRODUCT ";
    //}

    public function product_modify($idx)
    {
        $array = array();
        $object = new ArrayObject;

        $sql = "select * from IN_PRODUCT where Idxno = '".$idx."'";
        $result = mysql_query($sql,$this->connect);

        $row = mysql_fetch_assoc($result);

        return $row;
    }

    public function product_modify_insert()
    {
        $sql = "update IN_PRODUCT set ";

        foreach ($_POST as $k => $v)
        {
            $sql .= "$k = '$v' ,";
        }

        $sql .= "ModifyDate = '".$this->toDay."' where Idxno = '".$_POST['Idxno']."'";
        $result = mysql_query($sql,$this->connect);

        if ( !$result ) {
            return false;
        } else {
            return true;
        }
    }

    public function product_write()
    {
        $data = $this->postData;

        $sql['key'] = "select ProductKey from IN_PRODUCT where ProductKey = '".$this->postData['ProductKey']."'";
        $result['key'] = mysql_query($sql['key'],$this->connect);
        $cnt['key'] = mysql_result($result['key'],0,0);

        $sql['in'] = "insert into IN_PRODUCT ";
        $sql['in'] .= "(ProductName,ProductOffice, EstimateDate, ProductCost, Comment, ProductKey, Sta, CreateDate) values ";
        $sql['in'] .= "('".$data['ProductName']."','".$data['ProductOffice']."','".$data['EstimateDate']."','".$data['ProductCost']."','".$data['Comment']."','".$data['ProductKey']."','".$data['Sta']."','".$this->toDay."')";

        if ( $cnt['key'] >= 1 ) {
            return 2;
        } else {

            if ( ! $result['in'] = mysql_query($sql['in'],$this->connect) )
            {
                return false;
            } else {
                return true;
            }

        }
    }

    public function product_del($idx)
    {
        $sql = "delete from IN_PRODUCT where Idxno = '".$idx."'";
        $result = mysql_query($sql,$this->connect);

        if ( ! $result ) {
            return false;
        } else {
            return true;
        }
    }

    public function companyView($data,$index)
    {

        $sql = "select * from IN_COMPANY";
        $result = mysql_query($sql,$this->connect);
        $info = mysql_fetch_assoc($result);

        $query = $sql;
        $query .= " where ";

        $cnt = 0;

        if ( $index == '') {
            foreach ( $info as $k => $v )
            {
                if($cnt == count($info) - 1) {
                    $query .= $k." like '%".$data."%' ";
                    continue;
                }
                $query .= $k." like '%".$data."%' or ";

                $cnt++;
            }
        }


        else if ( $index != '' ) {
            $query .= " Idxno = '".$index."'";
        }

        $infoResult = mysql_query($query,$this->connect);



        return $infoResult;
    }

    public function company_register()
    {
        $sql = "insert into IN_COMPANY (";

        foreach ( $_POST as $key => $val )
        {
            $sql .= $key.", ";
        }

        $sql .= "CreateDate ) values (";

        foreach ( $_POST as $k => $v )
        {
            $sql .= "'".$v."',";
        }

        $sql .= " '".$this->toDay."')";
        $result = mysql_query($sql,$this->connect);

        if ( ! $result )
        {
            print "데이터 전송에 문제가있습니다...<br>";
            print $sql;

            return false;
        } else {
            return true;
        }
    }

    public function company_modify_view($Idxno)
    {
        $sql = "select * from IN_COMPANY where Idxno = '".$Idxno."'";
        $result = mysql_query($sql,$this->connect);

        $row = mysql_fetch_assoc($result);


        return $row;
    }

    public function company_modify_insert()
    {
        $sql = "update IN_COMPANY set ";

        foreach ($this->postData as $k => $v)
        {
            if ($k == 'Idxno') continue;
            if ($k == 'Comment') {
                $sql .= $k." = '".$v."' ";
                continue;
            }

            $sql .= $k." = '".$v."', ";

        }

        $sql .= " where Idxno = '".$this->postData['Idxno']."'";

        $result = mysql_query($sql,$this->connect);

        if ( ! $result ) {
            return $sql;
        } else {
            echo ("<script>alert('성공적으로 수정되었습니다.');</script>");
            return true;
        }
    }

    public function company_del($Idxno)
    {
        $sql = "delete from IN_COMPANY where Idxno='".$Idxno."'";
        $result = mysql_query($sql,$this->connect);

        if ( $result )
        {
            return true;
        } else {
            return false;
        }
    }
}
?>