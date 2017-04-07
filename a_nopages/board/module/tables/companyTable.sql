create table IN_COMPANY (
	--구분 key
	Idxno int not null auto_increment primary key,
	--업체명
	Company varchar(50) not null,
	--사업자번호
	CompanyNumber varchar(20) not null,
	--대표자 이름
	CompanyCeo varchar(20) not null,
	--업체 연락처
	Tel varchar(30) not null,	
	--업체 주소
	PostNum varchar(20) not null,
	Address varchar(50) not null,
	InAddress varchar(100) not null,	
	--업체 등록일
	CreateDate datetime not null
)

