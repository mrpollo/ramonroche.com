jQuery(function(){
	jQuery(".sidebar-box ul li a").hover(function(){
		jQuery(this).animate({
			marginLeft: "20px"
		}, 250);
	}, function(){
		jQuery(this).stop().animate({
			marginLeft: "0px"
		}, 250);
	});
	jQuery("#pages ul li").hover(function(){
		jQuery(this).animate({
			marginTop: "10px"
		}, 250);
	}, function(){
		jQuery(this).animate({
			marginTop: "0px"
		}, 250);
	});
});