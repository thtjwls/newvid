<?php

include("config.php");

$con=mysql_connect("$host", "$user", "$pass");
   if(!$con)
   {
     echo(" <script language='javascript'>
         window.alert(' Connection failed. Server is dead! Try later.')
         history.go(-1)
         </script>
         ");
   }
   $sel=mysql_select_db("$dbname", $con);
   if(!$sel)
   {
     echo(" <script language='javascript'>
         window.alert(' DB selection failed. Ask to DBA')
         history.go(-1)
         </script>
         ");
   }
  
?>
