$(window).on('load resize',function () {
var
	win			= $(window),
	header		= $('header'),
	contents	= $('.contents'),
	footer		= $('footer'),
	body		= $('body');

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