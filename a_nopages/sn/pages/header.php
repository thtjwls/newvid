<? 
$root_path = $_SERVER["DOCUMENT_ROOT"];
    include_once("../sn/includeURI/includeURI.php");     

    $session = false;

    if(isset($_SESSION["loginidx"])) $session = true;    
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title>통합 BBS LOGIN</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/common.js?value=10s"></script>
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/main/main.css" />    
</head>
<body>
    <div class="wrap">
        <div class="login_header">            
            <ul>                
                <li>
                    <a href="javascript:loginForm(true);">LOGIN</a>
                </li>
                <li>
                    <a href="?setPage=membershipView">MEMBERSHIP</a>
                </li>                  
                <!--<li>
                    <a href="javascript:loginForm(true);">LOGOUT</a>
                </li>
                <li>
                    <a href="?setPage=membershipView">MODIFY</a>
                </li>-->                                       
            </ul>
        </div>
        <div class="header">
            <div class="logo">
                <h1>
                    <a href="/sn">
                        BBS LOGO UNIT
                    </a>
                </h1>
            </div>
            <div class="category">
                <ul>
                    <li><a href="?setPage=page01">DashBoard</a></li>
                    <li><a href="?setPage=page02">Notice</a></li>
                    <li><a href="">Board</a></li>
                    <li><a href="">UNIT4</a></li>
                    <li><a href="">UNIT5</a></li>
                </ul>
            </div>
        </div>
        <div class="contents" id="contents_div_default">        