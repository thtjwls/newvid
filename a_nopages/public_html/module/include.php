<?
$filePath = $_SERVER['DOCUMENT_ROOT'].'/public_html/module/';

echo '<br>document_root : '.$_SERVER['DOCUMENT_ROOT'];
echo '<br>filePath : '.$filePath;
if ( ! is_dir($filePath) ) {
	echo '모듈 include 중 경로에 문제가 있습니다.';
} else {
	if ( $fOpen = opendir($filePath) ) 
	{
		while ( $fRead = readdir($fOpen) ) {
			
			$ext = pathinfo( $fRead, PATHINFO_EXTENSION );

			if ( $ext != 'php' ) continue;
			if ( $fRead == 'include.php' ) continue;

			echo '<br>read : '.$fRead;			
			require($filePath.$fRead);
			
		}
	}
}
?>