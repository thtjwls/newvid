<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>
</title>  
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</script>  
<script>  
function t1(){       
	alert(document.getElementById("txt").value);  
}  
function t2(){       
	alert($("#txt").val());  
	}  
	</script>  </head>  <body>  <input type="hidden" id="txt" value="123">        <input type="button" value="자바스크립트ID접근" onclick="t1();">    <input type="button" value="제이쿼리ID접근" onclick="t2();">  </body>  </html>  