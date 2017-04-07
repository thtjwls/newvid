create table IN_PRODUCT (
	Idxno int primary key auto_increment not null, /* 데이터 제어를 위한 Key값 */
	ProductName varchar(50) not null, /* 품명 */
	ProductOffice varchar(50) not null, /* 구매처 */
	EstimateDate varchar(30) not null, /* 견적일 */	
	ProductCost int not null, /* 품값 */
	Comment text not null, /* 구매사유 */		
	ProductKey text not null, /* 구분 key */
	Sta tinyint not null, 
	/* 현재 상태 0: 견적중, 1: 기안완료, 2: 결제완료, 3: 수령완료, 4: 결제거부, 5:재검토 요청 */
	CreateDate datetime not null, /* 데이터 생성 날짜 */
	ModifyDate datetime not null /*  데이터 수정 날짜 */
)