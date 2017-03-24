<?
class img
{
    public $path = "pdf/";
    public $file;
    public $toDay;
    public $fileCnt;

    public function __construct()
    {

    }

    function getFileCnt() { //이미지 로드를 위한 파일 카운트

        $result=opendir($this->path);

        while($file=readdir($result)) {

            if($file=="."||$file=="..") {continue;} // file명이 ".", ".." 이면 무시함
            $fileDate = substr($file,0,8);

            if($fileDate != date("Ymd")) continue; //오늘날짜의 파일이 아니면 제외

            $fileInfo = pathinfo($file);
            $fileExt = $fileInfo['extension']; // 파일의 확장자를 구함

            If (empty($fileExt)){
                $dir_count++; // 파일에 확장자가 없으면 디렉토리로 판단하여 dir_count를 증가시킴
            } else {
                $file_count++;// 파일에 확장자가 있으면 file_count를 증가시킴
            }

        }

        return $file_count;

    }

    //파일 이름 가져오기 (지금은 안씀)
    function getFileNames() {

        $results = array();
        $fileCnt = 0;

        $handler = opendir($this->path);

        while ($file = readdir($handler)) {

            if ($file != '.' && $file != '..' && is_dir($file) != '1') {

                $results[] = $file;
            }
        }

        closedir($handler);

        return $results;

    }

    //날짜 리턴
    public function getDate() {
        $daily = array("일","월","화","수","목","금","토");
        $date = date("w");
        $this->toDay = date("Y년 m월 d일 [".$daily[$date]."]");

        print $this->toDay;
    }
    //

    public function getDataSort() {
        $result = opendir($this->path);

        return $result;
    }


    //데이터를 가공 모듈
    public function getDataResult() {
        $arr = self::getDataSort();

        $dataArr = array();

        while($file=readdir($arr)) {
            $fileDate = substr($file,0,8);

            //파일명에 . 과 .. 만 있으면 제외 오늘날짜가 아닌것은 제외
            if($file=="."|| $file==".." ||$fileDate != date("Ymd")) continue;

            $file = substr($file,-10,-4);

            settype($file,int);

            array_push($dataArr,$fileDate."_".$file);
        }

        sort($dataArr);

        return $dataArr;
    }

    function nextImgView($class) { //class 변수에 이미지에 사용 될 클래스명을 써줌

        $img = self::getDataResult();
        $imgCnt = self::getFileCnt();

        $str = "";
        for($i = 0; $i < $imgCnt; $i++) {
            $paperNum = $i+1;
            $str .= "<img src='".$this->path.$img[$i].".png' alt='gisaPDF' class='$class' />";
        }
        print $str;
    }

    public function listImgView()
    {
        $img = self::getDataResult();
        $imgCnt = self::getFileCnt();

        $str = "";
        for($i = 0; $i < $imgCnt; $i++) {
            $paperNum = $i+1;
            $str .="<li>";
            $str .= "<img src='".$this->path.$img[$i].".png' alt='gisaPDF' class='$class' />";
            $str .="</li>";
        }
        //$str .= "<img src='pdf/".$img[0]."' alt='gisaPDF' class='gisaimg' />";

        print $str;
    }
}



?>