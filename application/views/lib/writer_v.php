<style type="text/css">
	
</style>
<div class="editor_wrap">
	<h3 class="page-title">
		자유게시판
	</h3>
	<label for="subject">		
		<input type="text" name="" placeholder="제목을 입력하세요.">
	</label>

	<div class="ckeditr_division">
		<textarea class="ckeditor" id="editor1" rows="100" cols="50"></textarea>	
	</div>	
	<input type="submit" name="" class="submit-btn" value="저장">
	<!-- ckeditor script -->
	<script src="/ckeditor/ckeditor.js?v=<?=date('ymdhis');?>" type="text/javascript"></script>
	<script type="text/javascript">
		CKEDITOR.replace( 'editor1', {    	
	    	customConfig: '/ckeditor/config.js'
		});
	</script>
</div>