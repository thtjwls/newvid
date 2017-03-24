<?SESSION_START();
require_once('module/import.php');
$pageKey = 'board'; //루트페이지 설정
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title>ERP System</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.ico" rel="shortcut icon" />
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- JQUERY UI -->
    <script src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.min.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- Custom -->
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/main.css" />
    <!--다음 주소 api-->
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
</head>
<body>
    <? 
    if ( ! isset($_SESSION['useridx'])) {
        header("Location:http://www.sindy.co.kr/board/login.php");
    }
    $_GET['menu'] = isset($_GET['menu']) ? $_GET['menu'] : 'dashboard';
    ?>
    <script>
        $(function () {
            $(".<?=$_GET['menu']?>List").addClass("active");
        });

        function search()
        {
            var searchStr = $("#headerSearch").val();

            window.location.href = "/board/?menu=<?=$_GET['menu'];?>&search=" + searchStr;
        }
    </script>
    <div class="wrap container-fluid">
        <nav class="navbar navbar-default navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">LOGO</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dashboardList"><a href="/<?=$pageKey?>/?menu=dashboard">Dashboard <span class="sr-only">(dashboard)</span></a></li>
                        <li class="productList"><a href="/<?=$pageKey?>/?menu=product">Product <span class="sr-only">(product)</span></a></li>
                        <li class="companyList">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Company Info.
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/<?=$pageKey?>/?menu=company">Search</a></li>
                                <li><a href="/<?=$pageKey?>/?menu=company_regist">Register</a></li>
                                <li>
                                    <a href="/board/module/control/excel.php?tbl=IN_COMPANY">
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        Excel Export
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="hitoryList"><a href="#">History <span class="sr-only">(current)</span></a></li>
                        <li class="spendList"><a href="/<?=$pageKey?>/?menu=spend">Spend <span class="sr-only">(spend)</span></a></li>
                        <!--<li class="spendList">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Spend<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
            </ul>
        </li>-->
                    </ul>
                    <form class="navbar-form navbar-right" role="search" method="get" action="javascript:search();">
                        <div class="input-group">
                            <input type="text" class="form-control" id="headerSearch" placeholder="Search for..." value="" name="search">
                            <span class="input-group-btn">
                                <a class="btn btn-primary" href="javascript:search();">Search</a>
                            </span>
                        </div><!-- /input-group -->
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Link</a></li>
                        <li>
                            <? if ($_SESSION['useridx'] == '' || !$_SESSION['useridx'])  { ?>
                            <a data-toggle="modal" data-target="#LoginModal">Sign in</a>
                            <? } else { ?>
                            <a href="module/control/Control_C.php?mod=logout">Sign out</a>
                            <? } ?>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- login Modal -->
        <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Login</h4>
                    </div>
                    <div class="modal-body">
                        <!-- form -->
                        <form class="form-horizontal" id="login_form" method="post" action="">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="login_id" name="login_id" placeholder="ID*">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="login_pass" name="login_pass" placeholder="Password*">
                                </div>
                            </div>
                        </form>
                        <!-- form end -->
                    </div>
                    <div class="modal-footer">
                        <p class="pull-left" id="login_support">

                        </p>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="login();">Login</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- login Modal end -->
