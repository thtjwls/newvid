<?
include_once ("php/class.PdfModel.php");
$imgLoad = new img;
$imgArr = $imgLoad->getFileNames();
$panelImg = new Imgthumb;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
	<meta charset="utf-8" />
    <script src="js/jquery-1.12.4.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.mobile-1.4.5.js"></script>
    <!--<script src="js/custom.js"></script>-->
    <link href="css/jquery-ui.css" rel="stylesheet" />
    <link href="css/jquery.mobile-1.4.5.css" rel="stylesheet" />
    <!--<link href="css/index2.css" rel="stylesheet" />-->
</head>
<body>
    <div class="arrow">
        <button>PREV</button>
        <button>NEXT</button>
    </div>
    <div class="imgContainer">
        
    </div>
    <script>  
        function btn(a, p) {

            var path = "pdf/";            
            var file = "20161016_175807";
            var exp = ".png";

            switch (a) {

                case 1:
                    p = p++;
                    break;
                case 2:
                    p = p--;
                    break;
                default:
                    break;

            }
            
            

            $("img", {
                src: path + file + exp,

            })
        }            
    </script>
</body>
</html>
