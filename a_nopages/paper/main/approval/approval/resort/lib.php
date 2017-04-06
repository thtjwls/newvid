<?
$ver = "2.6";
$buildno = "20010610";

$db_dir = "db";
$skin_dir = "skin";
$db_file = "dbf.cgi";  // db file : ID.db.cgi
$index_db_file = "$db_dir/index_db.cgi";
$deleted_id = "*deleted*";
$basic_value = "12";  // 
$log_dir = "log"; //통계 경로
$unique_var = "_szmania"; //체크박스용 변수처리
$config_dir ="config";
$backup_dir ="backup";
$help_dir = "help";
$upload_dir = "upload";

$log_usr_dir = "log_usr";
$max_life_time = "60"; //분
$password_input = 0; //1:게시판 연동시 비밀번호 입력되게 함  0: 입력안됨

$home_button = 0; // 1 : 홈버튼   0 : 창닫기 버튼


if(file_exists("config/config.cgi")){
	$config = file("config/config.cgi");
	$data = explode("|",$config[0]);

	$admin_mail = $data[0] ;
	$home = $data[1] ;
	$mailtoadmin = $data[2] ;
	$modify_mailtoadmin = $data[3] ;
	$member = $data[4] ;
	$admin_id = $data[5];

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
	$button_style = stripslashes($data[32]);
	$input_style = stripslashes($data[33]);
	$login_message = $data[34] ;
	$name_color = $data[35] ;

	$level_count = $data[36] ;
	$message_use = $data[37] ;
	$message_url = $data[38] ;
	$mail_gradeup = $data[39] ;
	$mail_upgrade_level = $data[40] ;
	$join_after = $data[41] ;
	$join_after_url = $data[42] ;
	$login_check_time = $data[43] ;

	$output_screen = $data[44];
	$confirm_field = $data[45];

	$email_check = $data[46];
	$quit_mailtoadmin = $data[47];

	$id_chr_min = $data[48];
	$id_chr_max = $data[49];

	$name_chr_min = $data[50];
	$name_chr_max = $data[51];

	$id_chr_eng_only = $data[52];

//	$backup_cycle = $data[53];
	
	$mailling_join_use = $data[53];

	$window_width = $data[54];
	$window_height = $data[55];


	$point_use = $data[56];
	$initial_point = $data[57];
	$login_point = $data[58];

	$big_small = $data[59]; //대문자소문자   0 : 대소문자구별 1: 소문자만 2: 대문자만
	$search_num = $data[60];

	$log_use = $data[61];

	$deco_h = $data[62];
	$deco_f = $data[63];

	$join_header = "$SZmember_dir/$config_dir/header.html" ; //회원가입폼 헤더
	$join_footer = "$SZmember_dir/$config_dir/footer.html" ; //회원가입폼 푸터

	$modify_header = "$SZmember_dir/$config_dir/modify_header.html"; //정보수정폼 헤더
	$modify_footer = "$SZmember_dir/$config_dir/modify_footer.html"; //정보수정폼 푸터

	//$style = "$SZmember_dir/$config_dir/style.html";
}



if(file_exists("$SZmember_dir/$config_dir/input_config.cgi")){
	
	$input_config = file("$SZmember_dir/$config_dir/input_config.cgi");
	
	for($i=0 ; $i< $input_num ;$i++){
		
		$j = $i + 1;
		
		$data = explode("|",$input_config[$i]);
		$field[$j]=$data[0];
		$field_name[$j]=$data[1];
		$field_maxwidth[$j]=$data[2];
		$field_size[$j]=$data[3];
		$field_necessity[$j]=$data[4];
		
		$field_comment[$j]=stripslashes($data[5]);
		$input_option[$j]=stripslashes($data[6]);
		$input_type[$j]=$data[7];
		$input_content[$j]=$data[8];
		$member_list[$j]=$data[9];
		$list_field[$j]=$data[10];
		$list_table_width[$j]=$data[11];
		$overlap_check[$j]=$data[12];
		$not_modify[$j]=$data[13];
		$initial_value[$j]=stripslashes($data[14]);
		$auto_hide_value[$j]=$data[15];
		$regular_ex[$j]=stripslashes($data[16]);
		$regular_ex[$i] = eregi_replace("&#124;","|",$regular_ex[$i]);
	}
}

