<? include "../lib/session.php";
    
    unset($_SESSION['useridx']);
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    unset($_SESSION['usercompany']);
    unset($_SESSION['userbuse']);
    unset($_SESSION['userlevel']);
    unset($_SESSION['user_site_level']);
    unset($_SESSION['userhp']);
    unset($_SESSION['usercp']);
    unset($_SESSION['useremail']);
?>
<script>
    location.href="../index.php";
</script>

                