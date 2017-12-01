$(document).ready( function() 
{
	$("#log-button").click( function() 
	{
		$("#log-panel").css("display","block");
		$("body").css("overflow","hidden");
		
	} );

	$(".icon-cancel").click( function() 
	{
		$("#log-panel").css("display","none");
		$("body").css("overflow","initial");
	});

	$("#nav-mini-symbol").click( function()
	{
		$("#nav-mini").slideToggle("medium");
	});
});