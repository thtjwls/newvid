<? include_once("../database/Database.php");
// table 이름을 get으로 넘김
   $tbl = $_GET['tbl'];

   $data = new Database;

   $connect = $data->connect();

   header( "Content-type: application/vnd.ms-excel" );
   header( "Content-type: application/vnd.ms-excel; charset=utf-8");
   header( "Content-Disposition: attachment; filename = ".$tbl.date("YmdHi").".xls" );
   header( "Content-Description: PHP4 Generated Data" );

   $EXCEL_STR = "<table border='1' cellpadding='10' cellspacing='0'>";

   //필드명 뽑기
   $tableQry = "DESC ".$tbl;
   $tableResult = mysql_query($tableQry,$connect);
   $tableLoop = 0;

   while ( $row = mysql_fetch_array($tableResult) ) {

       if ($tableLoop == 0)  {$EXCEL_STR .= "<tr>"; $indexKey = $row[0];}

       $EXCEL_STR .= "<td>".$row[0]."</td>";

       if ($tableLoop == count($row) - 1)  {$EXCEL_STR .= "</tr>";}

       $tableLoop++;
   }

   $loop = 0;


   $sql = "select * from ".$tbl." order by ".$indexKey." desc";
   $result = mysql_query($sql,$connect);
   while($rowi = mysql_fetch_assoc($result)) {

       $EXCEL_STR .= "<tr>";

       foreach ( $rowi as $k => $v)
       {
           $EXCEL_STR .= "<td>".$v."</td>";
       }


       $EXCEL_STR .= "</tr>";

       $loop++;
   }



   $EXCEL_STR .="</table>";
   
   echo $EXCEL_STR;
   
   echo "<meta content=\"application/vnd.ms-excel; charset=UTF-8\" name=\"Content-type\"> ";
?>