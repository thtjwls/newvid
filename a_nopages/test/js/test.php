<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>Document</title>
  <script>
	function test(){
		var hidden = document.getElementById("hidttt").value;
		var ppp	= document.getElementById("text1").value;

		location.href="test.php?mod="+hidden+"&ppp="+ppp;
	}
  </script>
 </head>
 <body>
 <? 
	$mod=$_GET["mod"];
	$yy	=$_GET["ppp"];

	echo "mod :" .$mod;
	echo "yy :" .$yy;
 ?>
  <form action="test.php" method="post">
	<p name="text" id="text1" value="22">11</p>
	<input type="button" value="btn" onclick="test();">
	<input type="hidden" value="ttt" id="hidttt">
  </form>
 </body>
</html>
