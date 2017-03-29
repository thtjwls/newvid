<div class="path_info clearfix">
	<h2>
		<?=$cate[1]?>
	</h2>
	<ol class="path_detail">			
		<li>
			<a href="/">
				<i class="fa fa-home"></i>
			</a>
		</li>
		<? foreach ( $cate as $k) {?>
		<li>
			<a href="javascript:void(0);"><?=$k?></a>
		</li>			
		<? } ?>		
	</ol>
</div>	