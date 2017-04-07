<? $_GET['mod'] = isset($_GET['mod']) ? $_GET['mod'] : 'write' ?>
<?$arr = $control->product_modify($_GET['Idxno']);?>
<div class="col-md-6 col-md-offset-3 productWrap">
    <h3 class="text-primary">Product Modify</h3>
    <form class="form-horizontal" action="module/control/Control_C.php?mod=product_modify" method="POST">        
        <div class="form-group">
            <label class="col-sm-2 control-label" for="ProductName">ProductName</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="ProductName" name="ProductName" value="<?=$arr['ProductName']?>" required />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="ProductOffice">ProductOffice</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="ProductOffice" name="ProductOffice" value="<?=$arr['ProductOffice']?>" required />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="EstimateDate">EstimateDate</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="EstimateDate" name="EstimateDate" value="<?=$arr['EstimateDate']?>" required />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="ProductCost">ProductCost</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" id="ProductCost" name="ProductCost" value="<?=$arr['ProductCost']?>" required />                
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="ProductKey">ProductKey</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="<?=$arr['ProductKey'];?>" id="ProductKey" name="ProductKey" required/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="Sta">Sta</label>
            <div class="col-sm-2">
                <select name="Sta" id="Sta" class="form-control">
                    <option value="0">견적중</option>
                    <option value="1">기안완료</option>
                    <option value="2">결제완료</option>
                    <option value="3">입고완료</option>
                    <option value="4">결제거부</option>
                    <option value="5">재검토요청</option>
                    <option value="6">분배완료</option>
                    <option value="7">폐기</option>             
                </select>
            </div>
        </div>
		<div class="form-group">
            <label class="col-sm-2 control-label" for="da_comment">Comment</label>
            <div class="col-sm-10">
                <textarea name="Comment" id="da_comment" rows="10" class="form-control"><?=$arr['Comment']?></textarea>
            </div>
        </div>
        <div class="btn-group form-group col-md-offset-3 pull-right" role="group">
            <input type="submit" value="Submit" class="btn btn-primary" />
            <input type="button" value="Reset" class="btn btn-default" />
        </div>
        <input type="hidden" value="<?=$_GET['Idxno'];?>" name="Idxno"/>
    </form>
</div>
<script src="js/product.js"></script>
<script>
    $(function () {
        $("#Sta > option[value=" + <?=$arr['Sta']?> + "]").attr("selected", true);
    })    
</script>