if(file_exists("$SZmember_dir/$config_dir/mail_config.cgi")){
	$temp2 = file("$SZmember_dir/$config_dir/mail_config.cgi");
	$temp3 =explode("|",$temp2[0]);
	$join_mail_type = $temp3[0];
	$grade_move_mail_type = $temp3[1];
	$gradeup_mail_type = $temp3[2];
}
		
if(file_exists("$SZmember_dir/$config_dir/level_config.cgi")){
	$temp_level_config = file("$SZmember_dir/$config_dir/level_config.cgi");
	$temp2_level_config = explode("|",$temp_level_config[0]);
	$Admin_level = $temp2_level_config[0];
	for($i=0;$i<$level_count;$i++){
		$level_idx=$i+1;
		$Member_level[$i] = $temp2_level_config[$level_idx];
	}

}

if(file_exists("$SZmember_dir/$config_dir/config_filter.cgi")){
	$temp_filter = file("$SZmember_dir/$config_dir/config_filter.cgi");
	$filter = explode("|",$temp_filter[0]);
}

if($include) {return 1;} // include 가 중복으로 이루워졌을때 함수중복선언에러 안나게..^^  include중지시키기
else {$include=1;}

function get_time(){
	$s = microtime();
	$s2 = explode(" ",$s);
	$t = $s2[0] + $s2[1];
	return $t;
}

function loading_time($s){
	
	$e = get_time();
	$t = $e - $s;
	echo "<!-- cpu time : $t -->";

}


function location($url){
	echo "<meta http-equiv=\"refresh\" content=\"0; url=$url\">";
	exit;
}


function mail2($to,$subject,$mail_content,$from,$type){
	
	$mailheaders .= "Return-Path: $from\r\n";
	$mailheaders .= "From: $from \r\n";
	$mailheaders .= "X-Mailer: SZmember mailer\r\n";
	$mail_content  = stripslashes($mail_content);

	if($type == 0 ){
		$mailheaders .= "Content-Type: text/plain; charset=EUC-KR\r\n";
	} elseif($type == 1 ){
		$mailheaders .= "Content-Type: text/html; charset=EUC-KR\r\n";
	} elseif($type == 2 ){
		$mailheaders .= "Content-Type: text/html; charset=EUC-KR\r\n"; 	
		$mail_content  = nl2br($mail_content);	
	} else {
		echo "<script>window.alert('메일형식을 지정하세요')</script>";
		exit;
	}
	
	mail($to,$subject,$mail_content,$mailheaders);
}


//textarea 에서..파일에 읽을때
function textarea_read($file){
	
	global $config_dir;
	$fp=fopen("$config_dir/$file","r");
	$content = fread($fp,filesize("$config_dir/$file"));
	$content = htmlspecialchars($content);
	
	return $content;
}

function read2($file){
	
	global $config_dir;
	$fp=fopen("$config_dir/$file","r");
	$content = fread($fp,filesize("$config_dir/$file"));

	return $content;
}


//textarea 에서 파일에 쓸때
function textarea_write($file,$var){
	
	global $config_dir;
	$fp = fopen("$config_dir/$file","w");
	flock($fp,2);
	$var=stripslashes($var);
	$var=trim($var);
	fwrite($fp,$var);
	fclose($fp);
}



