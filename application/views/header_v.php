<!DOCTYPE HTML>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>뉴비드 디자인</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="http://www.newvid.co.kr/images/favicon.ico">
	<link rel="icon" href="http://www.newvid.co.kr/images/favicon-32x32.png" sizes="32x32" /> 
	<meta name="msapplication-TileImage" content="http://www.newvid.co.kr/images/favicon-270x270.png" /> 
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="icon" href="http://www.newvid.co.kr/images/favicon-190x190.png" sizes="192x192" /> 
	<link rel="apple-touch-icon-precomposed" href="http://www.newvid.co.kr/images/favicon-180x180.png" /> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/css/init.css?v=<?=date('YmdHis');?>">
	<link rel="stylesheet" type="text/css" href="/css/main.css?v=<?=date('YmdHis');?>">	
	<!--[if lt IE 9]>
    <script src="http://www.cikorea.net/front_end/themes/pc/base_tapbbs/js/html5shiv.js"></script>
    <script src="http://www.cikorea.net/front_end/themes/pc/base_tapbbs/js/respond.min.js"></script>
    <![endif]-->

	<!--<link rel="stylesheet" type="text/css" href="/css/media.css?v=<?=date('YmdHis');?>">-->

	<script type="text/javascript" src="/js/main.js?v=<?=date('YmdHis');?>"></script>
</head>
<body style="position: relative;">
	<header class="clearfix">		
		<h1 class="logo">
			<a href="/">
				<img src="/images/logo_main_nocomment.png" class="logo_image">
			</a>			
		</h1>		
		<a href="javascript:void(0);" class="navitoggle" data-target="">
			<i class="fa fa-align-justify"></i>			
		</a>
		<nav class="nav">
			<ul class="header_nav list_inline">		
			<? 
			/* 대메뉴 */ 
			for ($gm = 0; $gm < count($mn0); $gm++ ) { 
				$code = $mn0[$gm][0];
				echo $code;
			?>
				<li class="menu_title">
					<a href="/<?=$mn0[$gm][1]?>"><?=$mn0[$gm][2]?></a>
					<? if ( $mn0[$gm][3] > 0 ) { ?>					
					<ul class="sub_menu">										
						<? /* 메뉴 */ for( $sm = 0; $sm < count($mn1[$gm]); $sm++) { ?>							
							<li>
								<a href="/<?=$mn0[$gm][1] . '/' . $mn1[$gm][$sm][1]?>">									
									<?=$mn1[$gm][$sm][2]?>								
									<i class="fa fa-angle-left"></i>	
								</a>
							</li>
						<? } ?>
					</ul>
					<? } ?>
				</li>
			<? } ?>
			</ul>
			<ul class="login_nav list_inline">
				<li>
					<a href="">
						<i class="fa fa-sign-in"></i>
						LOGIN
					</a>									
				</li>
				<li>
					<a href="">
						<i class="fa fa-user-plus"></i>
						MEMBERSHIP
					</a>
				</li>
				<li>
					<a href="/developer/system">
						<i class="fa fa-lock"></i>
						admin
					</a>
				</li>					
			</ul>						
		</nav>				
	</header>	