(function(){
	var current = 0; //현재위치
	var max = 0; //이미지 갯수
	var container; //list 요소를 감싸는 ul

	function init(){
		container = jQuery(".slide ul");
		max = container.children().length;
		//.slide ul 의 요소를 배열한 값 즉,li갯수는 5
		events(); //events() 함수를 실행
	}

	function events(){
		jQuery("button.prev").on("click", prev);
		jQuery("button.next").on("click", next);
		//button class prev, 의 클릭 효과는 function prev 로 호출
	}
	
	function prev( e ){
		current--; //현재위치는 감소
		if( current < 0 ) current = max-1; //현재위치가 0보다 작을 때(current(0)-(max-1)) 첫번째 사진 으로 이동
		animate();
		//prev 버튼 애니메이트 동작시 
	}
	
	function next( e ){
		current++;
		if( current > max-1 ) current = 0;
		animate();
	}

	function animate(){
		var moveX = current * 1920;
		//moveX 는 사진의 사이즈 만큼 이동
		TweenMax.to( container, 3 , { marginLeft:-moveX, ease:Bounce.easeOut } );
		//TweenMax.to 의 플래시 효과 marginLeft 쪽으로 moveX 만큼 이동 Expo.easeOut 효과
	}

	jQuery( document ).ready( init );
})();