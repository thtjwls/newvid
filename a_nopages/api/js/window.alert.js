function alertc(msg) {
	window.onload = function () {
		var m = msg;

		var win = window;
		var doc = document;

		ml = m.length;

		console.log(ml);

		switch (ml) {						
			case ml > 100:
				fontsize = 12;
				break;
			case ml > 80:
				fontsize = 14;
				break;
			case ml > 50:
				fontsize = 16;
				break;
			case ml > 30:
				fontsize = 18;
				break;
			case ml > 10:
				fontsize = 20;
				break;
		}

		//객체 중앙정렬
		var winHeight = $(win).height() / 2;
		var winWidth = $(win).width() / 2;		

		var output = "";

		output += "<div class='api-object-div-outWrap'>";
		output += "<div class='api-object-div-topWrap'>";
		output += "<span>Massage</span>";
		output += "<span id='x-btn'></span>";
		output += "</div>";
		output += "<div class='api-object-div-middleWrap'>";
		output += "<p>" + m + "</p>";
		output += "</div>";
		output += "<div class='api-object-div-bottomWrap'>";
		output += "<p>Close</p>";
		output += "</div>";
		output += "</div>";

		$(document).html(output);

		console.log(output);

		$(".api-object-div-middleWrap > p").css({
			fontSize: ml,
		});
	}
}


//function alertc(msg) {
//	$("<div>", {
//		class: "api-object-div-outWrap"
//	}).appendTo("body");
	
	
//}
