$(document).ready(function() {

	var height = $(window).height();

	$(".wrapper").css({
		"height": height
	});

	$("#main").css({
		"height": height*0.73,
		"margin-top": height*0.10
	});

});