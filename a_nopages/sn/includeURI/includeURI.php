<?

$ROOT_PATH = "sn";
$INCLUDE_PATH = "php/class";

$dir = $_SERVER["DOCUMENT_ROOT"]."/".$ROOT_PATH."/".$INCLUDE_PATH;


$cnt = 0;

$dir_handle=opendir($dir);

while(($file=readdir($dir_handle)) !== false)
{
    $fname = $file;

    if($fname == "." || $fname == "..") {
		continue;
	}
    //print ($fname."<br>");    
    include_once($dir."/".$fname);    

	$cnt++;
}

closedir();
?>