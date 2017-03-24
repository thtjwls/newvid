<!DOCTYPE HTML>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>뉴비드 디자인</title>
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
				<li class="menu_title active">
					<a href="/intro/index">Home</a>
					<ul class="sub_menu">
						<li>
							<a href="/intro/index">소개</a>
						</li>
						<li>
							<a href="/intro/organization">조직도</a>
						</li>
						<li>
							<a href="/intro/environment">개발환경</a>
						</li>
						<li>
							<a href="/intro/ci">CI</a>
						</li>						
					</ul>	
				</li>
				<li class="menu_title">
					<a href="/web/index">Web</a>
					<ul class="sub_menu">
						<li>
							<a href="/web/shoppingmall">쇼핑몰</a>
						</li>						
						<li>
							<a href="/web/homepage">홈페이지</a>
						</li>
						<li>
							<a href="/web/solustion">솔루션</a>
						</li>
						<li>
							<a href="/web/publics">공공기관</a>
						</li>
						<li>
							<a href="/web/webbanner">웹배너</a>
						</li>						
					</ul>
				</li>
				<li class="menu_title">
					<a href="/design/index">Design</a>
					<ul class="sub_menu">
						<li>
							<a href="/design/card">명함</a>
						</li>
						<li>
							<a href="/design/leaflet">전단지</a>
						</li>
						<li>
							<a href="/design/plancart">현수막</a>
						</li>
						<li>
							<a href="/design/signboard">간판</a>
						</li>
						<li>
							<a href="/design/banner">배너</a>
						</li>
						<li>
							<a href="/design/sticker">스티커</a>
						</li>
						<li>
							<a href="/design/brochure">브로슈어</a>
						</li>
					</ul>						
				</li>
				<li class="menu_title">
					<a href="/blog/index">Blog</a>
					<ul class="sub_menu">
						<li>
							<a href="/blog/illust">일러스트</a>
						</li>
						<li>
							<a href="/blog/photoshop">포토샵</a>
						</li>
						<li>
							<a href="/blog/program">PHP/JSP</a>
						</li>
						<li>
							<a href="/blog/js">Javascript</a>
						</li>
						<li>
							<a href="/blog/html">HTML5/CSS3</a>
						</li>
					</ul>					
				</li>
				<li class="menu_title">
					<a href="/board/index">Board</a>
					<ul class="sub_menu">
						<li>
							<a href="/board/notice">공지사항</a>
						</li>				
						<li>
							<a href="/board/bbs">자유게시판</a>
						</li>
						<li>
							<a href="/board/qna">Q&A</a>
						</li>
						<li>
							<a href="/board/culture">문화</a>
						</li>				
						<li>
							<a href="/board/lecture">강의</a>
						</li>
					</ul>
				</li>						
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
		<nav class="path_nav clearfix">
			<ul class="clearfix">
				<?				
					$url = explode('/',$_SERVER['PHP_SELF']);

					foreach ($url as $key => $value) {
						if ( $key == 0 || $value == 'index.php' )
							continue;
						if ( $value == 'index' )
							continue;

						?>
						<li>
							<a href="#"><?=$path_name[$value];?></a>
						</li>
						<?
					}					
				?>
			</ul>			
		</nav>		
	</header>		
<article>
<?






echo '<br>';
?>