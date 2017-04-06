<? include $_SERVER["DOCUMENT_ROOT"]."/dw/DB/dbconnect.php";?>
<? include "docu_module.php";?>
<meta charset="utf-8" />
<?
//insert 모드
    if($mode="save"){
        $paper_save="insert into documents (writer_id,writer_name,writer_buse,writer_tel,buse_own,regi_day,cate,refer1,refer2,refer3,refer4,refer5";
        for($i=1;$i<41;$i++){ if($i<10){
                $paper_save=$paper_save.", docu_0".$i;
            } else {
                $paper_save=$paper_save.", docu_".$i;
            }
        }
        $paper_save=$paper_save.") values (";
        $paper_save=$paper_save."'$id','$name','$buse','$tel','$buse_own','$regi_day','$documents_name','$refer1','$refer2','$refer3','$refer4','$refer5'";
        for($i=1;$i<41;$i++){
            if($i<10){
                $paper_save=$paper_save.",'".${"docu_0".$i}."'";
            } else {
                $paper_save=$paper_save.",'".${"docu_".$i}."'";
            }
        }
        $paper_save=$paper_save.")";

        $paper_result=mysql_query($paper_save,$connect);
        if(!$paper_result){
?>
<script>
        alert("저장되지 않았습니다. 잠시수 다시 시도해 주세요. \n(문제가 지속되면 관리자에게 문의하십시오.)");
</script>
<?
        }else{
?>
<script>
    alert("저장되었습니다.");
    window.close();
</script>
<?
        }
    }
    //insert end
?>
<?
echo "$paper_save";
    ?>