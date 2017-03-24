<?
$control->pagingSet['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
$control->pagingSet['scale'] = isset($_GET['scale']) ? $_GET['scale'] : 10;
$control->search = isset($_GET['search']) ? $_GET['search'] : '';
$control->controlTable = 'IN_PRODUCT';
$control->dashboardView();
$control->pagingSet();
?>
<div class="row">
    <div class="col-md-1 col-md-offset-9">
        <a href="/<?=$pageKey?>/?menu=product_write" class="btn btn-block btn-default pull-right">Write</a>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <caption>
                    구매기록
                    <a href="/board/module/control/excel.php?tbl=IN_PRODUCT" class="pull-right" title="다운로드">
                        Excel
                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                    </a>
                </caption>
                <thead>
                    <tr>
                        <th>IdxNo</th>
                        <th>ProductName</th>
                        <th>ProductOffice</th>
                        <th>EstimateDate</th>
                        <th>ProductCost</th>
                        <th>ProductKey</th>                        
                        <th>CreateDate</th>
                        <th>ModifyDate</th>
                        <th>Sta</th>
                        <th>Comment</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>                
                    <?
                    while ($row = mysql_fetch_assoc($control->viewDateResult)) {
                        $row['CreateDate'] = substr($row['CreateDate'],0,10);
                        $row['ModifyDate'] = substr($row['ModifyDate'],0,10);
                        $row['ModifyDate'] = ($row['ModifyDate'] == '0000-00-00') ? '' : $row['ModifyDate'];
                        $row['ProductCost'] = number_format($row['ProductCost']);
                        $info = '';
                        switch ( $row['Sta'] ) {
                            case 0 : $row['Sta'] = '견적중'; $info = 'info'; break;
                            case 1 : $row['Sta'] = '기안완료'; $info = 'info'; break;
                            case 2 : $row['Sta'] = '결제완료'; $info = 'info'; break;
                            case 3 : $row['Sta'] = '입고완료'; $info = 'success'; break;
                            case 4 : $row['Sta'] = '결제거부'; $info = 'danger'; break;
                            case 5 : $row['Sta'] = '재검토요청'; $info = 'warning'; break;
                            case 6 : $row['Sta'] = '분배완료'; $info = 'success'; break;
                            case 7 : $row['Sta'] = '폐기'; $info = 'danger'; break;                            
                            default : break;
                        }
                    ?>
                    <tr class="<?=$info?>">
                        <td>
                            <?=$row['Idxno'];?>
                        </td>
                        <td>
                            <?=$row['ProductName'];?>
                        </td>
                        <td>
                            <?=$row['ProductOffice'];?>
                        </td>
                        <td>
                            <?=$row['EstimateDate'];?>
                        </td>
                        <td>
                            <?=$row['ProductCost'];?> 원
                        </td>
                        <td>
                            <?=$row['ProductKey'];?>
                        </td>
                        <td>
                            <?=$row['CreateDate'];?>
                        </td>
                        <td>
                            <?=$row['ModifyDate'];?>
                        </td>
                        <td>
                            <?=$row['Sta'];?>
                        </td>                        
                        <td>
                            <? if ($row['Comment'] != '') { ?>
                            <a class="btn btn-default btn-xs" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?=$row['Comment']?>">
                                Comment
                            </a>
                            <? } ?>
                        </td>                        
                        
                        <td>
                            <?=$row['LastModify'];?>
                        </td>
                        <td colspan="2">
                            <div class="btn-group btn-group-xs" role="group">
                                <a class="btn btn-success glyphicon glyphicon-cog primary primaryCustom" href="?menu=product_modify&Idxno=<?=$row['Idxno'];?>"></a>
                                <a class="btn btn-danger glyphicon glyphicon-remove dangerCustom" href="javascript:productDel(<?=$row['Idxno'];?>)"></a>
                            </div>
                        </td>
                    </tr>
                    <? } ?>
                </tbody>
            </table>
        </div>
    </div>
</div><!-- row end -->

<!-- pagination -->
<div class="row">
    <nav class="paginationNav" id="ajaxHandleNav_1">
        <ul class="pagination" id="ajaxHandleUL_1">
            <li class="<? if ($control->pagingSet['sPage'] <= 1 ) echo 'disabled'; ?>">
                <a href="?menu=<?=$_GET['menu'];?>&search=<?=$_GET['search'];?>&page=<?=$control->pagingSet['sPage'];?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <? for ( $i = $control->pagingSet['sPage']; $i < $control->pagingSet['ePage'] + 1; $i++ ) { ?>
            <li class="<? if ($i == $control->pagingSet['page']) echo 'active'; ?>">
                <a href="?menu=<?=$_GET['menu'];?>&search=<?=$_GET['search']?>&page=<?=$i;?>">
                    <?=$i?>
                </a>
            </li>
            <? } ?>
            <li class="<? if ($control->pagingSet['nPage'] <= $control->pagingSet['ePage']) echo 'disabled'; ?>">
                <a href="?menu=<?=$_GET['menu'];?>&search=<?=$_GET['search'];?>&page=<?=$control->pagingSet['ePage'];?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- pagination end -->

<!--comment modal -->
<div class="modal fade" role="dialog" aria-hidden="true" id="commentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">[Idx] [Buse] [Name]</h4>
            </div>
            <div class="modal-body">
                memp
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="js/product.js"></script>