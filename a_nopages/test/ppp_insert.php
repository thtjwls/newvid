<meta charset="utf-8">
<?
	$sel=$_POST["sel"];

	if($sel==1){
		echo"
			남자 : 너따위 알바 없잔아.
			<script>
				var input = confirm('계속하시겠습니까?')
				if(input==true){
					location.href='http://thtjwls.dothome.co.kr/test/ppp.php';
				}else{
					alert('계속해야합니다.');
					location.href='http://thtjwls.dothome.co.kr/test/ppp.php';
				}
			</script>
		";
	}else if($sel==2){
		echo"
			남자 : 맞짱뜨자 인수로 따라와.
						<script>
				var input = confirm('계속하시겠습니까?')
				if(input==true){
					location.href='http://thtjwls.dothome.co.kr/test/ppp.php';
				}else{
					alert('계속해야합니다.');
					location.href='http://thtjwls.dothome.co.kr/test/ppp.php';
				}
			</script>
		";
	}else if($sel==3){
		echo"
			남자 : 도둑이야!!
						<script>
				var input = confirm('계속하시겠습니까?')
				if(input==true){
					location.href='http://thtjwls.dothome.co.kr/test/ppp.php';
				}else{
					alert('계속해야합니다.');
					location.href='http://thtjwls.dothome.co.kr/test/ppp.php';
				}
			</script>
		";
	}
?>