<? if ($_GET['mod'] == 'modify') { ?>
<!-- mod insert -->
<?
       $arr = $control->company_modify_view($_GET['Idxno']);
?>

<div class="row">
    <div class="col-md-4 col-md-offset-4 productWrap">
        <h3 class="text-primary">Company Register</h3>
        <form class="form-horizontal" autocomplete="off" action="module/control/Control_C.php?mod=company_register_modify_insert" method="post">
            <div class="form-group">
                <label for="Company" class="control-label col-sm-2">상호</label>
                <div class="col-sm-10">
                    <p class="form-control-static">
                        <?=$arr['Company'];?>
                    </p>
                </div>                
            </div>
            <div class="form-group">
                <label for="CompanyNumber" class="control-label col-sm-2">사업자번호</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="CompanyNumber" name="CompanyNumber" placeholder="" value="<?=$arr['CompanyNumber']?>" />
                </div>                
            </div>
            <div class="form-group">
                <label for="CompanyCeo" class="control-label col-sm-2">대표자명</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="CompanyCeo" name="CompanyCeo" placeholder="" value="<?=$arr['CompanyCeo']?>" />
                </div>                
            </div>
            <div class="form-group">
                <label for="Tel" class="control-label col-sm-2">연락처</label>
                <div class="col-sm-10">
                    <input type="tel" value="<?=$arr['Tel']?>" class="form-control" id="Tel" name="Tel" placeholder="" />
                </div>                
            </div>
            <div class="form-group">
                <label for="Email" class="control-label col-sm-2">이메일 주소</label>
                <div class="col-sm-10">
                    <input type="email" value="<?=$arr['Email']?>" class="form-control" id="Email" name="Email" placeholder="" />
                </div>                
            </div>
            <div class="form-group">
                <label for="PostNum" class="control-label col-sm-2">우편번호</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?=$arr['PostNum']?>" id="PostNum" name="PostNum" placeholder="" onfocus="_Address();" />
                </div>                
            </div>
            <div class="form-group">
                <label for="Address" class="control-label col-sm-2">주소</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?=$arr['Address']?>" id="Address" name="Address" placeholder="" />
                </div>                
            </div>
            <div class="form-group">
                <label for="InAddress" class="control-label col-sm-2">상세주소</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="InAddress" value="<?=$arr['InAddress']?>" name="InAddress" placeholder="" />
                </div>                
            </div>
            <div class="form-group">
                <label for="Comment" class="control-label col-sm-2">메모</label>
                <div class="col-sm-10">
                    <textarea name="Comment" id="Comment" rows="8" class="form-control"><?=$arr['Comment'];?></textarea>
                </div>                
            </div>
            <div class="form-group">                
                <button type="submit" class="btn btn-default pull-right">제출</button>                
            </div>            
            <input type="hidden" value="<?=$arr['Idxno']?>" name="Idxno"/>
        </form>
    </div>
</div>


<!-- mod insert end -->
<? } else {  ?>
<!-- mod modify -->

<div class="row">
    <div class="col-md-4 col-md-offset-4 productWrap">
        <h3 class="text-primary">Company Register</h3>
        <form autocomplete="off" class="form-horizontal" action="module/control/Control_C.php?mod=company_register" method="post">
            <div class="form-group">
                <label for="Company" class="col-sm-2 control-label">상호</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Company" name="Company" placeholder="필수항목" required />
                </div>
            </div>
            <div class="form-group">
                <label for="CompanyNumber" class="col-sm-2 control-label">사업자번호</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="CompanyNumber" name="CompanyNumber" placeholder="" />
                </div>
            </div>
            <div class="form-group">
                <label for="CompanyCeo" class="col-sm-2 control-label">대표자명</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="CompanyCeo" name="CompanyCeo" placeholder="" />
                </div>
            </div>
            <div class="form-group">
                <label for="Tel" class="col-sm-2 control-label">연락처</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="Tel" name="Tel" placeholder="" />
                </div>
            </div>
            <div class="form-group">
                <label for="Email" class="col-sm-2 control-label">이메일 주소</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="Email" name="Email" placeholder="" />
                </div>
            </div>
            <div class="form-group">
                <label for="PostNum" class="col-sm-2 control-label">우편번호</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="PostNum" name="PostNum" placeholder="" onfocus="_Address();" />
                </div>
            </div>
            <div class="form-group">
                <label for="Address" class="col-sm-2 control-label">주소</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Address" name="Address" placeholder="" />
                </div>
            </div>
            <div class="form-group">
                <label for="InAddress" class="col-sm-2 control-label">상세주소</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="InAddress" name="InAddress" placeholder="" />
                </div>                
            </div>
            <div class="form-group">
                <label for="Comment" class="col-sm-2 control-label">메모</label>
                <div class="col-sm-10">
                    <textarea name="Comment" id="Comment" rows="8" class="form-control"></textarea>
                </div>                
            </div>
            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-10">
                    <button type="submit" class="btn btn-default">제출</button>
                </div>
            </div>            
        </form>
    </div>
</div>

<!-- mod modify end -->
<? } ?>
<script src="js/company.js"></script>