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
 <div class="container">
      <div class="row">
        <div class='col-sm-6'>
          <div class="form-group">
            <div class='input-group date'>
              <input type='text' class="form-control" id='datetimepicker1'/>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </body>
	
</form>

    <!--[if lt IE 9]>
    <script src="lib/metronic_v4.7.1/assetsglobal/plugins/respond.min.js"></script>
    <script src="lib/metronic_v4.7.1/assetsglobal/plugins/excanvas.min.js"></script>
    <script src="lib/metronic_v4.7.1/assetsglobal/plugins/ie8.fix.min.js"></script>
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="lib/metronic_v4.7.1/assets/global/plugins/jquery.min.js" type="text/javascript"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/css/bootstrap-datetimepicker.min.css" rel="stylesheet" /> <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment-with-locales.min.js"></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
          $(function () {
            $('#datetimepicker1').datetimepicker({
				language : 'ko', 
				pickTime : false, 
				defalutDate : new Date()
			});
          });
        </script>
</body>
</html>