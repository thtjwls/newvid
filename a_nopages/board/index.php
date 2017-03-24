<? include_once('header.php') ?>
<?




//if ( $_SESSION['useridx'] == '' || !$_SESSION['useridx']) 
//    $_GET['menu'] = 'login';

include_once($_GET['menu'].'.php');
?>
<? include_once('footer.php') ?>