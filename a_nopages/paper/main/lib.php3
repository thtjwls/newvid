<?

if(file_exists("config.cgi")){
$config = file("config.cgi");
$data = explode("|",$config[0]);
$admin_mail = $data[0] ;
$home = $data[1] ;
$mailtoadmin = $data[2] ;
$modify_mailtoadmin = $data[3] ;
$member = $data[4] ;
$filename = $data[5] ;
$input_num = $data[6] ;
$scale = $data[7] ;

$bgcolor = $data[8] ;
$table_bgcolor = $data[9] ;

$cellspacing = $data[10] ;
$cellpadding = $data[11] ;

$content_width = $data[12] ;
$content_bgcolor = $data[13] ;

$menu_width = $data[14] ;
$menu_bgcolor = $data[15] ;
$menu_align = $data[16] ;

$table_width = $data[17] ;

$font_color = $data[18] ;

$mailtouser = $data[19] ;
$modify_grade_mailtouser = $data[20] ;

$target = $data[21] ;


$login_return_url = $data[22] ;
$logout_return_url = $data[23] ;
$login_bgcolor = $data[24] ;
$letter_color = $data[25] ;
$id_name = $data[26] ;
$pass_name = $data[27] ;
$login_name = $data[28] ;
$logout_name = $data[29] ;
$join_name = $data[30] ;
$modify_name = $data[31] ;
$button_style = $data[32] ;
$input_style = $data[33] ;
$login_message = $data[34] ;
$name_color = $data[35] ;
$filename2  = $data[36] ;
$input_num = $data[37] ;

$join_header = "header.html" ; //회원가입폼 헤더
$join_footer = "footer.html" ; //회원가입폼 푸터

$modify_header = "modify_header.html"; //정보수정폼 헤더
$modify_footer = "modify_footer.html"; //정보수정폼 푸터

}


if(file_exists("input_config.cgi")){
	
	$input_config = file("input_config.cgi");
	
	for($i=0 ; $i< $input_num ;$i++){
		
		$j = $i + 1;
		
		$data = explode("|",$input_config[$i]);
		$field[$j]=$data[0];
		$field_name[$j]=$data[1];
		$field_maxwidth[$j]=$data[2];
		$field_size[$j]=$data[3];
		$field_necessity[$j]=$data[4];
		
		$field_comment[$j]=$data[5];
		$input_option[$j]=$data[6];
		$input_type[$j]=$data[7];
		$input_content[$j]=$data[8];
	}
}
		


$grade[0]="Guest";
$grade[1]="Member1";
$grade[2]="Member2";

//주민번호 체크

function check_jumin($jumin)
{
	$weight = '234567892345'; // 자리수 weight 지정
	$len = strlen($jumin);
	$sum = 0;

	if ($len <> 13) { return false; }

	for ($i = 0; $i < 12; $i++) {
		$sum = $sum + (substr($jumin,$i,1)*substr($weight,$i,1));
	}

	$rst = $sum%11;
	$result = 11 - $rst;

	if ($result == 10) {$result = 0;}
	else if ($result == 11) {$result = 1;}

	$ju13 = substr($jumin,12,1);

	if ($result <> $ju13) {return false;}
	return true;
}



// 2000/01/03 날짜 체크.. 조 형태가 아니면 1을 리턴.
function check_2($str){
	
	if(eregi("([0-9]{4})/([0-9]{2})/([0-9]{2})",$str)) return 0;
	return 1;
}

// 99/01/03 체크
function check_3($str){
	
	if(eregi("([0-9]{2})/([0-9]{2})/([0-9]{2})",$str)) return 0;
	return 1;
}

// 2000-01-03
function check_4($str){
	
	if(eregi("([0-9]{4})-([0-9]{2})-([0-9]{2})",$str)) return 0;
	return 1;
}

// 99-01-03
function check_5($str){
	
	if(eregi("([0-9]{2})-([0-9]{2})-([0-9]{2})",$str)) return 0;
	return 1;
}

//2000.01.03
function check_6($str){
	
	if(eregi("([0-9]{4})\.([0-9]{2})\.([0-9]{2})",$str)) return 0;
	return 1;
}


//99.01.03
function check_7($str){
	
	if(eregi("([0-9]{2})\.([0-9]{2})\.([0-9]{2})",$str)) return 0;
	return 1;
}


//02-1234-1234 , 016-3234-1235
function check_8($str){
	
	if(eregi("([0-9]{2,3})-([0-9]{2,4})-([0-9]{4})",$str)) return 0;
	return 1;
}


//주민번호 123456-1234567 체크
function check_9($str){
	
	if(eregi("([0-9]{6})-([0-9]{7})",$str)) return 0;
	return 1;
}

