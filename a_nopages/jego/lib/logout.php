<? include "session.php";

   unset($_SESSION['useridx']);

   echo "
        <script>
            location.href='../index.php';
        </script>
    ";
?>