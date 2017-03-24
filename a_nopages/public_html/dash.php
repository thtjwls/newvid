<!DOCTYPE HTML>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="Preview page of Metronic Admin Theme #4 for calendar page" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="lib/metronic_v4.7.1/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="lib/metronic_v4.7.1/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="lib/metronic_v4.7.1/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="lib/metronic_v4.7.1/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<link href="lib/metronic_v4.7.1/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="lib/metronic_v4.7.1/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
	<link href="lib/metronic_v4.7.1/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN THEME LAYOUT STYLES -->
	<link href="lib/metronic_v4.7.1/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
	<link href="lib/metronic_v4.7.1/assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
	<link href="lib/metronic_v4.7.1/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME LAYOUT STYLES -->
    <!-- custom -->
    <link href="css/main.css" rel="stylesheet" />
</head>
<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
    <div class="page-header navbar navbar-fixed-top">
        <div class="page-header-inner ">
            <div class="page-logo">

            </div>
            <div class="page-actions">
                <button class="btn dark">Dark</button>
            </div>
        </div>
    </div>
    <div class="page-clearfix"></div>
    <div class="page-container">
        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="heading">
                        <h3 class="uppercase">3PL</h3>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-truck"></i>
                            <span class="title">배차관리</span>
                            <span class="fa fa-angle-double-right pull-right"></span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-archive"></i>
                            <span class="title">보관</span>
                            <span class="fa fa-angle-double-right pull-right"></span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-cubes"></i>
                            <span class="title">재고관리</span>
                            <span class="fa fa-angle-double-right pull-right"></span>
                        </a>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-head">
                            <div class="page-title">
                                <h1>
                                    <i class="fa fa-truck"></i>
                                    배차관리
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light portlet-fit bordered">
                            <div class="portlet-title">								
                                <div class="actions float-none">									
									<div class="btn-group btn-group-devided" data-toggle="buttons">									
										<label class="grey-salsa float-left margin-right-5 date-picker">
											<input type="text" name="options" class="form-control input-sm float-left" id="option1">
										</label>
										<label class="btn grey-salsa btn-sm active">
											<input type="radio" name="options" class="toggle" id="option1">지원별보기</label>
										<label class="btn grey-salsa btn-sm">
											<input type="radio" name="options" class="toggle" id="option2">기사별보기</label>
										<label class="btn grey-salsa btn-sm">
											<input type="radio" name="options" class="toggle" id="option2">운송완료현황
										</label>
										<label class="btn grey-salsa btn-sm">
											<input type="radio" name="options" class="toggle" id="option2">지원관리
										</label>
										<label class="btn grey-salsa btn-sm">
											<input type="radio" name="options" class="toggle" id="option2">기사관리
										</label>
										<label class="btn grey-salsa btn-sm">
											<input type="radio" name="options" class="toggle" id="option2">운반통계
										</label>
										<label class="btn grey-salsa btn-sm">
											<input type="radio" name="options" class="toggle" id="option2">EXCEL
										</label>
										<label class="btn grey-salsa btn-sm">
											<input type="radio" name="options" class="toggle" id="option2">새로고침
										</label>
										<label class="btn grey-salsa btn-sm">
											<input type="radio" name="options" class="toggle" id="option2">로그아웃
										</label>
									</div>
								</div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable table-scrollable-borderless">
                                    <table class="table table-hover table-light">
                                        <thead>
                                            <tr class="uppercase">
                                                <th>No</th>
                                                <th>본부 및 지사</th>
                                                <th>검사원</th>
                                                <th>기사</th>
                                                <th>현장(주소)</th>
                                                <th>시작</th>
                                                <th>종료</th>
                                                <th>수량</th>
                                                <th>실운반</th>
                                                <th>공동작업</th>
                                                <th>중량</th>
                                                <th>종류</th>
                                                <th>비고</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--[if lt IE 9]>
    <script src="lib/metronic_v4.7.1/assetsglobal/plugins/respond.min.js"></script>
    <script src="lib/metronic_v4.7.1/assetsglobal/plugins/excanvas.min.js"></script>
    <script src="lib/metronic_v4.7.1/assetsglobal/plugins/ie8.fix.min.js"></script>
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="lib/metronic_v4.7.1/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="lib/metronic_v4.7.1/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="lib/metronic_v4.7.1/assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="lib/metronic_v4.7.1/assets/apps/scripts/calendar.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="lib/metronic_v4.7.1/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script src="lib/metronic_v4.7.1/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
    <!-- custom js -->
    <script src="js/main.js"></script>
</body>
</html>