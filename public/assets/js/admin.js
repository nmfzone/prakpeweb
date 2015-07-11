$(document).ready(function() {

	$('.nav-right div').click(function() {
		if ($(".dropdown").is(":hidden"))
	    {   
	        $(".dropdown").slideDown(400);
	    }
	    else
	    {
	        $(".dropdown").slideUp(300);
	    }
	})

});