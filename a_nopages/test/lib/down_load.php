<? include "../db/dbconnect.php"; ?>
<?
	$filename	= $_REQUEST[filename];
	$downpath	= "../file/".$filename; //다운로드 받을 파일경로
	$filetmp	= substr($filename,15);	//파일명 저장의 _를 제거
	$downfile	= substr($filetmp,0);




	header("content-type: file/unknown");
	header("content-disposition: attachment; filename=". $downfile);
	header("content-length:".filesize($downpath));
	header("content-transfer-encoding: binary");
	header("pragma: no-cache");
	header("expires: 0");
	flush();


	if ($fp = fopen("$downpath","r"))
	{
		print fread($fp, filesize("$downpath"));
	}
	fclose($fp);


echo "filename : " .$filename;
echo "<br>";
echo "downpath : " .$downpath;
echo "<br>";
echo "filetmp : " .$filetmp;
echo "<br>";
echo "downfile : " .$downfile;
?>