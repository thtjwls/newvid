<meta charset="utf-8">
<? include "dbconnect.php";?>
<?
    $sql=$sql."create table pa_paper (idx int not null primary key auto_increment,";
    $sql=$sql." pa_title varchar(50),";
    $sql=$sql." pa_public int not null default '0',";
    $sql=$sql." pa_writer varchar(20),";
    $sql=$sql." pa_buse varchar(20),";
    $sql=$sql." pa_content TEXT,";
    $sql=$sql." regist_day varchar(30),";
    $sql=$sql." pa_file varchar(50),";
    $sql=$sql." pa_status int not null default '0',";
    $sql=$sql." app1 int not null default '0',";
    $sql=$sql." app2 int not null default '0',";
    $sql=$sql." app3 int not null default '0',";
    $sql=$sql." app4 int not null default '0',";
    $sql=$sql." app5 int not null default '0',";
    $sql=$sql." app6 int not null default '0',";
    $sql=$sql." app7 int not null default '0',";
    $sql=$sql." app8 int not null default '0'";
    $sql=$sql.")";

    $result=mysql_query($sql,$connect);
    
    if(!$result){
        echo "테이블 생성 실패";
    } else {
        echo "테이블 생성 성공";
    }

    echo "sql :" .$sql;
?>



