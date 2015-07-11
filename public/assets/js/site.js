$(document).ready(function() {

	var height = $(window).height();

	$("#master").css({
		"height": height
	});

	$("#home-clc").click(function() {
		$("#home-media").fadeIn();
		$("#berita-terbaru").hide();
		$("#profil-ika").hide();
	});

	$("#news-clc").click(function() {
		$("#berita-terbaru").fadeIn();
		$("#home-media").hide();
		$("#profil-ika").hide();
	});

	$("#profil-clc").click(function() {
		$("#profil-ika").fadeIn();
		$("#berita-terbaru").hide();
		$("#home-media").hide();
	});

	$("#main").css({
		"height": height*0.73,
		"margin-top": height*0.10
	});

});