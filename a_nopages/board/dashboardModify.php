<?
$row = $control->contentModify($_GET['Idxno']);
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form class="form-horizontal" action="module/control/Control_C.php?mod=dashboardModify&Idxno=<?=$_GET['Idxno'];?>" method="POST">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="da_buse">Buse</label>
                <div class="col-md-4">
                    <select class="form-control" name="Buse" id="da_buse">
                        <?
 foreach ( $in_cms_c->buseInfo() as $k => $v ) {
                           if($k == '') continue;
                        ?>
                        <option value="<?=$v?>" alt='<?=$v?>' <? if ($v == $row['Buse']) echo 'selected'; ?>><?=$v?></option>
                        <? } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="da_name">Name</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="da_name" name="Name" value="<?=$row['Name'];?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="da_desktop">Desktop</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="da_desktop" value="<?=$row['Desktop'];?>" name="Desktop" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="da_notebook">Notebook</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="da_notebook" value="<?=$row['Notebook'];?>" name="Notebook" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="da_moniter">Moniter</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="da_moniter" value="<?=$row['Moniter'];?>" name="Moniter" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="da_keyboard">Keyboard</label>
                <div class="col-sm-2">
                    <input class="form-control" type="number" id="da_keyboard" value="<?=$row['Keyboard'];?>" name="Keyboard" required max="10" min="0">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="da_mouse">Mouse</label>
                <div class="col-sm-2">
                    <input class="form-control" type="number" value="<?=$row['Mouse'];?>" id="da_mouse" name="Mouse" required max="10" min="0">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="da_comment">Comment</label>
                <div class="col-sm-10">
                    <textarea name="Comment" id="da_comment" rows="10" class="form-control"><?=$row['Comment'];?></textarea>
                </div>
            </div>
            <div class="btn-group form-group col-md-offset-3 pull-right" role="group">
                <input type="submit" value="Submit" class="btn btn-primary" />
                <input type="button" value="Reset" class="btn btn-default" />
            </div>
        </form>
    </div>
</div>