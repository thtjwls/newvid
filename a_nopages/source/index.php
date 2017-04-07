<!DOCTYPE html>
<html lang="ko">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
</head>
<body>
    <?
    class Image {
        public $width;
        public $height;
        public $ficaption;
        public $path;

        function __construct() {
            print_r($this);
        }
    }

    $img = new Image;
    $img->width = 300;
    $img->height = 500;
    $img->path = "image/";    
    //$img->__construct();

    $imgSample = clone $img;
    $imgSample -> ficaption = "사진설명:다예가 지훈이보고 웃고있다.";
    ?>

    <img src="<?=$imgSample->path?>sample_product06.png" alt="<?=$imgSample->ficaption?>" width="<?=$imgSample->width?>" height="<?=$imgSample->height?>" />
    <p><?=$imgSample->ficaption?></p>
</body>
</html>