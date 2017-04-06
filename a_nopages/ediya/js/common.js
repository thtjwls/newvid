$(document).ready(function(){
  $('.bx-slider').bxSlider({
	  auto: true,
	  autoControls: true,
	  mode: 'fade',	  
	  pager: false,
      slideMargin : 10,
  });

  $('.recommend_bx_slider').bxSlider({
      auto: false,
      autoControls: false,
      slideWidth: 100,     
      maxSlides: 3,
      moveSlides: 1,
      slideMargin: 0,
      pager: false,
      captions: true,      
    });
});