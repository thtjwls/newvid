
<? if($page=="page1"){ include "page1_title.php"; }?>

<? if ($mod=="view_table"){ 
    include "pa_view_table.php"; 
   } else if ($mod=="pa_write") {
    //include "page1_title.php";
    include "pa_write.php";
   } 
?>