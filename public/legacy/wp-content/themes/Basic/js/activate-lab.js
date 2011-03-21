$(document).ready(function(){
	$('#ifr').dialog({
		title: "Calendar App"
		,modal: true
		,width: 780
		,height: 875
		,autoOpen: false
	});
	$('.activate-lab').click(function(){
		$('#ifr').dialog("open");
	});	
});