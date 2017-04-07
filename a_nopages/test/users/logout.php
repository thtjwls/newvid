<? include "../lib/session.php";
    
    unset($_SESSION['userid']);
    unset($_SESSION['usernick']);
    unset($_SESSION['userhp']);
    unset($_SESSION['useremail']);
    unset($_SESSION['username']);
	unset($_SESSION['useraddress']);
	unset($_SESSION['userno']);
    
    echo "
        <script>
            location.href='../index.php';
        </script>
    ";
?>