//주민번호 123456 체크
function jumin_1($str){
	if(eregi("[0-9]{6}",$str)) return 0;
	return 1;
}

//주민번호 1234567 체크
function jumin_2($str){
	if(eregi("[0-9]{7}", $str)) return 0;
	return 1;
}

// 1-2  ~  123456789-123456789
function check_10($str){
	
	if(eregi("([0-9]{1,9})-([0-9]{1,9})",$str)) return 0;
	return 1;
}


// 1/2  ~  123456789/123456789
function check_11($str){
	
	if(eregi("([0-9]{1,9})/([0-9]{1,9})",$str)) return 0;
	return 1;
}


// 1.2  ~  123456789.123456789
function check_12($str){
	
	if(eregi("([0-9]{1,9})\.([0-9]{1,9})",$str)) return 0;
	return 1;
}

//우편번호 123 체크
function mail_no($str){
	if(eregi("([0-9]{3})", $str)) return 0;
	return 1;
}

//id체크
function ID_check($id){
	
	global $filename ;
	$temp = file($filename);

	for ($i=0 ; $i<=sizeof($temp) ; $i++){

    		$info = explode ("|",$temp[$i]);

    		if ( $info[0] == $id ) {
    			return 1;
    			break;
    		}else {
    			return 0;
		}
	}
}


//에러메세지 출력
function Error($message){
	echo"

      <br><br><br>
      <div align=center>
      <table border=0 cellpadding=3 cellspacing=1 width=300 bgcolor=black>
      <tr>
      <td bgcolor=#a2a2a2 align=center><font size=2 color=white>에러가 발생했습니다</font></td>
      </tr>
      <tr>
      <td bgcolor=white align=center>
      <br><font size=2>$message<br><br>
      <div align=center><input type=button value=' Back ' style=' border:1 solid black;height:18; color:white;background-color:black' onclick=history.back()>
      </td>
      </tr>
      </table>
      </div>";

exit;
}

	
	
function Message($title,$content){
	
	global $home;
	echo"

      <br><br><br>
      <div align=center>
      <table border=0 cellpadding=3 cellspacing=1 width=300 bgcolor=black>
      <tr>
      <td bgcolor=#a2a2a2 align=center><font size=2 color=white>$title</font></td>
      </tr>
      <tr>
      <td bgcolor=white align=center>
      <br><font size=2>$content<br><br>
      <div align=center><input type=button value=' HOME ' style=' border:1 solid black;height:18; color:white;background-color:black' onclick=\"window.location.href='$home';\">
      </td>
      </tr>
      </table>
      </div>";

exit;
}





// 빈문자열 경우 1을 리턴
function isBlank($str) {
    $temp=str_replace("\n","",$str);
    $check=0;
    for($i=0;$i<strlen($temp);$i++)
    {
     if($temp[$i]=="<") $check=1;
     if(!$check) $temp2.=$temp[$i];
     if($temp[$i]==">") $check=0;
    }
    if(eregi("[^[:space:]]",$temp2)) return 0;
    return 1;
}

// 숫자일 경우 1을 리턴
function isNum($str) {
    if(eregi("[^0-9]",$str)) return 0;
    return 1;
}

// 숫자, 영문자 일경우 1을 리턴
function isAlNum($str) {
    if(eregi("[^0-9a-zA-Z\_]",$str)) return 0;
    return 1;
}


//메일 형식이 잘못되었을 경우 1을 리턴
function isMail($str)
{
 if( eregi("([a-z0-9\_\-\.]+)@([a-z0-9\_\-\.]+)", $str) )return 0;
 else return 1;
}

function title()
{
echo "\n";
echo "<!---------------------------------------------------------------------> \n";
echo "<!--          DAJURI-Shop Ver1.0    Build no. 20010619               --> \n";
echo "<!--                                                                 --> \n";
echo "<!--                   Homepage : http://my.dreamwiz.com/yahoinfo    --> \n";
echo "<!--                     E-mail : ruler@ruler.co.kr                  --> \n";
echo "<!--                 Programmer : 삼육대학교 컴퓨터과학과            --> \n";
echo "<!--                              ovvo 김영호 (ruler@ruler.co.kr)    --> \n";
echo "<!--                                                                 --> \n";
echo "<!--        Copyright(c) 2001. DAJURI all rights reserved.          --> \n";
echo "<!---------------------------------------------------------------------> \n";
echo "\n";
}
	
function dajuri()
{
	echo"

Copyright ⓒ 2001.6 <a href=http://my.dreamwiz.com/yahoinfo target=_new>DAJURI</a> All rights reserved.

	";
}

?>
