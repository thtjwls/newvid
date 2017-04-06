CREATE TABLE SN_MAMBER_TBL (
idx int not null auto_increment primary key, /* 인덱싱 key */
name varchar(30) not null, /* 이름 */
id varchar(30) not null, /* 아이디 */
pass text not null, /* 패스워드 */
buse varchar(50), /* 부서 */
email varchar(30), /* 이메일 */
hp varchar(15), /* 개인연락처 */
tel varchar(15), /* 내선 */
position_level int not null default 1,
membership_level int not null default 1,
access boolean,
regist_day datetime,
regist_ip varchar(15)
) default char set = utf8;