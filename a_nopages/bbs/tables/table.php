<?
$sql = "
create table ci_board (
board_id int null auto_increment primary key,
board_pid int null default '0' comment '원글번호',
user_id varchar(20) null comment '작성자id',
user_name varchar(20) not null comment '작성자이름',
subject varchar(50) not null comment '게시글제목',
hits int not null default '0' comment '조회수',
reg_date datetime not null comment '등록일',
index `board_pid` (`board_pid`)
);
";
?>