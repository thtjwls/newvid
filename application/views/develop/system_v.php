<div class="container">
	<h3>웹페이지 갱신하기</h3>
	<a href="javascript:ajax_website_update();">갱신</a>
</div>
<script type="text/javascript">
	function ajax_website_update()
	{
		$.ajax({
			url : "/developer/updateSite",			
			error : function (req, sta, err)
			{
				//에러처리
				console.log("err... : " + err);
			},
			success : function (data)
			{
				//기본
				console.log("finish!!! : " + data);
			},
			beforeSend : function (data)
			{
				//시작
				console.log("통신시작 : " + data);
			},
			complete : function (data)
			{
				//완료
				console.log("통신완료 : " + data);
			}
		});
	}
</script>