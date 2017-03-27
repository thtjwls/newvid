<div class="editor_wrap">
<form action="" method="post">
	<h3 class="page-title">
		자유게시판
	</h3>
	<label for="subject">		
		<input type="text" name="" placeholder="제목을 입력하세요.">
	</label>

	<div class="ckeditr_division">
		<textarea class="ckeditor" id="editor1" rows="100" cols="50"></textarea>	
	</div>	
	<input type="button" name="" class="btn back" value="목록"/>
	<input type="submit" name="" class="btn" value="저장">
	<!-- hidden field -->
	<input type="hidden" name="ck_mod" value="<?=$mod?>"/>
	<input type="hidden" name="ck_category" value="<?=$category?>"/>
	
</form>	
	<!-- ckeditor script -->
	<script src="/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script type="text/javascript">
		CKEDITOR.replace( 'editor1', {    	
	    	customConfig: '/ckeditor/config.js'
		});

		/* ckeditor save */
		function onSave()
		{
			
		}
	</script>
</div>