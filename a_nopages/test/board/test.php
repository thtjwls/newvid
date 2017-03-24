<!--
<?
	ini_set("allow_url_fopen","1");  //원격 이미지 경로 on

	echo "document_root :" .$_SERVER['DOCUMENT_ROOT'];
	$path ="../img/";
	echo("<br>");
	//$localpath=$_SERVER['DOCUMENT_ROOT'];
	
	
	$image=getimagesize("../img/99999.jpg");
	$imgwidth=$image[0];
	$imgheight=$image[1];
	$view="99999.jpg";


	print_r($image);
	echo "<br>";
	echo "path :" .$path;
	echo "<br>";

	if($imgwidth > 500) {
		$imgwidth = 500;
	}

	/*
		getimagesize(상대경로/파일이름)
	*/

	echo "view : " .$view;
?>
-->
<!--
<!DOCTYPE HTML>
<html lang="ko">
	<head>
		<meta charset="utf-8">

	</head>
	<body>
		<img src="<?=$path.$view?>" width="<?=$imgwidth?>"><br>
		width : <?=$imgwidth?><br>
		height :<?=$imgheight?>
		<?
			//include "../ppp.php";
		?>
	</body>
</html>
-->


<?
	$total = 3;
	$page =1;
	$scale=10;
	//$number = $total-$scale*($page-1);
	$number = 1;
	for($i = $number; $i<=$total && $i >=0; $i++){
		echo "number :" .$number;
		echo "<br>";
		echo "total :" .$total;
		echo "<br>";
		echo "scale :" .$scale;
		echo "<br>";
		echo "page :" .$page;
		echo "<br>";
		echo "i :" .$i;
		echo "<br>";
	}
?>
