<? $_GET['mod'] = isset($_GET['mod']) ? $_GET['mod'] : 'write' ?>

<div class="col-md-6 col-md-offset-3">
    <form class="form-horizontal" action="module/control/Control_C.php?mod=dashboardInsert" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="da_buse">Buse</label>
            <div class="col-md-4">
                <select class="form-control" name="Buse" id="da_buse">
                    <? foreach ( $in_cms_c->buseInfo() as $k => $v ) { if($k == '') continue; ?>						
						<option value="<?=$v?>" alt='<?=$v?>'><?=$v?></option>
					<? } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="da_name">Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="da_name" name="Name" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="da_name">Desktop</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="da_desktop" name="Desktop" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="da_notebook">Notebook</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="da_notebook" name="Notebook" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="da_moniter">Moniter</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="da_moniter" name="Moniter" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="da_keyboard">Keyboard</label>
            <div class="col-sm-2">
                <input class="form-control" type="number" value="0" id="da_keyboard" name="Keyboard" required max="10" min="0">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="da_mouse">Mouse</label>
            <div class="col-sm-2">
                <input class="form-control" type="number" value="0" id="da_mouse" name="Mouse" required max="10" min="0">
            </div>
        </div>
		<div class="form-group">
            <label class="col-sm-2 control-label" for="da_comment">Comment</label>
            <div class="col-sm-10">
                <textarea name="Comment" id="da_comment" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="btn-group form-group col-md-offset-3 pull-right" role="group">
            <input type="submit" value="Submit" class="btn btn-primary" />
            <input type="button" value="Reset" class="btn btn-default" />
        </div>
    </form>
</div>