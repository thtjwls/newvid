/* 화면 레이아웃 이벤트 */
$(window).on('load resize',function () {
var
	win			= $(window),
	header		= $('header'),
	contents	= $('.contents'),
	footer		= $('footer'),
	body		= $('body'),
	scTop		= $(this).scrollTop();

var
	initHeight	= function () {
		return 	win.height() - header.height() - footer.height() - 31;
	} 



	//alert(contents.height() + '\n' + initHeight() );

	if ( contents.height() < initHeight() )
	{
		footer.css({
			'position'	: 'absolute',
			'width'		: 100 + '%',
			'left'		: 0,
			'bottom'	: 0
		});
	} else {
		footer.css({
			'position'	: 'relative',
			'width'		: 100 + '%',
		});
	}

});

$(window).on('scroll',function () {
	var sc 		= $(this).scrollTop(),
		header 	= $('header');

    if ( sc > header.height() ) {
        header.addClass('fixHeader');
    } else {
        header.removeClass('fixHeader');
    }
})