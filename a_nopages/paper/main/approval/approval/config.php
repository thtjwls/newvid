<?

$datafile="../../config/config.kim";

$fp=fopen($datafile,'r');
$data=fread($fp,filesize($datafile));
$conf=explode("|",$data);

$host				= "$conf[0]";
$user				= "$conf[1]";
$pass				= "$conf[2]";
$dbname				= "$conf[3]";
$table_name_1		= "$conf[4]";
$table_name_2		= "$conf[5]";
$limit				= "$conf[6]";
$index_url			= "$conf[7]";
$main_frame			= "$conf[8]";
$level_list			= "$conf[9]";
$level				= "$conf[10]";
$master				= "$conf[11]";
$admin_mail			= "$conf[12]";
fclose($fp);

?>