// 주민등록번호 유효성 검사: 올바른 경우 true, 틀린 경우 false 반환 
function check_jumin($resno) { 

  // 형태 검사: 총 13자리의 숫자, 7번째는 1..4의 값을 가짐 
  if (!ereg('^[[:digit:]]{6}[1-4][[:digit:]]{6}$', $resno)) 
    return false; 

  // 날짜 유효성 검사 
  $birthYear = ('2' >= $resno[6]) ? '19' : '20'; 
  $birthYear += substr($resno, 0, 2); 
  $birthMonth = substr($resno, 2, 2); 
  $birthDate = substr($resno, 4, 2); 
  if (!checkdate($birthMonth, $birthDate, $birthYear)) 
    return false; 

  // Checksum 코드의 유효성 검사 
  for ($i = 0; $i < 13; $i++) $buf[$i] = (int) $resno[$i]; 
  $multipliers = array(2,3,4,5,6,7,8,9,2,3,4,5); 
  for ($i = $sum = 0; $i < 12; $i++) $sum += ($buf[$i] *= $multipliers[$i]); 
  if ((11 - ($sum % 11)) % 10 != $buf[12]) 
    return false; 

  // 모든 검사를 통과하면 유효한 주민등록번호임 
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

function error_back($msg){
	echo"
		<script>
		window.alert('$msg');
		history.go(-1);
		</script>
		";
	exit;
}

function error_close($msg){
	echo"
		<script>
		window.alert('$msg');
		window.close();
		</script>
		";
	exit;
}


	
function Message($title,$content){
	
	global $home,$home_button;
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
      <div align=center>";
	
	if($home_button==1){
		echo "<input type=button value=' HOME ' style=' border:1 solid black;height:18; color:white;background-color:black' onclick=\"window.location.href='$home';\">";
	} else {
		echo "<input type=button value=' CLOSE ' style=' border:1 solid black;height:18; color:white;background-color:black' onclick='window.close()'>";
	}
			
	 
	echo "   
	  </div>
      </td>
      </tr>
      </table>
      </div>";

exit;
}

function filter_check($flag,$filter_file,$field,$field_name){
	global $config_dir;
	if($flag==1 && file_exists("$config_dir/$filter_file")){
		if(filesize("$config_dir/$filter_file") !=0 ) {

			$f = file("$config_dir/$filter_file");
			for($i=0;$i<count($f);$i++){
				$f[$i]=chop($f[$i]);
				if($f[$i]==$field_name ) Error("사용할 수 없는 $field 입니다.");
			}
		}
	}
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
 //if( eregi("([a-z0-9\_\-\.]+)@([a-z0-9\_\-\.]+)", $str) )return 0;
 if( eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$", $str) )return 0;
 else return 1;
}


function lock($fn){
	$check_time = 60;
	$i = 0;
	while ($i<$check_time){
		if (file_exists("$fn.lck")) {
			$i++;
			sleep(1);

		} else {
			break;
		}
	}
             
	if(!$fp = @fopen("$fn.lck","a")) return 1;
	flock($fp,2);
	fwrite($fp," ");
	flock($fp,3);
	fclose($fp);
}

function unlock($fn){
        if(!@unlink("$fn.lck")) return 1;
}


function db_read($f){

	if(file_exists("$f")){
		$fp=fopen("$f","r");
		$content = fread($fp,filesize("$f"));
		fclose($fp);
		return $content;
	} else {
		return 0;
	}
}


function member_total_count(){
	global $db_file,$db_dir;
	$member_count=0;

	$handle = opendir($db_dir);
	while ($file = readdir($handle)){
		$str = substr($file,strlen($file)-strlen($db_file),strlen($db_file));
		if($db_file==$str) $member_count++;
	}
	closedir($handle);
	return $member_count;
}




function SZ_session_gc(){

	global $SZmember_dir,$log_usr_dir,$max_life_time;
	
	if(empty($SZmember_dir)) $SZmember_dir = ".";

	$current_time = time();
	$handle=opendir("$SZmember_dir/$log_usr_dir");
	while ($file = readdir($handle)) {
		if(($file != ".") && ($file != "..") && ($file != "index.html")){
			$f_m_t=filemtime("$SZmember_dir/$log_usr_dir/$file");
			if(($current_time-$f_m_t)>($max_life_time*60)) unlink("$SZmember_dir/$log_usr_dir/$file");
		}
	}
	closedir($handle);

	return 1;

}

function SZ_session_reg(){

	global $id,$password,$crypt_password,$REMOTE_ADDR;
	global $SZmember_dir,$log_usr_dir,$password_input;

	if(empty($SZmember_dir)) $SZmember_dir=".";
	umask(000);
	$current_time = time();

	$SID = md5($id.$crypt_password);

	$fp = fopen("$SZmember_dir/$log_usr_dir/$SID.cgi","w");
	flock($fp,2);

	if($password_input==1) {
		$login_data = $id."|".$password."|".$current_time."|".$REMOTE_ADDR."|".$crypt_password."|";
	} else {
		$login_data = $id."||".$current_time."|".$REMOTE_ADDR."|".$crypt_password."|";
	}

	fwrite($fp,$login_data);
	fclose($fp);

	setcookie("SZ_member",$SID,"","/");
	
	SZ_session_gc();

	clearstatcache();
	return 1;
}

function SZ_session_unreg(){
	global $SZmember_dir,$log_usr_dir,$password_input,$HTTP_COOKIE_VARS;

	if(empty($SZmember_dir)) $SZmember_dir=".";

	$SID = $HTTP_COOKIE_VARS["SZ_member"];
	if(!empty($SID) && is_file("$SZmember_dir/$log_usr_dir/$SID.cgi")) unlink("$SZmember_dir/$log_usr_dir/$SID.cgi");

	setcookie("SZ_member","","","/");
	SZ_session_gc();
	clearstatcache();
	return 1;
}

function SZ_session_update($var){
	$data = db_read($var);
	$fp=fopen($var,w);
	flock($fp,2);
	fwrite($fp,$data);
	fclose($fp);
	
	return 1;
}

function login_info(){

	global $HTTP_COOKIE_VARS,$db_dir,$db_file,$SZmember_dir,$log_usr_dir;
	
	if(empty($SZmember_dir)) $SZmember_dir = ".";


	$SID = $HTTP_COOKIE_VARS["SZ_member"];
	$login_info = explode("|",db_read("$SZmember_dir/$log_usr_dir/$SID.cgi"));
	$info = explode("|",db_read("$SZmember_dir/$db_dir/$login_info[0].$db_file"));

	return $info;

}


//로그인했을경우 1을 리턴
function member_check(){
	global $HTTP_COOKIE_VARS,$db_dir,$db_file,$SZmember_dir,$log_usr_dir,$REMOTE_ADDR,$max_life_time;
	
	if(empty($SZmember_dir)) $SZmember_dir = ".";

	$SID=$HTTP_COOKIE_VARS["SZ_member"];
	if(empty($SID)){
		return 0;
	} else {
		//세션 체크..
		if(is_file("$SZmember_dir/$log_usr_dir/$SID.cgi")){
			$login_info = explode("|",db_read("$SZmember_dir/$log_usr_dir/$SID.cgi"));
			$info = explode("|",db_read("$SZmember_dir/$db_dir/$login_info[0].$db_file"));
			if($login_info[3]!=$REMOTE_ADDR || $login_info[4]!=$info[1] ){
				unlink("$SZmember_dir/$log_usr_dir/$SID.cgi");
				setcookie("SZ_member","","","/");
				return 0;
			} elseif($info[5]>0){
				setcookie("SZ_member","$SID","","/");
				SZ_session_update("$SZmember_dir/$log_usr_dir/$SID.cgi");
				return 1;
			} else {
				unlink("$SZmember_dir/$log_usr_dir/$SID.cgi");
				setcookie("SZ_member","","","/");
				return 0;
			}
		} else {
			setcookie("SZ_member","","","/");
			return 0;
		}
		//세션체크 끝..
	}
}


//관리자가 아니면 1 리턴
function admin_check(){
	
	global $HTTP_COOKIE_VARS,$admin_id,$db_file,$db_dir,$log_usr_dir,$SZmember_dir;
	
	if(!member_check()) return 1;
	
	if(empty($SZmember_dir)) $SZmember_dir=".";

	$SID=$HTTP_COOKIE_VARS["SZ_member"];
		
	if(is_file("$SZmember_dir/$log_usr_dir/$SID.cgi")){
		$login_info = explode("|",db_read("$SZmember_dir/$log_usr_dir/$SID.cgi"));
		$info = explode("|",db_read("$SZmember_dir/$db_dir/$login_info[0].$db_file"));

		if(($login_info[0]==$admin_id) && ($info[5]==100)){
			setcookie("SZ_member","$SID","","/");
			SZ_session_update("$SZmember_dir/$log_usr_dir/$SID.cgi");
			return 0;
		} else {
			return 1;
		}
	} else {
		return 1;
	}
	
}


function check_member($grade){
	global $HTTP_COOKIE_VARS,$db_dir,$db_file,$SZmember_dir,$log_usr_dir,$REMOTE_ADDR;
	
	if(empty($SZmember_dir)) $SZmember_dir = ".";

	$SID=$HTTP_COOKIE_VARS["SZ_member"];

	if(empty($SID)){
		return 0;
	} else {
		//세션 체크..
		if(is_file("$SZmember_dir/$log_usr_dir/$SID.cgi")){
			$login_info = explode("|",db_read("$SZmember_dir/$log_usr_dir/$SID.cgi"));
			$info = explode("|",db_read("$SZmember_dir/$db_dir/$login_info[0].$db_file"));
			if($login_info[3]!=$REMOTE_ADDR || $login_info[4]!=$info[1] ){
				unlink("$SZmember_dir/$log_usr_dir/$SID.cgi");
				setcookie("SZ_member","","","/");
				return 0;
			} elseif($info[5]>=$grade){
				setcookie("SZ_member","$SID","","/");
				SZ_session_update("$SZmember_dir/$log_usr_dir/$SID.cgi");
				return $info[5]; //로그인했을경우 해당 회원의 등급 리턴
			} else {
				return -1;
			}
		} else {
			setcookie("SZ_member","","","/");
			return 0;
		}
		//세션체크 끝..
	}
}


function check_member_only($grade){
	global $HTTP_COOKIE_VARS,$db_dir,$db_file,$SZmember_dir,$log_usr_dir,$REMOTE_ADDR;
	
	if(empty($SZmember_dir)) $SZmember_dir = ".";

	$SID=$HTTP_COOKIE_VARS["SZ_member"];
	if(empty($SID)){
		return 0;
	} else {
		//세션 체크..
		if(is_file("$SZmember_dir/$log_usr_dir/$SID.cgi")){
			$login_info = explode("|",db_read("$SZmember_dir/$log_usr_dir/$SID.cgi"));
			$info = explode("|",db_read("$SZmember_dir/$db_dir/$login_info[0].$db_file"));
			if($login_info[3]!=$REMOTE_ADDR || $login_info[4]!=$info[1] ){
				unlink("$SZmember_dir/$log_usr_dir/$SID.cgi");
				setcookie("SZ_member","","","/");
				return 0;
			} elseif($info[5]==$grade || $info[5]==100){
				setcookie("SZ_member","$SID","","/");
				SZ_session_update("$SZmember_dir/$log_usr_dir/$SID.cgi");
				return $info[5];
			} else {
				return -1;
			}
		} else {
			setcookie("SZ_member","","","/");
			return 0;
		}
		//세션체크 끝..
	}


}


function overlap_check($data,$s){
	
	global $db_dir,$index_db_file;
	
	$db_c = db_read($index_db_file);
	$db_size = filesize($index_db_file);
	$key_start = strpos($db_c,"|".$data."|");

	while($key_start){
		for($i=$key_start;;$i--){
			if(substr($db_c,$i,1) == "\n" || $i<=0){
				$s_pos = $i+1;
				break;
			}
		}
		for($i=$key_start;;$i++){
			if(substr($db_c,$i,1) == "\n" || $i>$db_size){
				$e_pos = $i;
				break;
			}
		}

		$s_data = substr($db_c,$s_pos,$e_pos-$s_pos);

		$x_d = explode("|",$s_data);
		if($x_d[$s]==$data) return 1; 

		$db_c = substr($db_c,$e_pos);
		$key_start = strpos($db_c,"|".$data."|");
	} 
	return 0;
}


function data_write($file,$mode,$data){
	
	lock($file);
	if(!$fp = @fopen($file,$mode)) return 1;
	flock($fp,2);
	fwrite($fp,$data);
	flock($fp,3);
	fclose($fp);
	unlock($file);

	return 0;

}


function id_delete($id){

	global $index_db_file,$deleted_id;
	$index_db = db_read($index_db_file);

	$start_id = substr($index_db,0,strlen($id));
	if($start_id==$id) {
		$move_size=0;
	} else {
		$move = explode("\n${id}|",$index_db);
		if(empty($move[1])) return 0;
		$move_size = strlen($move[0])+1;
	}

	lock($index_db_file);
	$fp = fopen($index_db_file,"r+");
	flock($fp,2);
	if(ftell($fp)!=0) fseek($fp,0);
	fseek($fp,$move_size);
	fwrite($fp,"${deleted_id}||||");
	flock($fp,3);
	fclose($fp);
	unlock($index_db_file);
	return 1;
}


function SZmember_log(){

	global $SZmember_dir,$log_dir,$id,$point_use,$log_use,$db_dir,$db_file,$login_point,$login_check_time;

	if($log_use == 0 ) return 1;
	
	if(empty($SZmember_dir)) $SZmember_dir=".";

	$log_dir = "$SZmember_dir/$log_dir";
	$db_dir = "$SZmember_dir/$db_dir";
	
		
	$current_time = time();

	$fp1 = fopen("$log_dir/$id.log.cgi","a+");
	$temp = strlen($current_time);
	fseek($fp1,ftell($fp1)-$temp-2);
	$last_log = fread($fp1,$temp);
	fclose($fp1);

	if($current_time - $last_log > $login_check_time * 60 ){
		$data = $current_time."|\n";
		$fp=fopen("$log_dir/$id.log.cgi","a");
		flock($fp,2);
		fwrite($fp,$data);
		fclose($fp);

		if($login_point>0 && $point_use==1){
			$user_db = db_read("$db_dir/$id.$db_file");
			$info = explode("|",$user_db);
			$info[8] += $login_point;
			$user_db = implode($info,"|");
			data_write("$db_dir/$id.$db_file","w",$user_db);
		}

		$fp=fopen("$log_dir/total_log.cgi","a");
		flock($fp,2);
		fwrite($fp,$data);
		fclose($fp);
	
	}
}









function szmember()
{
	global $ver,$buildno,$SERVER_SOFTWARE;
echo "\n";
echo "<!---------------------------------------------------------------------> \n";
echo "<!--          SZmember Ver $ver  Build no. $buildno                   --> \n";
echo "<!--                                                                 --> \n";
echo "<!--                   Homepage : http://szmania.net                 --> \n";
echo "<!--                     E-mail : sz@szmania.net                     --> \n";
echo "<!--                 Programmer : 한양대학교 토목환경공학과          --> \n";
echo "<!--                              SZ 권병창 (sz@szmania.net)         --> \n";
echo "<!--                                                                 --> \n";
echo "<!--        Copyright(c) 2001. SZmania all rights reserved.          --> \n";
echo "<!---------------------------------------------------------------------> \n";
echo "<!--               $SERVER_SOFTWARE                 --> \n";
echo "<!---------------------------------------------------------------------> \n";
echo "\n";
}
	
function szmember2()
{
	echo"

<a href=http://szmania.net target=_new>Copyright ⓒ 2001 SZmania All rights reserved.</a>

	";
}

?>